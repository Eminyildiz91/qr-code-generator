<?php
// Include the phpqrcode library
require_once('phpqrcode/qrlib.php');

// Check if it's a preview request (support both GET and POST methods)
if ((isset($_GET['preview']) && $_GET['preview'] === 'true') || (isset($_POST['preview']) && $_POST['preview'] === 'true')) {
    // Get parameters from either GET or POST
    $data = isset($_POST['data']) ? $_POST['data'] : (isset($_GET['data']) ? $_GET['data'] : '');
    $size = isset($_POST['size']) ? intval($_POST['size']) : (isset($_GET['size']) ? intval($_GET['size']) : 6);
    $foreground = isset($_POST['foreground']) ? $_POST['foreground'] : (isset($_GET['foreground']) ? $_GET['foreground'] : '000000');
    $background = isset($_POST['background']) ? $_POST['background'] : (isset($_GET['background']) ? $_GET['background'] : 'FFFFFF');

    // Generate temporary QR code for preview
    $tempFile = tempnam(sys_get_temp_dir(), 'qr_preview_');
    if ($tempFile === false) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Could not create temporary file']);
        exit;
    }
    // Önizleme için küçük QR kod oluştur
    QRcode::png($data, $tempFile, QR_ECLEVEL_L, 1, 0, false, hexdec($background), hexdec($foreground));

    // Output the image
    if (file_exists($tempFile) && is_readable($tempFile)) {
        header('Content-Type: image/png');
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        if (readfile($tempFile) === false) {
            header('HTTP/1.1 500 Internal Server Error');
            echo json_encode(['error' => 'Could not read QR code image']);
        }
        unlink($tempFile);
        exit;
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'QR code image not found']);
        exit;
    }
}

// Start session for language settings
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include language configuration
require_once('config/language.php');

// Check if language change is requested
if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $available_languages)) {
    // Store current language in session
    $_SESSION['language'] = $_GET['lang'];
    // Store in cookie for 30 days
    setcookie('language', $_GET['lang'], time() + (86400 * 30), '/');
    // Log the language change
    error_log('Language changed to: ' . $_GET['lang']);
    // If we have post data stored in session, use it to regenerate the page
    if (isset($_SESSION['qr_post_data']) && !empty($_SESSION['qr_post_data'])) {
        $_POST = $_SESSION['qr_post_data'];
        // Set REQUEST_METHOD to POST to simulate form submission
        $_SERVER['REQUEST_METHOD'] = 'POST';
        // Log the POST data
        error_log('POST data restored: ' . print_r($_POST, true));
    }
}

// Get current language
$current_language = getCurrentLanguage();

// Load language file
$lang = loadLanguage($current_language);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store POST data in session for language switching
    $_SESSION['qr_post_data'] = $_POST;
    
    // Get form data
    $data = '';
    $format = isset($_POST['format']) ? $_POST['format'] : 'text';
    $size = isset($_POST['size']) ? intval($_POST['size']) : 6;
    $correction = isset($_POST['correction']) ? $_POST['correction'] : 'M';
    $foreground = isset($_POST['foreground']) ? str_replace('#', '', $_POST['foreground']) : '000000';
    $background = isset($_POST['background']) ? str_replace('#', '', $_POST['background']) : 'FFFFFF';
    
    // Format specific data processing
    switch($format) {
        case 'text':
        case 'url':
            $data = isset($_POST['data']) ? trim($_POST['data']) : '';
            break;
        case 'vcard':
            $name = isset($_POST['vcard-name']) ? $_POST['vcard-name'] : '';
            $phone = isset($_POST['vcard-phone']) ? $_POST['vcard-phone'] : '';
            $email = isset($_POST['vcard-email']) ? $_POST['vcard-email'] : '';
            $org = isset($_POST['vcard-org']) ? $_POST['vcard-org'] : '';
            
            $data = "BEGIN:VCARD\nVERSION:3.0\nFN:$name\n";
            if ($phone) $data .= "TEL:$phone\n";
            if ($email) $data .= "EMAIL:$email\n";
            if ($org) $data .= "ORG:$org\n";
            $data .= "END:VCARD";
            break;
        case 'wifi':
            $ssid = isset($_POST['wifi-ssid']) ? $_POST['wifi-ssid'] : '';
            $password = isset($_POST['wifi-password']) ? $_POST['wifi-password'] : '';
            $type = isset($_POST['wifi-type']) ? $_POST['wifi-type'] : 'WPA';
            
            $data = "WIFI:S:$ssid;T:$type;P:$password;;";
            break;
        case 'email':
            $email = isset($_POST['email-address']) ? $_POST['email-address'] : '';
            $subject = isset($_POST['email-subject']) ? $_POST['email-subject'] : '';
            $body = isset($_POST['email-body']) ? $_POST['email-body'] : '';
            
            $data = "mailto:$email";
            if ($subject || $body) {
                $data .= '?';
                if ($subject) $data .= 'subject=' . urlencode($subject);
                if ($body) {
                    if ($subject) $data .= '&';
                    $data .= 'body=' . urlencode($body);
                }
            }
            break;
    }
    
    // Validate data
    if (empty($data)) {
        header('Location: index.php?error=' . urlencode($lang['error_empty_content']));
        exit;
    }
    
    // Create directory for QR codes if it doesn't exist
    $qrDirectory = __DIR__ . '/qrcodes/';
    if (!file_exists($qrDirectory)) {
        if (!mkdir($qrDirectory, 0755, true)) {
            header('Location: index.php?error=' . urlencode($lang['error_dir_create']));
            exit;
        }
    } elseif (!is_writable($qrDirectory)) {
        header('Location: index.php?error=' . urlencode($lang['error_dir_write']));
        exit;
    }
    
    // Generate a unique filename
    $filename = $qrDirectory . 'qr_' . md5($data . time()) . '.png';
    $relativeFilename = 'qrcodes/qr_' . md5($data . time()) . '.png';
    
    // Generate QR code with custom colors
    try {
        // Ensure the QR code library is loaded
        if (!class_exists('QRcode')) {
            throw new Exception($lang['error_lib_load']);
        }

        // Verify directory is writable
        if (!is_writable($qrDirectory)) {
            throw new Exception($lang['error_dir_write']);
        }

        // Generate the QR code with error checking
        $result = QRcode::png($data, $filename, $correction, $size, 4, false, hexdec($background), hexdec($foreground));
        if ($result === false) {
            throw new Exception($lang['error_generate']);
        }
        
        // Verify the file was created and is readable
        if (!file_exists($filename)) {
            throw new Exception($lang['error_file_create']);
        }
        
        if (!is_readable($filename)) {
            throw new Exception($lang['error_file_read']);
        }
        
        // Set appropriate file permissions
        if (!chmod($filename, 0644)) {
            throw new Exception($lang['error_file_permission']);
        }
    } catch (Exception $e) {
        header('Location: index.php?error=' . urlencode($e->getMessage()));
        exit;
    }
    
    // Get the data type for display purposes
    $dataType = ucfirst($format);
} else {
    // Redirect to index if accessed directly
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['qr_generated']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="fade-in"><?php echo $lang['qr_generated']; ?></h1>
        
        <!-- Language Switcher -->
        <div class="language-switcher">
            <div class="current-language">
                <span><?php echo isset($lang['current_language']) ? $lang['current_language'] : getLanguageName($current_language); ?></span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <ul class="language-dropdown">
                <?php
                // Store current QR code data in hidden form fields
                foreach ($available_languages as $code => $name) {
                    $active = ($current_language === $code) ? ' class="active"' : '';
                    echo "<li$active>";
                    echo "<form method='post' action='generate.php?lang=$code' style='margin:0;padding:0;display:inline;'>";
                    
                    // Hidden fields to preserve QR code data
                    foreach ($_POST as $key => $value) {
                        if (is_array($value)) {
                            foreach ($value as $arrKey => $arrValue) {
                                echo "<input type='hidden' name='{$key}[$arrKey]' value='" . htmlspecialchars($arrValue, ENT_QUOTES, 'UTF-8') . "'>";
                            }
                        } else {
                            echo "<input type='hidden' name='$key' value='" . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . "'>";
                        }
                    }
                    
                    // Language button that looks like a link
                    echo "<button type='submit' style='background:none;border:none;padding:0;margin:0;cursor:pointer;color:inherit;font:inherit;text-align:left;width:100%;'>";
                    echo "<i class='fas fa-check' aria-hidden='true'></i> <span>$name</span>";
                    echo "</button>";
                    echo "</form>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
        
        <div class="qr-result">
            <div class="qr-image-container">
                <img src="<?php echo $relativeFilename; ?>" alt="QR Code" class="qr-generated-image">
            </div>
            
            <div class="qr-details">
                <div class="qr-info">
                    <h3><?php echo $lang['qr_info']; ?></h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label"><?php echo $lang['content_type']; ?></span>
                            <span class="info-value"><?php echo $dataType; ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><?php echo $lang['size']; ?></span>
                            <span class="info-value"><?php echo $size; ?>x<?php echo $size; ?> <?php echo $lang['pixels']; ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label"><?php echo $lang['error_correction']; ?></span>
                            <span class="info-value"><?php echo $correction; ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="qr-actions">
                    <a href="<?php echo $filename; ?>" download class="action-btn download-btn">
                        <i class="fas fa-download"></i>
                        <?php echo $lang['download_qr']; ?>
                    </a>
                    <a href="delete.php?file=<?php echo basename($filename); ?>" class="action-btn delete-btn" onclick="return confirm('<?php echo $lang["confirm_delete_qr"]; ?>')">
                        <i class="fas fa-trash-alt"></i>
                        <?php echo $lang['delete_qr']; ?>
                    </a>
                    <a href="index.php" class="action-btn back-btn">
                        <i class="fas fa-arrow-left"></i>
                        <?php echo $lang['new_qr']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo $lang['footer']; ?></p>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const languageSwitcher = document.querySelector('.current-language');
            const dropdown = document.querySelector('.language-dropdown');

            languageSwitcher.addEventListener('click', function() {
                dropdown.classList.toggle('show');
            });

            // Close the dropdown if clicked outside
            window.addEventListener('click', function(event) {
                if (!languageSwitcher.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
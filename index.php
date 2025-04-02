<?php
// Start session for language settings
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include language configuration
require_once('config/language.php');

// Get current language
$current_language = getCurrentLanguage();

// Load language file
$lang = loadLanguage($current_language);
?>
<!DOCTYPE html>
<html lang="<?php echo $current_language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($lang['title'] ?? ''); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/language-switcher.js" defer></script>
    <script src="script.js" defer></script>
</head>
<body class="navbar-visible">
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="nav-logo" title="<?php echo htmlspecialchars($lang['nav_home'] ?? ''); ?>">
                <i class="fas fa-qrcode"></i>
                <span><?php echo htmlspecialchars($lang['title'] ?? ''); ?></span>
            </a>
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="<?php echo htmlspecialchars($lang['menu_toggle'] ?? ''); ?>">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-links" id="navLinks" role="navigation" aria-label="<?php echo htmlspecialchars($lang['main_navigation'] ?? ''); ?>">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                ?>
                <a href="index.php" class="<?php echo ($current_page === 'index.php') ? 'active' : ''; ?>" <?php echo ($current_page === 'index.php') ? 'aria-current="page"' : ''; ?>><i class="fas fa-home"></i> <?php echo htmlspecialchars($lang['nav_home'] ?? ''); ?></a>
                <a href="#history" class="nav-link"><i class="fas fa-history"></i> <?php echo htmlspecialchars($lang['nav_history'] ?? ''); ?></a>
                <a href="#info" class="nav-link"><i class="fas fa-info-circle"></i> <?php echo htmlspecialchars($lang['nav_info'] ?? ''); ?></a>
            </div>
            <div class="nav-language">
                <!-- Language Switcher -->
                <div class="language-switcher">
                    <button class="current-language" aria-haspopup="true" aria-expanded="false" aria-label="<?php echo htmlspecialchars($lang['select_language'] ?? ''); ?>">
                        <i class="fas fa-globe" aria-hidden="true"></i>
                        <span><?php echo isset($lang['current_language']) ? htmlspecialchars($lang['current_language']) : getLanguageName($current_language); ?></span>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <ul class="language-dropdown" role="menu" aria-label="<?php echo htmlspecialchars($lang['available_languages'] ?? ''); ?>">
                        <li<?php echo $current_language === 'tr' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=tr" <?php echo $current_language === 'tr' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Türkçe</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'en' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=en" <?php echo $current_language === 'en' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>English</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'es' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=es" <?php echo $current_language === 'es' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Español</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'fr' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=fr" <?php echo $current_language === 'fr' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Français</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'de' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=de" <?php echo $current_language === 'de' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Deutsch</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'it' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=it" <?php echo $current_language === 'it' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Italiano</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'zh' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=zh" <?php echo $current_language === 'zh' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>中文</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'ja' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=ja" <?php echo $current_language === 'ja' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>日本語</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'ar' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=ar" <?php echo $current_language === 'ar' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>العربية</span>
                            </a>
                        </li>
                        <li<?php echo $current_language === 'da' ? ' class="active"' : ''; ?> role="menuitem">
                            <a href="?lang=da" <?php echo $current_language === 'da' ? 'aria-current="true"' : ''; ?>>
                                <i class="fas fa-check" aria-hidden="true"></i>
                                <span>Dansk</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1><?php echo htmlspecialchars($lang['page_title'] ?? ''); ?></h1>
        
        
        
        <div class="form-container">
            <?php
            // Check for error messages
            if (isset($_GET['error'])) {
                echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            // Add more specific error handling
            if (isset($_GET['success'])) {
                echo '<div class="success-message">' . htmlspecialchars($_GET['success']) . '</div>';
            }
            ?>
            <form action="generate.php" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="data"><?php echo htmlspecialchars($lang['qr_content'] ?? ''); ?></label>
                    <textarea name="data" id="data" rows="4" required placeholder="<?php echo htmlspecialchars($lang['qr_content_placeholder'] ?? ''); ?>"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="size"><?php echo htmlspecialchars($lang['qr_size'] ?? ''); ?></label>
                    <select name="size" id="size">
                        <option value="1"><?php echo htmlspecialchars($lang['size_small'] ?? ''); ?></option>
                        <option value="2" selected><?php echo htmlspecialchars($lang['size_medium'] ?? ''); ?></option>
                        <option value="3"><?php echo htmlspecialchars($lang['size_large'] ?? ''); ?></option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="correction"><?php echo htmlspecialchars($lang['error_correction'] ?? ''); ?></label>
                    <select name="correction" id="correction">
                        <option value="L"><?php echo htmlspecialchars($lang['correction_low'] ?? ''); ?></option>
                        <option value="M" selected><?php echo htmlspecialchars($lang['correction_medium'] ?? ''); ?></option>
                        <option value="Q"><?php echo htmlspecialchars($lang['correction_high'] ?? ''); ?></option>
                        <option value="H"><?php echo htmlspecialchars($lang['correction_highest'] ?? ''); ?></option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="foreground"><?php echo htmlspecialchars($lang['qr_color'] ?? ''); ?></label>
                    <input type="color" name="foreground" id="foreground" value="#000000">
                </div>
                
                <div class="form-group">
                    <label for="background"><?php echo htmlspecialchars($lang['background_color'] ?? ''); ?></label>
                    <input type="color" name="background" id="background" value="#FFFFFF">
                </div>
                
                <div class="form-group">
                    <label for="format"><?php echo htmlspecialchars($lang['qr_format'] ?? ''); ?></label>
                    <select name="format" id="format">
                        <option value="text" selected><?php echo htmlspecialchars($lang['format_text'] ?? ''); ?></option>
                        <option value="url"><?php echo htmlspecialchars($lang['format_url'] ?? ''); ?></option>
                        <option value="vcard"><?php echo htmlspecialchars($lang['format_vcard'] ?? ''); ?></option>
                        <option value="wifi"><?php echo htmlspecialchars($lang['format_wifi'] ?? ''); ?></option>
                        <option value="email"><?php echo htmlspecialchars($lang['format_email'] ?? ''); ?></option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="template"><?php echo htmlspecialchars($lang['qr_template'] ?? ''); ?></label>
                    <select name="template" id="template">
                        <option value="classic" selected><?php echo htmlspecialchars($lang['template_classic'] ?? ''); ?></option>
                        <option value="modern"><?php echo htmlspecialchars($lang['template_modern'] ?? ''); ?></option>
                        <option value="rounded"><?php echo htmlspecialchars($lang['template_rounded'] ?? ''); ?></option>
                        <option value="dotted"><?php echo htmlspecialchars($lang['template_dotted'] ?? ''); ?></option>
                    </select>
                </div>
                
                <div id="format-fields"></div>
                
                <!-- Hidden elements for JavaScript translations -->
                <div style="display: none;">
                    <span id="vcard-name-label" data-label="<?php echo htmlspecialchars($lang['vcard_name'] ?? ''); ?>"></span>
                    <span id="vcard-phone-label" data-label="<?php echo htmlspecialchars($lang['vcard_phone'] ?? ''); ?>"></span>
                    <span id="vcard-email-label" data-label="<?php echo htmlspecialchars($lang['vcard_email'] ?? ''); ?>"></span>
                    <span id="vcard-org-label" data-label="<?php echo htmlspecialchars($lang['vcard_org'] ?? ''); ?>"></span>
                </div>
                
                <div class="form-group">
                    <button type="button" class="btn preview-btn" onclick="previewQR()">
                        <i class="fas fa-eye"></i>
                        <?php echo htmlspecialchars($lang['preview_button'] ?? ''); ?>
                    </button>
                    <button type="submit" class="btn">
                        <i class="fas fa-qrcode"></i>
                        <?php echo htmlspecialchars($lang['generate_button'] ?? ''); ?>
                    </button>
                </div>
            </form>
            
            <div id="preview-container" style="display: none;" class="qr-preview">
                <h3><?php echo htmlspecialchars($lang['preview_title'] ?? ''); ?></h3>
                <div id="preview-qr"></div>
            </div>
        </div>
        
        <div id="history" class="history-container">
            <div class="history-header">
                <h2><?php echo htmlspecialchars($lang['history_title'] ?? ''); ?></h2>
                <button type="button" class="btn clear-history-btn" onclick="clearQRHistory()">
                    <i class="fas fa-trash-alt"></i>
                    <?php echo htmlspecialchars($lang['clear_history'] ?? ''); ?>
                </button>
                <span id="confirm-clear-history-text" style="display: none;" data-message="<?php echo htmlspecialchars($lang['confirm_clear_history'] ?? ''); ?>"></span>
                <span id="confirm-delete-qr-text" style="display: none;" data-message="<?php echo htmlspecialchars($lang['confirm_delete_qr'] ?? ''); ?>"></span>
            </div>
            <div id="qr-history" class="qr-history-grid">
                <!-- QR code history will be dynamically added here -->
            </div>
        </div>

        <div id="info" class="info-container">
            <h2><?php echo htmlspecialchars($lang['what_is_qr'] ?? ''); ?></h2>
            <p><?php echo htmlspecialchars($lang['qr_description'] ?? ''); ?></p>
            
            <h2><?php echo htmlspecialchars($lang['usage_areas'] ?? ''); ?></h2>
            <ul>
                <li><?php echo htmlspecialchars($lang['usage_website'] ?? ''); ?></li>
                <li><?php echo htmlspecialchars($lang['usage_contact'] ?? ''); ?></li>
                <li><?php echo htmlspecialchars($lang['usage_product'] ?? ''); ?></li>
                <li><?php echo htmlspecialchars($lang['usage_event'] ?? ''); ?></li>
                <li><?php echo htmlspecialchars($lang['usage_wifi'] ?? ''); ?></li>
            </ul>
        </div>
    </div>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($lang['footer'] ?? ''); ?></p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
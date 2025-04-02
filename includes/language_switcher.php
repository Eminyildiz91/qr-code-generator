<?php
// Include language configuration if not already included
if (!function_exists('getCurrentLanguage')) {
    require_once(__DIR__ . '/../config/language.php');
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get current language
$current_language = getCurrentLanguage();
$available_languages = getAvailableLanguages();
?>

<div class="language-switcher">
    <div class="current-language">
        <span><?php echo getLanguageName($current_language); ?></span>
        <i class="fas fa-chevron-down"></i>
    </div>
    <ul class="language-dropdown">
        <?php foreach ($available_languages as $code => $name): ?>
            <li<?php echo ($code === $current_language) ? ' class="active"' : ''; ?>>
                <a href="?lang=<?php echo $code; ?>"><?php echo $name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
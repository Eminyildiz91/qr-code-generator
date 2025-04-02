<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Available languages
$available_languages = [
    'tr' => 'Türkçe',
    'en' => 'English',
    'es' => 'Español',
    'fr' => 'Français',
    'de' => 'Deutsch',
    'it' => 'Italiano',
    'zh' => '中文',
    'ja' => '日本語',
    'ar' => 'العربية',
    'da' => 'Dansk'
];

// Default language
$default_language = 'tr';

// Get current language from URL parameter, session, cookie, or default
function getCurrentLanguage() {
    global $default_language, $available_languages;
    
    // Check if language is set in URL parameter first
    if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $available_languages)) {
        $_SESSION['language'] = $_GET['lang'];
        setcookie('language', $_GET['lang'], time() + (86400 * 30), '/');
        return $_GET['lang'];
    }
    
    // Check if language is set in session
    if (isset($_SESSION['language']) && array_key_exists($_SESSION['language'], $available_languages)) {
        return $_SESSION['language'];
    }
    
    // Check if language is set in cookie
    if (isset($_COOKIE['language']) && array_key_exists($_COOKIE['language'], $available_languages)) {
        return $_COOKIE['language'];
    }
    
    // Return default language if no match found
    return $default_language;
}

// Load language file
function loadLanguage($language_code) {
    global $available_languages, $default_language;
    
    // Validate language code
    if (!array_key_exists($language_code, $available_languages)) {
        $language_code = $default_language;
    }
    
    // Set language in session and cookie
    $_SESSION['language'] = $language_code;
    setcookie('language', $language_code, time() + (86400 * 30), '/');
    
    // Load language file
    $language_file = __DIR__ . '/../languages/' . $language_code . '.php';
    
    if (file_exists($language_file)) {
        require_once($language_file);
        return $lang;
    }
    
    // Fallback to default language if file doesn't exist
    require_once(__DIR__ . '/../languages/' . $default_language . '.php');
    return $lang;
}

// Get language name from code
function getLanguageName($language_code) {
    global $available_languages;
    return array_key_exists($language_code, $available_languages) ? $available_languages[$language_code] : $available_languages['tr'];
}

// Get all available languages
function getAvailableLanguages() {
    global $available_languages;
    return $available_languages;
}
?>
<?php
// German language file
$lang = [
    // Common
    'title' => 'QR-Code-System',
    'footer' => 'QR-Code-System',
    
    // Index page
    'page_title' => 'QR-Code-Generierungssystem',
    'qr_content' => 'QR-Code-Inhalt:',
    'qr_content_placeholder' => 'Text, URL oder beliebige Daten eingeben',
    'qr_size' => 'QR-Code-Größe:',
    'size_small' => 'Klein (150x150)',
    'size_medium' => 'Mittel (200x200)',
    'size_large' => 'Groß (300x300)',
    'error_correction' => 'Fehlerkorrekturebene:',
    'correction_low' => 'Niedrig (L)',
    'correction_medium' => 'Mittel (M)',
    'correction_high' => 'Hoch (Q)',
    'correction_highest' => 'Höchste (H)',
    'qr_color' => 'QR-Code-Farbe:',
    'background_color' => 'Hintergrundfarbe:',
    'qr_format' => 'QR-Code-Format:',
    'format_text' => 'Text',
    'format_url' => 'URL',
    'format_vcard' => 'Visitenkarte (vCard)',
    'format_wifi' => 'WLAN-Netzwerk',
    'format_email' => 'E-Mail',
    'qr_template' => 'QR-Code-Vorlage:',
    'template_classic' => 'Klassisch',
    'template_modern' => 'Modern',
    'template_rounded' => 'Abgerundete Ecken',
    'template_dotted' => 'Gepunktet',
    'preview_button' => 'Vorschau',
    'generate_button' => 'QR-Code generieren',
    'preview_title' => 'QR-Code-Vorschau',
    'history_title' => 'Kürzlich generierte QR-Codes',
    'clear_history' => 'Verlauf löschen',
    'what_is_qr' => 'Was ist ein QR-Code?',
    'qr_description' => 'QR-Code (Quick Response Code) ist ein zweidimensionaler Barcode, der schnell gelesen werden kann und große Datenmengen speichert. Er kann leicht von mobilen Geräten und QR-Code-Lesegeräten gescannt werden.',
    'usage_areas' => 'Einsatzbereiche',
    'usage_website' => 'Website-URLs',
    'usage_contact' => 'Kontaktinformationen',
    'usage_product' => 'Produktinformationen',
    'usage_event' => 'Veranstaltungsinformationen',
    'usage_wifi' => 'WLAN-Netzwerkinformationen',
    
    // Form validation
    'validate_content' => 'Bitte geben Sie den QR-Code-Inhalt ein.',
    'confirm_clear_history' => 'Sind Sie sicher, dass Sie den gesamten QR-Code-Verlauf löschen möchten?',
    'confirm_delete_qr' => 'Sind Sie sicher, dass Sie diesen QR-Code löschen möchten?',
    
    // vCard format
    'vcard_name' => 'Vollständiger Name:',
    'vcard_phone' => 'Telefon:',
    'vcard_email' => 'E-Mail:',
    'vcard_org' => 'Unternehmen:',
    'vcard_name_required' => 'Das Feld Vollständiger Name ist erforderlich.',
    
    // WiFi format
    'wifi_ssid' => 'Netzwerkname (SSID):',
    'wifi_password' => 'Passwort:',
    'wifi_type' => 'Sicherheitstyp:',
    'wifi_wpa' => 'WPA/WPA2',
    'wifi_wep' => 'WEP',
    'wifi_nopass' => 'Kein Passwort',
    'wifi_ssid_required' => 'Netzwerkname (SSID) ist erforderlich.',
    
    // Email format
    'email_address' => 'E-Mail-Adresse:',
    'email_subject' => 'Betreff:',
    'email_body' => 'Nachricht:',
    'email_required' => 'E-Mail-Adresse ist erforderlich.',
    'email_invalid' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
    
    // Generate page
    'qr_generated' => 'QR-Code generiert',
    'qr_info' => 'QR-Code-Informationen',
    'content_type' => 'Inhaltstyp',
    'size' => 'Größe',
    'pixels' => 'Pixel',
    'download_qr' => 'QR-Code herunterladen',
    'delete_qr' => 'QR-Code löschen',
    'new_qr' => 'Neuen QR-Code generieren',
    
    // Error messages
    'error_empty_content' => 'QR-Code-Inhalt darf nicht leer sein.',
    'error_dir_create' => 'QR-Code-Verzeichnis konnte nicht erstellt werden.',
    'error_dir_write' => 'QR-Code-Verzeichnis ist nicht beschreibbar.',
    'error_lib_load' => 'QR-Code-Bibliothek konnte nicht geladen werden.',
    'error_generate' => 'QR-Code-Generierung fehlgeschlagen.',
    'error_file_create' => 'QR-Code-Datei konnte nicht erstellt werden.',
    'error_file_read' => 'Generierte QR-Code-Datei kann nicht gelesen werden.',
    'error_file_permission' => 'QR-Code-Dateiberechtigungen konnten nicht festgelegt werden.',
    'error_history_load' => 'Beim Laden des QR-Code-Verlaufs ist ein Fehler aufgetreten.',
    'no_history' => 'Es wurden noch keine QR-Codes generiert.',
    
    // History actions
    'download' => 'Herunterladen',
    'delete' => 'Löschen',
];
?>
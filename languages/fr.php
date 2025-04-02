<?php
// French language file
$lang = [
    // Common
    'title' => 'Système de Code QR',
    'footer' => 'Système de Code QR',
    
    // Index page
    'page_title' => 'Système de Génération de Code QR',
    'qr_content' => 'Contenu du Code QR:',
    'qr_content_placeholder' => 'Entrez du texte, une URL ou toute autre donnée',
    'qr_size' => 'Taille du Code QR:',
    'size_small' => 'Petit (150x150)',
    'size_medium' => 'Moyen (200x200)',
    'size_large' => 'Grand (300x300)',
    'error_correction' => 'Niveau de Correction d\'Erreur:',
    'correction_low' => 'Bas (L)',
    'correction_medium' => 'Moyen (M)',
    'correction_high' => 'Élevé (Q)',
    'correction_highest' => 'Très Élevé (H)',
    'qr_color' => 'Couleur du Code QR:',
    'background_color' => 'Couleur d\'Arrière-plan:',
    'qr_format' => 'Format du Code QR:',
    'format_text' => 'Texte',
    'format_url' => 'URL',
    'format_vcard' => 'Carte de Visite (vCard)',
    'format_wifi' => 'Réseau Wi-Fi',
    'format_email' => 'Email',
    'qr_template' => 'Modèle de Code QR:',
    'template_classic' => 'Classique',
    'template_modern' => 'Moderne',
    'template_rounded' => 'Coins Arrondis',
    'template_dotted' => 'Pointillé',
    'preview_button' => 'Aperçu',
    'generate_button' => 'Générer le Code QR',
    'preview_title' => 'Aperçu du Code QR',
    'history_title' => 'Codes QR Récemment Générés',
    'clear_history' => 'Effacer l\'Historique',
    'what_is_qr' => 'Qu\'est-ce qu\'un Code QR?',
    'qr_description' => 'Le Code QR (Quick Response Code) est un code-barres bidimensionnel qui peut être lu rapidement et stocker de grandes quantités de données. Il peut être facilement scanné par des appareils mobiles et des lecteurs de codes QR.',
    'usage_areas' => 'Domaines d\'Utilisation',
    'usage_website' => 'URLs de sites web',
    'usage_contact' => 'Informations de contact',
    'usage_product' => 'Informations sur les produits',
    'usage_event' => 'Informations sur les événements',
    'usage_wifi' => 'Informations sur les réseaux Wi-Fi',
    
    // Form validation
    'validate_content' => 'Veuillez saisir le contenu du code QR.',
    'confirm_clear_history' => 'Êtes-vous sûr de vouloir supprimer tout l\'historique des codes QR?',
    'confirm_delete_qr' => 'Êtes-vous sûr de vouloir supprimer ce code QR?',
    
    // vCard format
    'vcard_name' => 'Nom Complet:',
    'vcard_phone' => 'Téléphone:',
    'vcard_email' => 'Email:',
    'vcard_org' => 'Entreprise:',
    'vcard_name_required' => 'Le champ Nom Complet est obligatoire.',
    
    // WiFi format
    'wifi_ssid' => 'Nom du Réseau (SSID):',
    'wifi_password' => 'Mot de Passe:',
    'wifi_type' => 'Type de Sécurité:',
    'wifi_wpa' => 'WPA/WPA2',
    'wifi_wep' => 'WEP',
    'wifi_nopass' => 'Sans Mot de Passe',
    'wifi_ssid_required' => 'Le nom du réseau (SSID) est obligatoire.',
    
    // Email format
    'email_address' => 'Adresse Email:',
    'email_subject' => 'Sujet:',
    'email_body' => 'Message:',
    'email_required' => 'L\'adresse email est obligatoire.',
    'email_invalid' => 'Veuillez entrer une adresse email valide.',
    
    // Generate page
    'qr_generated' => 'Code QR Généré',
    'qr_info' => 'Informations du Code QR',
    'content_type' => 'Type de Contenu',
    'size' => 'Taille',
    'pixels' => 'pixels',
    'download_qr' => 'Télécharger le Code QR',
    'delete_qr' => 'Supprimer le Code QR',
    'new_qr' => 'Générer un Nouveau Code QR',
    
    // Error messages
    'error_empty_content' => 'Le contenu du code QR ne peut pas être vide.',
    'error_dir_create' => 'Le répertoire des codes QR n\'a pas pu être créé.',
    'error_dir_write' => 'Le répertoire des codes QR n\'est pas accessible en écriture.',
    'error_lib_load' => 'La bibliothèque de codes QR n\'a pas pu être chargée.',
    'error_generate' => 'La génération du code QR a échoué.',
    'error_file_create' => 'Le fichier du code QR n\'a pas pu être créé.',
    'error_file_read' => 'Le fichier du code QR généré ne peut pas être lu.',
    'error_file_permission' => 'Les permissions du fichier du code QR n\'ont pas pu être définies.',
    'error_history_load' => 'Une erreur s\'est produite lors du chargement de l\'historique des codes QR.',
    'no_history' => 'Aucun code QR n\'a encore été généré.',
    
    // History actions
    'download' => 'Télécharger',
    'delete' => 'Supprimer',
];
?>
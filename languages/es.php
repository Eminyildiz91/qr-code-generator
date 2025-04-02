<?php
// Spanish language file
$lang = [
    // Common
    'title' => 'Sistema de Código QR',
    'footer' => 'Sistema de Código QR',
    
    // Index page
    'page_title' => 'Sistema de Generación de Códigos QR',
    'qr_content' => 'Contenido del Código QR:',
    'qr_content_placeholder' => 'Ingrese texto, URL o cualquier dato',
    'qr_size' => 'Tamaño del Código QR:',
    'size_small' => 'Pequeño (150x150)',
    'size_medium' => 'Mediano (200x200)',
    'size_large' => 'Grande (300x300)',
    'error_correction' => 'Nivel de Corrección de Error:',
    'correction_low' => 'Bajo (L)',
    'correction_medium' => 'Medio (M)',
    'correction_high' => 'Alto (Q)',
    'correction_highest' => 'Máximo (H)',
    'qr_color' => 'Color del Código QR:',
    'background_color' => 'Color de Fondo:',
    'qr_format' => 'Formato del Código QR:',
    'format_text' => 'Texto',
    'format_url' => 'URL',
    'format_vcard' => 'Tarjeta de Contacto (vCard)',
    'format_wifi' => 'Red Wi-Fi',
    'format_email' => 'Correo Electrónico',
    'qr_template' => 'Plantilla del Código QR:',
    'template_classic' => 'Clásico',
    'template_modern' => 'Moderno',
    'template_rounded' => 'Esquinas Redondeadas',
    'template_dotted' => 'Punteado',
    'preview_button' => 'Vista Previa',
    'generate_button' => 'Generar Código QR',
    'preview_title' => 'Vista Previa del Código QR',
    'history_title' => 'Códigos QR Generados Recientemente',
    'clear_history' => 'Borrar Historial',
    'what_is_qr' => '¿Qué es un Código QR?',
    'qr_description' => 'El Código QR (Código de Respuesta Rápida) es un código de barras bidimensional que puede leerse rápidamente y almacenar grandes cantidades de datos. Puede ser escaneado fácilmente por dispositivos móviles y lectores de códigos QR.',
    'usage_areas' => 'Áreas de Uso',
    'usage_website' => 'URLs de sitios web',
    'usage_contact' => 'Información de contacto',
    'usage_product' => 'Información de productos',
    'usage_event' => 'Información de eventos',
    'usage_wifi' => 'Información de redes Wi-Fi',
    
    // Form validation
    'validate_content' => 'Por favor, ingrese el contenido del código QR.',
    'confirm_clear_history' => '¿Está seguro de que desea eliminar todo el historial de códigos QR?',
    'confirm_delete_qr' => '¿Está seguro de que desea eliminar este código QR?',
    
    // vCard format
    'vcard_name' => 'Nombre Completo:',
    'vcard_phone' => 'Teléfono:',
    'vcard_email' => 'Correo Electrónico:',
    'vcard_org' => 'Empresa:',
    'vcard_name_required' => 'El campo Nombre Completo es obligatorio.',
    
    // WiFi format
    'wifi_ssid' => 'Nombre de Red (SSID):',
    'wifi_password' => 'Contraseña:',
    'wifi_type' => 'Tipo de Seguridad:',
    'wifi_wpa' => 'WPA/WPA2',
    'wifi_wep' => 'WEP',
    'wifi_nopass' => 'Sin Contraseña',
    'wifi_ssid_required' => 'El nombre de la red (SSID) es obligatorio.',
    
    // Email format
    'email_address' => 'Dirección de Correo:',
    'email_subject' => 'Asunto:',
    'email_body' => 'Mensaje:',
    'email_required' => 'La dirección de correo es obligatoria.',
    'email_invalid' => 'Por favor, ingrese una dirección de correo válida.',
    
    // Generate page
    'qr_generated' => 'Código QR Generado',
    'qr_info' => 'Información del Código QR',
    'content_type' => 'Tipo de Contenido',
    'size' => 'Tamaño',
    'pixels' => 'píxeles',
    'download_qr' => 'Descargar Código QR',
    'delete_qr' => 'Eliminar Código QR',
    'new_qr' => 'Generar Nuevo Código QR',
    
    // Error messages
    'error_empty_content' => 'El contenido del código QR no puede estar vacío.',
    'error_dir_create' => 'No se pudo crear el directorio de códigos QR.',
    'error_dir_write' => 'El directorio de códigos QR no tiene permisos de escritura.',
    'error_lib_load' => 'No se pudo cargar la biblioteca de códigos QR.',
    'error_generate' => 'Falló la generación del código QR.',
    'error_file_create' => 'No se pudo crear el archivo del código QR.',
    'error_file_read' => 'No se puede leer el archivo del código QR generado.',
    'error_file_permission' => 'No se pudieron establecer los permisos del archivo del código QR.',
    'error_history_load' => 'Ocurrió un error al cargar el historial de códigos QR.',
    'no_history' => 'Aún no se han generado códigos QR.',
    
    // History actions
    'download' => 'Descargar',
    'delete' => 'Eliminar',
];
?>
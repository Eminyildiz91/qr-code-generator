<?php
// Arabic language file
$lang = [
    // Common
    'title' => 'نظام رمز الاستجابة السريعة',
    'footer' => 'نظام رمز الاستجابة السريعة',
    
    // Index page
    'page_title' => 'نظام إنشاء رمز الاستجابة السريعة',
    'qr_content' => 'محتوى رمز الاستجابة السريعة:',
    'qr_content_placeholder' => 'أدخل نصًا أو رابطًا أو أي بيانات',
    'qr_size' => 'حجم رمز الاستجابة السريعة:',
    'size_small' => 'صغير (150×150)',
    'size_medium' => 'متوسط (200×200)',
    'size_large' => 'كبير (300×300)',
    'error_correction' => 'مستوى تصحيح الخطأ:',
    'correction_low' => 'منخفض (L)',
    'correction_medium' => 'متوسط (M)',
    'correction_high' => 'عالي (Q)',
    'correction_highest' => 'الأعلى (H)',
    'qr_color' => 'لون رمز الاستجابة السريعة:',
    'background_color' => 'لون الخلفية:',
    'qr_format' => 'تنسيق رمز الاستجابة السريعة:',
    'format_text' => 'نص',
    'format_url' => 'رابط',
    'format_vcard' => 'بطاقة عمل (vCard)',
    'format_wifi' => 'شبكة واي فاي',
    'format_email' => 'بريد إلكتروني',
    'qr_template' => 'قالب رمز الاستجابة السريعة:',
    'template_classic' => 'كلاسيكي',
    'template_modern' => 'حديث',
    'template_rounded' => 'زوايا مدورة',
    'template_dotted' => 'منقط',
    'preview_button' => 'معاينة',
    'generate_button' => 'إنشاء رمز الاستجابة السريعة',
    'preview_title' => 'معاينة رمز الاستجابة السريعة',
    'history_title' => 'رموز الاستجابة السريعة المنشأة حديثًا',
    'clear_history' => 'مسح السجل',
    'what_is_qr' => 'ما هو رمز الاستجابة السريعة؟',
    'qr_description' => 'رمز الاستجابة السريعة (QR Code) هو رمز شريطي ثنائي الأبعاد يمكن قراءته بسرعة وتخزين كميات كبيرة من البيانات. يمكن مسحه بسهولة بواسطة الأجهزة المحمولة وقارئات رمز الاستجابة السريعة.',
    'usage_areas' => 'مجالات الاستخدام',
    'usage_website' => 'روابط المواقع الإلكترونية',
    'usage_contact' => 'معلومات الاتصال',
    'usage_product' => 'معلومات المنتج',
    'usage_event' => 'معلومات الفعاليات',
    'usage_wifi' => 'معلومات شبكة الواي فاي',
    
    // Form validation
    'validate_content' => 'الرجاء إدخال محتوى رمز الاستجابة السريعة.',
    'confirm_clear_history' => 'هل أنت متأكد من رغبتك في حذف كل سجل رموز الاستجابة السريعة؟',
    'confirm_delete_qr' => 'هل أنت متأكد من رغبتك في حذف رمز الاستجابة السريعة هذا؟',
    
    // vCard format
    'vcard_name' => 'الاسم الكامل:',
    'vcard_phone' => 'الهاتف:',
    'vcard_email' => 'البريد الإلكتروني:',
    'vcard_org' => 'الشركة:',
    'vcard_name_required' => 'حقل الاسم الكامل مطلوب.',
    
    // WiFi format
    'wifi_ssid' => 'اسم الشبكة (SSID):',
    'wifi_password' => 'كلمة المرور:',
    'wifi_type' => 'نوع الأمان:',
    'wifi_wpa' => 'WPA/WPA2',
    'wifi_wep' => 'WEP',
    'wifi_nopass' => 'بدون كلمة مرور',
    'wifi_ssid_required' => 'اسم الشبكة (SSID) مطلوب.',
    
    // Email format
    'email_address' => 'عنوان البريد الإلكتروني:',
    'email_subject' => 'الموضوع:',
    'email_body' => 'الرسالة:',
    'email_required' => 'عنوان البريد الإلكتروني مطلوب.',
    'email_invalid' => 'الرجاء إدخال عنوان بريد إلكتروني صالح.',
    
    // Generate page
    'qr_generated' => 'تم إنشاء رمز الاستجابة السريعة',
    'qr_info' => 'معلومات رمز الاستجابة السريعة',
    'content_type' => 'نوع المحتوى',
    'size' => 'الحجم',
    'pixels' => 'بكسل',
    'download_qr' => 'تنزيل رمز الاستجابة السريعة',
    'delete_qr' => 'حذف رمز الاستجابة السريعة',
    'new_qr' => 'إنشاء رمز استجابة سريعة جديد',
    
    // Error messages
    'error_empty_content' => 'لا يمكن أن يكون محتوى رمز الاستجابة السريعة فارغًا.',
    'error_dir_create' => 'تعذر إنشاء دليل رمز الاستجابة السريعة.',
    'error_dir_write' => 'دليل رمز الاستجابة السريعة غير قابل للكتابة.',
    'error_lib_load' => 'تعذر تحميل مكتبة رمز الاستجابة السريعة.',
    'error_generate' => 'فشل إنشاء رمز الاستجابة السريعة.',
    'error_file_create' => 'تعذر إنشاء ملف رمز الاستجابة السريعة.',
    'error_file_read' => 'لا يمكن قراءة ملف رمز الاستجابة السريعة المنشأ.',
    'error_file_permission' => 'تعذر تعيين أذونات ملف رمز الاستجابة السريعة.',
    'error_history_load' => 'حدث خطأ أثناء تحميل سجل رمز الاستجابة السريعة.',
    'no_history' => 'لم يتم إنشاء أي رموز استجابة سريعة حتى الآن.',
    
    // History actions
    'download' => 'تنزيل',
    'delete' => 'حذف',
];
?>
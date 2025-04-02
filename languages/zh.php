<?php
// Chinese (Simplified) language file
$lang = [
    // Common
    'title' => 'QR码系统',
    'footer' => 'QR码系统',
    
    // Index page
    'page_title' => 'QR码生成系统',
    'qr_content' => 'QR码内容:',
    'qr_content_placeholder' => '输入文本、网址或任何数据',
    'qr_size' => 'QR码尺寸:',
    'size_small' => '小 (150x150)',
    'size_medium' => '中 (200x200)',
    'size_large' => '大 (300x300)',
    'error_correction' => '错误纠正级别:',
    'correction_low' => '低 (L)',
    'correction_medium' => '中 (M)',
    'correction_high' => '高 (Q)',
    'correction_highest' => '最高 (H)',
    'qr_color' => 'QR码颜色:',
    'background_color' => '背景颜色:',
    'qr_format' => 'QR码格式:',
    'format_text' => '文本',
    'format_url' => '网址',
    'format_vcard' => '名片 (vCard)',
    'format_wifi' => 'Wi-Fi网络',
    'format_email' => '电子邮件',
    'qr_template' => 'QR码模板:',
    'template_classic' => '经典',
    'template_modern' => '现代',
    'template_rounded' => '圆角',
    'template_dotted' => '点状',
    'preview_button' => '预览',
    'generate_button' => '生成QR码',
    'preview_title' => 'QR码预览',
    'history_title' => '最近生成的QR码',
    'clear_history' => '清除历史记录',
    'what_is_qr' => '什么是QR码?',
    'qr_description' => 'QR码（快速响应码）是一种二维条码，可以快速读取并存储大量数据。它可以被移动设备和QR码读取器轻松扫描。',
    'usage_areas' => '使用领域',
    'usage_website' => '网站网址',
    'usage_contact' => '联系信息',
    'usage_product' => '产品信息',
    'usage_event' => '活动信息',
    'usage_wifi' => 'Wi-Fi网络信息',
    
    // Form validation
    'validate_content' => '请输入QR码内容。',
    'confirm_clear_history' => '您确定要删除所有QR码历史记录吗？',
    'confirm_delete_qr' => '您确定要删除此QR码吗？',
    
    // vCard format
    'vcard_name' => '全名:',
    'vcard_phone' => '电话:',
    'vcard_email' => '电子邮件:',
    'vcard_org' => '公司:',
    'vcard_name_required' => '全名字段为必填项。',
    
    // WiFi format
    'wifi_ssid' => '网络名称 (SSID):',
    'wifi_password' => '密码:',
    'wifi_type' => '安全类型:',
    'wifi_wpa' => 'WPA/WPA2',
    'wifi_wep' => 'WEP',
    'wifi_nopass' => '无密码',
    'wifi_ssid_required' => '网络名称 (SSID) 为必填项。',
    
    // Email format
    'email_address' => '电子邮件地址:',
    'email_subject' => '主题:',
    'email_body' => '内容:',
    'email_required' => '电子邮件地址为必填项。',
    'email_invalid' => '请输入有效的电子邮件地址。',
    
    // Generate page
    'qr_generated' => '已生成QR码',
    'qr_info' => 'QR码信息',
    'content_type' => '内容类型',
    'size' => '尺寸',
    'pixels' => '像素',
    'download_qr' => '下载QR码',
    'delete_qr' => '删除QR码',
    'new_qr' => '生成新的QR码',
    
    // Error messages
    'error_empty_content' => 'QR码内容不能为空。',
    'error_dir_create' => '无法创建QR码目录。',
    'error_dir_write' => 'QR码目录不可写。',
    'error_lib_load' => '无法加载QR码库。',
    'error_generate' => 'QR码生成失败。',
    'error_file_create' => '无法创建QR码文件。',
    'error_file_read' => '无法读取生成的QR码文件。',
    'error_file_permission' => '无法设置QR码文件权限。',
    'error_history_load' => '加载QR码历史记录时出错。',
    'no_history' => '尚未生成任何QR码。',
    
    // History actions
    'download' => '下载',
    'delete' => '删除',
];
?>
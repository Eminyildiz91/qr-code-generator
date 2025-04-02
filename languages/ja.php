<?php
// Japanese language file
$lang = [
    // Common
    'title' => 'QRコードシステム',
    'footer' => 'QRコードシステム',
    
    // Index page
    'page_title' => 'QRコード生成システム',
    'qr_content' => 'QRコードの内容:',
    'qr_content_placeholder' => 'テキスト、URLまたは任意のデータを入力',
    'qr_size' => 'QRコードのサイズ:',
    'size_small' => '小 (150x150)',
    'size_medium' => '中 (200x200)',
    'size_large' => '大 (300x300)',
    'error_correction' => 'エラー訂正レベル:',
    'correction_low' => '低 (L)',
    'correction_medium' => '中 (M)',
    'correction_high' => '高 (Q)',
    'correction_highest' => '最高 (H)',
    'qr_color' => 'QRコードの色:',
    'background_color' => '背景色:',
    'qr_format' => 'QRコードの形式:',
    'format_text' => 'テキスト',
    'format_url' => 'URL',
    'format_vcard' => '名刺 (vCard)',
    'format_wifi' => 'Wi-Fiネットワーク',
    'format_email' => 'メール',
    'qr_template' => 'QRコードのテンプレート:',
    'template_classic' => 'クラシック',
    'template_modern' => 'モダン',
    'template_rounded' => '角丸',
    'template_dotted' => 'ドット',
    'preview_button' => 'プレビュー',
    'generate_button' => 'QRコードを生成',
    'preview_title' => 'QRコードのプレビュー',
    'history_title' => '最近生成したQRコード',
    'clear_history' => '履歴を消去',
    'what_is_qr' => 'QRコードとは？',
    'qr_description' => 'QRコード（Quick Response Code）は、素早く読み取れる二次元バーコードで、大量のデータを保存できます。モバイルデバイスやQRコードリーダーで簡単にスキャンできます。',
    'usage_areas' => '使用領域',
    'usage_website' => 'ウェブサイトURL',
    'usage_contact' => '連絡先情報',
    'usage_product' => '製品情報',
    'usage_event' => 'イベント情報',
    'usage_wifi' => 'Wi-Fiネットワーク情報',
    
    // Form validation
    'validate_content' => 'QRコードの内容を入力してください。',
    'confirm_clear_history' => 'すべてのQRコード履歴を削除してもよろしいですか？',
    'confirm_delete_qr' => 'このQRコードを削除してもよろしいですか？',
    
    // vCard format
    'vcard_name' => '氏名:',
    'vcard_phone' => '電話番号:',
    'vcard_email' => 'メール:',
    'vcard_org' => '会社:',
    'vcard_name_required' => '氏名フィールドは必須です。',
    
    // WiFi format
    'wifi_ssid' => 'ネットワーク名 (SSID):',
    'wifi_password' => 'パスワード:',
    'wifi_type' => 'セキュリティタイプ:',
    'wifi_wpa' => 'WPA/WPA2',
    'wifi_wep' => 'WEP',
    'wifi_nopass' => 'パスワードなし',
    'wifi_ssid_required' => 'ネットワーク名 (SSID) は必須です。',
    
    // Email format
    'email_address' => 'メールアドレス:',
    'email_subject' => '件名:',
    'email_body' => '本文:',
    'email_required' => 'メールアドレスは必須です。',
    'email_invalid' => '有効なメールアドレスを入力してください。',
    
    // Generate page
    'qr_generated' => 'QRコードが生成されました',
    'qr_info' => 'QRコード情報',
    'content_type' => 'コンテンツタイプ',
    'size' => 'サイズ',
    'pixels' => 'ピクセル',
    'download_qr' => 'QRコードをダウンロード',
    'delete_qr' => 'QRコードを削除',
    'new_qr' => '新しいQRコードを生成',
    
    // Error messages
    'error_empty_content' => 'QRコードの内容は空にできません。',
    'error_dir_create' => 'QRコードディレクトリを作成できませんでした。',
    'error_dir_write' => 'QRコードディレクトリに書き込みできません。',
    'error_lib_load' => 'QRコードライブラリを読み込めませんでした。',
    'error_generate' => 'QRコードの生成に失敗しました。',
    'error_file_create' => 'QRコードファイルを作成できませんでした。',
    'error_file_read' => '生成されたQRコードファイルを読み取れません。',
    'error_file_permission' => 'QRコードファイルの権限を設定できませんでした。',
    'error_history_load' => 'QRコード履歴の読み込み中にエラーが発生しました。',
    'no_history' => 'まだQRコードが生成されていません。',
    
    // History actions
    'download' => 'ダウンロード',
    'delete' => '削除',
];
?>
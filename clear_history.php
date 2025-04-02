<?php
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

$qrcodesDir = 'qrcodes/';

// Check if directory exists
if (!is_dir($qrcodesDir)) {
    $response['message'] = 'qrcodes dizini bulunamadı.';
    echo json_encode($response);
    exit;
}

// Check if directory is writable
if (!is_writable($qrcodesDir)) {
    $response['message'] = 'qrcodes dizini yazılabilir değil.';
    echo json_encode($response);
    exit;
}

try {
    // Get all PNG files from the directory
    $files = glob($qrcodesDir . '*.png');
    
    if (empty($files)) {
        $response['message'] = 'Silinecek QR kodu bulunamadı.';
        echo json_encode($response);
        exit;
    }
    
    // Delete each file
    $deletedCount = 0;
    foreach ($files as $file) {
        if (file_exists($file) && is_writable($file)) {
            unlink($file);
            $deletedCount++;
        }
    }
    
    $response['success'] = true;
    $response['message'] = "Tüm QR kodları başarıyla silindi. ($deletedCount dosya silindi)";
    
} catch (Exception $e) {
    $response['message'] = 'Geçmiş silinirken bir hata oluştu: ' . $e->getMessage();
}

echo json_encode($response);
<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Directory containing QR codes
$qrcodesDir = 'qrcodes/';

// Get all PNG files from the directory
$files = glob($qrcodesDir . '*.png');

// Initialize the history array
$history = [];

// Process each file
foreach ($files as $file) {
    // Get file information
    $fileInfo = pathinfo($file);
    $fileName = $fileInfo['filename'];
    
    // Check if file exists and is readable
    if (file_exists($file) && is_readable($file)) {
        $fileMTime = filemtime($file);
        
        // Create history item
        $historyItem = [
            'id' => $fileName,
            'image' => $file,
            'type' => 'QR Kod',
            'date' => date('d.m.Y H:i', $fileMTime)
        ];
        
        $history[] = $historyItem;
    }
}

// Sort by date (newest first)
usort($history, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Limit to last 12 items
$history = array_slice($history, 0, 12);

// Output JSON
echo json_encode($history);
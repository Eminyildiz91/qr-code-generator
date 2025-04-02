<?php
// Check if file parameter is provided
if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    $filepath = 'qrcodes/' . $filename;
    
    // Verify the file is within qrcodes directory and exists
    if (strpos($filename, '..') === false && 
        file_exists($filepath) && 
        pathinfo($filepath, PATHINFO_EXTENSION) === 'png' && 
        strpos($filepath, 'qrcodes/') === 0) {
        
        // Attempt to delete the file
        if (unlink($filepath)) {
            header('Location: index.php?message=success');
            exit;
        } else {
            header('Location: index.php?message=error');
            exit;
        }
    }
}

// If something went wrong, redirect to index
header('Location: index.php?message=error');
exit;
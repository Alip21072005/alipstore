<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = ltrim($path, '/');
if ($path === '' || $path === '/') {
    $path = 'index.php';
}

// Mencegah directory traversal
if (strpos($path, '..') !== false) {
    http_response_code(403);
    die('Forbidden');
}

$file = realpath(__DIR__ . '/../' . $path);

if ($file && file_exists($file) && is_file($file)) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext === 'php') {
        // Mengubah working directory ke direktori file agar relative include/require tetap berfungsi
        chdir(dirname($file));
        require basename($file);
    } else {
        // Serve file statis (css, js, gambar)
        $mime = mime_content_type($file);
        if ($mime) {
            header("Content-Type: $mime");
        }
        readfile($file);
    }
} else {
    // Coba tebak apakah ini folder dan butuh index.php
    $dir = realpath(__DIR__ . '/../' . rtrim($path, '/'));
    if ($dir && is_dir($dir)) {
        $index_file = $dir . '/index.php';
        if (file_exists($index_file)) {
            chdir($dir);
            require 'index.php';
            exit;
        }
    }
    
    http_response_code(404);
    echo "404 Not Found";
}

<?php
$out_dir = __DIR__ . '/public';
if (!is_dir($out_dir)) mkdir($out_dir, 0777, true);

echo "Starting local PHP server for static generation...\n";
$descriptorspec = [
   0 => ["pipe", "r"],  
   1 => ["file", "NUL", "a"],  
   2 => ["file", "NUL", "a"]   
];
$process = proc_open("php -S 127.0.0.1:8888 -d auto_prepend_file=" . escapeshellarg(__DIR__ . '/dummy_data.php'), $descriptorspec, $pipes, __DIR__);
sleep(3); // Beri waktu server untuk hidup

$pages = ['/index.php'];
$folders = array_diff(scandir(__DIR__), ['.', '..', 'api', 'public', '.git', '.github', 'brain']);

$copy_dir = function($src, $dst) use (&$copy_dir) {
    if (!is_dir($dst)) mkdir($dst, 0777, true);
    foreach (scandir($src) as $file) {
        if ($file != '.' && $file != '..') {
            if (is_dir($src . '/' . $file)) $copy_dir($src . '/' . $file, $dst . '/' . $file);
            else copy($src . '/' . $file, $dst . '/' . $file);
        }
    }
};

foreach ($folders as $folder) {
    if (is_dir(__DIR__ . '/' . $folder)) {
        $src_img = __DIR__ . '/' . $folder . '/image';
        if (is_dir($src_img)) $copy_dir($src_img, $out_dir . '/' . $folder . '/image');
        
        $src_bs = __DIR__ . '/' . $folder . '/bootstrap';
        if (is_dir($src_bs)) $copy_dir($src_bs, $out_dir . '/' . $folder . '/bootstrap');
        
        $src_css = __DIR__ . '/' . $folder . '/css';
        if (is_dir($src_css)) $copy_dir($src_css, $out_dir . '/' . $folder . '/css');

        $pages[] = "/$folder/index.php";
        if (file_exists(__DIR__ . "/$folder/produktoko.php")) {
            $pages[] = "/$folder/produktoko.php";
        }
    }
}

echo "Generating " . count($pages) . " static pages...\n";

foreach ($pages as $page) {
    $url = "http://127.0.0.1:8888$page";
    $content = @file_get_contents($url);
    if ($content !== false) {
        // Ubah semua link .php menjadi .html agar Vercel static hosting berjalan lancar
        $content = str_replace('.php', '.html', $content);
        
        $save_path = $out_dir . str_replace('.php', '.html', $page);
        $dir = dirname($save_path);
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        file_put_contents($save_path, $content);
        echo "Built: $page -> .html\n";
    } else {
        echo "Failed to fetch: $page\n";
    }
}

// Copy dummy_image
if(file_exists(__DIR__ . '/dummy_image.jpg')) {
    copy(__DIR__ . '/dummy_image.jpg', $out_dir . '/dummy_image.jpg');
}

echo "Static build complete! Killing server...\n";
proc_terminate($process);
?>

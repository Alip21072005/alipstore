<?php
// ============================================================
// build.php - Static Site Generator
// Menjalankan PHP server lokal, lalu "memotret" setiap halaman
// menjadi file .html yang siap deploy ke Vercel (static hosting)
// ============================================================

$out_dir = __DIR__ . '/public';
if (!is_dir($out_dir)) mkdir($out_dir, 0777, true);

// ---- 1. Tidak perlu download gambar dummy ----
// Gunakan gambar yang sudah ada di folder lokal

// ---- 2. Helper: salin folder rekursif ----
$copy_dir = function ($src, $dst) use (&$copy_dir) {
    if (!is_dir($dst)) mkdir($dst, 0777, true);
    foreach (scandir($src) as $file) {
        if ($file !== '.' && $file !== '..') {
            $srcPath = $src . '/' . $file;
            $dstPath = $dst . '/' . $file;
            if (is_dir($srcPath)) $copy_dir($srcPath, $dstPath);
            else copy($srcPath, $dstPath);
        }
    }
};

// ---- 3. Jalankan PHP server lokal ----
echo "Starting local PHP server...\n";
$descriptorspec = [
    0 => ["pipe", "r"],
    1 => ["file", "NUL", "a"],
    2 => ["file", "NUL", "a"]
];
$process = proc_open(
    "php -S 127.0.0.1:8888 -d auto_prepend_file=" . escapeshellarg(__DIR__ . '/dummy_data.php'),
    $descriptorspec,
    $pipes,
    __DIR__
);
sleep(3);

// ---- 4. Scan folder mahasiswa ----
$pages   = ['/index.php'];
$skip    = ['.', '..', 'api', 'public', '.git', '.github', 'brain', '.vercel'];
$folders = array_filter(
    array_diff(scandir(__DIR__), $skip),
    fn($f) => is_dir(__DIR__ . '/' . $f)
);

echo "Preparing assets for " . count($folders) . " student folders...\n";

foreach ($folders as $folder) {
    $folder_pub = $out_dir . '/' . $folder;

    // a) Salin CSS/Bootstrap/assets lain
    foreach (['bootstrap', 'css', 'js', 'fonts', 'assets'] as $asset_dir) {
        $src = __DIR__ . '/' . $folder . '/' . $asset_dir;
        if (is_dir($src)) $copy_dir($src, $folder_pub . '/' . $asset_dir);
    }

    // b) Salin gambar asli dari folder image/ (jika ada)
    $img_src = __DIR__ . '/' . $folder . '/image';
    $img_dst = $folder_pub . '/image';
    if (is_dir($img_src)) {
        $copy_dir($img_src, $img_dst);
        echo "  Copied images from $folder/image/\n";
    } else {
        // Use alipmaulana images as fallback for folders without images
        if (!is_dir($img_dst)) mkdir($img_dst, 0777, true);
        $fallback_src = __DIR__ . '/alipmaulana/image';
        if (is_dir($fallback_src)) {
            $copy_dir($fallback_src, $img_dst);
            echo "  Copied fallback images to $folder/image/\n";
        } else {
            echo "  Created empty image folder for $folder\n";
        }
    }

    // d) Tambahkan halaman ke daftar build
    $pages[] = "/$folder/index.php";
    if (file_exists(__DIR__ . "/$folder/produktoko.php")) {
        $pages[] = "/$folder/produktoko.php";
    }
}

// ---- 5. Generate HTML untuk setiap halaman ----
echo "\nGenerating " . count($pages) . " pages...\n";

foreach ($pages as $page) {
    $url     = "http://127.0.0.1:8888$page";
    $content = @file_get_contents($url);
    if ($content === false) {
        echo "FAILED: $page\n";
        continue;
    }

    // Fix 1: ubah semua link .php → .html
    $content = str_replace('.php', '.html', $content);

    // Fix 2: perbaiki path relatif CSS/JS yang pakai "../" di halaman setingkat satu
    // (artinya mereka malah perlu mengacu ke folder yang sama, bukan naik level)
    // "../bootstrap/" → "./bootstrap/", "../css/" → "./css/"
    foreach (['bootstrap', 'css', 'js', 'fonts', 'assets', 'image', 'images'] as $asset_dir) {
        $content = str_replace('"../' . $asset_dir . '/', '"' . $asset_dir . '/', $content);
        $content = str_replace("'../" . $asset_dir . "/", "'" . $asset_dir . "/", $content);
    }

    // Fix 3: perbaiki path image untuk subdirectory di Vercel
    // "./image/" → "/[folder]/image/" untuk subdirectory pages
    // "image/" → "/[folder]/image/" untuk semua gambar links
    $current_folder = '';
    if (strpos($page, '/') === 0 && strpos($page, '/', 1) !== false) {
        $parts = explode('/', trim($page, '/'));
        $current_folder = $parts[0] ?? '';
    }
    if ($current_folder) {
        // Fix relative paths
        $content = str_replace('"./image/', '"' . "/$current_folder/image/", $content);
        $content = str_replace("'./image/", "'" . "/$current_folder/image/", $content);
        // Fix absolute paths without folder
        $content = str_replace('"image/', '"' . "/$current_folder/image/", $content);
        $content = str_replace("'image/", "'" . "/$current_folder/image/", $content);
    }

    // Fix 3: Perbaiki "image/https://..." → "https://..."  (bila ada sisa URL penuh)
    $content = preg_replace('#(src|href)="[^"]*?(https?://[^"]+)"#', '$1="$2"', $content);

    $save_path = $out_dir . str_replace('.php', '.html', $page);
    $dir       = dirname($save_path);
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    file_put_contents($save_path, $content);
    echo "Built: $page\n";
}

// Salin dummy_image.jpg fallback ke root public/
if (file_exists(__DIR__ . '/dummy_image.jpg')) {
    copy(__DIR__ . '/dummy_image.jpg', $out_dir . '/dummy_image.jpg');
}

echo "\nStatic build complete!\n";
proc_terminate($process);

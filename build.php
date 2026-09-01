<?php
// ============================================================
// build.php - Static Site Generator
// Menjalankan PHP server lokal, lalu "memotret" setiap halaman
// menjadi file .html yang siap deploy ke Vercel (static hosting)
// ============================================================

$out_dir = __DIR__ . '/public';
if (!is_dir($out_dir)) mkdir($out_dir, 0777, true);

// ---- 1. Daftar gambar dummy (didownload sekali, dipakai semua folder) ----
// Gambar-gambar ini akan disimpan ke public/<folder>/image/produk<N>.jpg
$dummy_images = [
    'produk1.jpg' => 'https://picsum.photos/seed/food1/640/480',
    'produk2.jpg' => 'https://picsum.photos/seed/drink1/640/480',
    'produk3.jpg' => 'https://picsum.photos/seed/food2/640/480',
    'produk4.jpg' => 'https://picsum.photos/seed/coffee/640/480',
    'produk5.jpg' => 'https://picsum.photos/seed/food3/640/480',
    'produk6.jpg' => 'https://picsum.photos/seed/juice/640/480',
    'produk7.jpg' => 'https://picsum.photos/seed/dessert/640/480',
    'produk8.jpg' => 'https://picsum.photos/seed/fashion/640/480',
];

// ---- 2. Helper: salin folder rekursif ----
$copy_dir = function($src, $dst) use (&$copy_dir) {
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
    $descriptorspec, $pipes, __DIR__
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
    } else {
        if (!is_dir($img_dst)) mkdir($img_dst, 0777, true);
    }

    // c) Download gambar dummy ke folder image/ (hanya jika belum ada)
    foreach ($dummy_images as $fname => $url) {
        $dest_file = $img_dst . '/' . $fname;
        if (!file_exists($dest_file)) {
            $img_data = @file_get_contents($url);
            if ($img_data) {
                file_put_contents($dest_file, $img_data);
                echo "  Downloaded $fname for $folder\n";
            }
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
?>

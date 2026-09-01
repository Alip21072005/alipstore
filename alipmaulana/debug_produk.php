<?php
include "koneksi.php";

echo "<h2>Data Produk di Database:</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Nama Produk</th><th>Gamar di Database</th><th>Status</th></tr>";

$produk = dummy_query($conn, "SELECT * FROM produk ORDER BY idproduk DESC");
if (dummy_num_rows($produk) > 0) {
    while ($p = dummy_fetch_array($produk)) {
        echo "<tr>";
        echo "<td>" . $p['idproduk'] . "</td>";
        echo "<td>" . $p['namaproduk'] . "</td>";
        echo "<td>" . $p['gambar'] . "</td>";
        echo "<td>" . $p['status'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data produk</td></tr>";
}
echo "</table>";

echo "<h2>File yang ada di folder image/:</h2>";
$image_dir = './image/';
if (is_dir($image_dir)) {
    $files = scandir($image_dir);
    echo "<ul>";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "<li>$file</li>";
        }
    }
    echo "</ul>";
} else {
    echo "Folder image/ tidak ditemukan";
}
?>

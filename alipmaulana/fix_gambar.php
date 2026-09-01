<?php
include "koneksi.php";

// Update nama gambar di database agar sesuai dengan file yang ada
// Asumsi: update produk pertama dengan produk1766018748.jpg dan kedua dengan produk1766018779.jpg

$query1 = "UPDATE produk SET gambar = 'produk1766018748.jpg' WHERE idproduk = 5";
$query2 = "UPDATE produk SET gambar = 'produk1766018779.jpg' WHERE idproduk = 6";

if (dummy_query($conn, $query1) && dummy_query($conn, $query2)) {
    echo "Database berhasil diperbarui! <a href='index.php'>Kembali ke halaman utama</a>";
} else {
    echo "Gagal memperbarui database: " . dummy_error($conn);
}
?>

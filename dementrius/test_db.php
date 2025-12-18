<?php
$host     = "202.10.34.87";
$user     = "alip";
$pass    = "Alip210725_";
$dbname    = "dementrius";
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("❌ Koneksi Gagal: " . mysqli_connect_error());
}
echo "✅ Koneksi Berhasil! Database sudah terhubung.";
?>
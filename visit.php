<?php
include "koneksi.php";

if (isset($_GET['toko'])) {
    $toko = dummy_real_escape_string($conn, $_GET['toko']);
    
    // 1. Tambah hitungan di database
    dummy_query($conn, "UPDATE statistik_toko SET jumlah_kunjungan = jumlah_kunjungan + 1 WHERE nama_toko = '$toko'");
    
    // 2. Arahkan ke sub-folder toko tersebut
    header("Location: /$toko/"); 
    exit();
}
?>
<?php
include "koneksi.php";
session_start();

// Proteksi halaman agar hanya admin yang bisa menghapus
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}

// Proses Hapus Kategori
if (isset($_GET['idk'])) {
    $idk = mysqli_real_escape_string($conn, $_GET['idk']);
    $delete = mysqli_query($conn, "DELETE FROM kategori WHERE idkategori = '$idk'");
    
    if ($delete) {
        echo '<script>alert("Kategori Berhasil Dihapus");</script>';
        echo '<script>window.location="kategori.php"</script>';
    } else {
        echo '<script>alert("Gagal menghapus kategori: ' . mysqli_error($conn) . '");</script>';
        echo '<script>window.location="kategori.php"</script>';
    }
}

// Proses Hapus Produk
if (isset($_GET['idp'])) {
    $idp = mysqli_real_escape_string($conn, $_GET['idp']);
    
    // 1. Ambil nama file gambar terlebih dahulu
    $produk = mysqli_query($conn, "SELECT gambar FROM produk WHERE idproduk = '$idp'");
    
    if (mysqli_num_rows($produk) > 0) {
        $p = mysqli_fetch_object($produk);

        // 2. Hapus file fisik dari folder image jika ada
        if (file_exists('./image/' . $p->gambar)) {
            unlink('./image/' . $p->gambar);
        }

        // 3. Hapus data dari database
        $delete = mysqli_query($conn, "DELETE FROM produk WHERE idproduk = '$idp'");
        
        if ($delete) {
            echo '<script>alert("Produk Berhasil Dihapus");</script>';
            echo '<script>window.location="produk.php"</script>';
        } else {
            echo 'Gagal: ' . mysqli_error($conn);
        }
    } else {
        echo '<script>window.location="produk.php"</script>';
    }
}
?>
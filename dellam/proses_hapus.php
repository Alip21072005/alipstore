<?php
include "koneksi.php";
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if (isset($_GET['idk'])) {
    $delete = mysqli_query($conn, "DELETE FROM kategori WHERE idkategori = '" . $_GET['idk'] . "' ");
    echo '<script>window.location="kategori.php" </script>';
}

if (isset($_GET['idp'])) {
    $produk = mysqli_query($conn, "SELECT gambar FROM produk WHERE idproduk = '" . $_GET['idp'] . "' ");
    $p = mysqli_fetch_object($produk);

    unlink('./image/' . $p->produk);

    $delete = mysqli_query($conn, "DELETE FROM produk WHERE idproduk = '" . $_GET['idp'] . "' ");
    echo '<script>window.location="produk.php" </script>';
}

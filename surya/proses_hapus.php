<?php
session_start();
include "koneksi.php";

/* Cek login */
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: login.php");
    exit;
}

/* =====================
   HAPUS KATEGORI
   ===================== */
if (isset($_GET['idk'])) {

    $idk = mysqli_real_escape_string($conn, $_GET['idk']);

    mysqli_query(
        $conn,
        "DELETE FROM kategori WHERE idkategori = '$idk'"
    );

    header("Location: kategori.php");
    exit;
}

/* =====================
   HAPUS PRODUK
   ===================== */
if (isset($_GET['idp'])) {

    $idp = mysqli_real_escape_string($conn, $_GET['idp']);

    /* Ambil nama gambar */
    $produk = mysqli_query(
        $conn,
        "SELECT gambar FROM produk WHERE idproduk = '$idp'"
    );

    if (mysqli_num_rows($produk) > 0) {
        $p = mysqli_fetch_object($produk);

        /* Hapus file gambar jika ada */
        if (!empty($p->gambar) && file_exists("./image/" . $p->gambar)) {
            unlink("./image/" . $p->gambar);
        }

        /* Hapus data produk */
        mysqli_query(
            $conn,
            "DELETE FROM produk WHERE idproduk = '$idp'"
        );
    }

    header("Location: produk.php");
    exit;
}

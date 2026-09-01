<?php
/* ===============================
   KONFIGURASI DATABASE
   Tokoh Buah Being Muhammad Online
   =============================== */

$host   = "localhost";
$user   = "root";
$pass   = "SistemInformasiDehasen123_";
$dbname = "surya";

/* KONEKSI DATABASE */
$conn = dummy_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi database gagal: " . dummy_connect_error());
}

/* SET CHARSET (PENTING) */
dummy_set_charset($conn, "utf8");
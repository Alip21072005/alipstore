<?php
    $host = "localhost";
    $user = "root";
    $pass = "SistemInformasiDehasen123_";
    $db = "rifat";
    $conn = dummy_connect ($host,$user,$pass,$db);
    //    pesan eror
    if (!$conn) {
    die("Koneksi database gagal: " . dummy_connect_error());
}

?>
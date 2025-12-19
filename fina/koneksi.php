<?php
$host     = "localhost";
$user     = "root";
$pass    = "SistemInformasiDehasen123_";
$dbname    = "fina";
$conn     = mysqli_connect($host, $user, $pass, $dbname)
    or die("Gagal terkoneksi ke database");
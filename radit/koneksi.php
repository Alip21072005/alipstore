<?php
$host     = "localhost";
$user     = "root";
$pass    = "";
$dbname    = "radit";
$conn     = mysqli_connect($host, $user, $pass, $dbname)
    or die("Gagal terkoneksi ke database");
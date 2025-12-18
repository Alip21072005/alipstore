<?php
$host     = "localhost";
$user     = "root";
$pass    = "";
$dbname    = "sopiamarini";
$conn     = mysqli_connect($host, $user, $pass, $dbname)
    or die("Gagal terkoneksi ke database");
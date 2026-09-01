<?php
$host     = getenv("DB_HOST") ?: "localhost";
$user     = getenv("DB_USER") ?: "root";
$pass     = getenv("DB_PASS") ?: "SistemInformasiDehasen123_";
$dbname   = getenv("DB_NAME") ?: "dbtokosi";
$conn     = dummy_connect($host, $user, $pass, $dbname)
    or die("Gagal terkoneksi ke database");
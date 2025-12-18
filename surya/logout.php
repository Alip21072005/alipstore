<?php
session_start();

/* Hapus semua session */
$_SESSION = [];
session_destroy();

/* Redirect aman */
header("Location: login.php");
exit;

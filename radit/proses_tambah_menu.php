<?php
include "koneksi.php";

$kategori = $_POST['kategori'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "image/".$foto);

mysqli_query($conn,"INSERT INTO menu VALUES(
    null,
    '$kategori',
    '$nama',
    '$harga',
    '$foto'
)");

echo "<script>alert('Menu berhasil ditambahkan');location='menu.php'</script>";

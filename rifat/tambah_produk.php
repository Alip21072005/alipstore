<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Online</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>

<body>

<!-- NAVBAR -->
<header>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Kedai Kito</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="./">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategori.php">Data Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Log-Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- CONTENT -->
<div class="section">
    <div class="container">
        <h3>Tambah Produk</h3>
        <div class="card mb-5">
            <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- Kategori -->
                    <select class="form-select mb-3" name="idkategori" required>
                        <option value="">-- Pilih Kategori Produk --</option>
                        <?php
                        $kategori = dummy_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                        while ($r = dummy_fetch_array($kategori)) {
                        ?>
                            <option value="<?= $r['idkategori'] ?>"><?= $r['namakategori'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="namaproduk" class="form-control mb-3" placeholder="Nama Produk" required>
                    <input type="number" name="harga" class="form-control mb-3" placeholder="Harga Produk" required>
                    <input type="file" name="gambar" class="form-control mb-3" required>

                    <textarea name="deskripsi" placeholder="Deskripsi Produk"></textarea>
                    <script>CKEDITOR.replace('deskripsi');</script>

                    <select class="form-select mt-3" name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">

                </form>

                <!-- PROSES INPUT -->
                <?php
                if (isset($_POST['submit'])) {

                    $idkategori = $_POST['idkategori'];
                    $namaproduk = $_POST['namaproduk'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];

                    // File upload
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $allowed = array('jpg','jpeg','png','gif');

                    if (!in_array($ext, $allowed)) {
                        echo "<script>alert('Format file tidak diizinkan');</script>";
                    } else {

                        $newname = 'produk_'.time().'.'.$ext;

                        move_uploaded_file($tmp_name, "image/".$newname);

                        // QUERY AMAN (PASTI COCOK SAMA TABEL)
                        $sql = "INSERT INTO produk (namaproduk, harga, gambar, deskripsi, status, idkategori)
                                VALUES ('$namaproduk', '$harga', '$newname', '$deskripsi', '$status', '$idkategori')";

                        $insert = dummy_query($conn, $sql);

                        if ($insert) {
                            echo "<script>alert('Produk berhasil ditambahkan');</script>";
                            echo "<script>window.location='produk.php';</script>";
                        } else {
                            echo "Gagal: " . dummy_error($conn);
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <footer>
        <div class="mt-5 bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - Kedai Kito Online</small>
        </div>
    </footer>
</div>

</body>
</html>
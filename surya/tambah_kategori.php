<?php
session_start();
include "koneksi.php";

/* Cek login */
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori | Tokoh Buah Being Muhammad Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-light">

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">
            Tokoh Buah Being Muhammad Online
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="kategori.php">Data Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php">Data Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== CONTENT ===== -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Tambah Kategori Produk</h5>
                </div>

                <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Kategori</label>
                            <input type="text" name="kategori" class="form-control" placeholder="Contoh: Buah Segar" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="kategori.php" class="btn btn-secondary">
                                ← Kembali
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary">
                                Simpan Kategori
                            </button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {

                        $nama = ucwords(mysqli_real_escape_string($conn, $_POST['kategori']));

                        if ($nama != "") {
                            $insert = mysqli_query(
                                $conn,
                                "INSERT INTO kategori (namakategori) VALUES ('$nama')"
                            );

                            if ($insert) {
                                echo '<div class="alert alert-success mt-3 text-center">
                                        Kategori berhasil ditambahkan
                                      </div>';
                                echo '<script>setTimeout(()=>{window.location="kategori.php"},1500);</script>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">
                                        Gagal menyimpan data
                                      </div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="mt-5">
    <div class="bg-primary text-light text-center py-3">
        <small>
            &copy; 2025 — Tokoh Buah Being Muhammad Online
        </small>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include "koneksi.php";

$jml_produk   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk"));
$jml_kategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | Kedai Kito</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard_admin.php">Kedai Kito</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav_link" href="keluar.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-5">
    <h3 class="mb-4">Dashboard Administrator</h3>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Produk</h6>
                    <h2 class="fw-bold text-primary"><?php echo $jml_produk; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Total Kategori</h6>
                    <h2 class="fw-bold text-success"><?php echo $jml_kategori; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Status</h6>
                    <h5 class="fw-bold text-dark">Admin Aktif</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Selamat Datang</h5>
            <p>
                Anda berada di halaman Dashboard Administrator Kedai Kito.
                Melalui halaman ini, Anda dapat mengelola data kategori, Data produk,
                serta memantau aktivitas toko online secara keseluruhan.
            </p>
        </div>
    </div>
</div>

<footer class="bg-primary text-white text-center py-3">
    <small>&copy; 2025 Kedai Kito Online</small>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
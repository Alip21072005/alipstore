<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<!-- ===== HEADER ===== -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Kedai Kito</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="./">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Selamat Datang di Kedai Kito</h1>
        <p class="text-muted">kedai sepatu favoritmu</p>
    </div>
</section>

<!-- ===== PRODUK ===== -->
<section class="py-5">
    <div class="container">
        <h3 class="text-center mb-4 fw-bold">Produk Unggulan</h3>
        <div class="row g-4">

            <!-- Produk 1 -->
            <div class="col-md-4">
                <div class="card shadow h-100">
                    <img src="image/produk1765296616.jpg" class="card-img-top" alt="Kopi Hitam">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Sepatu Nike</h5>
                        <p class="card-text">Tampil Keren Tanpa Mengorbankan Kenyamanan.</p>
                        <p class="fw-bold text-primary">3299000</p>
                        <a href="https://wa.me/085839745049?text=Halo%20saya%20ingin%20order%20Kopi%20Hitam"
                           class="btn btn-success w-100">
                           Order via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
<div class="col-md-4">
                <div class="card shadow h-100">
                    <img src="image/produk1765296745.jpg" class="card-img-top" alt="Kopi Hitam">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Sepatu Puma</h5>
                        <p class="card-text">Tampil Keren Tanpa Mengorbankan Kenyamanan.</p>
                        <p class="fw-bold text-primary">3299000</p>
                        <a href="https://wa.me/085839745049?text=Halo%20saya%20ingin%20order%20Kopi%20Hitam"
                           class="btn btn-success w-100">
                           Order via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            <!-- Produk 2 -->
            <div class="col-md-4">
                <div class="card shadow h-100">
                    <img src="image/produk1765296702.jpg" class="card-img-top" alt="Kopi Susu">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Snew balence 530</h5>
                        <p class="card-text">Perpaduan Teknologi dan Gaya Modern.</p>
                        <p class="fw-bold text-primary">Rp 2999000</p>
                        <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20Kopi%20Susu"
                           class="btn btn-success w-100">
                           Order via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
                        <div class="col-md-4">
                <div class="card shadow h-100">
                    <img src="image/produk1765296833.jpg" class="card-img-top" alt="Kopi Susu">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">sepatu adidas</h5>
                        <p class="card-text">Nyaman Dipakai, Keren Dilihat.</p>
                        <p class="fw-bold text-primary">Rp 2999000</p>
                        <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20Kopi%20Susu"
                           class="btn btn-success w-100">
                           Order via WhatsApp
                        </a>
                    </div>
                </div>

            <!-- Produk 3 -->
            <div class="col-md-4">
                <div class="card shadow h-100">
                    <img src="image/produk1765296745.jpg" class="card-img-top" alt="Roti Bakar">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Sepatu Puma</h5>
                        <p class="card-text">Desain Klasik dengan Sentuhan Modern.</p>
                        <p class="fw-bold text-primary">Rp 1299000</p>
                        <a href="https://wa.me/6281234567890?text=Halo%20saya%20ingin%20order%20Roti%20Bakar"
                           class="btn btn-success w-100">
                           Order via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="bg-primary text-light text-center py-3">
    <small>Copyright &copy; 2025 - Kedai Kito Online</small>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();

/* Jika admin sudah login, langsung ke dashboard */
if (isset($_SESSION['status_login']) && $_SESSION['status_login'] === true) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tokoh Buah Being Muhammad Online</title>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
}
.hero {
    background: linear-gradient(135deg, #0d6efd, #198754);
    color: #fff;
    padding: 80px 20px;
}
.hero h1 {
    font-weight: 800;
}
.card {
    border-radius: 1rem;
    transition: .3s;
}
.card:hover {
    transform: translateY(-5px);
}
footer {
    background: #0d6efd;
    color: #fff;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            🍉 Tokoh Buah Being Muhammad Online
        </a>
        <div class="ms-auto">
            <a href="login.php" class="btn btn-light btn-sm">
                <i class="bi bi-box-arrow-in-right"></i> Login Admin
            </a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero text-center">
    <div class="container">
        <h1 class="mb-3">Buah Segar Berkualitas</h1>
        <p class="lead mb-4">
            Menyediakan buah pilihan segar langsung dari petani terpercaya
        </p>
        <a href="produk.php" class="btn btn-warning btn-lg shadow">
            <i class="bi bi-basket"></i> Lihat Produk
        </a>
    </div>
</section>

<!-- PRODUK PREVIEW -->
<section class="container my-5">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Produk Unggulan</h3>
        <p class="text-muted">Pilihan buah segar favorit pelanggan</p>
    </div>

    <div class="row g-4 justify-content-center">

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="image/Buah Manggis.jpg" class="card-img-top" alt="Manggis">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Buah Manggis</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="image/Buah Dragon.jpg" class="card-img-top" alt="Buah Naga">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Buah Naga</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="image/Buah Mangga.jpg" class="card-img-top" alt="Mangga">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Buah Mangga</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <img src="image/Buah Jambu Biji.jpg" class="card-img-top" alt="Jambu Biji">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Jambu Biji</h6>
                </div>
            </div>
        </div>

    </div>

    <div class="text-center mt-5">
        <a href="produk.php" class="btn btn-primary btn-lg">
            <i class="bi bi-box-seam"></i> Lihat Semua Produk
        </a>
    </div>
</section>

<!-- FOOTER -->
<footer class="py-4 text-center">
    <small>
        &copy; 2025 — <b>Tokoh Buah Being Muhammad Online</b><br>
        Segar • Sehat • Terpercaya
    </small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

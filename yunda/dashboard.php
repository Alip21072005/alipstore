<?php
    session_start();
    include "koneksi.php";

    // Proteksi halaman agar hanya yang sudah login bisa masuk
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | Yunda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    /* Admin Dashboard Style - Yunda (Pink & White) */
    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #fffafb;
    }

    .navbar {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%) !important;
        padding: 1rem 0;
        border-bottom: 4px solid #ffb3c1;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #ffffff !important;
    }

    .content-wrapper {
        flex: 1 0 auto;
        padding: 50px 0;
    }

    /* Welcome Card Styling - New Pink Gradient */
    .welcome-card {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        color: white;
        border: none;
        border-radius: 24px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(255, 77, 109, 0.2) !important;
    }

    .welcome-card::after {
        content: '';
        position: absolute;
        top: -30px;
        right: -30px;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    /* Stats Card Styling */
    .stat-card {
        border: 1px solid #ffe5ec;
        border-radius: 20px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        background: white;
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(255, 77, 109, 0.1) !important;
        border-color: #ffb3c1;
    }

    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    /* Soft Pink Theme for Stats */
    .bg-soft-pink {
        background: #fff0f3;
        color: #ff4d6d;
    }

    .bg-soft-rose {
        background: #ffe5ec;
        color: #c9184a;
    }

    .link-manage {
        color: #ff4d6d;
        font-weight: 700;
        transition: 0.2s;
    }

    .link-manage:hover {
        color: #c9184a;
        letter-spacing: 0.5px;
    }

    footer {
        background: #fff;
        border-top: 1px solid #ffe5ec;
        color: #ff4d6d;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php"><i class="bi bi-shield-check-fill me-2"></i>YUNDA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link active fw-bold" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-light btn-sm px-4 rounded-pill text-danger fw-bold shadow-sm"
                                href="keluar.php">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="container">
            <div class="card welcome-card mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="fw-800 mb-2 text-white">Halo, <?php echo $_SESSION['a_global']->admin_name ?>! 👋
                            </h1>
                            <p class="opacity-90 fs-5 mb-0">Selamat datang di Panel Kontrol <strong>Toko Yunda</strong>.
                                Semuanya terlihat cantik hari ini!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card stat-card shadow-sm h-100 p-4">
                        <div class="card-body">
                            <div class="icon-box bg-soft-pink">
                                <i class="bi bi-tags-fill fs-3"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2">Total Kategori</h6>
                            <?php 
                                $kat = mysqli_query($conn, "SELECT * FROM kategori");
                                $jml_kat = mysqli_num_rows($kat);
                            ?>
                            <h2 class="fw-800 mb-3" style="color: #590d22;"><?php echo $jml_kat ?>
                                <span class="fs-5 fw-normal text-muted">Grup Produk</span>
                            </h2>
                            <hr class="opacity-10">
                            <a href="kategori.php" class="text-decoration-none link-manage small">
                                Buka Manajemen Kategori <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card stat-card shadow-sm h-100 p-4">
                        <div class="card-body">
                            <div class="icon-box bg-soft-rose">
                                <i class="bi bi-bag-check-fill fs-3"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-2">Total Produk</h6>
                            <?php 
                                $prod = mysqli_query($conn, "SELECT * FROM produk");
                                $jml_prod = mysqli_num_rows($prod);
                            ?>
                            <h2 class="fw-800 mb-3" style="color: #590d22;"><?php echo $jml_prod ?>
                                <span class="fs-5 fw-normal text-muted">Item Tersedia</span>
                            </h2>
                            <hr class="opacity-10">
                            <a href="produk.php" class="text-decoration-none link-manage small">
                                Buka Manajemen Produk <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; 2025 — <strong>Yunda Management System</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
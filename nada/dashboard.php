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
    <title>Dashboard Admin | Nada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
    /* Admin Dashboard Style - Nada */
    html,
    body {
        height: 100%;
        font-family: 'Inter', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f3f4f6;
    }

    .navbar {
        background-color: #111827 !important;
        /* Dark Navy */
        padding: 0.8rem 0;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #0d9488 !important;
    }

    .content-wrapper {
        flex: 1 0 auto;
        padding: 50px 0;
    }

    /* Welcome Card Styling */
    .welcome-card {
        background: linear-gradient(135deg, #111827 0%, #0d9488 100%);
        color: white;
        border: none;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }

    .welcome-card::after {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    /* Stats Card Styling */
    .stat-card {
        border: none;
        border-radius: 16px;
        transition: all 0.3s ease;
        background: white;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08) !important;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .bg-soft-primary {
        background: #e0f2fe;
        color: #0369a1;
    }

    .bg-soft-success {
        background: #dcfce7;
        color: #15803d;
    }

    footer {
        background: #fff;
        border-top: 1px solid #e5e7eb;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">NADA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link active text-white" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-danger btn-sm px-4 rounded-pill" href="keluar.php">
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
            <div class="card welcome-card shadow-lg mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-2">Halo, <?php echo $_SESSION['a_global']->admin_name ?>! 👋</h2>
                            <p class="opacity-75 mb-0">Selamat datang kembali di panel kendali <strong>Nada</strong>.
                                Pantau dan kelola inventaris toko Anda dengan efisien.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card stat-card shadow-sm h-100 p-4">
                        <div class="card-body">
                            <div class="icon-box bg-soft-primary">
                                <i class="bi bi-grid-fill fs-4"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-1">Total Kategori</h6>
                            <?php 
                                $kat = mysqli_query($conn, "SELECT * FROM kategori");
                                $jml_kat = mysqli_num_rows($kat);
                            ?>
                            <h2 class="fw-bold mb-3 text-dark"><?php echo $jml_kat ?> <span
                                    class="fs-5 fw-normal text-muted">Kategori</span></h2>
                            <a href="kategori.php" class="text-decoration-none fw-semibold small">
                                Kelola Kategori <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card stat-card shadow-sm h-100 p-4">
                        <div class="card-body">
                            <div class="icon-box bg-soft-success">
                                <i class="bi bi-box-seam-fill fs-4"></i>
                            </div>
                            <h6 class="text-muted text-uppercase fw-bold small mb-1">Total Produk</h6>
                            <?php 
                                $prod = mysqli_query($conn, "SELECT * FROM produk");
                                $jml_prod = mysqli_num_rows($prod);
                            ?>
                            <h2 class="fw-bold mb-3 text-dark"><?php echo $jml_prod ?> <span
                                    class="fs-5 fw-normal text-muted">Produk</span></h2>
                            <a href="produk.php" class="text-decoration-none fw-semibold small text-success">
                                Kelola Produk <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 — <strong>Nada Admin Panel</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
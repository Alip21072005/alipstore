<?php
include "koneksi.php";
session_start();

// Proteksi halaman dashboard
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}

// 1. Hitung Jumlah Kategori
$query_kategori = mysqli_query($conn, "SELECT * FROM kategori");
$total_kategori = mysqli_num_rows($query_kategori);

// 2. Hitung Jumlah Produk
$query_produk = mysqli_query($conn, "SELECT * FROM produk");
$total_produk = mysqli_num_rows($query_produk);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .welcome-section {
        background: linear-gradient(135deg, #0d6efd 0%, #0099ff 100%);
        color: white;
        padding: 3rem;
        border-radius: 1.5rem;
        border: none;
    }

    .card-stat {
        border: none;
        border-radius: 1rem;
        transition: all 0.3s ease;
    }

    .card-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop me-2"></i>Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white ms-lg-2 px-3"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div class="welcome-section shadow-sm mb-4">
            <h2 class="fw-bold">Selamat Datang👋</h2>
            <p class="mb-0">Senang melihat Anda kembali. Berikut ringkasan toko Anda hari ini.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-6">
                <div class="card card-stat shadow-sm p-5">
                    <i class="bi bi-tags text-primary fs-1 mb-2"></i>
                    <h5 class="text-muted">Total Kategori</h5>
                    <h2 class="fw-bold display-4"><?php echo $total_kategori; ?></h2>
                    <a href="kategori.php" class="btn btn-outline-primary btn-sm mt-3 mx-auto"
                        style="max-width: 150px;">Lihat Detail</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-stat shadow-sm p-5">
                    <i class="bi bi-box-seam text-success fs-1 mb-2"></i>
                    <h5 class="text-muted">Total Produk</h5>
                    <h2 class="fw-bold display-4"><?php echo $total_produk; ?></h2>
                    <a href="produk.php" class="btn btn-outline-success btn-sm mt-3 mx-auto"
                        style="max-width: 150px;">Lihat Detail</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 shadow-sm">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Kedai Kito Online</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
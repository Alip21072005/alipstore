<?php
include "koneksi.php";
session_start();

// Proteksi halaman dashboard
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}

// 1. Hitung Jumlah Kategori
$query_kategori = dummy_query($conn, "SELECT * FROM kategori");
$total_kategori = dummy_num_rows($query_kategori);

// 2. Hitung Jumlah Produk
$query_produk = dummy_query($conn, "SELECT * FROM produk");
$total_produk = dummy_num_rows($query_produk);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | Toko Boneka Oktifia</title>
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
        background-color: #fff5f7;
        /* Background Pink Sangat Muda */
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        background-color: #ff69b4 !important;
        /* Pink Cerah */
        box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
    }

    .welcome-section {
        background: linear-gradient(135deg, #ff1493 0%, #ff69b4 100%);
        color: white;
        padding: 3rem;
        border-radius: 1.5rem;
        border: none;
        box-shadow: 0 10px 20px rgba(255, 20, 147, 0.2);
    }

    .card-stat {
        border: 2px solid #ffc0cb;
        border-radius: 1.5rem;
        transition: all 0.3s ease;
        background: white;
    }

    .card-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2) !important;
        border-color: #ff69b4;
    }

    .text-pink-custom {
        color: #ff1493 !important;
    }

    .btn-pink-outline {
        color: #ff1493;
        border-color: #ff1493;
    }

    .btn-pink-outline:hover {
        background-color: #ff1493;
        color: white;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light btn-sm text-danger ms-lg-2 px-3 fw-bold" href="keluar.php"
                                onclick="return confirm('Apakah Oktifia yakin ingin keluar?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <div class="welcome-section mb-5">
            <h2 class="fw-bold">Selamat Datang, Oktifia! 👋</h2>
            <p class="mb-0">Kelola stok boneka dan kategori tokomu dengan mudah di sini.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-6">
                <div class="card card-stat shadow-sm p-5 h-100">
                    <i class="bi bi-tags-fill text-pink-custom fs-1 mb-2"></i>
                    <h5 class="text-muted">Jenis Koleksi</h5>
                    <h2 class="fw-bold display-4 text-pink-custom"><?php echo $total_kategori; ?></h2>
                    <p class="small text-muted">Kategori Boneka</p>
                    <a href="kategori.php" class="btn btn-pink-outline btn-sm mt-3 mx-auto px-4 rounded-pill">
                        Atur Kategori
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-stat shadow-sm p-5 h-100">
                    <i class="bi bi-stars text-pink-custom fs-1 mb-2"></i>
                    <h5 class="text-muted">Total Boneka</h5>
                    <h2 class="fw-bold display-4 text-pink-custom"><?php echo $total_produk; ?></h2>
                    <p class="small text-muted">Produk Terdaftar</p>
                    <a href="produk.php" class="btn btn-pink-outline btn-sm mt-3 mx-auto px-4 rounded-pill">
                        Kelola Produk
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 shadow-sm">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Toko Boneka Oktifia</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
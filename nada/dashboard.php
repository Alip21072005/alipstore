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
    <title>Dashboard | Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    /* CSS agar footer tetap di bawah */
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
    }

    .content-wrapper {
        flex: 1 0 auto;
        padding: 40px 0;
    }

    .welcome-card {
        background: linear-gradient(45deg, #0d6efd, #00d2ff);
        color: white;
        border: none;
        border-radius: 15px;
    }

    .stat-card {
        border: none;
        border-radius: 12px;
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="dashboard.php">Najwa Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white px-3 ms-lg-2"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="container">
            <div class="card welcome-card shadow mb-4">
                <div class="card-body p-5">
                    <h2 class="fw-bold">Selamat Datang, <?php echo $_SESSION['a_global']->admin_name ?>!</h2>
                    <p class="lead">Anda berada di panel kendali Najwa Store. Kelola dagangan Anda dengan mudah di sini.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card stat-card shadow-sm h-100 p-3">
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase small">Total Kategori</h6>
                            <?php 
                                $kat = mysqli_query($conn, "SELECT * FROM kategori");
                                $jml_kat = mysqli_num_rows($kat);
                            ?>
                            <h2 class="fw-bold text-primary"><?php echo $jml_kat ?> Kategori</h2>
                            <a href="kategori.php" class="btn btn-sm btn-outline-primary mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card stat-card shadow-sm h-100 p-3">
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase small">Total Produk</h6>
                            <?php 
                                $prod = mysqli_query($conn, "SELECT * FROM produk");
                                $jml_prod = mysqli_num_rows($prod);
                            ?>
                            <h2 class="fw-bold text-success"><?php echo $jml_prod ?> Produk</h2>
                            <a href="produk.php" class="btn btn-sm btn-outline-success mt-2">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-top py-3 mt-auto">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Najwa Store</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Radit Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin-left: 15px;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            padding: 50px 0;
        }

        /* CARD */
        .stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .icon {
            font-size: 32px;
            opacity: 0.8;
        }

        /* CONTENT */
        .content-title {
            font-weight: 700;
        }

        /* FOOTER */
        footer {
            background: #0f2027;
            color: #fff;
            padding: 15px 0;
            margin-top: 60px;
            text-align: center;
        }
    </style>
</head>


<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php"> Gabutin CoffeShop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kategori.php">Data Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php">Data Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_menu.php">Tambah Menu</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="hapus_menu.php">Hapus Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="keluar.php">Logout</a>
                </li>
                <a href="logout.php"
   onclick="return confirm('Yakin ingin logout?')"
   class="btn btn-danger">
   Logout
</a>

            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <h2>Selamat Datang, Administrator 👋</h2>
        <p class="mt-2">
            Kelola data produk, kategori, dan stok sepatu di <strong>Gabutin CoffeShop</strong>
            dengan sistem yang cepat dan mudah digunakan.
        </p>
    </div>
</section>
<div class="container mt-5">
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Total Produk</h6>
                        <h3>150</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Kategori Sepatu</h6>
                        <h3>10</h3>
                    </div>
                    <div class="icon">📦</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Stok Tersedia</h6>
                        <h3>2.340</h3>
                    </div>
                    <div class="icon">📊</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6>Admin Aktif</h6>
                        <h3>1</h3>
                    </div>
                    <div class="icon">👤</div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container mt-5">
    <h4 class="content-title">gabutin CoffeShop</h4>
    <p class="text-muted mt-2">
        <strong>Gabutin CoffeShop</strong> aGabutin Coffeeshop adalah kedai kopi modern yang hadir sebagai ruang santai untuk menikmati kopi berkualitas dengan suasana hangat dan nyaman. Mengusung konsep simple, cozy, dan kekinian, Gabutin Coffeeshop menyajikan berbagai pilihan minuman kopi dan non-kopi yang diracik dari biji kopi pilihan serta bahan berkualitas.
    </p>

    <p class="text-muted">
        Sistem ini dikembangkan menggunakan PHP dan MySQL sebagai bagian dari
        proyek Sistem Informasi, dengan fokus pada kemudahan penggunaan dan
        tampilan yang modern.
    </p>
</div>
<footer>
    © 2025 <strong>Gabutin CoffeShop</strong> Drink & Food Management System
</footer>

</body>
</html>

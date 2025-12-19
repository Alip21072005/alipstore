<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Sopia Manis </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            background-color: #ffffffff;
        }

        .info-card {
            border-radius: 15px;
            transition: 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kedai Sopia Manis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori.php">Data Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <section class="py-5">
        <div class="container">

            <!-- WELCOME -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="fw-bold">👋 Welcome Esteemend Customers</h4>
                    <p class="text-muted mb-0">
                        Halo, Pencinta Kuliner! Siap menjalankan lidah anda hari ini? Selamat datang di toko kami! Kami Menyediakan berbagai pilihan makanan dan minuman serta cemilan.
                    </p>
                </div>
            </div>

            <!-- INFO BOX -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card info-card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="fw-bold text-primary">📂 Kategori</h5>
                            <p class="text-muted">Kelola kategori produk</p>
                            <a href="kategori.php" class="btn btn-outline-primary btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card info-card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="fw-bold text-success">📦 Produk</h5>
                            <p class="text-muted">Kelola data produk</p>
                            <a href="produk.php" class="btn btn-outline-success btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card info-card shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="fw-bold text-danger">🚪 Logout</h5>
                            <p class="text-muted">Keluar dari sistem</p>
                            <a href="keluar.php" class="btn btn-outline-danger btn-sm">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="bg-primary text-light p-3 text-center">
            <small>S.I 2025 - Kedai Sopia Manis.</small>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

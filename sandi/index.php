<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai Kito Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: url("image/background.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        .hero {
            height: 100vh; /* penuh satu layar */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(0, 0, 0, 0.4); /* overlay gelap agar teks lebih jelas */
        }

        .hero h1 {
            font-size: 3rem;
            color: #fff;
            font-weight: bold;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produktoko.php">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>SELAMAT DATANG DI TOKO BAJU KAMI</h1>
        </div>
    </section>

    <!-- Content -->
    <main class="section py-5">
        <div class="container">
            <div class="row">
                <?php
                include 'koneksi.php';
                $produk = dummy_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
                if (dummy_num_rows($produk) > 0) {
                    while ($p = dummy_fetch_array($produk)) {
                ?>
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top" alt="<?php echo $p['namaproduk'] ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $p['namaproduk'] ?></h5>
                                    <p class="card-text text-muted"><?php echo $p['deskripsi'] ?></p>
                                    <p class="fw-bold text-primary">Rp. <?php echo number_format($p['harga'], 0, ',', '.') ?></p>
                                    <a href="https://wa.me/6285357617815" target="_blank" class="btn btn-secondary">Beli</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center text-light'>Produk Tidak Ada</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="bg-primary text-light p-3 text-center mt-5">
            <small>&copy; 2025 - Kedai Kito Online</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Boneka Oktifia | Koleksi Boneka Menggemaskan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fff5f7;
        /* Background Pink Sangat Muda */
    }

    /* Navbar Pink */
    .bg-pink-custom {
        background-color: #ff69b4 !important;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
    }

    /* Hero Section dengan Gambar Boneka */
    .hero-section {
        background: linear-gradient(rgba(255, 105, 180, 0.5), rgba(255, 20, 147, 0.5)), url('https://images.unsplash.com/photo-1559440666-4477c282495f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        margin-bottom: 50px;
    }

    .card-produk {
        border: 2px solid #ffc0cb;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        background: white;
    }

    .card-produk:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(255, 105, 180, 0.3);
        border-color: #ff69b4;
    }

    .card-produk img {
        height: 250px;
        object-fit: cover;
    }

    .badge-kategori {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 20, 147, 0.8);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .harga {
        color: #ff1493;
        font-weight: 600;
        font-size: 1.2rem;
    }

    /* Tombol Pesan Pink */
    .btn-beli {
        border-radius: 12px;
        font-weight: 600;
        background-color: #ff69b4;
        border: none;
        color: white;
        padding: 10px;
        transition: 0.3s;
    }

    .btn-beli:hover {
        background-color: #ff1493;
        color: white;
        box-shadow: 0 4px 12px rgba(255, 20, 147, 0.3);
    }

    .footer {
        background-color: #ff69b4;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-pink-custom navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="./"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="produktoko.php">Koleksi Boneka</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3 px-4"
                                href="login.php">Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di Toko Boneka Oktifia</h1>
            <p class="lead">Temukan Teman Pelukmu yang Paling Lembut dan Menggemaskan!</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold" style="color: #ff1493;">Koleksi Terpopuler</h3>
            <a href="produktoko.php" class="text-decoration-none" style="color: #ff69b4;">Lihat Semua <i
                    class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php
            include 'koneksi.php';
            // Query tetap sama karena struktur database diasumsikan sama
            $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
            if (mysqli_num_rows($produk) > 0) {
                while ($p = mysqli_fetch_array($produk)) {
            ?>
            <div class="col">
                <div class="card card-produk position-relative">
                    <span class="badge-kategori"><?php echo $p['namakategori'] ?></span>
                    <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top"
                        alt="<?php echo $p['namaproduk'] ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark"><?php echo $p['namaproduk'] ?></h5>
                        <p class="card-text text-muted small flex-grow-1">
                            <?php echo (strlen($p['deskripsi']) > 60) ? substr($p['deskripsi'], 0, 60) . '...' : $p['deskripsi']; ?>
                        </p>
                        <div class="mt-3">
                            <p class="harga mb-3">Rp <?php echo number_format($p['harga'], 0, ',', '.') ?></p>
                            <a href="https://wa.me/628971249870?text=Halo%20Oktifia,%20saya%20mau%20pesan%20boneka%20<?php echo urlencode($p['namaproduk']) ?>"
                                target="_blank" class="btn btn-beli w-100">
                                <i class="bi bi-whatsapp me-2"></i>Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } else { ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada koleksi boneka terbaru.</p>
            </div>
            <?php } ?>
        </div>
    </div>

    <footer class="footer text-white pt-5 pb-4 mt-5">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 col-lg-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</h5>
                    <p class="small">Menyediakan berbagai macam boneka lucu dan berkualitas tinggi untuk kado spesial
                        atau koleksi pribadi Anda.</p>
                </div>
                <div class="col-md-2 col-lg-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold small">Navigasi</h5>
                    <p class="small"><a href="./" class="text-white text-decoration-none">Home</a></p>
                    <p class="small"><a href="produktoko.php" class="text-white text-decoration-none">Koleksi Boneka</a>
                    </p>
                    <p class="small"><a href="login.php" class="text-white text-decoration-none">Admin Login</a></p>
                </div>
                <div class="col-md-4 col-lg-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold small">Hubungi Oktifia</h5>
                    <p class="small"><i class="bi bi-geo-alt-fill me-2"></i> Workshop Boneka, Indonesia</p>
                    <p class="small"><i class="bi bi-whatsapp me-2"></i> +62 897-1249-870</p>
                </div>
            </div>
            <hr class="mb-4 bg-white">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="small">Copyright &copy; 2025 <strong class="text-light">Toko Boneka Oktifia</strong>. All
                        Rights Reserved.</p>
                </div>
                <div class="col-md-5 text-md-end">
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="https://wa.me/628971249870" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
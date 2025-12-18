<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semua Produk | Kedai Kito Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .page-header {
        background-color: #fff;
        padding: 60px 0;
        margin-bottom: 30px;
        border-bottom: 1px solid #eee;
    }

    .card-produk {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
    }

    .card-produk:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
    }

    .card-produk img {
        height: 200px;
        object-fit: cover;
    }

    .badge-kategori {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(13, 110, 253, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
    }

    .harga {
        color: #0d6efd;
        font-weight: 600;
        font-size: 1.15rem;
    }

    .btn-beli {
        border-radius: 10px;
        font-weight: 600;
        background-color: #25d366;
        border: none;
        color: white;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="./"><i class="bi bi-shop me-2"></i>Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produktoko.php">Produk</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3 px-4"
                                href="login.php">Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="page-header text-center">
        <div class="container">
            <h2 class="fw-bold text-primary">Katalog Menu Lengkap</h2>
            <p class="text-muted">Pilih makanan dan minuman favoritmu, kami antar dengan cinta.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) WHERE status = 1 ORDER BY idproduk DESC");
            if (mysqli_num_rows($produk) > 0) {
                while ($row = mysqli_fetch_array($produk)) {
            ?>
            <div class="col">
                <div class="card card-produk position-relative">
                    <span class="badge-kategori"><?php echo $row['namakategori'] ?></span>
                    <img src="image/<?php echo $row['gambar'] ?>" class="card-img-top"
                        alt="<?php echo $row['namaproduk'] ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2"><?php echo $row['namaproduk'] ?></h5>
                        <p class="card-text text-muted small mb-3 flex-grow-1">
                            <?php echo (strlen($row['deskripsi']) > 80) ? substr($row['deskripsi'], 0, 80) . '...' : $row['deskripsi']; ?>
                        </p>
                        <p class="harga mb-3">Rp <?php echo number_format($row['harga'], 0, ',', '.') ?></p>
                        <a href="https://wa.me/6285357617815?text=Halo%20Admin%20Kedai%20Kito,%20saya%20mau%20pesan%20<?php echo urlencode($row['namaproduk']) ?>"
                            target="_blank" class="btn btn-beli w-100 py-2">
                            <i class="bi bi-whatsapp me-2"></i>Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>

    <footer class="bg-primary text-white pt-5 pb-4 mt-5">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 col-lg-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold"><i class="bi bi-shop me-2"></i>Kedai Kito Online</h5>
                    <p class="small">Kami menyajikan cita rasa terbaik dengan bahan-bahan pilihan. Pesan sekarang dan
                        nikmati kelezatan di setiap gigitannya!</p>
                </div>
                <div class="col-md-2 col-lg-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold small">Navigasi</h5>
                    <p class="small"><a href="./" class="text-white text-decoration-none">Home</a></p>
                    <p class="small"><a href="produktoko.php" class="text-white text-decoration-none">Semua Produk</a>
                    </p>
                    <p class="small"><a href="login.php" class="text-white text-decoration-none">Admin Login</a></p>
                </div>
                <div class="col-md-4 col-lg-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold small">Kontak Kami</h5>
                    <p class="small"><i class="bi bi-geo-alt-fill me-2"></i> Jakarta, Indonesia</p>
                    <p class="small"><i class="bi bi-whatsapp me-2"></i> +62 853-5761-7815</p>
                </div>
            </div>
            <hr class="mb-4 bg-white">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="small">Copyright &copy; 2025 <strong class="text-warning">Kedai Kito Online</strong>. All
                        Rights Reserved.</p>
                </div>
                <div class="col-md-5 text-md-end">
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="https://wa.me/6285357617815" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
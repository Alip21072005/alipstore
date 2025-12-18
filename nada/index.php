<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | Nada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
    /* Desain Baru oleh Nada */
    html,
    body {
        height: 100%;
        font-family: 'Inter', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #fcfcfc;
    }

    .main-content {
        flex: 1 0 auto;
    }

    /* Navbar Custom */
    .navbar {
        background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%) !important;
        padding: 1rem 0;
    }

    .navbar-brand {
        letter-spacing: 2px;
        font-weight: 800 !important;
        text-transform: uppercase;
    }

    /* Styling Kartu Produk Modern */
    .img-katalog {
        width: 100%;
        height: 240px;
        object-fit: cover;
    }

    .card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
    }

    .card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .harga {
        color: #0d9488;
        font-weight: 800;
        font-size: 1.25rem;
    }

    .btn-buy {
        background-color: #0d9488;
        border: none;
        padding: 10px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-buy:hover {
        background-color: #115e59;
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
    }

    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 3px;
        background: #0d9488;
        bottom: 0;
        left: 25%;
        border-radius: 2px;
    }

    footer {
        background: #111827 !important;
        border-top: 4px solid #0d9488;
    }
    </style>
</head>

<body>
    <div class="main-content">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="#"><i class="bi bi-bag-heart-fill"></i> NADA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link active" href="./">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="produktoko.php">Produk</a></li>
                            <li class="nav-item ms-lg-3"><a class="btn btn-outline-light btn-sm px-3 rounded-pill"
                                    href="login.php">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="section mt-5 pb-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold section-title">Koleksi Terlaris</h2>
                    <p class="text-muted mt-3">Temukan pilihan terbaik hanya di Toko Nada</p>
                </div>

                <div class="row">
                    <?php
                    include 'koneksi.php';
                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($p = mysqli_fetch_array($produk)) {
                    ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="image/<?php echo $p['gambar'] ?>" target="_blank">
                                <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top img-katalog"
                                    alt="<?php echo $p['namaproduk'] ?>">
                            </a>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold text-dark mb-2"><?php echo $p['namaproduk'] ?></h5>
                                <p class="card-text text-muted flex-grow-1 mb-4"
                                    style="font-size: 0.85rem; line-height: 1.6;">
                                    <?php echo (strlen($p['deskripsi']) > 60) ? substr(strip_tags($p['deskripsi']), 0, 60) . '...' : $p['deskripsi']; ?>
                                </p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span
                                            class="harga">Rp<?php echo number_format($p['harga'], 0, ',', '.') ?></span>
                                    </div>
                                    <a href="https://wa.me/6287873801781?text=Halo Nada, saya tertarik untuk memesan: <?php echo urlencode($p['namaproduk']) ?>"
                                        target="_blank" class="btn btn-primary btn-buy w-100 rounded-pill text-white">
                                        <i class="bi bi-whatsapp me-2"></i> Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php  }
                    } else { ?>
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-light border-0 shadow-sm py-5">
                            <i class="bi bi-search fs-1 text-muted"></i>
                            <p class="mt-3 mb-0 fw-semibold text-muted">Belum ada produk yang ditampilkan.</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-light py-5 text-center mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="fw-bold mb-3">NADA</h4>
                    <p class="opacity-50 small mb-0">Copyright &copy; 2025 - All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
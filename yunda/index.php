<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | Yunda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">

    <style>
    /* Desain Baru oleh Yunda - Tema Pink & Putih */
    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #fff5f7;
        /* Background putih kemerahan sangat muda */
    }

    .main-content {
        flex: 1 0 auto;
    }

    /* Navbar Custom - Gradient Pink */
    .navbar {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%) !important;
        padding: 1.2rem 0;
        border-bottom: 3px solid #ffb3c1;
    }

    .navbar-brand {
        letter-spacing: 1.5px;
        font-weight: 800 !important;
        text-transform: uppercase;
    }

    /* Styling Kartu Produk */
    .img-katalog {
        width: 100%;
        height: 260px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: none;
        border-radius: 25px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 20px rgba(255, 77, 109, 0.05);
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(255, 77, 109, 0.15);
    }

    .card:hover .img-katalog {
        transform: scale(1.05);
    }

    .harga {
        color: #ff4d6d;
        font-weight: 800;
        font-size: 1.3rem;
    }

    /* Tombol Pesan - Pink */
    .btn-buy {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        border: none;
        padding: 12px;
        font-weight: 600;
        transition: 0.3s;
        color: white;
    }

    .btn-buy:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        box-shadow: 0 6px 15px rgba(255, 77, 109, 0.4);
        color: white;
    }

    .section-title {
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
        color: #590d22;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 4px;
        background: #ff4d6d;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 10px;
    }

    footer {
        background: #fff !important;
        border-top: 1px solid #ffb3c1;
        color: #ff4d6d !important;
    }

    .nav-link.active {
        font-weight: 700;
        text-decoration: underline;
        text-underline-offset: 5px;
    }
    </style>
</head>

<body>
    <div class="main-content">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="#"><i class="bi bi-shop"></i> YUNDA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link active" href="./">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link" href="produktoko.php">Produk</a></li>
                            <li class="nav-item ms-lg-3"><a class="btn btn-outline-light btn-sm px-4 rounded-pill"
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
                    <p class="text-muted mt-3">Temukan pilihan produk kecantikan dan fashion terbaik di <strong>Toko
                            Yunda</strong></p>
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
                            <div class="overflow-hidden">
                                <a href="image/<?php echo $p['gambar'] ?>" target="_blank">
                                    <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top img-katalog"
                                        alt="<?php echo $p['namaproduk'] ?>">
                                </a>
                            </div>
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
                                    <a href="https://wa.me/6282371327159?text=Halo Yunda, saya tertarik untuk memesan: <?php echo urlencode($p['namaproduk']) ?>"
                                        target="_blank" class="btn btn-buy w-100 rounded-pill">
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
                            <i class="bi bi-bag-x fs-1 text-muted"></i>
                            <p class="mt-3 mb-0 fw-semibold text-muted">Belum ada produk yang tersedia saat ini.</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 text-center mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="fw-bold mb-3">YUNDA</h4>
                    <p class="opacity-75 small mb-0">Copyright &copy; 2025 - All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
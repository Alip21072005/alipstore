<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | Najwa Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    /* Agar footer tetap di bawah meskipun konten sedikit */
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
    }

    .main-content {
        flex: 1 0 auto;
        /* Mendorong footer ke bawah */
    }

    /* Styling Kartu Produk */
    .img-katalog {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-bottom: 1px solid #eee;
    }

    .card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .harga {
        color: #0d6efd;
        font-weight: 800;
        font-size: 1.2rem;
    }

    .navbar-brand {
        letter-spacing: 1px;
    }
    </style>
</head>

<body>
    <div class="main-content">
        <header>
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop"></i> Najwa Store</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link active" href="./">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="produktoko.php">Produk</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Admin Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="section mt-5 pb-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h3 class="fw-bold">Makanan & Minuman Terlaris</h3>
                    <p class="text-muted">Pilih menu favoritmu dan pesan langsung via WhatsApp</p>
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
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-dark mb-1"><?php echo $p['namaproduk'] ?></h5>
                                <p class="card-text text-muted flex-grow-1 mb-3" style="font-size: 0.85rem;">
                                    <?php echo (strlen($p['deskripsi']) > 60) ? substr(strip_tags($p['deskripsi']), 0, 60) . '...' : $p['deskripsi']; ?>
                                </p>
                                <div class="mt-auto">
                                    <p class="harga mb-3 text-primary">Rp
                                        <?php echo number_format($p['harga'], 0, ',', '.') ?></p>
                                    <a href="https://wa.me/6289693320805?text=Halo Najwa Store, saya ingin memesan produk: <?php echo urlencode($p['namaproduk']) ?>"
                                        target="_blank" class="btn btn-primary w-100 rounded-pill">
                                        <i class="bi bi-whatsapp"></i> Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php  }
                    } else { ?>
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-light shadow-sm">
                            <i class="bi bi-box-seam fs-1 text-muted"></i>
                            <p class="mt-2 mb-0">Maaf, saat ini belum ada produk yang tersedia.</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-primary text-light py-4 text-center mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="mb-1 fw-bold">Najwa Store</p>
                    <small class="opacity-75">Copyright &copy; 2025 - Semua Hak Dilindungi.</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
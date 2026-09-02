<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALIP MART | Belanja Praktis, Pilihan Berkualitas</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/store.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top alip-navbar">
            <div class="container">
                <a class="navbar-brand fw-bold brand-name" href="./"><span class="brand-mark"><i class="bi bi-bag-check"></i></span>ALIP MART</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="./">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="produktoko.php">Produk</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3 px-4"
                                href="login.php">Masuk Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="alip-hero">
        <div class="container">
            <div class="hero-content">
                <p class="eyebrow mb-3">Pilihan terpercaya untuk Anda</p>
                <h1 class="hero-title mb-3">Belanja lebih nyaman, pilihan lebih berkualitas.</h1>
                <p class="hero-copy mb-4">ALIP MART menghadirkan produk pilihan yang mudah dipesan, transparan harganya, dan siap melayani kebutuhan Anda.</p>
                <a href="produktoko.php" class="btn btn-alip me-2 mb-2">Jelajahi Produk <i class="bi bi-arrow-right ms-1"></i></a>
                <a href="#pilihan" class="btn btn-alip-outline mb-2">Produk Unggulan</a>
            </div>
        </div>
    </section>

    <section class="container trust-strip">
        <div class="trust-card row g-0 py-3 px-2 text-start">
            <div class="col-md-4 p-3 d-flex gap-3 border-end"><i class="bi bi-patch-check-fill trust-icon"></i><div><p class="trust-title">Produk Terpilih</p><p class="trust-text">Kualitas yang kami utamakan.</p></div></div>
            <div class="col-md-4 p-3 d-flex gap-3 border-end"><i class="bi bi-shield-check trust-icon"></i><div><p class="trust-title">Harga Transparan</p><p class="trust-text">Tanpa biaya yang membingungkan.</p></div></div>
            <div class="col-md-4 p-3 d-flex gap-3"><i class="bi bi-whatsapp trust-icon"></i><div><p class="trust-title">Pesan Cepat</p><p class="trust-text">Terhubung langsung dengan admin.</p></div></div>
        </div>
    </section>

    <main class="container my-5 py-3" id="pilihan">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div><p class="section-label mb-1">Pilihan ALIP MART</p><h2 class="section-title mb-0">Produk unggulan untuk Anda</h2></div>
            <a href="produktoko.php" class="catalog-link text-decoration-none">Lihat katalog <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php
            include 'koneksi.php';
            $produk = dummy_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
            if (dummy_num_rows($produk) > 0) {
                while ($p = dummy_fetch_array($produk)) {
            ?>
                    <div class="col">
                        <div class="card card-produk position-relative">
                            <span class="badge-kategori"><?php echo $p['namakategori'] ?></span>
                            <img src="./image/<?php echo $p['gambar'] ?>" class="card-img-top"
                                alt="<?php echo $p['namaproduk'] ?>"
                                onerror="this.src='https://via.placeholder.com/300x200?text=Gambar+Tidak+Tampil';this.onerror=null;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title product-title"><?php echo $p['namaproduk'] ?></h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    <?php echo (strlen($p['deskripsi']) > 60) ? substr($p['deskripsi'], 0, 60) . '...' : $p['deskripsi']; ?>
                                </p>
                                <div class="mt-3">
                                    <p class="harga mb-3">Rp <?php echo number_format($p['harga'], 0, ',', '.') ?></p>
                                    <a href="https://wa.me/6285758769683?text=Halo%20ALIP%20MART,%20saya%20ingin%20memesan%20<?php echo urlencode($p['namaproduk']) ?>"
                                        target="_blank" class="btn btn-beli w-100">
                                        <i class="bi bi-whatsapp me-2"></i>Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </main>

    <footer class="alip-footer pt-5 pb-4 mt-5">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 col-lg-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-3"><span class="brand-mark"><i class="bi bi-bag-check"></i></span>ALIP MART</h5>
                    <p class="small footer-note">Belanja praktis dengan pilihan produk yang kami kurasi untuk kebutuhan Anda.</p>
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
                    <p class="small"><i class="bi bi-geo-alt-fill me-2"></i> Indonesia</p>
                    <p class="small"><i class="bi bi-whatsapp me-2"></i> +62 857-5876-9683</p>
                </div>
            </div>
            <hr class="mb-4 border-secondary">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="small footer-note">Copyright &copy; 2023 <strong class="text-white">ALIP MART</strong>. All Rights Reserved.</p>
                </div>
                <div class="col-md-5 text-md-end">
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="https://wa.me/6295758769683" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>

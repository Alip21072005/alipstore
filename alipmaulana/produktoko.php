<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | ALIP MART</title>
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
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produktoko.php">Produk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="catalog-header text-center">
        <div class="container">
            <p class="eyebrow mb-2">ALIP MART</p>
            <h1 class="mb-2">Katalog Produk</h1>
            <p class="mb-0">Temukan pilihan yang tepat untuk kebutuhan Anda.</p>
        </div>
    </section>

    <main class="container my-5 py-2">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php
            $produk = dummy_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) WHERE status = 1 ORDER BY idproduk DESC");
            if (dummy_num_rows($produk) > 0) {
                while ($row = dummy_fetch_array($produk)) {
            ?>
                    <div class="col">
                        <div class="card card-produk position-relative">
                            <span class="badge-kategori"><?php echo $row['namakategori'] ?></span>
                            <img src="./image/<?php echo $row['gambar'] ?>" class="card-img-top"
                                alt="<?php echo $row['namaproduk'] ?>"
                                onerror="this.src='https://via.placeholder.com/300x200?text=Gambar+Tidak+Tampil';this.onerror=null;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title product-title mb-2"><?php echo $row['namaproduk'] ?></h5>
                                <p class="card-text text-muted small mb-3 flex-grow-1">
                                    <?php echo (strlen($row['deskripsi']) > 80) ? substr($row['deskripsi'], 0, 80) . '...' : $row['deskripsi']; ?>
                                </p>
                                <p class="harga mb-3">Rp <?php echo number_format($row['harga'], 0, ',', '.') ?></p>
                                <a href="https://wa.me/6285758769683?text=Halo%20Admin%20ALIP%20MART,%20saya%20mau%20pesan%20<?php echo urlencode($row['namaproduk']) ?>"
                                    target="_blank" class="btn btn-beli w-100 py-2">
                                    <i class="bi bi-whatsapp me-2"></i>Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
            <?php }
            } else { ?>
                <div class="col-12">
                    <div class="empty-products text-center">
                        <i class="bi bi-bag-heart"></i>
                        <h2>Produk segera hadir</h2>
                        <p class="mb-0">Kami sedang menyiapkan pilihan terbaik untuk Anda. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                </div>
            <?php } ?>
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
                    <p class="small"><a href="index.php" class="text-white text-decoration-none">Home</a></p>
                    <p class="small"><a href="produktoko.php" class="text-white text-decoration-none">Semua Produk</a>
                    </p>
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
                    <a href="https://wa.me/6285758769683" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>

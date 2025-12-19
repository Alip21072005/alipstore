<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai princess finaa</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- logo + teks agak ke kiri nah di sini ye di siniiiii-->
            <a class="navbar-brand brand-left d-flex align-items-center" href="#">
                <img src="image/logoIncess.jpeg" class="logo" alt="Logo">
                <span>Kedai princess fina</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produktoko.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- BANNER TEKS SAJA -->
    <section class="banner-text">
        <h1>Kue Kampung Rasa Premium</h1>
        <p>UMKM jajan pasar sederhana dengan cita rasa yang naik kelas cicici🍰</p>
    </section>

    <!-- PRODUK -->
    <div class="container">
        <h3 class="section-title">Produk</h3>

        <div class="row g-4">
            <?php
            include 'koneksi.php';
            $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");

            if (mysqli_num_rows($produk) > 0) {
                while ($p = mysqli_fetch_array($produk)) {
            ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card product-card">
                            <img src="image/<?php echo $p['gambar']; ?>" alt="Produk">
                            <div class="card-body">
                                <p class="nama"><?php echo $p['namaproduk']; ?></p>
                                <p class="deskripsi"><?php echo $p['deskripsi']; ?></p>
                                <p class="harga">Rp <?php echo number_format($p['harga']); ?></p>
                                <a href="https://wa.me/6285357617815" target="_blank" class="btn btn-beli">
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>Produk belum tersedia</p>";
            }
            ?>
        </div>
    </div>

    <!-- FOOTER -->
   <footer class="footer">
    <div class="container">
        <div class="row text-center text-md-start">

            <div class="col-md-4 mb-4">
                <h5 class="footer-title">Princess Fina</h5>
                <p class="footer-text">
                    “Hidangan penutup tradisional dan camilan rumahan dengan sentuhan cinta 🙄💕”
                </p>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="footer-title">Menu</h5>
                <ul class="footer-link">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="produktoko.php">Produk</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h5 class="footer-title">Contact</h5>
                <p class="footer-text">
                    WhatsApp : 0831-8792-1476<br>
                    Instagram : @fina_bungarahmadini
                </p>
            </div>

        </div>

        <hr class="footer-line">

        <div class="text-center footer-copy">
            © 2025 kedai Princess Fina.
        </div>
    </div>
</footer>

</body>

</html>

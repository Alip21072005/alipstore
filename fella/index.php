<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            background-color: #ffe6eb;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #fff5f7; /* off-white pink lembut */
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #5a2a33 !important;
            font-weight: 600;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #ff4d6d !important;
        }

        .navbar-toggler {
            border-color: #ffb3c1;
        }

        .navbar-toggler-icon {
            filter: invert(40%);
        }

        .logo-brand {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            background: #fff;
        }

        .welcome-colorful {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 30px 0 10px;
            letter-spacing: 1px;
        }

        .welcome-colorful span {
            display: inline-block;
            animation: softBlink 1.6s infinite alternate;
        }

        .w1 { color: #ff4d6d; }
        .w2 { color: #ffafcc; }
        .w3 { color: #ffd166; }
        .w4 { color: #9bf6ff; }
        .w5 { color: #cdb4db; }
        .w6 { color: #ffc8dd; }

        @keyframes softBlink {
            from { opacity: 1; }
            to { opacity: 0.5; }
        }

        /* SECTION TITLE */
        .section-title h3 {
            font-weight: 700;
            color: #ff4d6d;
             animation: softBlink 1.6s infinite alternate;
        }

        
        .product-card {
            position: relative;
            z-index: 1;
            border-radius: 18px;
            overflow: hidden;
            border: none;
            transition: 0.3s;
            background: #fff;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .nama {
            font-weight: 600;
            font-size: 1.05rem;
        }

        .harga {
            font-size: 1.15rem;
            font-weight: bold;
            color: #ff4d6d;
        }

        .btn-success {
            background-color: #ff758f;
            border: none;
        }

        .btn-success:hover {
            background-color: #ff4d6d;
        }

        .footer-top {
            background: #ffb3c1;
            padding: 50px 0;
            margin-top: 80px;
        }

        .footer-top h5 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .footer-top p,
        .footer-top a {
            font-size: 14px;
            color: #333;
            text-decoration: none;
        }

        .footer-bottom {
            background: #ff4d6d;
            color: #fff;
            text-align: center;
            padding: 12px 0;
        }

        .product-card::before {
            content: "";
            position: absolute;
            inset: 0;
            padding: 6px;
            border-radius: 22px;
            background: linear-gradient(
                135deg,
                #ffcad4,
                #ffe5d9,
                #cdb4db,
                #bde0fe,
                #caffbf
            );
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .product-card:hover::before {
            filter: brightness(1.08);
        }

        
        section.py-5 {
            background-image: url("image/BG3.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
                <img src="image/logi 1.jpeg" alt="Logo Viva La Vida" class="logo-brand">
                <span>Caffe Viva La Vida</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./">Dashboard</a>
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

    <!-- CONTENT -->
    <section class="py-5">
        <div class="container">

            <h2 class="welcome-colorful">
                <span class="w1">Selamat</span>
                <span class="w2">Datang</span>
                <span class="w3">di</span>
                <span class="w4">Viva</span>
                <span class="w5">La</span>
                <span class="w6">Vida</span>
            </h2>

            <p class="text-center text-muted mb-5">
                Ngopi santai & cerita hidup dari secangkir kopi ☕
            </p>

            <div class="text-center mb-5 section-title">
                <h3>Pilihan Menu Terbaik Dari Kami</h3>
                <p class="text-muted">Pilihan favorit pelanggan Viva La Vida</p>
            </div>

            <div class="row g-4">
                <?php
                include 'koneksi.php';
                $produk = dummy_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
                if (dummy_num_rows($produk) > 0) {
                    while ($p = dummy_fetch_array($produk)) {
                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card product-card h-100">
                                <img src="image/<?php echo $p['gambar'] ?>" class="product-img" alt="Produk">
                                <div class="card-body d-flex flex-column">
                                    <p class="nama"><?php echo $p['namaproduk'] ?></p>
                                    <p class="text-muted small flex-grow-1">
                                        <?php echo $p['deskripsi'] ?>
                                    </p>
                                    <p class="harga">Rp <?php echo number_format($p['harga']) ?></p>
                                    <a href="https://wa.me/625709922998" target="_blank" class="btn btn-success w-100">
                                        Beli via WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center'>Produk Tidak Ada</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Caffe Viva La Vida</h5>
                        <p>Tempat terbaik menikmati makanan dan minuman favorit dengan suasana hangat.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Menu</h5>
                        <p><a href="#">Makanan</a></p>
                        <p><a href="#">Minuman</a></p>
                        <p><a href="#">Wifi</a></p>
                        <p><a href="#">Best Kombo Surga Dunia</a></p>
                    </div>
                    <div class="col-md-4">
                        <h5>Kontak</h5>
                        <p>WhatsApp: 0857-0992-2998</p>
                        <p>Email: vivalavida123@gamail.com</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <small>© 2025 Viva La Vida Online. Princess Fella Yang Cantik.</small>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

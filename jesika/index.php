<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Toko Jule Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #fff0f6;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #ff4d94, #ff85c1) !important;
        }

        /* Product Card */
        .product-card {
            border-radius: 18px;
            overflow: hidden;
            transition: 0.3s;
            border: none;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(255, 77, 148, 0.25);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .nama {
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        .harga {
            font-size: 1.25rem;
            font-weight: bold;
            color: #ff4d94;
        }

        .btn-wa {
            background-color: #ff4d94;
            border: none;
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-wa:hover {
            background-color: #e63e85;
        }

        footer {
            background: linear-gradient(135deg, #ff4d94, #ff85c1);
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">toko jule</a>
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
            <div class="text-center mb-5">
                <h3 class="fw-bold text-dark">👜 Baju, Sepatu & Tas Terlaris</h3>
                <p class="text-muted">Pilihan favorit pelanggan toko jule</p>
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
                                    <p class="text-muted small flex-grow-1"><?php echo $p['deskripsi'] ?></p>
                                    <p class="harga">Rp <?php echo number_format($p['harga']) ?></p>
                                    <a href="https://wa.me/6285768275152" target="_blank" class="btn btn-wa w-100">
                                        💬 Beli via WhatsApp
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
        <div class="text-light p-3 text-center">
            <small>Copyright &copy; 2025 - Toko Jule Online</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

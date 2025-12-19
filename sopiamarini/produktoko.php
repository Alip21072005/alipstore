<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai Sopia Manis</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            background-color: #e89cffff;
        }

        .product-card {
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .harga {
            font-size: 1.2rem;
            font-weight: bold;
            color: #fd0d0dff;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kedai Sopia Manis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Data Produk</a>
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
                <h3 class="fw-bold">🍽️ Daftar Produk Kedai Sopia Manis</h3>
                <p class="text-muted">Silahkan Pilih Makanan dan Minuman Favoritmu!</p>
            </div>

            <div class="row g-4">
                <?php
                $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) ORDER BY idproduk DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($row = mysqli_fetch_array($produk)) {
                ?>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card product-card h-100">
                                <img src="image/<?php echo $row['gambar'] ?>" class="product-img" alt="Produk">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="fw-bold"><?php echo $row['namaproduk'] ?></h6>
                                    <p class="text-muted small flex-grow-1">
                                        <?php echo $row['deskripsi'] ?>
                                    </p>
                                    <p class="harga">Rp <?php echo number_format($row['harga']) ?></p>
                                    <a href="https://wa.me/6285357617815" target="_blank"
                                       class="btn btn-success w-100">
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
        <div class="bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - Kedai Sopia Manis</small>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

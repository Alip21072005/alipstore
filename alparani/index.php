<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Toko Parfum Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    body {
        background: url('image/background.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>

</head>

<body>
    <!---- header ---->
 <header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Toko Parfum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
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
</header>

    <!--- content --->
    <div class="container section">
        <h3>Toko Parfum</h3>
        <?php
        include 'koneksi.php';
        $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
        if (mysqli_num_rows($produk) > 0) {
            while ($p = mysqli_fetch_array($produk)) {
        ?>
                <div class="card mt-5 mx-auto d-flex justify-content-center" style="width: 500px;">
                    <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top" alt="Produk Parfum">
                    <div class="card-body text-center">
                        <p class="nama"><?php echo $p['namaproduk'] ?></p>
                        <p class="deskripsi"><?php echo $p['deskripsi'] ?></p>
                        <p class="harga">Rp. <?php echo number_format($p['harga'], 0, ',', '.') ?></p>
                        <a href="https://wa.me/6285357617815" target="_blank" class="btn btn-secondary">Beli</a>
                    </div>
                </div>
        <?php  }
        } else { ?>
            <p class="text-center text-danger">Produk belum tersedia</p>
        <?php } ?>
    </div>

    <!--- footer --->
    <footer>
        <div class="bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - Toko Parfum Alpa Online</small>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
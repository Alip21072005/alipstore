<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai Kito Online</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <!---- header ---->
    <header>

        <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="#">goblin store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="row mt-4">
        <?php
include 'koneksi.php';
$produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
if (mysqli_num_rows($produk) > 0) {
    while ($p = mysqli_fetch_array($produk)) {
?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card product-card position-relative h-100">
                <span class="price-badge">Rp <?php echo number_format($p['harga']) ?></span>

                <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top">

                <div class="card-body">
                    <p class="nama"><?php echo $p['namaproduk'] ?></p>
                    <p class="deskripsi"><?php echo $p['deskripsi'] ?></p>

                    <a href="https://wa.me/6287891207306" target="_blank" class="btn btn-pesan">Beli
                    </a>
                </div>
            </div>
        </div>
        <?php }} else { ?>
        <p class="text-center">Produk Tidak Ada</p>
        <?php } ?>
    </div>


    <!--- footer --->
    <footer>
        <div class="mt-5 p-3 text-center footer">
            <small>Copyright &copy; 2025 - goblin store mpruy</small>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
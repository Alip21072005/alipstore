<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <!---- header ---->
    <header>

        <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="#">Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="section">
        <div class="container ">


            <h3>Makanan Minuman Terlaris</h3>
            <?php
            include 'koneksi.php';
            $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
            if (mysqli_num_rows($produk) > 0) {
                while ($p = mysqli_fetch_array($produk)) {
            ?>

                    <div class="card mt-5 mx-auto d-flex justify-content-center" style="width: 500px;">
                        <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="nama"><?php echo $p['namaproduk'] ?></p>
                            <p class="deskripsi"><?php echo $p['deskripsi'] ?></p>
                            <p class="harga">Rp. <?php echo $p['harga'] ?></p>
                            <a href="https://wa.me/6285357617815" target="_blank" class="btn btn-secondary">Beli</a>
                        </div>
                    </div>

                <?php  }
            } else { ?>


                <p>Produk Tidak Ada</p>
            <?php } ?>


        </div>

        <!--- footer --->
        <footer>
            <div class="mt-5 bg-primary text-light p-3 text-center">
                <small>Copyright &copy; 2025 - Kedai Kito Online</small>
            </div>
        </footer>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


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
            
            <h3 class="mb-4">Tas Branded</h3>
            <div class="row">
            <?php
            include 'koneksi.php';
            $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8");
            if (mysqli_num_rows($produk) > 0) {
                while ($p = mysqli_fetch_array($produk)) {
            ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img src="image/<?php echo $p['gambar'] ?>" class="card-img-top" alt="" style="height:200px; object-fit:cover;">

                        <div class="card-body d-flex flex-column">
                            <p class="nama fw-bold"><?php echo $p['namaproduk'] ?></p>
                            <p class="deskripsi small"><?php echo $p['deskripsi'] ?></p>
                            <p class="harga text-danger fw-bold">
                                Rp. <?php echo number_format($p['harga']) ?>
                            </p>

                            <?php
                            $no_wa = "62895322428901";
                            $pesan = "Halo admin, saya ingin order produk:\n".
                                    "Nama Produk : ".$p['namaproduk']."\n".
                                    "Harga : Rp ".$p['harga'];
                            ?>

                            <a href="https://wa.me/<?php echo $no_wa ?>?text=<?php echo urlencode($pesan) ?>"
                            target="_blank"
                            class="btn btn-success mt-auto w-100">
                                <i class="bi bi-whatsapp"></i> Order Via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

            <?php
                }
            } else {
            ?>
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
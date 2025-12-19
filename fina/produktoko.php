<?php
include "koneksi.php";
?>
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
        <nav class="navbar navbar-expand-lg navbar-pink">
            <div class="container">
                <a class="navbar-brand brand-left d-flex align-items-center" href="#">
                <img src="image/logoIncess.jpeg" class="logo" alt="Logo">
                <span>Kedai princess fina</span>
            </a>

                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
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
    </header>

    <!--- content --->
    <div class="section">
        <div class="container ">

            <div class="card mt-5">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="100px">No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) ORDER BY idproduk DESC");
                            if (mysqli_num_rows($produk) > 0) {
                                while ($row = mysqli_fetch_array($produk)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['namaproduk'] ?></td>
                                        <td><?php echo $row['harga'] ?></td>
                                        <td><?php echo $row['deskripsi'] ?></td>
                                        <td><img src="image/<?php echo $row['gambar'] ?>" width=" 70px"></td>


                                        <td>
                                            <a href="https://wa.me/6285357617815" target="_blank" class="btn btn-secondary">Beli</a>

                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="8">Tidak Ada Data</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--- footer --->
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
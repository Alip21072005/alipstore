<?php
include "koneksi.php";
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
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
                            <a class="nav-link" href="kategori.php">Data Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keluar.php">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--- content --->
    <div class="section">
        <div class="container ">
            <h3>Produk</h3>
            <a class="btn btn-primary mb-3" href="tambah_produk.php" role="button">Tambah Data</a>
            <div class="card mb-5">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="100px">No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Status</th>
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
                                        <td><?php echo $row['namakategori'] ?></td>
                                        <td><?php echo $row['namaproduk'] ?></td>
                                        <td><?php echo $row['harga'] ?></td>
                                        <td><?php echo $row['deskripsi'] ?></td>
                                        <td><img src="image/<?php echo $row['gambar'] ?>" width=" 70px"></td>
                                        <td><?php echo $row['status'] ?></td>

                                        <td>
                                            <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>">Edit</a> |
                                            <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>" onclick=" return confirm('Yakin ingin hapus ?')">Hapus</a>
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
    <footer>
        <div class="mt-5 bg-primary text-light p-3 text-center">
            <small>© 2025 kedai Princess Fina.</small>
        </div>
    </footer>

</body>

</html>
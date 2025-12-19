<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
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
                            <a class="nav-link" href="#">Log-Out</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--- content --->
    <div class="section">
        <div class="container ">
            <h3>Kategori Produk</h3>
            <a class="btn btn-primary mb-3" href="tambah_kategori.php" role="button">Tambah Data</a>
            <div class="card mb-5">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="100px">No</th>
                                <th>Kategori</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                            if (mysqli_num_rows($kategori) > 0) {
                                while ($row = mysqli_fetch_array($kategori)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['namakategori'] ?></td>
                                        <td><a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>">Edit</a> |
                                            <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>" onclick=" return confirm('Yakin ingin hapus ?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="3">Tidak Ada Data</td>
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
            <small>Copyright &copy; 2025 - Kedai Kito Online</small>
        </div>
    </footer>

</body>

</html>
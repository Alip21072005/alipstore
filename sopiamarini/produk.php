<?php
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk | Kedai Sopia Manis</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            background-color: #d17af3ff;
        }

        .card {
            border-radius: 15px;
        }

        .table th {
            background-color: #f0c6fdff;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        .img-produk {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
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
                        <a class="nav-link" href="./">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori.php">Data Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="produk.php">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <section class="py-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">📦 Data Produk</h4>
                <a href="tambah_produk.php" class="btn btn-primary">
                    + Tambah Produk
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th width="160">Aksi</th>
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
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td><?php echo $row['namakategori'] ?></td>
                                        <td><?php echo $row['namaproduk'] ?></td>
                                        <td>Rp <?php echo number_format($row['harga']) ?></td>
                                        <td><?php echo $row['deskripsi'] ?></td>
                                        <td class="text-center">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-produk">
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['status'] == 1) { ?>
                                                <span class="badge bg-success badge-status">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge bg-secondary badge-status">Nonaktif</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>" class="btn btn-warning btn-sm text-white">
                                                Edit
                                            </a>
                                            <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                               onclick="return confirm('Yakin ingin hapus ?')"
                                               class="btn btn-danger btn-sm">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        Tidak ada data produk
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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

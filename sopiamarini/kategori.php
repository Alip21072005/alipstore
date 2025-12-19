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
    <title>Kategori Produk | Kedai Sopia Manis</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 15px;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .btn-sm {
            padding: 4px 10px;
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
                        <a class="nav-link active" href="kategori.php">Data Kategori</a>
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

    <!-- CONTENT -->
    <section class="py-5">
        <div class="container">

            <!-- HEADER PAGE -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">📂 Data Kategori Produk</h4>
                <a href="tambah_kategori.php" class="btn btn-primary">
                    + Tambah Kategori
                </a>
            </div>

            <!-- TABLE -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="text-center">
                            <tr>
                                <th width="80">No</th>
                                <th>Nama Kategori</th>
                                <th width="160">Aksi</th>
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
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td><?php echo $row['namakategori'] ?></td>
                                        <td class="text-center">
                                            <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>" class="btn btn-warning btn-sm text-white">
                                                Edit
                                            </a>
                                            <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>"
                                               onclick="return confirm('Yakin ingin hapus ?')"
                                               class="btn btn-danger btn-sm">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        Data kategori belum tersedia
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

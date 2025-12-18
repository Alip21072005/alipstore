<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori | Gabutin CoffeShopOnline</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom Style -->
    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .page-title {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .table thead {
            background-color: #f1f3f5;
        }

        .table th {
            font-weight: 600;
            color: #333;
        }

        .btn-add {
            border-radius: 8px;
            padding: 8px 18px;
        }

        footer {
            margin-top: 80px;
        }
    </style>
</head>

<body>

    <!-- ===== HEADER ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="./">Gabutin CoffeShop</a>
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
                        <a class="nav-link" href="Tambah_menu.php">Tambah Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hapus_menu.php">Hapus Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="keluar.php"
                        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                            Log-Out
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== CONTENT ===== -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="page-title">Kategori Produk</h3>
            <a href="tambah_kategori.php" class="btn btn-primary btn-add">
                + Tambah Data
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Nama Kategori</th>
                            <th width="180" class="text-center">Aksi</th>
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
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['namakategori'] ?></td>
                                    <td class="text-center">
                                        <a href="edit_kategori.php?id=<?= $row['idkategori'] ?>" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <a href="proses_hapus.php?idk=<?= $row['idkategori'] ?>"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="btn btn-sm btn-danger">
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

    <!-- ===== FOOTER ===== -->
    <footer class="bg-primary text-light text-center py-3">
        <small>Copyright &copy; 2025 - Gabutin CoffeShop</small>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

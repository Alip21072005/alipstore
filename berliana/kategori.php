<?php
    session_start();
    include "koneksi.php";

    // Proteksi halaman
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori | Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    /* CSS untuk memastikan footer tetap di bawah */
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
    }

    .section {
        flex: 1 0 auto;
        /* Membuat konten utama mengisi ruang kosong */
        padding-top: 30px;
    }

    .card {
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border-radius: 10px;
    }

    .table thead {
        background-color: #f1f3f5;
    }

    footer {
        flex-shrink: 0;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="dashboard.php">Najwa Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white px-3 ms-lg-2"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Kategori Produk</h3>
                <a class="btn btn-primary" href="tambah_kategori.php" role="button">
                    <i class="bi bi-plus-circle"></i> Tambah Kategori
                </a>
            </div>

            <div class="card mb-5">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="80px" class="ps-4">No</th>
                                    <th>Nama Kategori</th>
                                    <th width="200px" class="text-center">Aksi</th>
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
                                    <td class="ps-4 text-muted"><?php echo $no++ ?></td>
                                    <td class="fw-semibold"><?php echo $row['namakategori'] ?></td>
                                    <td class="text-center">
                                        <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>"
                                            class="btn btn-sm btn-outline-warning">Edit</a>
                                        <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php }
                                    } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Data kategori tidak ditemukan.
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-light py-3">
        <div class="container text-center">
            <small>Copyright &copy; 2025 - <strong>Najwa Store</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
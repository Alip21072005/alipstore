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
    <title>Data Kategori | Nada Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
    /* Admin Design System - Nada */
    html,
    body {
        height: 100%;
        font-family: 'Inter', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f9fafb;
    }

    .navbar {
        background-color: #111827 !important;
        padding: 0.8rem 0;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #0d9488 !important;
    }

    .section {
        flex: 1 0 auto;
        padding: 40px 0;
    }

    /* Card & Table Styling */
    .card-custom {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .table thead th {
        background-color: #f8fafc;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #64748b;
        padding: 18px;
        border-bottom: 2px solid #f1f5f9;
    }

    .table tbody td {
        padding: 18px;
        vertical-align: middle;
    }

    /* Button Styling */
    .btn-add {
        background-color: #0d9488;
        border: none;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        background-color: #0f766e;
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.2);
    }

    .btn-action {
        border-radius: 8px;
        font-weight: 500;
        padding: 5px 15px;
    }

    footer {
        background: #fff;
        border-top: 1px solid #e5e7eb;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">NADA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-danger btn-sm px-4 rounded-pill" href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-0 text-dark">Manajemen Kategori</h3>
                    <p class="text-muted small mb-0">Atur pengelompokan produk toko Anda</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a class="btn btn-primary btn-add" href="tambah_kategori.php" role="button">
                        <i class="bi bi-plus-lg me-2"></i>Tambah Kategori
                    </a>
                </div>
            </div>

            <div class="card card-custom shadow-sm mb-5">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="100px" class="ps-4">ID / No</th>
                                    <th>Nama Kategori</th>
                                    <th width="250px" class="text-center pe-4">Aksi Kelola</th>
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
                                    <td class="ps-4 text-muted fw-medium"><?php echo $no++ ?></td>
                                    <td>
                                        <span class="fw-bold text-dark"><?php echo $row['namakategori'] ?></span>
                                    </td>
                                    <td class="text-center pe-4">
                                        <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>"
                                            class="btn btn-sm btn-outline-warning btn-action me-2">
                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                        </a>
                                        <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>"
                                            class="btn btn-sm btn-outline-danger btn-action"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            <i class="bi bi-trash3 me-1"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                    } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-folder2-open fs-1 d-block mb-2"></i>
                                            Belum ada kategori yang ditambahkan.
                                        </div>
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

    <footer class="py-4">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 — <strong>Nada Management Panel</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
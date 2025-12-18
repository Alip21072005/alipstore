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
    <title>Data Produk | Nada Admin</title>
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

    /* Product Image Styling */
    .img-product {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #fff;
        transition: transform 0.2s;
    }

    .img-product:hover {
        transform: scale(1.15);
    }

    /* Table & Card Custom */
    .card-custom {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .table thead th {
        background-color: #f8fafc;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 1px;
        color: #64748b;
        padding: 18px;
        border-bottom: 2px solid #f1f5f9;
    }

    .table tbody td {
        padding: 15px 18px;
        vertical-align: middle;
    }

    .badge-pill {
        border-radius: 50px;
        padding: 5px 12px;
        font-weight: 600;
        font-size: 0.75rem;
    }

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
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="produk.php">Produk</a></li>
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
                    <h3 class="fw-bold mb-0 text-dark">Inventaris Produk</h3>
                    <p class="text-muted small mb-0">Kelola semua daftar menu dan produk Anda</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a class="btn btn-primary btn-add" href="tambah_produk.php" role="button">
                        <i class="bi bi-plus-lg me-2"></i>Tambah Produk
                    </a>
                </div>
            </div>

            <div class="card card-custom shadow-sm mb-5">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="70px" class="ps-4">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Preview</th>
                                    <th>Status</th>
                                    <th width="180px" class="text-center pe-4">Aksi</th>
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
                                    <td class="ps-4 text-muted fw-medium"><?php echo $no++ ?></td>
                                    <td>
                                        <span
                                            class="badge bg-light text-dark border fw-medium"><?php echo $row['namakategori'] ?></span>
                                    </td>
                                    <td><span class="fw-bold text-dark"><?php echo $row['namaproduk'] ?></span></td>
                                    <td><span class="text-primary fw-bold">Rp
                                            <?php echo number_format($row['harga'], 0, ',', '.') ?></span></td>
                                    <td>
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-product shadow-sm"
                                                alt="Produk">
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 1): ?>
                                        <span class="badge badge-pill bg-success text-white">Aktif</span>
                                        <?php else: ?>
                                        <span class="badge badge-pill bg-danger text-white">Non-Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="btn-group" role="group">
                                            <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>"
                                                class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                                class="btn btn-sm btn-outline-danger" title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }
                                } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-box-seam fs-1 text-muted d-block mb-2"></i>
                                        <span class="text-muted">Tidak ada data produk ditemukan.</span>
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
            <small class="text-muted">Copyright &copy; 2025 — <strong>Nada Management System</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
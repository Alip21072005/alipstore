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
    <title>Data Kategori | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    /* Admin Design System - Yunda (Pink & White Theme) */
    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #fffafb;
        /* Background putih dengan hint pink sangat tipis */
    }

    .navbar {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%) !important;
        padding: 1rem 0;
        border-bottom: 4px solid #ffb3c1;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #ffffff !important;
    }

    .section {
        flex: 1 0 auto;
        padding: 40px 0;
    }

    /* Card & Table Styling */
    .card-custom {
        border: 1px solid #ffe5ec;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(255, 77, 109, 0.05);
        overflow: hidden;
        background: #ffffff;
    }

    .table thead th {
        background-color: #fff0f3;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #c9184a;
        padding: 20px;
        border-bottom: none;
    }

    .table tbody td {
        padding: 20px;
        vertical-align: middle;
        border-bottom: 1px solid #fff0f3;
    }

    /* Button Styling */
    .btn-add {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        border: none;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 700;
        transition: 0.3s;
        color: white;
    }

    .btn-add:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        box-shadow: 0 8px 15px rgba(255, 77, 109, 0.3);
        color: white;
        transform: translateY(-2px);
    }

    .btn-action {
        border-radius: 10px;
        font-weight: 600;
        padding: 6px 16px;
        transition: 0.2s;
    }

    .btn-outline-warning {
        color: #ffb703;
        border-color: #ffb703;
    }

    .btn-outline-warning:hover {
        background-color: #ffb703;
        color: white;
    }

    footer {
        background: #ffffff;
        border-top: 1px solid #ffe5ec;
        color: #ff4d6d;
    }

    .nav-link {
        font-weight: 500;
        opacity: 0.85;
    }

    .nav-link.active {
        font-weight: 800 !important;
        opacity: 1;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php"><i class="bi bi-shield-lock-fill me-2"></i>YUNDA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-light btn-sm px-4 rounded-pill text-danger fw-bold"
                                href="keluar.php">Logout</a>
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
                    <h3 class="fw-extrabold mb-0" style="color: #590d22;">Manajemen Kategori</h3>
                    <p class="text-muted small mb-0">Kelola kategori produk untuk <strong>Toko Yunda</strong></p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a class="btn btn-add" href="tambah_kategori.php" role="button">
                        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Kategori Baru
                    </a>
                </div>
            </div>

            <div class="card card-custom mb-5">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="120px" class="ps-4 text-center">No.</th>
                                    <th>Nama Kategori Produk</th>
                                    <th width="300px" class="text-center pe-4">Opsi Pengaturan</th>
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
                                    <td class="ps-4 text-center">
                                        <span
                                            class="badge rounded-pill bg-light text-dark px-3 py-2 border"><?php echo $no++ ?></span>
                                    </td>
                                    <td>
                                        <span class="fw-bold"
                                            style="color: #590d22; font-size: 1.05rem;"><?php echo $row['namakategori'] ?></span>
                                    </td>
                                    <td class="text-center pe-4">
                                        <a href="edit_kategori.php?id=<?php echo $row['idkategori'] ?>"
                                            class="btn btn-sm btn-outline-warning btn-action me-2">
                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                        </a>
                                        <a href="proses_hapus.php?idk=<?php echo $row['idkategori'] ?>"
                                            class="btn btn-sm btn-outline-danger btn-action"
                                            onclick="return confirm('Yakin ingin menghapus kategori <?php echo $row['namakategori'] ?>?')">
                                            <i class="bi bi-trash3 me-1"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                    } else { ?>
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-folder-x fs-1 d-block mb-3" style="color: #ffb3c1;"></i>
                                            <p class="mb-0">Belum ada kategori yang ditambahkan.</p>
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

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; 2025 — <strong>Yunda Management Panel</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
    <title>Data Produk | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    /* Admin Design System - Yunda (Pink & White) */
    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #fffafb;
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

    /* Product Image Styling */
    .img-product {
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 15px;
        border: 2px solid #ffe5ec;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .img-product:hover {
        transform: scale(1.2) rotate(3deg);
        box-shadow: 0 5px 15px rgba(255, 77, 109, 0.2);
    }

    /* Table & Card Custom */
    .card-custom {
        border: 1px solid #ffe5ec;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(255, 77, 109, 0.05);
        overflow: hidden;
        background: white;
    }

    .table thead th {
        background-color: #fff0f3;
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #ff4d6d;
        padding: 20px;
        border-bottom: none;
    }

    .table tbody td {
        padding: 18px 20px;
        vertical-align: middle;
        color: #590d22;
        border-bottom: 1px solid #fff0f3;
    }

    .badge-status {
        border-radius: 10px;
        padding: 6px 14px;
        font-weight: 700;
        font-size: 0.7rem;
        text-transform: uppercase;
    }

    .btn-add {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        border: none;
        padding: 12px 28px;
        border-radius: 15px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 77, 109, 0.25);
        color: white;
    }

    .btn-action {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: 0.2s;
    }

    footer {
        background: #fff;
        border-top: 1px solid #ffe5ec;
        color: #ff758f;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php"><i class="bi bi-heart-fill me-2"></i>YUNDA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold text-white" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-light btn-sm px-4 rounded-pill text-danger fw-bold shadow-sm"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-md-6 text-center text-md-start">
                    <h2 class="fw-800" style="color: #590d22;">Inventaris Produk</h2>
                    <p class="text-muted mb-0">Kelola koleksi item cantik di toko Anda ✨</p>
                </div>
                <div class="col-md-6 text-md-end mt-4 mt-md-0 text-center">
                    <a class="btn btn-add" href="tambah_produk.php" role="button">
                        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Produk Baru
                    </a>
                </div>
            </div>

            <div class="card card-custom mb-5">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th width="80px" class="ps-4">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Jual</th>
                                    <th>Preview</th>
                                    <th>Status</th>
                                    <th width="150px" class="text-center pe-4">Opsi</th>
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
                                    <td class="ps-4 fw-bold text-muted"><?php echo $no++ ?></td>
                                    <td>
                                        <span
                                            class="badge bg-soft-pink border border-danger-subtle text-danger px-3 py-2"
                                            style="background-color: #fff0f3;">
                                            <?php echo $row['namakategori'] ?>
                                        </span>
                                    </td>
                                    <td><span class="fw-bold"><?php echo $row['namaproduk'] ?></span></td>
                                    <td>
                                        <span class="fw-800" style="color: #ff4d6d;">
                                            Rp <?php echo number_format($row['harga'], 0, ',', '.') ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-product shadow-sm"
                                                alt="Produk">
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 1): ?>
                                        <span
                                            class="badge badge-status bg-success bg-opacity-10 text-success border border-success-subtle">
                                            <i class="bi bi-check-circle-fill me-1"></i> Aktif
                                        </span>
                                        <?php else: ?>
                                        <span
                                            class="badge badge-status bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle">
                                            <i class="bi bi-eye-slash-fill me-1"></i> Hidden
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>"
                                                class="btn-action btn btn-sm btn-outline-warning" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                                class="btn-action btn btn-sm btn-outline-danger" title="Hapus Data"
                                                onclick="return confirm('Hapus produk cantik ini?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }
                                } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="py-4">
                                            <i class="bi bi-box2-heart fs-1 text-pink-light d-block mb-3"
                                                style="color: #ffb3c1;"></i>
                                            <h5 class="text-muted fw-bold">Belum ada produk, nih...</h5>
                                            <p class="text-muted small">Mulai tambahkan produk pertamamu sekarang!</p>
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
            <small>Copyright &copy; 2025 — <strong>Yunda Management System</strong> 💖</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
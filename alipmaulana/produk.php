<?php
    include "koneksi.php";
    session_start();

    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk | Kedai Kito Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f6;
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    /* Thumbnail Style */
    .prod-img {
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #eee;
        transition: transform 0.3s;
    }

    .prod-img:hover {
        transform: scale(1.5);
        position: relative;
        z-index: 10;
    }

    .btn-action {
        transition: all 0.3s;
        border-radius: 8px;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop me-2"></i>Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white ms-lg-2 px-3"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0 text-dark">Daftar Produk</h3>
                <p class="text-muted">Kelola stok dan informasi menu kedai Anda</p>
            </div>
            <a class="btn btn-primary px-4 py-2 shadow-sm rounded-pill" href="tambah_produk.php">
                <i class="bi bi-plus-circle me-2"></i>Tambah Produk
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
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
                                <td><span
                                        class="badge bg-secondary bg-opacity-10 text-secondary px-2"><?php echo $row['namakategori'] ?></span>
                                </td>
                                <td class="fw-semibold"><?php echo $row['namaproduk'] ?></td>
                                <td class="text-primary fw-bold">Rp
                                    <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                        <img src="image/<?php echo $row['gambar'] ?>" width="60px" height="60px"
                                            class="prod-img shadow-sm">
                                    </a>
                                </td>
                                <td>
                                    <?php if($row['status'] == 1 || $row['status'] == 'Aktif'): ?>
                                    <span
                                        class="badge rounded-pill bg-success-subtle text-success border border-success px-3">Aktif</span>
                                    <?php else: ?>
                                    <span
                                        class="badge rounded-pill bg-danger-subtle text-danger border border-danger px-3">Tidak
                                        Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>"
                                        class="btn btn-sm btn-outline-primary btn-action me-1" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                        class="btn btn-sm btn-outline-danger btn-action"
                                        onclick="return confirm('Hapus produk ini?')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-box2-heart fs-1 d-block mb-2"></i>
                                    Belum ada produk yang terdaftar.
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 shadow-sm">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Kedai Kito Online</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
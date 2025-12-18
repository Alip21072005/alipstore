<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk | Nada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
    /* Desain Eksklusif Nada */
    html,
    body {
        height: 100%;
        font-family: 'Inter', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f4f7f6;
    }

    /* Navbar Sync */
    .navbar {
        background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%) !important;
    }

    .container-content {
        flex: 1 0 auto;
        padding: 60px 0;
    }

    /* Tabel & Kartu Modern */
    .card-table {
        border-radius: 20px;
        overflow: hidden;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .table thead {
        background-color: #f8fafc;
    }

    .table thead th {
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #64748b;
        padding: 20px;
        border-bottom: 2px solid #f1f5f9;
    }

    .img-table {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .img-table:hover {
        transform: scale(1.1);
    }

    .harga-text {
        color: #0d9488;
        font-weight: 700;
    }

    /* Tombol Beli */
    .btn-buy {
        background-color: #0d9488;
        color: white;
        border-radius: 50px;
        font-weight: 600;
        padding: 6px 20px;
        transition: 0.3s;
        border: none;
    }

    .btn-buy:hover {
        background-color: #115e59;
        color: white;
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.2);
    }

    footer {
        background: #111827 !important;
        color: #94a3b8 !important;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="bi bi-bag-heart-fill me-2"></i>NADA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produktoko.php">Produk</a></li>
                        <li class="nav-item ms-lg-3"><a class="btn btn-outline-light btn-sm px-3 rounded-pill"
                                href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-content">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-lg-12">
                    <h2 class="fw-bold text-dark">Daftar Menu Pilihan</h2>
                    <p class="text-muted">Kualitas terbaik dengan rasa yang tak terlupakan</p>
                </div>
            </div>

            <div class="card card-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Produk</th>
                                    <th>Detail Nama</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC");
                                    if (mysqli_num_rows($produk) > 0) {
                                        while ($row = mysqli_fetch_array($produk)) {
                                ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-muted"><?php echo $no++ ?></td>
                                    <td>
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-table"
                                                alt="Produk">
                                        </a>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark d-block"><?php echo $row['namaproduk'] ?></span>
                                    </td>
                                    <td>
                                        <span class="harga-text">Rp
                                            <?php echo number_format($row['harga'], 0, ',', '.') ?></span>
                                    </td>
                                    <td class="small text-muted" style="max-width: 300px;">
                                        <?php echo $row['deskripsi'] ?>
                                    </td>
                                    <td class="text-center pe-4">
                                        <a href="https://wa.me/6287873801781?text=Halo Nada, saya ingin memesan produk: <?php echo urlencode($row['namaproduk']) ?>"
                                            target="_blank" class="btn btn-buy shadow-sm">
                                            <i class="bi bi-cart-plus me-1"></i> Beli
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                    } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-muted d-block mb-2"></i>
                                        <span class="text-muted">Menu belum tersedia saat ini.</span>
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
            <small class="fw-medium">Copyright &copy; 2025 - <span class="text-white">Nada</span>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
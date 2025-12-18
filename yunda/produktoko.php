<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Menu Cantik | Yunda Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    /* Desain Eksklusif Yunda Store */
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

    /* Navbar Pink Gradient */
    .navbar {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%) !important;
        padding: 0.8rem 0;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1px;
    }

    .container-content {
        flex: 1 0 auto;
        padding: 60px 0;
    }

    /* Tabel & Kartu Modern */
    .card-table {
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid #ffe5ec;
        box-shadow: 0 15px 35px rgba(255, 77, 109, 0.08);
        background: white;
    }

    .table thead {
        background-color: #fff0f3;
    }

    .table thead th {
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1.5px;
        color: #ff4d6d;
        padding: 22px;
        border-bottom: none;
    }

    .img-table {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 20px;
        border: 3px solid #fff0f3;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .img-table:hover {
        transform: scale(1.1) rotate(-3deg);
        box-shadow: 0 10px 20px rgba(255, 77, 109, 0.15);
    }

    .harga-text {
        color: #ff4d6d;
        font-weight: 800;
        font-size: 1.1rem;
    }

    /* Tombol Beli WhatsApp */
    .btn-buy {
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        color: white;
        border-radius: 15px;
        font-weight: 700;
        padding: 10px 24px;
        transition: 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-buy:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
        color: white;
    }

    .badge-category {
        background-color: #fff0f3;
        color: #ff758f;
        font-weight: 700;
        font-size: 0.7rem;
        padding: 5px 12px;
        border-radius: 8px;
        text-transform: uppercase;
    }

    footer {
        background: #590d22 !important;
        color: #ffb3c1 !important;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="bi bi-heart-fill me-2"></i>YUNDA STORE
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="produktoko.php">Menu Kami</a></li>
                        <li class="nav-item ms-lg-3"><a
                                class="btn btn-light btn-sm px-4 rounded-pill fw-bold text-danger shadow-sm"
                                href="login.php">Login Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-content">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-lg-12">
                    <h1 class="fw-800" style="color: #590d22;">Daftar Menu Favorit ✨</h1>
                    <p class="text-muted">Pilih menu spesial yang kamu suka dan pesan sekarang juga!</p>
                </div>
            </div>

            <div class="card card-table">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi Menu</th>
                                    <th class="text-center pe-4">Pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    // Mengambil data produk aktif beserta kategori
                                    $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) WHERE status = 1 ORDER BY idproduk DESC");
                                    if (mysqli_num_rows($produk) > 0) {
                                        while ($row = mysqli_fetch_array($produk)) {
                                ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-muted"><?php echo $no++ ?></td>
                                    <td>
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-table"
                                                alt="<?php echo $row['namaproduk'] ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="badge-category mb-1"><?php echo $row['namakategori'] ?></div>
                                        <span
                                            class="fw-bold text-dark d-block fs-5"><?php echo $row['namaproduk'] ?></span>
                                    </td>
                                    <td>
                                        <span class="harga-text">Rp
                                            <?php echo number_format($row['harga'], 0, ',', '.') ?></span>
                                    </td>
                                    <td class="small text-muted" style="max-width: 350px;">
                                        <?php echo $row['deskripsi'] ?>
                                    </td>
                                    <td class="text-center pe-4">
                                        <a href="https://wa.me/6287873801781?text=Halo Yunda Store, saya mau pesan menu: <?php echo urlencode($row['namaproduk']) ?>"
                                            target="_blank" class="btn btn-buy shadow-sm">
                                            <i class="bi bi-whatsapp"></i> Order Via WA
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                    } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="py-4">
                                            <i class="bi bi-stars fs-1 text-pink-light d-block mb-3"
                                                style="color: #ffb3c1;"></i>
                                            <h5 class="text-muted fw-bold">Menu sedang dipersiapkan...</h5>
                                            <p class="text-muted small">Cek kembali beberapa saat lagi ya!</p>
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
            <small class="fw-medium text-white-50">Copyright &copy; 2025 - <strong class="text-white">Yunda
                    Store</strong>. Made with 💖</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
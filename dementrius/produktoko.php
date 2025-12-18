<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk | Kedai gue Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); overflow: hidden; }
        .table thead { background-color: #f8f9fa; }
        .img-thumbnail-custom { 
            width: 70px; height: 70px; object-fit: cover; border-radius: 10px;
            transition: transform 0.3s; cursor: pointer;
        }
        .img-thumbnail-custom:hover { transform: scale(1.2); }
        .price-tag { color: #0d6efd; font-weight: 600; }
        .btn-wa { background-color: #25d366; color: white; border-radius: 10px; font-weight: 500; transition: 0.3s; border: none; }
        .btn-wa:hover { background-color: #128c7e; color: white; transform: translateY(-2px); }
        footer { background: #fff; border-top: 1px solid #eee; }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
            <div class="container">
                <a class="navbar-brand fw-bold" href="dashboard.php"><i class="fas fa-store me-2"></i>Kedai gue</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="produk.php">Data Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5 mb-5">
        <div class="row mb-4">
            <div class="col">
                <h3 class="fw-bold text-dark"><i class="fas fa-box-open text-primary me-2"></i>Katalog Produk</h3>
                <p class="text-muted">Daftar produk tersedia di Kedai gue Online</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4 py-3" width="80px">No</th>
                                <th class="py-3">Gambar</th>
                                <th class="py-3">Nama Produk</th>
                                <th class="py-3">Harga</th>
                                <th class="py-3">Deskripsi</th>
                                <th class="py-3 text-center" width="120px">Aksi</th>
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
                                        <img src="image/<?php echo $row['gambar'] ?>" class="img-thumbnail-custom shadow-sm" alt="produk">
                                    </td>
                                    <td>
                                        <span class="fw-semibold d-block"><?php echo $row['namaproduk'] ?></span>
                                        <small class="text-muted"><i class="fas fa-tag me-1"></i><?php echo $row['namakategori'] ?></small>
                                    </td>
                                    <td class="price-tag">Rp <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td class="text-muted small"><?php echo (strlen($row['deskripsi']) > 50) ? substr($row['deskripsi'], 0, 50) . '...' : $row['deskripsi']; ?></td>
                                    <td class="text-center">
                                        <a href="https://wa.me/6282281407734?text=Halo, saya ingin membeli produk <?php echo $row['namaproduk'] ?>" target="_blank" class="btn btn-wa btn-sm px-3">
                                            <i class="fab fa-whatsapp me-1"></i> Beli
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fas fa-shopping-basket fa-3x mb-3 d-block opacity-25"></i>
                                        Belum ada produk tersedia.
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5">
        <div class="container text-center text-muted">
            <small>Copyright &copy; 2025 - <b>Kedai gue Online</b>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
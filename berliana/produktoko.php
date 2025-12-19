<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk | Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    /* Pengaturan agar footer tetap di bawah */
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
    }

    .container-content {
        flex: 1 0 auto;
        padding: 40px 0;
    }

    /* Styling Gambar Produk */
    .img-table {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .table align-middle td {
        vertical-align: middle;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Najwa Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="produktoko.php">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-content">
        <div class="container">
            <h3 class="mb-4 fw-bold text-center">Daftar Menu Kami</h3>

            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="70px" class="ps-3">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th width="120px" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    // Hanya menampilkan produk dengan status aktif (status = 1)
                                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC");
                                    if (mysqli_num_rows($produk) > 0) {
                                        while ($row = mysqli_fetch_array($produk)) {
                                ?>
                                <tr>
                                    <td class="ps-3 fw-bold text-muted"><?php echo $no++ ?></td>
                                    <td>
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-table">
                                        </a>
                                    </td>
                                    <td class="fw-bold"><?php echo $row['namaproduk'] ?></td>
                                    <td class="text-primary fw-bold">Rp
                                        <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td class="small text-muted"><?php echo $row['deskripsi'] ?></td>
                                    <td class="text-center">
                                        <a href="https://wa.me/6289693320805?text=Halo Najwa Store, saya ingin memesan <?php echo $row['namaproduk'] ?>"
                                            target="_blank" class="btn btn-success btn-sm px-3">
                                            Beli
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                    } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Produk belum tersedia</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-light py-3 mt-auto shadow-lg">
        <div class="container text-center">
            <small>Copyright &copy; 2025 - <strong>Najwa Store</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
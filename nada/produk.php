<?php
    session_start();
    include "koneksi.php";

    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk | Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
    /* SOLUSI AGAR FOTO TIDAK TERLALU BESAR */
    .img-product {
        width: 80px;
        /* Lebar tetap */
        height: 80px;
        /* Tinggi tetap */
        object-fit: cover;
        /* Memotong gambar secara proporsional agar tidak gepeng */
        border-radius: 8px;
        /* Sudut melengkung agar rapi */
        border: 1px solid #ddd;
    }

    /* Merapikan tabel agar konten di tengah secara vertikal */
    .table align-middle td,
    .table align-middle th {
        vertical-align: middle;
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
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produk.php">Data Produk</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-danger btn-sm text-white ms-2 px-3"
                                href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section mt-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Data Produk</h3>
                <a class="btn btn-primary shadow-sm" href="tambah_produk.php" role="button">
                    + Tambah Data
                </a>
            </div>

            <div class="card shadow-sm mb-5">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="70px" class="ps-3">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th width="150px" class="text-center">Aksi</th>
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
                                    <td class="ps-3 fw-bold text-muted"><?php echo $no++ ?></td>
                                    <td><span
                                            class="badge bg-secondary opacity-75"><?php echo $row['namakategori'] ?></span>
                                    </td>
                                    <td class="fw-semibold"><?php echo $row['namaproduk'] ?></td>
                                    <td class="text-primary fw-bold">Rp
                                        <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td>
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="img-product shadow-sm"
                                                alt="Produk">
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 1): ?>
                                        <span class="badge bg-success">Aktif</span>
                                        <?php else: ?>
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>"
                                            class="btn btn-sm btn-outline-warning">Edit</a>
                                        <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php }
                                } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">Tidak Ada Data Produk</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed-bottom bg-white border-top">
        <div class="p-3 text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Najwa Store</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
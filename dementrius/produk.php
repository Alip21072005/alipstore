<?php
session_start();
include "koneksi.php";

// Proteksi Halaman Admin
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk | Kedai gue Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .section { padding: 40px 0; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .table thead { background-color: #f8f9fa; border-bottom: 2px solid #dee2e6; }
        .img-product { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd; }
        .badge-status { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .btn-action { border-radius: 8px; padding: 5px 10px; font-size: 13px; }
        footer { background: #fff; border-top: 1px solid #eee; }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4" href="dashboard.php"><i class="fas fa-store me-2"></i>Kedai gue</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-light btn-sm px-4 rounded-pill" href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h3 class="fw-bold m-0"><i class="fas fa-box text-primary me-2"></i>Data Produk</h3>
                </div>
                <div class="col-md-6 text-md-end">
                    <a class="btn btn-primary px-4 fw-bold shadow-sm" href="tambah_produk.php" style="border-radius: 10px;">
                        <i class="fas fa-plus me-2"></i>Tambah Produk
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                            <thead class="table-light text-muted small text-uppercase">
                                <tr>
                                    <th class="ps-4 py-3" width="70px">No</th>
                                    <th class="py-3">Kategori</th>
                                    <th class="py-3">Produk</th>
                                    <th class="py-3">Harga</th>
                                    <th class="py-3">Deskripsi</th>
                                    <th class="py-3">Gambar</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3 text-center" width="160px">Aksi</th>
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
                                        <td class="ps-4 fw-bold"><?php echo $no++ ?></td>
                                        <td><span class="badge bg-light text-primary border"><?php echo $row['namakategori'] ?></span></td>
                                        <td class="fw-semibold"><?php echo $row['namaproduk'] ?></td>
                                        <td class="text-success fw-bold">Rp <?php echo number_format($row['harga']) ?></td>
                                        <td class="small text-muted"><?php echo (strlen($row['deskripsi']) > 40) ? substr($row['deskripsi'], 0, 40) . '...' : $row['deskripsi']; ?></td>
                                        <td>
                                            <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                                <img src="image/<?php echo $row['gambar'] ?>" class="img-product shadow-sm">
                                            </a>
                                        </td>
                                        <td>
                                            <?php if($row['status'] == 1): ?>
                                                <span class="badge-status bg-success-subtle text-success border border-success-subtle">Aktif</span>
                                            <?php else: ?>
                                                <span class="badge-status bg-danger-subtle text-danger border border-danger-subtle">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a title="Edit" href="edit_produk.php?id=<?php echo $row['idproduk'] ?>" class="btn btn-outline-warning btn-sm btn-action">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a title="Hapus" href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>" class="btn btn-outline-danger btn-sm btn-action" onclick="return confirm('Yakin ingin hapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-5 text-muted">
                                            <i class="fas fa-box-open fa-3x mb-3 d-block opacity-25"></i>
                                            Belum ada data produk.
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
        <div class="container text-center text-muted small">
            Copyright &copy; 2025 - <b>Kedai gue Online</b>. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
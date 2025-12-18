<?php
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Produk | Tokoh Buah Being Muhammad Online</title>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
}
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: #0d6efd;
}
.sidebar a {
    color: #fff;
    text-decoration: none;
}
.sidebar a:hover {
    background: rgba(255,255,255,.15);
}
.card {
    border-radius: 1rem;
}
.table thead {
    background: #0d6efd;
    color: #fff;
}
.img-thumb {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: .5rem;
}
.badge-status {
    font-size: .8rem;
}
</style>
</head>

<body>

<div class="d-flex">

<!-- SIDEBAR -->
<div class="sidebar p-4">
    <h5 class="fw-bold mb-4">
        🍉 Tokoh Buah<br>
        Being Muhammad Online
    </h5>

    <a href="dashboard.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="kategori.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-tags"></i> Data Kategori
    </a>
    <a href="produk.php" class="d-block p-2 rounded mb-2 bg-white text-primary fw-bold">
        <i class="bi bi-box"></i> Data Produk
    </a>
    <a href="logout.php" class="d-block p-2 rounded mb-2 text-warning">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>
</div>

<!-- MAIN CONTENT -->
<div class="flex-fill p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📦 Data Produk</h3>
        <a href="tambah_produk.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>
    </div>

    <!-- CARD TABLE -->
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th width="200">Gambar</th>
                            <th>Status</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $produk = mysqli_query(
                        $conn,
                        "SELECT * FROM produk 
                         LEFT JOIN kategori USING (idkategori)
                         ORDER BY idproduk DESC"
                    );

                    if (mysqli_num_rows($produk) > 0) {
                        while ($row = mysqli_fetch_array($produk)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['namakategori'] ?></td>
                            <td>
                                <strong><?= $row['namaproduk'] ?></strong><br>
                                <small class="text-muted">
                                    Rp <?= number_format($row['harga']) ?>
                                </small>
                            </td>
                            <td>Rp <?= number_format($row['harga']) ?></td>
                            <td>
                                <img src="image/<?= $row['gambar'] ?>" class="img-thumb">
                            </td>
                            <td>
                                <?= $row['status'] == 1
                                    ? '<span class="badge bg-success badge-status">Aktif</span>'
                                    : '<span class="badge bg-danger badge-status">Nonaktif</span>'; ?>
                            </td>
                            <td class="text-center">
                                <a href="edit_produk.php?id=<?= $row['idproduk'] ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="proses_hapus.php?idp=<?= $row['idproduk'] ?>"
                                   onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                   class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }} else { ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Data produk belum tersedia
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="mt-5 text-center text-muted">
        <small>
            &copy; 2025 — <b>Tokoh Buah Being Muhammad Online</b>
        </small>
    </footer>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include "auth.php";
include "koneksi.php";

$kategori      = mysqli_query($conn, "SELECT * FROM kategori");
$totalProduk  = mysqli_query($conn, "SELECT * FROM produk");
$produk       = mysqli_query($conn, "SELECT * FROM produk ORDER BY idproduk DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard | Tokoh Buah Being Muhammad Online</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root {
    --bg: #f4f6f9;
    --card: #ffffff;
    --text: #212529;
}
body.dark {
    --bg: #121212;
    --card: #1e1e1e;
    --text: #f1f1f1;
}
body {
    background: var(--bg);
    color: var(--text);
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
.sidebar a:hover,
.sidebar a.active {
    background: rgba(255,255,255,.2);
}
.card {
    background: var(--card);
    border-radius: 1rem;
}
</style>
</head>

<body>

<div class="d-flex">

<!-- SIDEBAR -->
<div class="sidebar p-4">
    <h5 class="fw-bold mb-4">
        🍉 Tokoh Buah<br>Being Muhammad Online
    </h5>

    <a href="dashboard.php" class="d-block p-2 rounded mb-2 active">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="kategori.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-tags me-2"></i> Data Kategori
    </a>
    <a href="produk.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-box me-2"></i> Data Produk
    </a>
    <a href="logout.php" class="d-block p-2 rounded mb-2 text-warning">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>

    <hr class="text-light">

    <button class="btn btn-light btn-sm w-100" onclick="toggleDark()">
        🌙 Dark Mode
    </button>
</div>

<!-- MAIN CONTENT -->
<div class="flex-fill p-4">

    <h3 class="fw-bold mb-4">Dashboard Admin</h3>

    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="text-muted">Total Kategori</h6>
                <h2 class="fw-bold"><?= mysqli_num_rows($kategori); ?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="text-muted">Total Produk</h6>
                <h2 class="fw-bold"><?= mysqli_num_rows($totalProduk); ?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="text-muted">Status Admin</h6>
                <h2 class="fw-bold text-success">Online</h2>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow-sm p-4">
        <h5 class="fw-bold mb-3">Produk Terbaru</h5>
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($p = mysqli_fetch_array($produk)) { ?>
                    <tr>
                        <td><?= $p['namaproduk']; ?></td>
                        <td>Rp <?= number_format($p['harga'],0,',','.'); ?></td>
                        <td>
                            <?= $p['status'] == 1 
                                ? '<span class="badge bg-success">Aktif</span>' 
                                : '<span class="badge bg-danger">Nonaktif</span>'; ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="mt-5 text-center text-muted">
        <small>&copy; 2025 — <b>Tokoh Buah Being Muhammad Online</b></small>
    </footer>

</div>
</div>

<script>
function toggleDark(){
    document.body.classList.toggle("dark");
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include "auth.php";
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo '<script>window.location="kategori.php"</script>';
}

$kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE idkategori = '".$_GET['id']."'");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="kategori.php"</script>';
}

$k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Kategori | Tokoh Buah Being Muhammad Online</title>

<!-- Bootstrap -->
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
.sidebar a:hover,
.sidebar a.active {
    background: rgba(255,255,255,.2);
}
.card {
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

    <a href="dashboard.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="kategori.php" class="d-block p-2 rounded mb-2 active">
        <i class="bi bi-tags me-2"></i> Data Kategori
    </a>
    <a href="produk.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-box me-2"></i> Data Produk
    </a>
    <a href="logout.php" class="d-block p-2 rounded mb-2 text-warning">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
</div>

<!-- MAIN CONTENT -->
<div class="flex-fill p-4">

    <h3 class="fw-bold mb-4">Edit Kategori</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nama Kategori
                            </label>
                            <input type="text"
                                   class="form-control"
                                   name="kategori"
                                   value="<?= $k->namakategori; ?>"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="kategori.php" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" name="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $nama = ucwords($_POST['kategori']);

                        $update = mysqli_query($conn, "UPDATE kategori SET 
                            namakategori = '".$nama."'
                            WHERE idkategori = '".$k->idkategori."'
                        ");

                        if ($update) {
                            echo '<script>alert("Kategori berhasil diperbarui"); window.location="kategori.php";</script>';
                        } else {
                            echo 'Gagal: '.mysqli_error($conn);
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 text-center text-muted">
        <small>&copy; 2025 — <b>Tokoh Buah Being Muhammad Online</b></small>
    </footer>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

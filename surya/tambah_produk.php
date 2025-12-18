<?php
session_start();
include "koneksi.php";

/* Proteksi Login */
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk | Tokoh Buah Being Muhammad Online</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
        body {
            background: #f4f6f9;
        }
        .navbar-brand {
            letter-spacing: 1px;
        }
        .card {
            border-radius: 1rem;
        }
        footer {
            letter-spacing: .5px;
        }
    </style>
</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard.php">
            🍉 Tokoh Buah Being Muhammad Online
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== CONTENT ===== -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">

                    <h3 class="text-center fw-bold text-primary mb-4">
                        Tambah Produk
                    </h3>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori Produk</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?= $r['idkategori']; ?>">
                                        <?= $r['namakategori']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Harga Produk</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                        </div>

                        <script>
                            CKEDITOR.replace('deskripsi');
                        </script>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Status Produk</label>
                            <select class="form-select" name="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg rounded-pill">
                                Simpan Produk
                            </button>
                        </div>

                    </form>

                    <?php
                    if (isset($_POST['submit'])) {

                        $kategori   = $_POST['kategori'];
                        $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];

                        $filename   = $_FILES['gambar']['name'];
                        $tmp_name   = $_FILES['gambar']['tmp_name'];

                        $type       = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                        $newname    = 'produk_' . time() . '.' . $type;

                        $allowed    = ['jpg', 'jpeg', 'png', 'gif'];

                        if (!in_array($type, $allowed)) {
                            echo '<div class="alert alert-danger mt-3">Format gambar tidak diizinkan</div>';
                        } else {

                            move_uploaded_file($tmp_name, './image/' . $newname);

                            $insert = mysqli_query($conn, "INSERT INTO produk VALUES (
                                null,
                                '$kategori',
                                '$nama',
                                '$harga',
                                '$deskripsi',
                                '$newname',
                                '$status',
                                null
                            )");

                            if ($insert) {
                                echo '<script>
                                    alert("Produk berhasil ditambahkan");
                                    window.location="produk.php";
                                </script>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">
                                    Gagal menyimpan produk
                                </div>';
                            }
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="bg-primary text-light py-3 mt-5">
    <div class="container text-center">
        <small>&copy; 2025 — <strong>Tokoh Buah Being Muhammad Online</strong></small>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

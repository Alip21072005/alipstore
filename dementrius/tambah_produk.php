<?php
session_start();
include "koneksi.php";

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
    <title>Tambah Produk | Kedai gue Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); }
        .form-label { font-weight: 600; color: #444; font-size: 14px; }
        .form-control, .form-select { border-radius: 10px; padding: 10px 15px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #0d6efd; box-shadow: none; }
        .btn-submit { border-radius: 10px; padding: 12px; font-weight: 600; transition: 0.3s; }
        footer { background: #fff; border-top: 1px solid #eee; margin-top: 50px; }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4" href="dashboard.php"><i class="fas fa-store me-2"></i>Kedai gue</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3"><a class="btn btn-outline-light btn-sm px-4 rounded-pill" href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex align-items-center mb-4 text-dark">
                    <a href="produk.php" class="btn btn-white bg-white btn-sm rounded-circle shadow-sm me-3 text-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold m-0">Tambah Produk Baru</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4 p-md-5">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori Produk</label>
                                        <select class="form-select" name="kategori" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php
                                            $kategori = dummy_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                            while ($r = dummy_fetch_array($kategori)) {
                                                echo '<option value="'.$r['idkategori'].'">'.$r['namakategori'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Kopi Gayo" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Harga (Rp)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">Rp</span>
                                            <input type="number" name="harga" class="form-control" placeholder="15000" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Foto Produk</label>
                                        <input type="file" name="gambar" class="form-control" required>
                                        <small class="text-muted">Format: jpg, png, jpeg, gif</small>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status Produk</label>
                                        <select class="form-select" name="status" required>
                                            <option value="1">Aktif (Tersedia)</option>
                                            <option value="0">Tidak Aktif (Habis)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="mb-4">
                                        <label class="form-label">Deskripsi Lengkap</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-primary btn-submit w-100 shadow-sm">
                                        <i class="fas fa-save me-2"></i> Simpan Produk
                                    </button>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $kategori   = $_POST['kategori'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $deskripsi  = $_POST['deskripsi'];
                            $status     = $_POST['status'];

                            $filename   = $_FILES['gambar']['name'];
                            $tmp_name   = $_FILES['gambar']['tmp_name'];
                            $type1      = explode('.', $filename);
                            $type2      = strtolower(end($type1)); // Ambil ekstensi terakhir

                            $newname    = 'produk' . time() . '.' . $type2;
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                            if (!in_array($type2, $tipe_diizinkan)) {
                                echo '<div class="alert alert-danger mt-3">Format file tidak diizinkan!</div>';
                            } else {
                                move_uploaded_file($tmp_name, './image/' . $newname);
                                $insert = dummy_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                                    '".$kategori."',
                                    '".$nama."',
                                    '".$harga."',
                                    '".$deskripsi."',
                                    '".$newname."',
                                    '".$status."'
                                )");

                                if ($insert) {
                                    echo '<script>alert("Tambah Data Berhasil"); window.location="produk.php";</script>';
                                } else {
                                    echo '<div class="alert alert-danger">Gagal: '.dummy_error($conn).'</div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4">
        <div class="container text-center text-muted small">
            Copyright &copy; 2025 - <b>Kedai gue Online</b>
        </div>
    </footer>

    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>
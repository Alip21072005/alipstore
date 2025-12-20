<?php
session_start();
include "koneksi.php";

// Proteksi halaman: Jika belum login, tendang ke login.php
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk | Kedai Kito</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">Kedai Kito</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produk.php">Data Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Tambah Produk Baru</h3>
                    <a href="produk.php" class="btn btn-secondary btn-sm">Kembali</a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Kategori Produk</label>
                                <select class="form-select" name="kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php
                                    $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                    while ($r = mysqli_fetch_array($kategori)) {
                                        echo '<option value="'.$r['idkategori'].'">'.$r['namakategori'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Contoh: Nasi Goreng Spesial" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control"
                                    placeholder="Hanya angka, contoh: 15000" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Produk</label>
                                <input type="file" name="gambar" class="form-control" required>
                                <small class="text-muted">Format: jpg, jpeg, png, gif</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Produk</label>
                                <select class="form-select" name="status" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan Produk</button>
                            </div>

                        </form>

                        <script>
                        CKEDITOR.replace('deskripsi');
                        </script>

                        <?php
                        if (isset($_POST['submit'])) {
                            // 1. Ambil data form & Sanitasi (Penting agar tidak error)
                            $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
                            $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
                            $harga     = mysqli_real_escape_string($conn, $_POST['harga']);
                            $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
                            $status    = mysqli_real_escape_string($conn, $_POST['status']);

                            // 2. Kelola File Gambar
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];
                            
                            $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
                            $newname  = 'produk' . time() . '.' . $file_ext;
                            $allowed  = array('jpg', 'jpeg', 'png', 'gif');

                            // 3. Validasi
                            if (!in_array(strtolower($file_ext), $allowed)) {
                                echo '<div class="alert alert-danger mt-3">Format file tidak didukung!</div>';
                            } else {
                                // Upload file
                                move_uploaded_file($tmp_name, './image/' . $newname);

                                // 4. Query Insert sesuai struktur tabel di phpMyAdmin Anda
                                // Urutan: idproduk (null), idkategori, namaproduk, harga, deskripsi, gambar, status, tanggal (null/timestamp)
                                $query = "INSERT INTO produk VALUES (
                                    null,
                                    '$kategori',
                                    '$nama',
                                    '$harga',
                                    '$deskripsi',
                                    '$newname',
                                    '$status',
                                    null
                                )";

                                $insert = mysqli_query($conn, $query);

                                if ($insert) {
                                    echo '<script>alert("Berhasil Menambah Produk!"); window.location="produk.php";</script>';
                                } else {
                                    echo '<div class="alert alert-danger mt-3">Gagal Simpan: ' . mysqli_error($conn) . '</div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-light p-3 text-center fixed-bottom">
        <small>Copyright &copy; 2025 - Kedai Kito Online</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    session_start();
    include "koneksi.php";

    // Proteksi halaman
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk | Najwa Store</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategori.php">Data Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="produk.php">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white px-3 ms-lg-2"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section mt-4">
        <div class="container">
            <h3 class="fw-bold mb-3">Tambah Produk Baru</h3>
            <div class="card shadow-sm mb-5">
                <div class="card-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">-- Pilih Kategori Produk --</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?>
                                <option value="<?php echo $r['idkategori'] ?>"><?php echo $r['namakategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Contoh: 50000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Produk</label>
                            <input type="file" name="gambar" class="form-control" required>
                            <small class="text-muted">Format: jpg, jpeg, png, gif</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk"></textarea>
                            <script>
                            CKEDITOR.replace('deskripsi');
                            </script>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Produk</label>
                            <select class="form-select" name="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif (Tampil di Toko)</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <input type="submit" name="submit" value="Simpan Produk" class="btn btn-primary px-4">
                            <a href="produk.php" class="btn btn-secondary px-4">Batal</a>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        // 1. Menampung input dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];

                        // 2. Menampung data file
                        $filename   = $_FILES['gambar']['name'];
                        $tmp_name   = $_FILES['gambar']['tmp_name'];
                        $type2      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                        // Nama file unik
                        $newname    = 'produk' . time() . '.' . $type2;
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        // 3. Validasi & Proses
                        if (!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            if (!is_dir('image')) { mkdir('image'); }

                            if (move_uploaded_file($tmp_name, './image/' . $newname)) {
                                $insert = mysqli_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                                    '".$kategori."',
                                    '".$nama."',
                                    '".$harga."',
                                    '".$deskripsi."',
                                    '".$newname."',
                                    '".$status."'
                                )");

                                if ($insert) {
                                    echo '<script>alert("Tambah Data Berhasil") </script>';
                                    echo '<script>window.location="produk.php" </script>';
                                } else {
                                    echo 'Gagal database: ' . mysqli_error($conn);
                                }
                            } else {
                                echo '<script>alert("Gagal mengunggah file")</script>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - <strong>Najwa Store</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
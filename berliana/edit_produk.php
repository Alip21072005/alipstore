<?php
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Mengambil data produk berdasarkan ID
$produk = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk = '" . $_GET['id'] . "'");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>window.location="produk.php"</script>';
}
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk | Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produk.php">Data Produk</a></li>
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
            <h3 class="fw-bold mb-3">Edit Produk</h3>
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
                                <option value="<?php echo $r['idkategori'] ?>"
                                    <?php echo ($r['idkategori'] == $p->idkategori) ? 'selected' : ''; ?>>
                                    <?php echo $r['namakategori'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Produk"
                                value="<?php echo $p->namaproduk ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga Produk"
                                value="<?php echo $p->harga ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Foto Saat Ini</label>
                            <img src="image/<?php echo $p->gambar ?>" class="img-thumbnail mb-2" width="120px">
                            <input type="hidden" name="foto_lama" value="<?php echo $p->gambar ?>">
                            <input type="file" name="gambar" class="form-control">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"><?php echo $p->deskripsi ?></textarea>
                            <script>
                            CKEDITOR.replace('deskripsi');
                            </script>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Aktif</option>
                                <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Tidak Aktif
                                </option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-primary px-4">
                            <a href="produk.php" class="btn btn-secondary px-4">Batal</a>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status     = $_POST['status'];
                        $foto_lama  = $_POST['foto_lama'];

                        $filename   = $_FILES['gambar']['name'];
                        $tmp_name   = $_FILES['gambar']['tmp_name'];

                        if ($filename != '') {
                            $type2 = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                            $newname = 'produk' . time() . '.' . $type2;
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                            if (!in_array($type2, $tipe_diizinkan)) {
                                echo '<script>alert("Format File tidak Diizinkan")</script>';
                                return false;
                            } else {
                                if(file_exists('./image/' . $foto_lama)) {
                                    unlink('./image/' . $foto_lama);
                                }
                                move_uploaded_file($tmp_name, './image/' . $newname);
                                $namagambar = $newname;
                            }
                        } else {
                            $namagambar = $foto_lama;
                        }

                        $update = mysqli_query($conn, "UPDATE produk SET 
                                    idkategori = '" . $kategori . "',
                                    namaproduk = '" . $nama . "',
                                    harga = '" . $harga . "',
                                    deskripsi = '" . $deskripsi . "',
                                    gambar = '" . $namagambar . "',
                                    status= '" . $status . "'
                                    WHERE idproduk = '" . $p->idproduk . "' ");

                        if ($update) {
                            echo '<script>alert("Update Data Berhasil") </script>';
                            echo '<script>window.location="produk.php" </script>';
                        } else {
                            echo 'Gagal' . mysqli_error($conn);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5">
        <div class="bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - <strong>Najwa Store</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
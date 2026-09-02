<?php
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}

// Ambil data produk berdasarkan ID
$produk = dummy_query($conn, "SELECT * FROM produk WHERE idproduk = '" . $_GET['id'] . "'");
if(dummy_num_rows($produk) == 0){ echo '<script>window.location="produk.php"</script>'; }
$p = dummy_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk | Kedai gue Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); }
        .form-label { font-weight: 600; color: #444; font-size: 14px; }
        .current-img { border-radius: 10px; border: 2px solid #eee; padding: 5px; background: #fff; margin-bottom: 10px; }
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
                <div class="d-flex align-items-center mb-4">
                    <a href="produk.php" class="btn btn-white bg-white btn-sm rounded-circle shadow-sm me-3 text-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold m-0">Edit Data Produk</h3>
                </div>

                <div class="card mb-5">
                    <div class="card-body p-4 p-md-5">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 border-end">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori Produk</label>
                                        <select class="form-select shadow-sm" name="kategori" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php
                                            $kategori = dummy_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                            while ($r = dummy_fetch_array($kategori)) {
                                            ?>
                                                <option value="<?php echo $r['idkategori'] ?>" <?php echo ($r['idkategori'] == $p->idkategori) ? 'selected' : ''; ?>><?php echo $r['namakategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" name="nama" class="form-control shadow-sm" value="<?php echo $p->namaproduk ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Harga (Rp)</label>
                                        <input type="number" name="harga" class="form-control shadow-sm" value="<?php echo $p->harga ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Status Stok</label>
                                        <select class="form-select shadow-sm" name="status">
                                            <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Aktif (Tersedia)</option>
                                            <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Tidak Aktif (Habis)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 ps-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-block">Foto Saat Ini</label>
                                        <img src="image/<?php echo $p->gambar ?>" class="current-img shadow-sm" width="150px">
                                        <input type="hidden" name="foto_lama" value="<?php echo $p->gambar ?>">
                                        
                                        <label class="form-label d-block mt-3">Ganti Foto Baru (Opsional)</label>
                                        <input type="file" name="gambar" class="form-control shadow-sm">
                                        <small class="text-muted small italic">Kosongkan jika tidak ingin mengubah foto.</small>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="form-label">Deskripsi Produk</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control"><?php echo $p->deskripsi ?></textarea>
                                    
                                    <button type="submit" name="submit" class="btn btn-primary btn-submit w-100 mt-4 shadow">
                                        <i class="fas fa-check-circle me-2"></i> Simpan Perubahan
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
                            $foto_lama  = $_POST['foto_lama'];

                            $filename   = $_FILES['gambar']['name'];
                            $tmp_name   = $_FILES['gambar']['tmp_name'];

                            if ($filename != '') {
                                $type1 = explode('.', $filename);
                                $type2 = strtolower(end($type1));
                                $newname = 'produk' . time() . '.' . $type2;
                                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                                if (!in_array($type2, $tipe_diizinkan)) {
                                    echo '<script>alert("Format file tidak diizinkan!")</script>';
                                } else {
                                    if(file_exists('./image/'.$foto_lama)) {
                                        unlink('./image/'.$foto_lama);
                                    }
                                    move_uploaded_file($tmp_name, './image/' . $newname);
                                    $namagambar = $newname;
                                }
                            } else {
                                $namagambar = $foto_lama;
                            }

                            $update = dummy_query($conn, "UPDATE produk SET 
                                idkategori = '".$kategori."',
                                namaproduk = '".$nama."',
                                harga      = '".$harga."',
                                deskripsi  = '".$deskripsi."',
                                gambar     = '".$namagambar."',
                                status     = '".$status."'
                                WHERE idproduk = '".$p->idproduk."' ");

                            if ($update) {
                                echo '<script>alert("Update Data Berhasil"); window.location="produk.php";</script>';
                            } else {
                                echo 'Gagal ' . dummy_error($conn);
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
            Copyright &copy; 2023 - <b>Kedai gue Online</b>
        </div>
    </footer>

    <script>CKEDITOR.replace('deskripsi');</script>
</body>
</html>

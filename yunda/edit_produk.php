<?php
session_start();
include "koneksi.php";

// Proteksi halaman admin
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

// Mengambil data produk berdasarkan ID di URL
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
    <title>Edit Produk | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
    /* Admin Design System - Yunda (Pink & White) */
    html,
    body {
        height: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #fffafb;
    }

    .navbar {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%) !important;
        padding: 1rem 0;
        border-bottom: 4px solid #ffb3c1;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #ffffff !important;
    }

    .section {
        flex: 1 0 auto;
        padding: 40px 0;
    }

    /* Card & Form Styling */
    .card-form {
        border: 1px solid #ffe5ec;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(255, 77, 109, 0.05);
        background: white;
    }

    .form-label {
        font-weight: 700;
        color: #590d22;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select {
        padding: 12px 15px;
        border-radius: 12px;
        border: 1.5px solid #ffe5ec;
        background-color: #fffcfd;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff85a2;
        box-shadow: 0 0 0 4px rgba(255, 133, 162, 0.1);
        background-color: #fff;
    }

    .current-img-container {
        background: #fff0f3;
        padding: 15px;
        border-radius: 20px;
        text-align: center;
        border: 2px dashed #ffb3c1;
    }

    .btn-update {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        color: white;
        padding: 14px 30px;
        border-radius: 15px;
        font-weight: 800;
        border: none;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-update:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 77, 109, 0.2);
        color: white;
    }

    .input-group-text {
        background-color: #fff0f3;
        border: 1.5px solid #ffe5ec;
        color: #ff4d6d;
        font-weight: 700;
        border-radius: 12px 0 0 12px;
    }

    footer {
        background: #fff;
        border-top: 1px solid #ffe5ec;
        color: #ff4d6d;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php"><i class="bi bi-heart-fill me-2"></i>YUNDA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active fw-bold text-white" href="produk.php">Produk</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-light btn-sm px-4 rounded-pill text-danger fw-bold"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row align-items-center mb-4 text-center text-md-start">
                <div class="col">
                    <h2 class="fw-800" style="color: #590d22;">Edit Detail Produk</h2>
                    <p class="text-muted">Kelola informasi item <span
                            class="badge bg-soft-pink text-danger border border-danger-subtle">#PROD-<?php echo $p->idproduk ?></span>
                    </p>
                </div>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-form p-4 mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="<?php echo $p->namaproduk ?>" placeholder="Contoh: Buket Bunga Mawar"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Deskripsi Lengkap</label>
                                    <textarea name="deskripsi"
                                        class="form-control"><?php echo $p->deskripsi ?></textarea>
                                    <script>
                                    CKEDITOR.replace('deskripsi');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-form p-4 mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label class="form-label d-block">Media Produk</label>
                                    <div class="current-img-container mb-3 shadow-sm">
                                        <img src="image/<?php echo $p->gambar ?>" class="rounded-3" width="100%"
                                            alt="Preview">
                                        <div class="small text-muted mt-2">Foto saat ini</div>
                                    </div>
                                    <input type="hidden" name="foto_lama" value="<?php echo $p->gambar ?>">
                                    <input type="file" name="gambar" class="form-control">
                                    <div class="form-text small mt-2"><i class="bi bi-info-circle"></i> Biarkan kosong
                                        jika foto tidak diganti.</div>
                                </div>

                                <hr class="my-4 opacity-10">

                                <div class="mb-4">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" required>
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

                                <div class="mb-4">
                                    <label class="form-label">Harga Satuan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga" class="form-control"
                                            value="<?php echo $p->harga ?>" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Visibilitas</label>
                                    <select class="form-select" name="status">
                                        <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Aktif
                                            (Muncul di Web)</option>
                                        <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Non-Aktif
                                            (Sembunyi)</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-2 mt-5">
                                    <button type="submit" name="submit" class="btn btn-update">
                                        <i class="bi bi-cloud-arrow-up-fill me-2"></i>Simpan Perubahan
                                    </button>
                                    <a href="produk.php"
                                        class="btn btn-light border py-2 rounded-3 fw-bold text-muted small">KEMBALI KE
                                        DAFTAR</a>
                                </div>
                            </div>
                        </div>
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
                    $type2 = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $newname = 'produk' . time() . '.' . $type2;
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("Format File tidak Diizinkan")</script>';
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
                                    status = '" . $status . "'
                                    WHERE idproduk = '" . $p->idproduk . "' ");

                if ($update) {
                    echo '<script>alert("Perubahan berhasil disimpan!"); window.location="produk.php";</script>';
                } else {
                    echo '<div class="alert alert-danger rounded-4 mt-3 small">Gagal: ' . mysqli_error($conn) . '</div>';
                }
            }
            ?>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; 2025 — <strong>Yunda Management Panel</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
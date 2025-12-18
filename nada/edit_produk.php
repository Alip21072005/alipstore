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
    <title>Edit Produk | Nada Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
    /* Admin Design System - Nada */
    html,
    body {
        height: 100%;
        font-family: 'Inter', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f9fafb;
    }

    .navbar {
        background-color: #111827 !important;
        padding: 0.8rem 0;
    }

    .navbar-brand {
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #0d9488 !important;
    }

    .section {
        flex: 1 0 auto;
        padding: 40px 0;
    }

    .card-form {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        background: white;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        padding: 12px 15px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
    }

    .form-control:focus {
        border-color: #0d9488;
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
    }

    .current-img-container {
        background: #f3f4f6;
        padding: 15px;
        border-radius: 15px;
        text-align: center;
        border: 2px dashed #d1d5db;
    }

    .btn-update {
        background-color: #0d9488;
        color: white;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        border: none;
        transition: 0.3s;
    }

    .btn-update:hover {
        background-color: #0f766e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 148, 136, 0.2);
    }

    footer {
        background: #fff;
        border-top: 1px solid #e5e7eb;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">NADA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-outline-danger btn-sm px-4 rounded-pill" href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h3 class="fw-bold mb-0 text-dark">Edit Detail Produk</h3>
                    <p class="text-muted small">ID Produk: #<?php echo $p->idproduk ?></p>
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
                                        value="<?php echo $p->namaproduk ?>" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Deskripsi Produk</label>
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
                                <div class="mb-4 text-center">
                                    <label class="form-label d-block text-start">Foto Produk Saat Ini</label>
                                    <div class="current-img-container mb-3">
                                        <img src="image/<?php echo $p->gambar ?>" class="rounded" width="100%">
                                    </div>
                                    <input type="hidden" name="foto_lama" value="<?php echo $p->gambar ?>">
                                    <input type="file" name="gambar" class="form-control">
                                    <div class="form-text small mt-2">Biarkan kosong jika tidak ingin mengganti foto.
                                    </div>
                                </div>

                                <hr class="my-4 opacity-50">

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
                                    <label class="form-label">Harga Satuan (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">Rp</span>
                                        <input type="number" name="harga" class="form-control"
                                            value="<?php echo $p->harga ?>" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Status Produk</label>
                                    <select class="form-select" name="status">
                                        <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Aktif
                                            (Tampil)</option>
                                        <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Non-Aktif
                                            (Sembunyi)</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-2 mt-5">
                                    <button type="submit" name="submit" class="btn btn-update">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                                    </button>
                                    <a href="produk.php"
                                        class="btn btn-light border py-2 rounded-3 fw-semibold">Kembali</a>
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
                        // Hapus foto lama dari folder
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
                    echo '<div class="alert alert-danger">Gagal: ' . mysqli_error($conn) . '</div>';
                }
            }
            ?>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 — <strong>Nada Management Panel</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
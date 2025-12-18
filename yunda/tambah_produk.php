<?php
    session_start();
    include "koneksi.php";

    // Proteksi halaman agar hanya yang sudah login bisa masuk
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Menu Baru | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <style>
    /* Admin Design System - Yunda (Pink & Modern) */
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

    /* Form & Card Styling */
    .card-form {
        border: 1px solid #ffe5ec;
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(255, 77, 109, 0.05);
        background: white;
    }

    .form-label {
        font-weight: 700;
        color: #590d22;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .form-control,
    .form-select {
        padding: 12px 18px;
        border-radius: 15px;
        border: 1.5px solid #ffe5ec;
        background-color: #fffcfd;
        transition: all 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff85a2;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(255, 133, 162, 0.15);
    }

    .input-group-text {
        background-color: #fff0f3;
        border: 1.5px solid #ffe5ec;
        color: #ff4d6d;
        border-radius: 15px 0 0 15px;
        font-weight: 700;
    }

    .btn-save {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        color: white;
        padding: 15px 30px;
        border-radius: 15px;
        font-weight: 700;
        border: none;
        transition: 0.4s;
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 77, 109, 0.2);
        color: white;
    }

    .btn-cancel {
        padding: 12px 25px;
        border-radius: 15px;
        font-weight: 700;
        color: #ff758f;
        background-color: #fff0f3;
        border: none;
        transition: 0.3s;
    }

    .btn-cancel:hover {
        background-color: #ffe5ec;
        color: #ff4d6d;
    }

    .section-title {
        color: #590d22;
        font-weight: 800;
    }

    footer {
        background: #fff;
        border-top: 1px solid #ffe5ec;
        color: #ff758f;
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
                            <a class="btn btn-light btn-sm px-4 rounded-pill text-danger fw-bold shadow-sm"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col">
                    <h2 class="section-title mb-0">Tambah Produk Cantik ✨</h2>
                    <p class="text-muted">Tambahkan menu spesial terbaru ke dalam katalog tokomu.</p>
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
                                        placeholder="Contoh: Strawberry Milkshake Special" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Deskripsi Lengkap</label>
                                    <textarea name="deskripsi" class="form-control"></textarea>
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
                                    <label class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                        $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                        while ($r = mysqli_fetch_array($kategori)) {
                                        ?>
                                        <option value="<?php echo $r['idkategori'] ?>"><?php echo $r['namakategori'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Harga Menu</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" name="harga" class="form-control border-start-0"
                                            placeholder="0" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Foto Produk</label>
                                    <input type="file" name="gambar" class="form-control" required>
                                    <div class="form-text small mt-2 text-pink" style="color: #ff758f;">
                                        <i class="bi bi-info-circle me-1"></i> Gunakan foto yang cerah & menarik.
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Status Menu</label>
                                    <select class="form-select" name="status" required>
                                        <option value="1">Tampilkan Sekarang</option>
                                        <option value="0">Simpan sebagai Draft</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-3 mt-4">
                                    <button type="submit" name="submit" class="btn btn-save shadow-sm">
                                        <i class="bi bi-stars me-2"></i>Simpan Menu Baru
                                    </button>
                                    <a href="produk.php" class="btn btn-cancel text-center">Batal</a>
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

                $filename   = $_FILES['gambar']['name'];
                $tmp_name   = $_FILES['gambar']['tmp_name'];
                $type2      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                $newname    = 'produk' . time() . '.' . $type2;
                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                if (!in_array($type2, $tipe_diizinkan)) {
                    echo '<div class="alert alert-danger mt-3 rounded-4 border-0 shadow-sm" style="background-color: #fff0f3; color: #ff4d6d;">Format file tidak diizinkan!</div>';
                } else {
                    if (!is_dir('image')) { mkdir('image'); }

                    if (move_uploaded_file($tmp_name, './image/' . $newname)) {
                        $insert = mysqli_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                            '".$kategori."', '".$nama."', '".$harga."', '".$deskripsi."', '".$newname."', '".$status."'
                        )");

                        if ($insert) {
                            echo '<script>alert("Yay! Menu baru berhasil ditambahkan 💖"); window.location="produk.php";</script>';
                        } else {
                            echo '<div class="alert alert-danger mt-3">Kesalahan Database: '.mysqli_error($conn).'</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger mt-3">Gagal mengunggah foto!</div>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small>Copyright &copy; 2025 — <strong>Yunda Management System</strong> 💖</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
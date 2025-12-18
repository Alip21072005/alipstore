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
    <title>Tambah Produk | Nada Admin</title>
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

    /* Form Styling */
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

    .form-control:focus,
    .form-select:focus {
        border-color: #0d9488;
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
    }

    .btn-save {
        background-color: #0d9488;
        color: white;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        border: none;
        transition: 0.3s;
    }

    .btn-save:hover {
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
                    <h3 class="fw-bold mb-0 text-dark">Tambah Produk Baru</h3>
                    <p class="text-muted small">Lengkapi informasi di bawah untuk menambahkan item ke toko</p>
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
                                        placeholder="Contoh: Kopi Susu Gula Aren" required>
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
                                    <label class="form-label">Harga Satuan (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">Rp</span>
                                        <input type="number" name="harga" class="form-control" placeholder="0" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Unggah Foto Produk</label>
                                    <input type="file" name="gambar" class="form-control" required>
                                    <div class="form-text small mt-2">Format: JPG, PNG, GIF (Maks. 2MB)</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Status Visibilitas</label>
                                    <select class="form-select" name="status" required>
                                        <option value="1">Aktif (Tampilkan)</option>
                                        <option value="0">Draft (Sembunyikan)</option>
                                    </select>
                                </div>

                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" name="submit" class="btn btn-save">
                                        <i class="bi bi-cloud-upload me-2"></i>Simpan Produk
                                    </button>
                                    <a href="produk.php"
                                        class="btn btn-light border py-2 rounded-3 fw-semibold">Batal</a>
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
                    echo '<div class="alert alert-danger mt-3">Format file tidak diizinkan!</div>';
                } else {
                    if (!is_dir('image')) { mkdir('image'); }

                    if (move_uploaded_file($tmp_name, './image/' . $newname)) {
                        $insert = mysqli_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                            '".$kategori."', '".$nama."', '".$harga."', '".$deskripsi."', '".$newname."', '".$status."'
                        )");

                        if ($insert) {
                            echo '<script>alert("Produk berhasil ditambahkan!"); window.location="produk.php";</script>';
                        } else {
                            echo '<div class="alert alert-danger">Kesalahan Database: '.mysqli_error($conn).'</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Gagal mengunggah file gambar!</div>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 — <strong>Nada Admin Panel</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
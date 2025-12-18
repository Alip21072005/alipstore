<?php
    session_start();
    include "koneksi.php";

    // Proteksi halaman admin
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    // Mengambil data kategori berdasarkan ID di URL
    $kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE idkategori = '" . $_GET['id'] . "'");
    if (mysqli_num_rows($kategori) == 0) {
        echo '<script>window.location="kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kategori | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    /* Admin Design System - Yunda (Pink & White Theme) */
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
        padding: 60px 0;
    }

    /* Card & Form Styling */
    .card-form {
        border: 1px solid #ffe5ec;
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(255, 77, 109, 0.05);
        background: white;
        overflow: hidden;
    }

    .form-label {
        font-weight: 700;
        color: #590d22;
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .form-control {
        padding: 14px 18px;
        border-radius: 15px;
        border: 1.5px solid #ffe5ec;
        transition: all 0.3s;
        background-color: #fffcfd;
    }

    .form-control:focus {
        border-color: #ff85a2;
        box-shadow: 0 0 0 4px rgba(255, 133, 162, 0.15);
        background-color: #fff;
    }

    .input-group-text {
        border-radius: 15px 0 0 15px !important;
        background-color: #fff0f3 !important;
        border: 1.5px solid #ffe5ec;
        border-right: none;
        color: #ff4d6d;
    }

    .form-control.rounded-end-3 {
        border-radius: 0 15px 15px 0 !important;
    }

    /* Button Styling */
    .btn-update {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 15px;
        font-weight: 800;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-update:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 77, 109, 0.3);
        color: white;
    }

    .btn-cancel {
        padding: 14px 30px;
        border-radius: 15px;
        font-weight: 600;
        color: #6c757d;
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
    }

    .btn-cancel:hover {
        background-color: #e9ecef;
        color: #343a40;
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
                <a class="navbar-brand" href="dashboard.php"><i class="bi bi-shield-lock-fill me-2"></i>YUNDA ADMIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-4">
                        <h3 class="fw-800" style="color: #590d22;">PERBARUI KATEGORI</h3>
                        <p class="text-muted small">Mengedit informasi kategori:
                            <span
                                class="badge bg-soft-pink px-2 py-1 text-danger border border-danger-subtle"><?php echo $k->namakategori ?></span>
                        </p>
                    </div>

                    <div class="card card-form p-4">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="kategori" class="form-label">Nama Kategori Baru</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-tag-fill"></i>
                                        </span>
                                        <input type="text" class="form-control rounded-end-3" name="kategori"
                                            value="<?php echo $k->namakategori ?>" required autofocus>
                                    </div>
                                    <div class="form-text mt-3 small text-muted">
                                        <i class="bi bi-info-circle me-1"></i> Perubahan nama kategori akan diperbarui
                                        di seluruh daftar produk.
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                    <a href="kategori.php" class="btn btn-cancel me-md-2">Batal</a>
                                    <button type="submit" name="submit" class="btn btn-update">
                                        <i class="bi bi-check2-circle me-2"></i>Simpan Perubahan
                                    </button>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['submit'])) {
                                $nama = ucwords($_POST['kategori']);

                                $update = mysqli_query($conn, "UPDATE kategori SET 
                                                    namakategori = '" . $nama . "'
                                                    WHERE idkategori = '" . $k->idkategori . "' ");
                                if ($update) {
                                    echo '<script>alert("Kategori berhasil diperbarui!"); window.location="kategori.php";</script>';
                                } else {
                                    echo '<div class="alert alert-danger mt-3 rounded-4 small">Gagal: ' . mysqli_error($conn) . '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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
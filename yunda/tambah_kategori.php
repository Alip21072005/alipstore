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
    <title>Tambah Kategori | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    /* Admin Design System - Yunda (Pink & Soft) */
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
        border-radius: 30px;
        box-shadow: 0 15px 35px rgba(255, 77, 109, 0.08);
        background: white;
        overflow: hidden;
    }

    .form-label {
        font-weight: 700;
        color: #590d22;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control {
        padding: 14px 18px;
        border-radius: 15px;
        border: 1.5px solid #ffe5ec;
        background-color: #fffcfd;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #ff85a2;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(255, 133, 162, 0.15);
    }

    .input-group-text {
        background-color: #fff0f3;
        border: 1.5px solid #ffe5ec;
        color: #ff4d6d;
        border-radius: 15px 0 0 15px;
    }

    .btn-save {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        color: white;
        border: none;
        padding: 14px 35px;
        border-radius: 15px;
        font-weight: 700;
        transition: 0.4s;
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(255, 77, 109, 0.25);
        color: white;
    }

    .btn-cancel {
        padding: 14px 30px;
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

    .icon-header {
        width: 50px;
        height: 50px;
        background: #fff0f3;
        color: #ff4d6d;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 1.5rem;
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
                        <li class="nav-item"><a class="nav-link active fw-bold text-white"
                                href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <div class="icon-header shadow-sm">
                            <i class="bi bi-grid-plus-fill"></i>
                        </div>
                        <h2 class="fw-800" style="color: #590d22;">Buat Kategori Baru</h2>
                        <p class="text-muted">Kelompokkan menu cantikmu agar lebih rapi ✨</p>
                    </div>

                    <div class="card card-form p-4">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-bookmark-heart"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" name="kategori"
                                            id="kategori" placeholder="Misal: Minuman Segar, Dessert, dll" required
                                            autofocus>
                                    </div>
                                    <div class="form-text mt-3 small italic" style="color: #ff758f;">
                                        <i class="bi bi-info-circle me-1"></i> Nama ini akan muncul di daftar menu
                                        pelanggan.
                                    </div>
                                </div>

                                <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-5">
                                    <a href="kategori.php" class="btn btn-cancel">Batal</a>
                                    <button type="submit" name="submit" class="btn btn-save shadow-sm">
                                        <i class="bi bi-cloud-check-fill me-2"></i>Simpan Kategori
                                    </button>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['submit'])) {
                                $nama = ucwords($_POST['kategori']);
                                $insert = mysqli_query($conn, "INSERT INTO kategori VALUES (null, '" . $nama . "') ");
                                
                                if ($insert) {
                                    echo '<script>alert("Yay! Kategori baru berhasil ditambahkan 💖")</script>';
                                    echo '<script>window.location="kategori.php"</script>';
                                } else {
                                    echo '<div class="alert alert-danger mt-4 rounded-4 border-0 shadow-sm" style="background-color: #fff0f3; color: #ff4d6d;">
                                            <i class="bi bi-exclamation-triangle-fill me-2"></i> Gagal: ' . mysqli_error($conn) . '
                                          </div>';
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
            <small>Copyright &copy; 2025 — <strong>Yunda Management System</strong> 💖</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
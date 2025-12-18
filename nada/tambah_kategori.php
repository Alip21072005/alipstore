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
    <title>Tambah Kategori | Nada Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

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
        padding: 60px 0;
    }

    /* Card & Form Styling */
    .card-form {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        background: white;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
    }

    .form-control {
        padding: 12px 15px;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #0d9488;
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
    }

    .btn-save {
        background-color: #0d9488;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        transition: 0.3s;
    }

    .btn-save:hover {
        background-color: #0f766e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 148, 136, 0.2);
        color: white;
    }

    .btn-cancel {
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
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
                        <li class="nav-item"><a class="nav-link active text-white" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
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
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-dark">Tambah Kategori Baru</h3>
                        <p class="text-muted">Buat kategori baru untuk mengelompokkan produk Anda</p>
                    </div>

                    <div class="card card-form p-4">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 rounded-start-3">
                                            <i class="bi bi-tag text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0 rounded-end-3"
                                            name="kategori" id="kategori"
                                            placeholder="Misal: Minuman Dingin, Snack, dll" required autofocus>
                                    </div>
                                    <div class="form-text mt-2 small">Gunakan nama yang singkat dan deskriptif.</div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                    <a href="kategori.php" class="btn btn-light btn-cancel me-md-2">Batal</a>
                                    <button type="submit" name="submit" class="btn btn-save">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Kategori
                                    </button>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['submit'])) {
                                $nama = ucwords($_POST['kategori']);
                                $insert = mysqli_query($conn, "INSERT INTO kategori VALUES (null, '" . $nama . "') ");
                                
                                if ($insert) {
                                    echo '<script>alert("Kategori berhasil ditambahkan!")</script>';
                                    echo '<script>window.location="kategori.php"</script>';
                                } else {
                                    echo '<div class="alert alert-danger mt-3">Gagal: ' . mysqli_error($conn) . '</div>';
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
            <small class="text-muted">Copyright &copy; 2025 — <strong>Nada Admin Panel</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
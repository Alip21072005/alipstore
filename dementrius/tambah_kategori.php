<?php
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori Heboh | Kedai gue</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f0f2f5; 
            min-height: 100vh;
        }
        .navbar { 
            background: linear-gradient(90deg, #0d6efd 0%, #6610f2 100%) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .main-card {
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            background: #fff;
        }
        .card-header-custom {
            background: linear-gradient(45deg, #0d6efd, #00d2ff);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .form-control {
            border-radius: 12px;
            padding: 15px;
            border: 2px solid #eee;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25 row rgba(13, 110, 253, 0.1);
            transform: scale(1.01);
        }
        .btn-simpan {
            background: linear-gradient(45deg, #0d6efd, #6610f2);
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.4s;
        }
        .btn-simpan:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 16, 242, 0.3);
            color: white;
        }
        .icon-box {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 30px;
        }
        footer {
            background: #fff;
            padding: 20px 0;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark py-3">
            <div class="container">
                <a class="navbar-brand fw-extrabold fs-3" href="dashboard.php">
                    <i class="fas fa-rocket me-2 animate__animated animate__bounce"></i>KEDAI GUE
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fw-bold">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-warning btn-sm rounded-pill px-4 fw-bold text-dark" href="keluar.php">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5 animate__animated animate__fadeInUp">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="main-card">
                    <div class="card-header-custom">
                        <div class="icon-box">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                        <h2 class="fw-bold m-0">Tambah Kategori</h2>
                        <p class="m-0 opacity-75">Buat kategori produk baru yang menarik!</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">NAMA KATEGORI</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0" style="border-radius: 12px 0 0 12px;">
                                        <i class="fas fa-tag text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0" name="kategori" 
                                           placeholder="Misal: Minuman Segar, Snack Gurih..." required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary btn-simpan shadow">
                                    <i class="fas fa-cloud-upload-alt me-2"></i> Simpan Kategori Sekarang!
                                </button>
                                <a href="kategori.php" class="btn btn-link text-muted text-decoration-none mt-2">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                                </a>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $nama = ucwords($_POST['kategori']);
                            $insert = dummy_query($conn, "INSERT INTO kategori VALUES (null, '" . $nama . "') ");
                            
                            if ($insert) {
                                echo '<script>alert("BOOM! Data Berhasil Ditambahkan!") </script>';
                                echo '<script>window.location="kategori.php" </script>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">Waduh! Gagal nih: '.dummy_error($conn).'</div>';
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="mt-5">
        <div class="container text-center">
            <small class="text-muted fw-bold">MADE WITH <i class="fas fa-heart text-danger"></i> 2025 - KEDAI GUE ONLINE</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
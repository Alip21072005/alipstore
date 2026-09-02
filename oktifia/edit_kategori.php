<?php
    include "koneksi.php";
    session_start();

    // Proteksi halaman
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    // Ambil data kategori berdasarkan ID
    $kategori = dummy_query($conn, "SELECT * FROM kategori WHERE idkategori = '" . dummy_real_escape_string($conn, $_GET['id']) . "'");
    if (dummy_num_rows($kategori) == 0) {
        echo '<script>window.location="kategori.php"</script>';
    }
    $k = dummy_fetch_object($kategori);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kategori | Toko Boneka Oktifia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        background-color: #fff5f7;
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        background-color: #ff69b4 !important;
        box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(255, 105, 180, 0.1);
    }

    .form-control {
        border-radius: 12px;
        padding: 12px;
        border: 1px solid #ffc0cb;
    }

    .form-control:focus {
        border-color: #ff69b4;
        box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.2);
    }

    .btn-update {
        background-color: #ff69b4;
        border: none;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }

    .btn-update:hover {
        background-color: #ff1493;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 20, 147, 0.3);
        color: white;
    }

    .btn-back {
        color: #ff69b4;
        border-color: #ff69b4;
    }

    .btn-back:hover {
        background-color: #ff69b4;
        color: white;
    }

    .text-pink-dark {
        color: #ff1493;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-light btn-sm text-danger ms-lg-2 px-3 fw-bold" href="keluar.php"
                                onclick="return confirm('Apakah Oktifia yakin ingin keluar?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-4">
                    <a href="kategori.php" class="btn btn-outline-pink btn-back rounded-circle me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0 text-pink-dark">Edit Kategori Boneka</h3>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label for="editKategori" class="form-label fw-semibold">Nama Kategori Koleksi</label>
                                <input type="text" class="form-control" name="kategori" id="editKategori"
                                    value="<?php echo $k->namakategori ?>" placeholder="Contoh: Boneka Beruang" required
                                    autofocus>
                                <div class="form-text mt-2">Pastikan nama kategori sudah sesuai dengan koleksi yang ada.
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="submit" class="btn btn-update">
                                    <i class="bi bi-pencil-heart me-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $nama = dummy_real_escape_string($conn, ucwords(strtolower($_POST['kategori'])));

                            $update = dummy_query($conn, "UPDATE kategori SET 
                                        namakategori = '" . $nama . "'
                                        WHERE idkategori = '" . $k->idkategori . "' ");
                            
                            if ($update) {
                                echo '<div class="alert alert-success mt-4 mb-0 border-0 shadow-sm text-center" style="background-color: #d1e7dd;">
                                        <i class="bi bi-check-circle-fill me-2"></i> Yeay! Kategori berhasil diperbarui.
                                      </div>';
                                echo '<script>
                                        setTimeout(function(){
                                            window.location="kategori.php";
                                        }, 1200);
                                      </script>';
                            } else {
                                echo '<div class="alert alert-danger mt-4 mb-0">Ups, ada masalah: ' . dummy_error($conn) . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center text-muted">
            <small>Copyright &copy; 2023 - <strong>Toko Boneka Oktifia</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

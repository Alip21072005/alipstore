<?php
session_start();
include "koneksi.php";

// Proteksi Login
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit;
}

// Ambil data kategori berdasarkan ID dari URL
$kategori = dummy_query($conn, "SELECT * FROM kategori WHERE idkategori = '" . $_GET['id'] . "'");
if (dummy_num_rows($kategori) == 0) {
    echo '<script>window.location="kategori.php"</script>';
    exit;
}
$k = dummy_fetch_object($kategori);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kategori | Kedai gue Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.08); }
        .form-label { font-weight: 600; color: #444; }
        .form-control { border-radius: 10px; padding: 12px; }
        .btn-save { border-radius: 10px; padding: 10px 30px; font-weight: 600; }
        footer { background: #fff; border-top: 1px solid #eee; }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4" href="dashboard.php"><i class="fas fa-store me-2"></i>Kedai gue</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto text-uppercase small fw-bold">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                        <li class="nav-item ms-lg-3"><a class="btn btn-outline-light btn-sm px-4 rounded-pill" href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-4">
                    <a href="kategori.php" class="btn btn-white bg-white btn-sm rounded-circle shadow-sm me-3 text-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold m-0">Edit Kategori</h3>
                </div>

                <div class="card mb-5">
                    <div class="card-body p-4">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label for="editKategori" class="form-label">Nama Kategori Produk</label>
                                <input type="text" class="form-control shadow-sm" name="kategori" 
                                       placeholder="Masukkan nama kategori..." 
                                       value="<?php echo $k->namakategori ?>" required>
                                <div class="form-text mt-2 italic">Gunakan nama yang jelas seperti 'Makanan', 'Minuman', dll.</div>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary btn-save shadow">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $nama = ucwords($_POST['kategori']);

                            $update = dummy_query($conn, "UPDATE kategori SET 
                                        namakategori = '" . $nama . "'
                                        WHERE idkategori = '" . $k->idkategori . "' ");

                            if ($update) {
                                echo '<script>alert("Data Kategori Berhasil Diupdate")</script>';
                                echo '<script>window.location="kategori.php"</script>';
                            } else {
                                echo '<div class="alert alert-danger mt-3 small">Gagal: ' . dummy_error($conn) . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5">
        <div class="container text-center text-muted small">
            Copyright &copy; 2025 - <b>Kedai gue Online</b>. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
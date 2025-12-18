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
    <title>Tambah Kategori | Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="dashboard.php">Najwa Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="kategori.php">Data Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-sm text-white px-3 ms-lg-2"
                                href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="section mt-4">
        <div class="container">
            <h3 class="fw-bold mb-3">Tambah Kategori</h3>
            <div class="card shadow-sm mb-5">
                <div class="card-body p-4">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="inputKategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori"
                                placeholder="Contoh: Makanan, Minuman, Elektronik" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" class="btn btn-primary px-4">Simpan Kategori</button>
                            <a href="kategori.php" class="btn btn-secondary px-4">Kembali</a>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $nama = ucwords($_POST['kategori']);
                        $insert = mysqli_query($conn, "INSERT INTO kategori VALUES (
                                                                    null,
                                                                    '" . $nama . "') ");
                        if ($insert) {
                            echo '<script>alert("Tambah Data Berhasil") </script>';
                            echo '<script>window.location="kategori.php" </script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed-bottom">
        <div class="bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - <strong>Najwa Store</strong>. All rights reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
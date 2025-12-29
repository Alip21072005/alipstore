<?php
    include "koneksi.php";
    session_start();

    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori | Kedai Kito Online</title>
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
        background-color: #f4f7f6;
    }

    main {
        flex: 1 0 auto;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #dee2e6;
    }

    .btn-save {
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop me-2"></i>Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Data Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                        <li class="nav-item"><a class="nav-link text-warning fw-bold" href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center mb-4">
                    <a href="kategori.php" class="btn btn-outline-primary rounded-circle me-3"><i
                            class="bi bi-arrow-left"></i></a>
                    <h3 class="fw-bold mb-0">Tambah Kategori</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label for="inputKategori" class="form-label fw-semibold">Nama Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="inputKategori"
                                    placeholder="Misal: Makanan Berat, Minuman Dingin..." required autofocus>
                                <div class="form-text">Nama kategori akan otomatis dikonversi menjadi huruf kapital di
                                    setiap kata.</div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="submit" class="btn btn-primary btn-save">
                                    <i class="bi bi-check-circle me-2"></i>Simpan Kategori
                                </button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            // Membersihkan input dan merubah format teks (ucwords)
                            $nama = mysqli_real_escape_string($conn, ucwords(strtolower($_POST['kategori'])));
                            
                            $insert = mysqli_query($conn, "INSERT INTO kategori (namakategori) VALUES ('$nama')");
                            
                            if ($insert) {
                                echo '<div class="alert alert-success mt-4 mb-0 border-0 shadow-sm">
                                        <i class="bi bi-check-circle-fill me-2"></i> Kategori berhasil ditambahkan!
                                      </div>';
                                echo '<script>
                                        setTimeout(function(){
                                            window.location="kategori.php";
                                        }, 1500);
                                      </script>';
                            } else {
                                echo '<div class="alert alert-danger mt-4 mb-0">Gagal: ' . mysqli_error($conn) . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 mt-auto shadow-sm">
        <div class="container text-center text-muted">
            <small>Copyright &copy; 2025 - <strong>Kedai Kito Online</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
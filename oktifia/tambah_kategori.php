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
    <title>Tambah Kategori | Toko Boneka Oktifia</title>
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
        /* Background Pink Muda */
    }

    main {
        flex: 1 0 auto;
    }

    .navbar {
        background-color: #ff69b4 !important;
        /* Pink Cerah */
        box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(255, 105, 180, 0.1);
    }

    .form-label {
        color: #ff1493;
        font-weight: 600;
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

    .btn-save {
        background-color: #ff69b4;
        border: none;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }

    .btn-save:hover {
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
                        <li class="nav-item"><a class="nav-link active" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
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
                    <a href="kategori.php" class="btn btn-back rounded-circle me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0" style="color: #ff1493;">Tambah Jenis Boneka</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="" method="POST">
                            <div class="mb-4">
                                <label for="inputKategori" class="form-label">Nama Kategori Boneka</label>
                                <input type="text" class="form-control" name="kategori" id="inputKategori"
                                    placeholder="Misal: Boneka Hewan, Boneka Karakter..." required autofocus>
                                <div class="form-text mt-2" style="font-size: 0.85rem;">
                                    <i class="bi bi-magic me-1"></i> Nama kategori akan otomatis rapi (Huruf Besar Di
                                    Setiap Kata).
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" name="submit" class="btn btn-save">
                                    <i class="bi bi-heart-plus-fill me-2"></i>Simpan Kategori
                                </button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            // Membersihkan input dan merubah format teks (ucwords)
                            $nama = dummy_real_escape_string($conn, ucwords(strtolower($_POST['kategori'])));
                            
                            $insert = dummy_query($conn, "INSERT INTO kategori (namakategori) VALUES ('$nama')");
                            
                            if ($insert) {
                                echo '<div class="alert alert-success mt-4 mb-0 border-0 shadow-sm rounded-4 text-center">
                                        <i class="bi bi-check-circle-fill me-2"></i> Yeay! Kategori baru berhasil disimpan.
                                      </div>';
                                echo '<script>
                                        setTimeout(function(){
                                            window.location="kategori.php";
                                        }, 1500);
                                      </script>';
                            } else {
                                echo '<div class="alert alert-danger mt-4 mb-0 rounded-4 text-center">Yah Gagal: ' . dummy_error($conn) . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Toko Boneka Oktifia</strong>. Crafted with <i
                    class="bi bi-heart-fill text-danger"></i></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
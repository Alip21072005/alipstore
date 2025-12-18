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
    <title>Tambah Produk | Kedai Kito</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

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

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #dee2e6;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25 margin-bottom rgba(13, 110, 253, 0.1);
    }

    .btn-submit {
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }

    #img-preview {
        max-width: 200px;
        border-radius: 10px;
        display: none;
        margin-bottom: 15px;
        border: 2px dashed #ddd;
        padding: 5px;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shop me-2"></i>Kedai Kito</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produk.php">Produk</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="produk.php" class="btn btn-outline-primary rounded-circle me-3"><i
                            class="bi bi-arrow-left"></i></a>
                    <h3 class="fw-bold mb-0">Tambah Produk Baru</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Kategori</label>
                                    <select class="form-select" name="kategori" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                            $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                            while ($r = mysqli_fetch_array($kategori)) {
                                                echo '<option value="'.$r['idkategori'].'">'.$r['namakategori'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Nama Produk</label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Contoh: Es Teh Manis" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Harga (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga" class="form-control" placeholder="0" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Foto Produk</label>
                                <input type="file" name="gambar" id="gambar" class="form-control mb-2" required
                                    onchange="previewImage()">
                                <img id="img-preview" src="" alt="Preview Gambar">
                                <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Status Ketersediaan</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="aktif" value="1"
                                            checked>
                                        <label class="form-check-label" for="aktif">Aktif</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tdk_aktif"
                                            value="0">
                                        <label class="form-check-label" for="tdk_aktif">Tidak Aktif</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-submit w-100">
                                <i class="bi bi-cloud-arrow-up me-2"></i>Simpan Produk
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $kategori  = $_POST['kategori'];
                            $nama      = $_POST['nama'];
                            $harga     = $_POST['harga'];
                            $deskripsi = $_POST['deskripsi'];
                            $status    = $_POST['status'];

                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];
                            $type2    = pathinfo($filename, PATHINFO_EXTENSION);
                            $newname  = 'produk' . time() . '.' . $type2;
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                            if (!in_array(strtolower($type2), $tipe_diizinkan)) {
                                echo '<div class="alert alert-danger mt-3">Format file tidak didukung!</div>';
                            } else {
                                move_uploaded_file($tmp_name, './image/' . $newname);
                                $insert = mysqli_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                                    '$kategori', '$nama', '$harga', '$deskripsi', '$newname', '$status')");

                                if ($insert) {
                                    echo '<script>alert("Berhasil Menambah Produk!"); window.location="produk.php";</script>';
                                } else {
                                    echo '<div class="alert alert-danger mt-3">Gagal: '.mysqli_error($conn).'</div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4">
        <div class="container text-center text-muted">
            <small>&copy; 2025 - <strong>Kedai Kito Online</strong></small>
        </div>
    </footer>

    <script>
    CKEDITOR.replace('deskripsi');

    // Fungsi Preview Gambar
    function previewImage() {
        const input = document.getElementById('gambar');
        const preview = document.getElementById('img-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
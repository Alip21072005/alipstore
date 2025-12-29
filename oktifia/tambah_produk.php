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
    <title>Tambah Koleksi | Toko Boneka Oktifia</title>
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
        background-color: #fff5f7;
        /* Pink Background */
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

    .form-label {
        color: #ff1493;
        font-weight: 600;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 12px;
        border: 1px solid #ffc0cb;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff69b4;
        box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.2);
    }

    .btn-submit {
        background-color: #ff69b4;
        border: none;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        background-color: #ff1493;
        transform: translateY(-3px);
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

    #img-preview {
        max-width: 200px;
        border-radius: 15px;
        display: none;
        margin-top: 15px;
        border: 3px solid #fff;
        box-shadow: 0 5px 15px rgba(255, 105, 180, 0.2);
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link active" href="produk.php">Produk</a></li>
                        <li class="nav-item"><a class="nav-link text-warning fw-bold" href="keluar.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="produk.php" class="btn btn-outline-pink btn-back rounded-circle me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0" style="color: #ff1493;">Tambah Boneka Baru</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kategori Boneka</label>
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
                                    <label class="form-label">Nama Boneka</label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Contoh: Teddy Bear Pink XL" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga Koleksi (Rp)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"
                                        style="border-radius: 12px 0 0 12px; border-color: #ffc0cb; color: #ff1493;">Rp</span>
                                    <input type="number" name="harga" class="form-control border-start-0"
                                        placeholder="0" required style="border-radius: 0 12px 12px 0;">
                                </div>
                            </div>

                            <div class="mb-3 p-3 bg-light rounded-4 border border-white">
                                <label class="form-label">Foto Boneka Cantik</label>
                                <input type="file" name="gambar" id="gambar" class="form-control mb-2" required
                                    onchange="previewImage()">
                                <div class="text-center">
                                    <img id="img-preview" src="./image/placeholder.jpg" alt="Preview Gambar">
                                </div>
                                <small class="text-muted d-block mt-2">Format: JPG, JPEG, PNG, GIF (Maks: 2MB)</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cerita/Deskripsi Boneka</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Status Awal</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="aktif" value="1"
                                            checked>
                                        <label class="form-check-label text-success fw-bold"
                                            for="aktif">Tersedia</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tdk_aktif"
                                            value="0">
                                        <label class="form-check-label text-danger fw-bold"
                                            for="tdk_aktif">Habis</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-submit w-100 shadow-sm">
                                <i class="bi bi-heart-plus-fill me-2"></i>Tambahkan ke Koleksi
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
                            
                            // Sesuaikan folder tujuan (pakai 'image' agar sama dengan halaman daftar/edit sebelumnya)
                            $newname  = 'image' . time() . '.' . $type2;
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                            if (!in_array(strtolower($type2), $tipe_diizinkan)) {
                                echo '<div class="alert alert-danger mt-3 text-center">Format file tidak didukung!</div>';
                            } else {
                                move_uploaded_file($tmp_name, './image/' . $newname);
                                $insert = mysqli_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                                    '$kategori', '$nama', '$harga', '$deskripsi', '$newname', '$status')");

                                if ($insert) {
                                    echo '<script>alert("Boneka berhasil ditambahkan ke rak, Oktifia!"); window.location="produk.php";</script>';
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

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">&copy; 2025 - <strong>Toko Boneka Oktifia</strong>. Dibuat dengan <i
                    class="bi bi-heart-fill text-danger"></i></small>
        </div>
    </footer>

    <script>
    CKEDITOR.replace('deskripsi');

    function previewImage() {
        const input = document.getElementById('gambar');
        const preview = document.getElementById('img-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'inline-block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    include "koneksi.php";
    session_start();

    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk = '" . $_GET['id'] . "'");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Koleksi Boneka | Toko Boneka Oktifia</title>
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

    .current-img {
        border-radius: 15px;
        border: 4px solid #fff;
        box-shadow: 0 5px 15px rgba(255, 105, 180, 0.2);
        object-fit: cover;
    }

    .form-label {
        font-weight: 600;
        color: #ff1493;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #ffc0cb;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff69b4;
        box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.2);
    }

    .btn-update {
        background-color: #ff69b4;
        border: none;
        border-radius: 12px;
        padding: 12px;
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
                        <li class="nav-item"><a class="nav-link btn btn-light btn-sm text-danger fw-bold ms-lg-2 px-3"
                                href="keluar.php">Logout</a></li>
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
                    <h3 class="fw-bold mb-0" style="color: #ff1493;">Edit Data Boneka</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="form-label">Kategori Koleksi</label>
                                    <select class="form-select" name="kategori" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                        $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                                        while ($r = mysqli_fetch_array($kategori)) {
                                            $selected = ($r['idkategori'] == $p->idkategori) ? 'selected' : '';
                                            echo "<option value='".$r['idkategori']."' $selected>".$r['namakategori']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama Boneka</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="<?php echo $p->namaproduk ?>" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $p->harga ?>"
                                    required>
                            </div>

                            <div class="mb-4 text-center p-4 bg-light rounded-4 border border-white">
                                <label class="form-label d-block mb-3">Foto Boneka Saat Ini</label>
                                <img src="./image/<?php echo $p->gambar ?>" width="180px" class="current-img mb-3"
                                    id="preview">
                                <input type="hidden" name="foto_lama" value="<?php echo $p->gambar ?>">
                                <div class="px-md-5">
                                    <input type="file" name="gambar_baru" class="form-control"
                                        onchange="previewImage(event)">
                                    <small class="text-muted mt-2 d-block"><i>*Kosongkan jika tidak ingin ganti
                                            foto</i></small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cerita/Deskripsi Boneka</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control"><?php echo $p->deskripsi ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Status Ketersediaan</label>
                                <select class="form-select" name="status">
                                    <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Tersedia
                                        (Aktif)</option>
                                    <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Habis (Tidak
                                        Aktif)</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-update w-100 shadow-sm">
                                <i class="bi bi-heart-arrow me-2"></i>Simpan Perubahan Koleksi
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $kategori  = $_POST['kategori'];
                            $nama      = $_POST['nama'];
                            $harga     = $_POST['harga'];
                            $deskripsi = $_POST['deskripsi'];
                            $status    = $_POST['status'];
                            $foto_lama = $_POST['foto_lama'];

                            $filename = $_FILES['gambar_baru']['name'];
                            $tmp_name = $_FILES['gambar_baru']['tmp_name'];

                            if ($filename != '') {
                                $type1 = explode('.', $filename);
                                $type2 = strtolower(end($type1));
                                $newname = 'image' . time() . '.' . $type2;
                                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                                if (!in_array($type2, $tipe_diizinkan)) {
                                    echo '<div class="alert alert-danger mt-3 text-center">Format file tidak diizinkan!</div>';
                                } else {
                                    if(file_exists('./image/' . $foto_lama)) {
                                        unlink('./image/' . $foto_lama);
                                    }
                                    move_uploaded_file($tmp_name, './image/' . $newname);
                                    $namagambar = $newname;
                                }
                            } else {
                                $namagambar = $foto_lama;
                            }

                            $update = mysqli_query($conn, "UPDATE produk SET 
                                idkategori = '$kategori',
                                namaproduk = '$nama',
                                harga      = '$harga',
                                deskripsi  = '$deskripsi',
                                gambar     = '$namagambar',
                                status     = '$status'
                                WHERE idproduk = '".$p->idproduk."'");

                            if ($update) {
                                echo '<script>alert("Koleksi boneka berhasil diperbarui, Oktifia!"); window.location="produk.php";</script>';
                            } else {
                                echo 'Gagal ' . mysqli_error($conn);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top py-4 text-center text-muted mt-auto">
        <div class="container">
            <small>&copy; 2025 - <strong>Toko Boneka Oktifia</strong>. Dibuat dengan <i
                    class="bi bi-heart-fill text-danger"></i></small>
        </div>
    </footer>

    <script>
    CKEDITOR.replace('deskripsi');

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</body>

</html>
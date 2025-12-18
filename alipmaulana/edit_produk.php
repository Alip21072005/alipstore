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
    <title>Edit Produk | Kedai Kito Online</title>
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

    .current-img {
        border-radius: 15px;
        border: 3px solid #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 600;
        color: #444;
    }

    .btn-update {
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s;
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
                    <h3 class="fw-bold mb-0">Edit Data Produk</h3>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Kategori Produk</label>
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
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="<?php echo $p->namaproduk ?>" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $p->harga ?>"
                                    required>
                            </div>

                            <div class="mb-4 text-center p-3 bg-light rounded-4">
                                <label class="form-label d-block mb-3">Foto Produk Saat Ini</label>
                                <img src="image/<?php echo $p->gambar ?>" width="150px" class="current-img mb-3"
                                    id="preview">
                                <input type="hidden" name="foto_lama" value="<?php echo $p->gambar ?>">
                                <input type="file" name="gambar_baru" class="form-control"
                                    onchange="previewImage(event)">
                                <small class="text-muted mt-2 d-block small italic">*Biarkan kosong jika tidak ingin
                                    mengubah foto</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Produk</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control"><?php echo $p->deskripsi ?></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Status Produk</label>
                                <select class="form-select" name="status">
                                    <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Aktif</option>
                                    <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Tidak Aktif
                                    </option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-update w-100 shadow-sm">
                                <i class="bi bi-save me-2"></i>Simpan Perubahan
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
                                $newname = 'produk' . time() . '.' . $type2;
                                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                                if (!in_array($type2, $tipe_diizinkan)) {
                                    echo '<div class="alert alert-danger mt-3">Format file tidak diizinkan!</div>';
                                } else {
                                    // Hapus foto lama jika ada
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
                                echo '<script>alert("Data berhasil diperbarui!"); window.location="produk.php";</script>';
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
        <small>&copy; 2025 - <strong>Kedai Kito Online</strong></small>
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
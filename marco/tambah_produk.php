<?php
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | toko kaset</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>

<body>

<!-- HEADER -->
<header>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">toko kaset</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="./">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategori.php">Data Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="produk.php">Data Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="keluar.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- CONTENT -->
<div class="section">
    <div class="container">
        <h3>Tambah Produk</h3>

        <div class="card mb-5">
            <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- KATEGORI -->
                    <select class="form-select mb-3" name="kategori" required>
                        <option value="">-- Pilih Kategori Produk --</option>
                        <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                        while ($r = mysqli_fetch_array($kategori)) {
                        ?>
                            <option value="<?php echo $r['idkategori']; ?>">
                                <?php echo $r['namakategori']; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <!-- NAMA -->
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Produk" required>

                    <!-- HARGA -->
                    <input type="number" name="harga" class="form-control mb-3" placeholder="Harga Produk" required>

                    <!-- GAMBAR -->
                    <input type="file" name="gambar" class="form-control mb-3" required>

                    <!-- DESKRIPSI -->
                    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi Produk"></textarea>
                    <script>
                        CKEDITOR.replace('deskripsi');
                    </script>

                    <!-- STATUS -->
                    <select class="form-select mt-3" name="status" required>
                        <option value="">-- Pilih Status Aktif --</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];

                    $filename   = $_FILES['gambar']['name'];
                    $tmp_name   = $_FILES['gambar']['tmp_name'];
                    $ext        = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                    $newname    = 'produk_' . time() . '.' . $ext;
                    $allowed    = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($ext, $allowed)) {
                        echo '<script>alert("Format gambar tidak diizinkan")</script>';
                    } else {

                        move_uploaded_file($tmp_name, './image/' . $newname);

                        $insert = mysqli_query($conn, "
                            INSERT INTO produk (
                                idkategori,
                                namaproduk,
                                harga,
                                deskripsi,
                                gambar,
                                status
                            ) VALUES (
                                '$kategori',
                                '$nama',
                                '$harga',
                                '$deskripsi',
                                '$newname',
                                '$status'
                            )
                        ");

                        if ($insert) {
                            echo '<script>alert("Tambah Data Berhasil"); window.location="produk.php";</script>';
                        } else {
                            echo 'Gagal: ' . mysqli_error($conn);
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer>
    <div class="mt-5 bg-primary text-light p-3 text-center">
        <small>Copyright &copy; 2025 - toko kaset</small>
    </div>
</footer>

</body>
</html>
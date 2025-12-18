<?php
include "koneksi.php";
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
    <title>Dashboard | Toko Rafi</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

</head>

<body>
    <!---- header ---->
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="#">Toko Rafi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategori.php">Data Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keluar.php">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--- content --->
    <div class="section">
        <div class="container">
            <h3>Tambah Produk</h3>
            <div class="card mb-5">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select class="form-select mb-3" name="kategori" required>
                            <option value="">-- Pilih Kategori Produk --</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                            while ($r = mysqli_fetch_array($kategori)) {
                            ?>
                            <option value="<?php echo $r['idkategori'] ?> "><?php echo $r['namakategori'] ?></option>
                            <?php }  ?>
                        </select>
                        <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Produk" required>
                        <input type="number" name="harga" class="form-control mb-3" placeholder="Harga Produk" required>
                        <input type="file" name="gambar" class="form-control mb-3" required>
                        <textarea name="deskripsi" class="input-control" placeholder="Deskripsi Produk"></textarea>
                        <script>
                        CKEDITOR.replace('deskripsi');
                        </script>
                        <select class="form-select mt-3" name="status">
                            <option value="">-- Pilih Status Aktif --</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">

                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
    // 1. Menampung input dari form
    $kategori   = $_POST['kategori'];
    $nama       = $_POST['nama'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];
    $status     = $_POST['status'];

    // 2. Menampung data file
    $filename   = $_FILES['gambar']['name'];
    $tmp_name   = $_FILES['gambar']['tmp_name'];

    // Ambil ekstensi file dengan cara yang lebih aman
    $type2      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Membuat nama file baru yang unik
    $newname    = 'produk' . time() . '.' . $type2;

    // Format file yang diizinkan
    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    // 3. Validasi format file
    if (!in_array($type2, $tipe_diizinkan)) {
        echo '<script>alert("Format file tidak diizinkan")</script>';
    } else {
        // Cek apakah folder "image" ada, jika tidak buat foldernya
        if (!is_dir('image')) {
            mkdir('image');
        }

        // 4. Proses upload file ke folder
        if (move_uploaded_file($tmp_name, './image/' . $newname)) {
            
            // 5. Insert ke database jika upload berhasil
            $insert = mysqli_query($conn, "INSERT INTO produk (idkategori, namaproduk, harga, deskripsi, gambar, status) VALUES (
                '".$kategori."',
                '".$nama."',
                '".$harga."',
                '".$deskripsi."',
                '".$newname."',
                '".$status."'
            )");

            if ($insert) {
                echo '<script>alert("Tambah Data Berhasil") </script>';
                echo '<script>window.location="produk.php" </script>';
            } else {
                echo 'Gagal database: ' . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Gagal mengunggah file ke folder tujuan")</script>';
        }
    }
}
                    ?>

                </div>
            </div>
        </div>

        <!--- footer --->
        <footer>
            <div class="mt-5 bg-primary text-light p-3 text-center">
                <small>Copyright &copy; 2025 - Toko Rafi</small>
            </div>
        </footer>

</body>

</html>
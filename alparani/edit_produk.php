<?php
include "koneksi.php";
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk = '" . $_GET['id'] . "'");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <!---- header ---->
    <header>

        <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="#">Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="#">Data Produk</a>
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
            <h3>Edit Produk</h3>
            <div class="card mb-5">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select class="form-select" name="kategori" required>
                            <option value="">-- Pilih Kategori Produk --</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
                            while ($r = mysqli_fetch_array($kategori)) {
                            ?>
                                <option value="<?php echo $r['idkategori'] ?>" <?php echo ($r['idkategori'] == $p->idkategori) ? 'selected' : ''; ?> "><?php echo $r['namakategori'] ?></option>
                        <?php }  ?>
                    </select>
                    <input type=" text" name="nama" class="form-control mt-3" placeholder="Nama Produk" value="<?php echo $p->namaproduk ?>" required>
                                    <input type="number" name="harga" class="form-control mt-3" placeholder="Harga Produk" value="<?php echo $p->harga ?>" required>

                                    <img src="produk/<?php echo $p->gambar  ?> " width="100px">
                                    <input type="hidden" name="gambar" value="<?php echo $p->gambar ?>">
                                    <input type="file" name="gambar" class="form-control mt-3">
                                    <textarea name="deskripsi" class="form-control mt-3" placeholder="Deskripsi Produk"><?php echo $p->deskripsi ?></textarea>
                                    <select class="form-select mt-3" name="status">
                                        <option value="">-- Pilih Status Aktif --</option>
                                        <option value="1" <?php echo ($p->status == 1) ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="0" <?php echo ($p->status == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                                    </select>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">

                    </form>
                    <?php
                    if (isset($_POST['submit'])) {

                        // data inputan dari form
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $harga      = $_POST['harga'];
                        $deskripsi  = $_POST['deskripsi'];
                        $status   = $_POST['status'];
                        $gambar   = $_POST['gambar'];

                        // data gambar yang baru

                        $filename   = $_FILES['gambar']['name'];
                        $tmp_name   = $_FILES['gambar']['tmp_name'];



                        // jika admin ganti bambar
                        if ($filename != '') {

                            $type1       = explode('.', $filename);
                            $type2       = $type1[1];

                            $newname    = 'produk' . time() . '.' . $type2;

                            // menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
                            // validasi format file
                            if (!in_array($type2, $tipe_diizinkan)) {

                                // jika format file tidak ada didalam tipe diizinkan
                                echo '<script>alert("Format File tidak Diizinkan")</script>';
                            } else {
                                unlink('./image/' . $gambar);
                                move_uploaded_file($tmp_name, './image/' . $newname);
                                $namagambar = $newname;
                            }
                        } else {
                            // jika admin tidak ganti gambar
                            $namagambar = $gambar;
                        }
                        // query update data produk
                        $update = mysqli_query($conn, "UPDATE produk SET
                                            idkategori = '" . $kategori . "',
                                            namaproduk = '" . $nama . "',
                                            harga = '" . $harga . "',
                                            deskripsi = '" . $deskripsi . "',
                                            gambar = '" . $gambar . "',
                                            status= '" . $status . "'
                                            WHERE idproduk = '" . $p->idproduk . "' ");

                        if ($update) {
                            echo '<script>alert("Update Data Berhasil") </script>';
                            echo '<script>window.location="produk.php" </script>';
                        } else {
                            echo 'Gagal' . mysqli_error($conn);
                        }
                    }
                    ?>

                </div>
            </div>
        </div>

        <!--- footer --->
        <footer>
            <div class="mt-5 bg-primary text-light p-3 text-center">
                <small>Copyright &copy; 2025 - Kedai Kito Online</small>
            </div>
        </footer>

</body>

</html>
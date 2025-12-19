<?php
include "koneksi.php";
session_start();
include "koneksi.php";

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE idkategori = '" . $_GET['id'] . "'");
if (mysqli_num_rows($kategori) == 0) {
    echo '<script>window.location="kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
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
                            <a class="nav-link" href="#">Log-Out</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--- content --->
    <div class="section">
        <div class="container">
            <h3>Edit Kategori</h3>
            <div class="card mb-5">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="col-12">
                            <label for="editKategori" class="form-label">Kategori Produk</label>
                            <input type="text" class="form-control" name="kategori" value="<?php echo $k->namakategori ?>">

                        </div>
                        <div class="col-auto mt-3">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $nama = ucwords($_POST['kategori']);

                        $update = mysqli_query($conn, "UPDATE kategori SET 
                                                    namakategori = '" . $nama . "'
                                                    WHERE idkategori = '" . $k->idkategori . "' ");
                        if ($update) {
                            echo '<script>alert("Data Kategori Berhasil Di Edit") </script>';
                            echo '<script>window.location="kategori.php" </script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
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
<?php
include "auth.php";
include "koneksi.php";

if (!isset($_GET['id'])) {
    echo '<script>window.location="produk.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk = '".$_GET['id']."'");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>window.location="produk.php"</script>';
}
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Produk | Tokoh Buah Being Muhammad Online</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body { background:#f4f6f9; }
.sidebar {
    width:260px;
    min-height:100vh;
    background:#0d6efd;
}
.sidebar a {
    color:#fff;
    text-decoration:none;
}
.sidebar a:hover,
.sidebar a.active {
    background:rgba(255,255,255,.2);
}
.card { border-radius:1rem; }
.preview-img {
    max-width:150px;
    border-radius:.5rem;
}
</style>
</head>

<body>

<div class="d-flex">

<!-- SIDEBAR -->
<div class="sidebar p-4">
    <h5 class="fw-bold mb-4">
        🍉 Tokoh Buah<br>Being Muhammad Online
    </h5>

    <a href="dashboard.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="kategori.php" class="d-block p-2 rounded mb-2">
        <i class="bi bi-tags me-2"></i> Data Kategori
    </a>
    <a href="produk.php" class="d-block p-2 rounded mb-2 active">
        <i class="bi bi-box me-2"></i> Data Produk
    </a>
    <a href="logout.php" class="d-block p-2 rounded mb-2 text-warning">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
</div>

<!-- MAIN CONTENT -->
<div class="flex-fill p-4">

<h3 class="fw-bold mb-4">Edit Produk</h3>

<div class="row justify-content-center">
<div class="col-md-8">

<div class="card shadow-sm">
<div class="card-body p-4">

<form action="" method="POST" enctype="multipart/form-data">

<!-- KATEGORI -->
<select class="form-select mb-3" name="kategori" required>
<option value="">-- Pilih Kategori --</option>
<?php
$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY idkategori DESC");
while ($k = mysqli_fetch_array($kategori)) {
?>
<option value="<?= $k['idkategori']; ?>"
<?= ($k['idkategori'] == $p->idkategori) ? 'selected' : ''; ?>>
<?= $k['namakategori']; ?>
</option>
<?php } ?>
</select>

<input type="text" name="nama" class="form-control mb-3"
value="<?= $p->namaproduk; ?>" required>

<input type="number" name="harga" class="form-control mb-3"
value="<?= $p->harga; ?>" required>

<label class="fw-semibold mb-1">Gambar Saat Ini</label><br>
<img src="image/<?= $p->gambar; ?>" class="preview-img mb-3">

<input type="hidden" name="gambar_lama" value="<?= $p->gambar; ?>">

<input type="file" name="gambar" class="form-control mb-3">

<textarea name="deskripsi" class="form-control mb-3" rows="4"><?= $p->deskripsi; ?></textarea>

<select class="form-select mb-4" name="status" required>
<option value="1" <?= ($p->status == 1) ? 'selected' : ''; ?>>Aktif</option>
<option value="0" <?= ($p->status == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
</select>

<div class="d-flex justify-content-between">
<a href="produk.php" class="btn btn-secondary">Kembali</a>
<button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
</div>

</form>

<?php
if (isset($_POST['submit'])) {

    $kategori   = $_POST['kategori'];
    $nama       = $_POST['nama'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];
    $status     = $_POST['status'];
    $gambarLama = $_POST['gambar_lama'];

    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    if ($filename != '') {
        $type = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if (!in_array($type, $allowed)) {
            echo '<script>alert("Format gambar tidak diizinkan")</script>';
            exit;
        }

        unlink('./image/'.$gambarLama);
        $namagambar = 'produk'.time().'.'.$type;
        move_uploaded_file($tmp_name, './image/'.$namagambar);
    } else {
        $namagambar = $gambarLama;
    }

    $update = mysqli_query($conn, "UPDATE produk SET
        idkategori='$kategori',
        namaproduk='$nama',
        harga='$harga',
        deskripsi='$deskripsi',
        gambar='$namagambar',
        status='$status'
        WHERE idproduk='".$p->idproduk."'
    ");

    if ($update) {
        echo '<script>alert("Produk berhasil diperbarui");window.location="produk.php";</script>';
    } else {
        echo 'Gagal: '.mysqli_error($conn);
    }
}
?>

</div>
</div>
</div>
</div>

<footer class="mt-5 text-center text-muted">
<small>&copy; 2025 — <b>Tokoh Buah Being Muhammad Online</b></small>
</footer>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

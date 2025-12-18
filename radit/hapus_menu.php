<?php
session_start();

// JIKA BUKAN ADMIN → TOLAK
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    echo "<script>
        alert('Akses ditolak! Hanya admin yang bisa menghapus menu.');
        window.location='dashboard.php';
    </script>";
    exit;
}
?>

<?php
include "koneksi.php";

$id = $_GET['id'];

// Ambil nama foto
$q = mysqli_query($conn, "SELECT foto FROM menu WHERE idmenu='$id'");
$data = mysqli_fetch_assoc($q);

// Hapus file foto
if(file_exists("image/".$data['foto'])){
    unlink("image/".$data['foto']);
}

// Hapus data menu
mysqli_query($conn, "DELETE FROM menu WHERE idmenu='$id'");

echo "<script>
    alert('Menu berhasil dihapus');
    location='menu.php';
</script>";

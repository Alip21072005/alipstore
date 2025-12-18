<?php
session_start();
include "koneksi.php";
?>

<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu | Gabutin Coffeshop</title>
</head>

<body style="font-family:Segoe UI; background:linear-gradient(90deg,#fff,#ffe89a); margin:0">

<!-- NAVBAR -->
<div style="background:#f1c40f;padding:15px">
    <div style="max-width:1200px;margin:auto;display:flex;justify-content:space-between">
        <b>☕ Gabutin Coffeshop</b>
        <a href="dashboard.php" style="text-decoration:none;background:#fff;padding:8px 15px;border-radius:20px">
            ⬅ Dashboard
        </a>
    </div>
</div>

<div style="max-width:1200px;margin:40px auto;padding:0 20px">

<?php
$kategori = ['Coffee','Makanan Berat','Cemilan'];

foreach($kategori as $k){
    echo "<h2 style='margin-top:40px'>$k</h2>";
    echo "<div style='display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px'>";
    
    $q = mysqli_query($conn,"SELECT * FROM menu WHERE kategori='$k'");
    while($row = mysqli_fetch_assoc($q)){
?>
    <div style="background:#fff;border-radius:18px;padding:20px;text-align:center;box-shadow:0 8px 20px rgba(0,0,0,.1)">
        
        <!-- FOTO BULAT -->
        <div style="width:160px;height:160px;margin:0 auto 15px;border-radius:50%;overflow:hidden">
            <img src="image/<?php echo $row['foto'] ?>" 
                 style="width:100%;height:100%;object-fit:cover">
        </div>

        <b><?php echo $row['nama_menu'] ?></b>
        <p>Rp <?php echo number_format($row['harga']) ?></p>
            <?php if(isset($_SESSION['admin'])) { ?>
    <a href="hapus_menu.php?id=<?php echo $row['idmenu'] ?>"
       onclick="return confirm('Yakin ingin menghapus menu ini?')"
       style="
           display:inline-block;
           margin-top:10px;
           background:#e74c3c;
           color:#fff;
           padding:6px 15px;
           border-radius:20px;
           text-decoration:none;
           font-size:14px;
       ">
       🗑 Hapus
    </a>
<?php } ?>

        <a target="_blank"
           href="https://wa.me/message/085835317418<?php echo $row['nama_menu'] ?>"
           style="background:#25d366;color:#fff;padding:8px 20px;border-radius:20px;text-decoration:none">
           Order WhatsApp
        </a>
    </div>
<?php
    }
    echo "</div>";
}
?>

</div>

<footer style="background:#f1c40f;text-align:center;padding:15px;margin-top:50px">
© 2025 Gabutin Coffeshop • Radit Stiawan
</footer>

</body>
</html>

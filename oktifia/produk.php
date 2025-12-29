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
    <title>Data Produk | Kedai Kito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* SOLUSI FOTO TERLALU BESAR */
    .img-container {
        width: 70px;
        height: 70px;
        overflow: hidden;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .prod-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Memotong gambar secara proporsional agar pas di kotak */
        transition: transform 0.3s ease;
    }

    .prod-img:hover {
        transform: scale(1.2);
        /* Efek zoom halus saat kursor di atas foto */
    }

    .table align-middle td {
        vertical-align: middle;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Kedai Kito</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link active" href="produk.php">Produk</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger btn-sm text-white ms-2"
                            href="keluar.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Daftar Produk</h3>
            <a href="tambah_produk.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="60px">No</th>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th width="150px" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $query = "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) ORDER BY idproduk DESC";
                                $produk = mysqli_query($conn, $query);
                                
                                if(mysqli_num_rows($produk) > 0){
                                    while($row = mysqli_fetch_array($produk)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><span class="badge bg-info text-dark"><?php echo $row['namakategori'] ?></span></td>
                                <td class="fw-bold"><?php echo $row['namaproduk'] ?></td>
                                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <div class="img-container shadow-sm">
                                        <a href="image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="prod-img" alt="Produk">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <?php echo ($row['status'] == 1)? 
                                        '<span class="text-success"><i class="bi bi-check-circle-fill"></i> Aktif</span>' : 
                                        '<span class="text-danger"><i class="bi bi-x-circle-fill"></i> Tidak Aktif</span>'; 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>"
                                        class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php }} else { ?>
                            <tr>
                                <td colspan="7" class="text-center">Data tidak ditemukan</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
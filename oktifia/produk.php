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
    <title>Koleksi Boneka | Toko Boneka Oktifia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    body {
        background-color: #fff5f7;
        /* Pink Muda */
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        background-color: #ff69b4 !important;
        box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
    }

    /* Styling Gambar Produk */
    .img-container {
        width: 65px;
        height: 65px;
        overflow: hidden;
        border-radius: 12px;
        border: 2px solid #ffc0cb;
        background-color: white;
    }

    .prod-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .prod-img:hover {
        transform: scale(1.25);
    }

    /* Table Styling */
    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(255, 105, 180, 0.1);
    }

    .table thead {
        background-color: #fff0f5;
    }

    .table th {
        color: #ff1493;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border: none;
    }

    .badge-category {
        background-color: #fff0f5;
        color: #ff1493;
        border: 1px solid #ffc0cb;
    }

    .btn-add {
        background-color: #ff69b4;
        border: none;
        color: white;
        transition: 0.3s;
    }

    .btn-add:hover {
        background-color: #ff1493;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 20, 147, 0.3);
        color: white;
    }

    .btn-action {
        border-radius: 8px;
        transition: 0.2s;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-heart-fill me-2"></i>Oktifia Doll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="kategori.php">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link active" href="produk.php">Produk</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-light btn-sm text-danger fw-bold ms-lg-2 px-3"
                            href="keluar.php" onclick="return confirm('Apakah Oktifia yakin ingin keluar?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="fw-bold mb-0" style="color: #ff1493;">Koleksi Produk Boneka</h3>
                <p class="text-muted small">Kelola stok dan etalase tokomu di sini.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="tambah_produk.php" class="btn btn-add px-4 py-2 rounded-pill shadow-sm fw-bold">
                    <i class="bi bi-plus-circle-fill me-2"></i>Tambah Produk
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4" width="60px">No</th>
                                <th>Kategori</th>
                                <th>Nama Boneka</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th width="150px" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                // Menyesuaikan query dengan join ke tabel kategori
                                $query = "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) ORDER BY idproduk DESC";
                                $produk = mysqli_query($conn, $query);
                                
                                if(mysqli_num_rows($produk) > 0){
                                    while($row = mysqli_fetch_array($produk)){
                            ?>
                            <tr>
                                <td class="ps-4 fw-bold text-muted"><?php echo $no++ ?></td>
                                <td><span
                                        class="badge badge-category px-3 py-2 rounded-pill"><?php echo $row['namakategori'] ?></span>
                                </td>
                                <td class="fw-semibold"><?php echo $row['namaproduk'] ?></td>
                                <td class="text-pink">Rp <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <div class="img-container shadow-sm">
                                        <a href="./image/<?php echo $row['gambar'] ?>" target="_blank">
                                            <img src="image/<?php echo $row['gambar'] ?>" class="prod-img" alt="Boneka">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <?php echo ($row['status'] == 1)? 
                                        '<span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3"><i class="bi bi-check2-circle me-1"></i> Tersedia</span>' : 
                                        '<span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3"><i class="bi bi-x-circle me-1"></i> Habis</span>'; 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="edit_produk.php?id=<?php echo $row['idproduk'] ?>"
                                        class="btn btn-sm btn-outline-warning btn-action me-1" title="Edit Data">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="proses_hapus.php?idp=<?php echo $row['idproduk'] ?>"
                                        class="btn btn-sm btn-outline-danger btn-action"
                                        onclick="return confirm('Apakah Oktifia yakin ingin menghapus boneka ini dari etalase?')"
                                        title="Hapus Data">
                                        <i class="bi bi-trash3"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }} else { ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-emoji-frown fs-1 d-block mb-2"></i>
                                    Belum ada koleksi boneka yang ditambahkan.
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <small class="text-muted">Copyright &copy; 2025 - <strong>Toko Boneka Oktifia</strong>. All rights
                reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
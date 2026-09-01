<?php 
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
        exit;
    }

    $total_kategori = dummy_num_rows(dummy_query($conn, "SELECT * FROM kategori"));
    $total_produk   = dummy_num_rows(dummy_query($conn, "SELECT * FROM produk"));
    
    // Ambil 8 produk terbaru untuk slider
    $produk_terbaru = dummy_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (idkategori) ORDER BY idproduk DESC LIMIT 8");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Kedai gue</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; padding-bottom: 80px; }
        .navbar { background: linear-gradient(90deg, #0d6efd, #6610f2) !important; }
        
        /* Container Geser (Horizontal Scroll) */
        .product-slider {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 10px 5px 25px 5px;
            scrollbar-width: thin; /* Untuk Firefox */
            scroll-snap-type: x mandatory;
        }

        /* Mempercantik Scrollbar untuk Chrome/Safari */
        .product-slider::-webkit-scrollbar { height: 8px; }
        .product-slider::-webkit-scrollbar-thumb { background: #dee2e6; border-radius: 10px; }

        .product-item {
            min-width: 280px; /* Lebar tiap kartu */
            max-width: 280px;
            scroll-snap-align: start;
            transition: 0.3s;
        }

        .product-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            height: 100%;
        }

        .product-card:hover { transform: translateY(-10px); }

        .img-wrapper {
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.9);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            color: #0d6efd;
        }

        .price-text { font-size: 1.1rem; color: #0d6efd; font-weight: 800; }
        
        .welcome-banner {
            background: linear-gradient(45deg, #0d6efd, #00d2ff);
            color: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark py-3 sticky-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="fas fa-store me-2"></i>KEDAI GUE</a>
            <div class="ms-auto">
                <a href="keluar.php" class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-primary">LOGOUT</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="welcome-banner shadow">
            <h2 class="fw-bold">Halo, pelanggan! 👋</h2>
            <p class="m-0 opacity-75">Berikut adalah ringkasan data produk terbaru di Kedai gue hari ini.</p>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0"><i class="fas fa-fire text-danger me-2"></i>Produk Terbaru</h5>
            <a href="produk.php" class="btn btn-outline-primary btn-sm rounded-pill px-3">Lihat Semua</a>
        </div>

        <div class="product-slider">
            <?php 
                if(dummy_num_rows($produk_terbaru) > 0){
                    while($row = dummy_fetch_array($produk_terbaru)){
            ?>
            <div class="product-item">
                <div class="product-card">
                    <div class="img-wrapper">
                        <img src="image/<?php echo $row['gambar'] ?>" alt="">
                        <span class="category-tag text-uppercase"><?php echo $row['namakategori'] ?></span>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark text-truncate mb-1"><?php echo $row['namaproduk'] ?></h6>
                        <p class="price-text mb-3">Rp <?php echo number_format($row['harga']) ?></p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge <?php echo ($row['status'] == 1) ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger'; ?> rounded-pill">
                                <?php echo ($row['status'] == 1) ? 'Aktif' : 'Off'; ?>
                            </span>
                            <div class="btn-group">
                                <a href="edit-produk.php?id=<?php echo $row['idproduk'] ?>" class="btn btn-sm btn-outline-secondary border-0"><i class="fas fa-edit"></i></a>
                                <a href="proses-hapus.php?idp=<?php echo $row['idproduk'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-outline-danger border-0"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                    }
                } else {
                    echo "<p class='text-muted'>Belum ada produk.</p>";
                }
            ?>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-6 col-md-3">
                <div class="card p-3 border-0 shadow-sm rounded-4 text-center">
                    <h3 class="fw-bold m-0 text-primary"><?php echo $total_kategori ?></h3>
                    <small class="text-muted fw-bold">KATEGORI</small>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card p-3 border-0 shadow-sm rounded-4 text-center">
                    <h3 class="fw-bold m-0 text-success"><?php echo $total_produk ?></h3>
                    <small class="text-muted fw-bold">PRODUK</small>
                </div>
            </div>
        </div>

    </div>

    <footer class="bg-white border-top py-3 fixed-bottom shadow-lg">
        <div class="container d-flex justify-content-around">
            <a href="dashboard.php" class="text-primary text-center text-decoration-none">
                <i class="fas fa-home d-block fs-5"></i><small style="font-size: 10px;">Home</small>
            </a>
            <a href="kategori.php" class="text-muted text-center text-decoration-none">
                <i class="fas fa-tags d-block fs-5"></i><small style="font-size: 10px;">Kategori</small>
            </a>
            <a href="produk.php" class="text-muted text-center text-decoration-none">
                <i class="fas fa-box d-block fs-5"></i><small style="font-size: 10px;">Produk</small>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
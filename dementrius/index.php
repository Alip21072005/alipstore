<?php
    include 'koneksi.php';
    // Gunakan ini untuk mengecek apakah query berhasil atau tidak
    $query = "SELECT * FROM produk WHERE status = 1 ORDER BY idproduk DESC LIMIT 8";
    $produk = mysqli_query($conn, $query);

    // Jika query gagal, tampilkan pesan error untuk mempermudah perbaikan
    if (!$produk) {
        die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk | Kedai gue Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { background: linear-gradient(135deg, #0d6efd 0%, #00d2ff 100%) !important; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .hero-section { background: linear-gradient(rgba(13, 110, 253, 0.8), rgba(13, 110, 253, 0.8)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=1000'); background-size: cover; background-position: center; color: white; padding: 60px 0; margin-bottom: 40px; border-radius: 0 0 50px 50px; }
        .product-card { border: none; border-radius: 20px; overflow: hidden; transition: all 0.4s; background: #fff; height: 100%; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .product-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.15); }
        .img-container { height: 200px; overflow: hidden; position: relative; }
        .product-card img { width: 100%; height: 100%; object-fit: cover; }
        .price-badge { position: absolute; top: 15px; right: 15px; background: rgba(255, 255, 255, 0.9); color: #0d6efd; padding: 5px 15px; border-radius: 50px; font-weight: 800; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .btn-wa { background: #25d366; color: white; border: none; border-radius: 12px; font-weight: 600; }
        .btn-wa:hover { background: #128c7e; color: white; }
        footer { background: #333; color: white; padding: 40px 0; }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-3" href="index.php"><i class="fas fa-utensils me-2"></i> KEDAI GUE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fw-bold">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="produktoko.php">Produk</a></li>
                        <li class="nav-item ms-lg-3"><a class="btn btn-light rounded-pill px-4 text-primary fw-bold" href="login.php">LOGIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Menu Terlaris Hari Ini!</h1>
            <p class="lead">Nikmati sajian spesial dari Kedai Kito</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            <?php if (mysqli_num_rows($produk) > 0) { ?>
                <?php while ($p = mysqli_fetch_array($produk)) { ?>
                    <div class="col-lg-3 col-md-6 animate__animated animate__fadeInUp">
                        <div class="product-card">
                            <div class="img-container">
                                <img src="image/<?php echo $p['gambar']; ?>" alt="<?php echo $p['namaproduk']; ?>">
                                <div class="price-badge">
                                    Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?>
                                </div>
                            </div>
                            <div class="card-body p-4 text-center">
                                <h5 class="fw-bold mb-1"><?php echo $p['namaproduk']; ?></h5>
                                <p class="text-muted small mb-3"><?php echo $p['deskripsi']; ?></p>
                                <div class="d-grid">
                                    <a href="https://wa.me/6282281407734?text=Halo%20Kedai%20Kito,%20saya%20ingin%20pesan%20<?php echo urlencode($p['namaproduk']); ?>" 
                                       target="_blank" class="btn btn-wa">
                                        <i class="fab fa-whatsapp me-2"></i> Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-12 text-center py-5">
                    <h3>Produk tidak ditemukan.</h3>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <small>Copyright &copy; 2025 - Kedai gue Online</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
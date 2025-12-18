<?php
// Mengambil koneksi dari file root
include "koneksi.php";

// Ambil data statistik kunjungan dari database
$query = mysqli_query($conn, "SELECT * FROM statistik_toko");
$stats = [];
while($row = mysqli_fetch_assoc($query)){
    $stats[$row['nama_toko']] = $row['jumlah_kunjungan'];
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hub Toko SI | Universitas Dehasen</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
    :root {
        --primary-color: #0d6efd;
        --accent-color: #6610f2;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: #f0f2f5;
        color: #1a1d20;
    }

    .hero-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: white;
        padding: 100px 0 80px;
        border-radius: 0 0 50px 50px;
        margin-bottom: -50px;
    }

    .card-toko {
        border-radius: 24px;
        transition: all 0.4s ease;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .card-toko:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(13, 110, 253, 0.15);
    }

    .visit-count {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 0.75rem;
        background: rgba(13, 110, 253, 0.1);
        color: var(--primary-color);
        padding: 5px 12px;
        border-radius: 50px;
        font-weight: 700;
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background: #f8f9fa;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: var(--primary-color);
    }

    .btn-modern {
        border-radius: 15px;
        padding: 12px;
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: white;
        border: none;
        text-decoration: none;
        display: block;
        transition: 0.3s;
    }

    .btn-modern:hover {
        opacity: 0.9;
        color: white;
        transform: scale(1.02);
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark fixed-top" style="background: rgba(13, 110, 253, 0.9); backdrop-filter: blur(5px);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-cpu-fill me-2"></i>HUB SI DEHASEN</a>
            <div class="d-flex gap-2">
                <a href="/phpmyadmin/" target="_blank" class="btn btn-light btn-sm rounded-pill fw-bold">Admin
                    Database</a>
            </div>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container mt-4" data-aos="zoom-in">
            <h1 class="display-4 fw-800 mb-2 text-uppercase">Project UMKM Digital</h1>
            <p class="lead opacity-75">Koleksi Toko Online Mahasiswa Sistem Informasi</p>
        </div>
    </div>

    <div class="container mb-5" style="position: relative; z-index: 10;">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col" data-aos="fade-up" data-aos-delay="50">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count">
                        <i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['nada'] ?? 0); ?>
                    </span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-stars"></i></div>
                        <h4 class="fw-bold mb-4">Nada</h4>
                        <a href="visit.php?toko=nada" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['alipmaulana'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-shop"></i></div>
                        <h4 class="fw-bold mb-4">Alip Store</h4>
                        <a href="visit.php?toko=alipmaulana" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['sopiamarini'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-bag-check-fill"></i></div>
                        <h4 class="fw-bold mb-4">Sopia Manis</h4>
                        <a href="visit.php?toko=sopiamarini" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['dementrius'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-cup-hot-fill"></i></div>
                        <h4 class="fw-bold mb-4">Demen</h4>
                        <a href="visit.php?toko=dementrius" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="400">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['rafifaturiqbal'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-cart-fill"></i></div>
                        <h4 class="fw-bold mb-4">Toko Rafi</h4>
                        <a href="visit.php?toko=rafifaturiqbal" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="500">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['najwastore'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-stars"></i></div>
                        <h4 class="fw-bold mb-4">Najwa Store</h4>
                        <a href="visit.php?toko=najwastore" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="600">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['yosia'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-stars"></i></div>
                        <h4 class="fw-bold mb-4">Yosia</h4>
                        <a href="visit.php?toko=yosia" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="700">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['yunda'] ?? 0); ?></span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-heart-fill"></i></div>
                        <h4 class="fw-bold mb-4">Yunda</h4>
                        <a href="visit.php?toko=yunda" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="800">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count">
                        <i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['surya'] ?? 0); ?>
                    </span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-lightning-fill"></i></div>
                        <h4 class="fw-bold mb-4">Surya Store</h4>
                        <a href="visit.php?toko=surya" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="800">
                <div class="card card-toko h-100 p-4">
                    <span class="visit-count">
                        <i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats['radit'] ?? 0); ?>
                    </span>
                    <div class="text-center mt-3">
                        <div class="icon-circle"><i class="bi bi-lightning-fill"></i></div>
                        <h4 class="fw-bold mb-4">Radit </h4>
                        <a href="visit.php?toko=radit" class="btn btn-modern">Masuk Toko</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="py-5 text-center text-muted">
        <p class="mb-0 fw-bold">© 2025 Sistem Informasi - Universitas Dehasen</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,
        once: true
    });
    </script>
</body>

</html>
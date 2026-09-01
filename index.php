<?php
// Mengambil koneksi dari file root
include "koneksi.php";

// Ambil data statistik kunjungan dari database
$query = dummy_query($conn, "SELECT * FROM statistik_toko");
$stats = [];
while($row = dummy_fetch_assoc($query)){
    $stats[$row['nama_toko']] = $row['jumlah_kunjungan'];
}

// Daftar toko dan icon masing-masing agar lebih interaktif
$daftar_toko = [
    ['id' => 'nada', 'nama' => 'Nada', 'icon' => 'bi-stars', 'color' => '#ff6b6b'],
    ['id' => 'alipmaulana', 'nama' => 'Alip Store', 'icon' => 'bi-shop', 'color' => '#4ecdc4'],
    ['id' => 'sopiamarini', 'nama' => 'Sopia Manis', 'icon' => 'bi-bag-heart-fill', 'color' => '#ffe66d'],
    ['id' => 'dementrius', 'nama' => 'Demen', 'icon' => 'bi-cup-hot-fill', 'color' => '#ff9f43'],
    ['id' => 'rafifaturiqbal', 'nama' => 'Toko Rafi', 'icon' => 'bi-cart-fill', 'color' => '#2ecc71'],
    ['id' => 'berliana', 'nama' => 'Berliana', 'icon' => 'bi-gem', 'color' => '#9b59b6'],
    ['id' => 'yosia', 'nama' => 'Yosia', 'icon' => 'bi-lightning-charge-fill', 'color' => '#f1c40f'],
    ['id' => 'yunda', 'nama' => 'Yunda', 'icon' => 'bi-heart-fill', 'color' => '#e84393'],
    ['id' => 'surya', 'nama' => 'Surya Store', 'icon' => 'bi-sun-fill', 'color' => '#fdcb6e'],
    ['id' => 'radit', 'nama' => 'Radit', 'icon' => 'bi-controller', 'color' => '#0984e3'],
    ['id' => 'fina', 'nama' => 'Fina', 'icon' => 'bi-flower1', 'color' => '#fd79a8'],
    ['id' => 'rifat', 'nama' => 'Rifat', 'icon' => 'bi-rocket-takeoff-fill', 'color' => '#6c5ce7'],
    ['id' => 'dellar', 'nama' => 'Della Rahmadani', 'icon' => 'bi-handbag-fill', 'color' => '#fab1a0'],
    ['id' => 'marco', 'nama' => 'Marco', 'icon' => 'bi-shield-shaded', 'color' => '#2d3436'],
    ['id' => 'alparani', 'nama' => 'Alparani', 'icon' => 'bi-truck', 'color' => '#00b894'],
    ['id' => 'andalas', 'nama' => 'Andalas', 'icon' => 'bi-geo-alt-fill', 'color' => '#e17055'],
    ['id' => 'ilham', 'nama' => 'Ilham', 'icon' => 'bi-lightbulb-fill', 'color' => '#74b9ff'],
    ['id' => 'sandi', 'nama' => 'Sandi', 'icon' => 'bi-patch-check-fill', 'color' => '#55efc4'],
    ['id' => 'shopi', 'nama' => 'Shopi Ine Devita', 'icon' => 'bi-basket2-fill', 'color' => '#ff7675'],
    ['id' => 'nasya', 'nama' => 'Nasya', 'icon' => 'bi-magic', 'color' => '#a29bfe'],
    ['id' => 'yeni', 'nama' => 'Yeni', 'icon' => 'bi-palette-fill', 'color' => '#d63031'],
    ['id' => 'dayat', 'nama' => 'Dayat', 'icon' => 'bi-tools', 'color' => '#636e72'],
    ['id' => 'median', 'nama' => 'Median', 'icon' => 'bi-intersect', 'color' => '#00cec9'],
    ['id' => 'dellam', 'nama' => 'Della', 'icon' => 'bi-cloud-sun-fill', 'color' => '#ff9ff3'],
    ['id' => 'david', 'nama' => 'David', 'icon' => 'bi-laptop', 'color' => '#2f3542'],
    ['id' => 'jesika', 'nama' => 'Jesika', 'icon' => 'bi-emoji-smile-fill', 'color' => '#7bed9f'],
    ['id' => 'arya', 'nama' => 'Arya', 'icon' => 'bi-fire', 'color' => '#ff4757'],
    ['id' => 'fella', 'nama' => 'Fella', 'icon' => 'bi-gift-fill', 'color' => '#5352ed'],
    ['id' => 'naufal', 'nama' => 'Naufal Store', 'icon' => 'bi-cpu', 'color' => '#341f97'],
    ['id' => 'bintank', 'nama' => 'Bintank', 'icon' => 'bi-star-fill', 'color' => '#f368e0'],
    ['id' => 'oktifia', 'nama' => 'Oktifia', 'icon' => 'bi-shop-window', 'color' => '#a55eea']
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sistem Informasi | Universitas Dehasen</title>

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
        background: #f8f9fa;
        color: #1a1d20;
    }

    .hero-section {
        background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
        color: white;
        padding: 120px 0 100px;
        border-radius: 0 0 60px 60px;
        margin-bottom: -60px;
    }

    .card-toko {
        border-radius: 28px;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: rgba(255, 255, 255, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .card-toko:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 25px 50px rgba(13, 110, 253, 0.15);
    }

    .visit-count {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 0.8rem;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        padding: 6px 15px;
        border-radius: 50px;
        font-weight: 800;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        z-index: 2;
    }

    .icon-box {
        width: 85px;
        height: 85px;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 10px auto 25px;
        font-size: 2.5rem;
        transition: 0.3s;
        position: relative;
    }

    .card-toko:hover .icon-box {
        transform: rotate(10deg);
    }

    .btn-modern {
        border-radius: 18px;
        padding: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        background: #1a1d20;
        color: white;
        border: none;
        transition: 0.4s;
        width: 100%;
    }

    .btn-modern:hover {
        background: var(--primary-color);
        color: white;
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark fixed-top"
        style="background: rgba(13, 110, 253, 0.95); backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand fw-800 fs-4" href="#">
                <i class="bi bi-cpu-fill me-2"></i>TOKO SISTEM INFORMASI
            </a>
            <div class="d-flex gap-2">
                <a href="/phpmyadmin/" target="_blank" class="btn btn-light btn-sm rounded-pill px-3 fw-bold">
                    <i class="bi bi-database-fill-gear me-1"></i> Admin
                </a>
            </div>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container mt-4" data-aos="fade-down">
            <h1 class="display-3 fw-800 mb-2">UMKM DIGITAL</h1>
            <p class="lead opacity-75 fw-bold">Kreativitas Mahasiswa Sistem Informasi Universitas Dehasen</p>
        </div>
    </div>

    <div class="container mb-5" style="position: relative; z-index: 10;">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

            <?php foreach($daftar_toko as $index => $toko): ?>
            <div class="col" data-aos="fade-up" data-aos-delay="<?php echo ($index % 4) * 100; ?>">
                <div class="card card-toko h-100 p-4 shadow-sm text-center">
                    <span class="visit-count" style="color: <?php echo $toko['color']; ?>">
                        <i class="bi bi-eye-fill me-1"></i>
                        <?php echo number_format($stats[$toko['id']] ?? 0); ?>
                    </span>

                    <div class="mt-4">
                        <div class="icon-box"
                            style="background: <?php echo $toko['color']; ?>15; color: <?php echo $toko['color']; ?>;">
                            <i class="bi <?php echo $toko['icon']; ?>"></i>
                        </div>
                        <h5 class="fw-800 mb-4"><?php echo $toko['nama']; ?></h5>
                        <a href="visit.php?toko=<?php echo $toko['id']; ?>" class="btn btn-modern">
                            Jelajahi Toko <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <footer class="py-5 text-center">
        <hr class="container mb-4 opacity-10">
        <p class="mb-0 fw-bold text-muted">© 2025 Program Studi Sistem Informasi</p>
        <p class="small text-muted">Universitas Dehasen Bengkulu</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    AOS.init({
        duration: 800,
        once: true,
        easing: 'ease-out-back'
    });
    </script>
</body>

</html>
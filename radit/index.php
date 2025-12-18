<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gabutin Coffee Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #ffffff, #ffe082);
        }

        /* ===== TOP BAR ===== */
        .top-bar {
            background: #fff8e1;
            padding: 6px 0;
            font-size: 14px;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #fbc02d;
        }

        .navbar-brand,
        .nav-link {
            color: #3a2c1c !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #000 !important;
        }

        /* ===== HERO ===== */
        .hero {
            padding: 90px 0;
        }

        .hero h1 {
            font-weight: 800;
            color: #3a2c1c;
        }

        .hero p {
            color: #5d4037;
            font-size: 18px;
        }

        /* ===== BUTTON ===== */
        .btn-custom {
            background: #fbc02d;
            color: #3a2c1c;
            border-radius: 30px;
            padding: 10px 28px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: #f9a825;
        }

        /* ===== CARD ===== */
        .menu-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: 0.3s;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }

        /* ===== FOOTER ===== */
        footer {
            background: #fbc02d;
            color: #3a2c1c;
            padding: 15px 0;
            text-align: center;
            font-weight: 600;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>

<!-- ===== TOP BAR ===== -->
<div class="top-bar text-center">
    📞 WhatsApp: <strong>0858-3531-7418</strong>

</div>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <<a class="navbar-brand d-flex align-items-center" href="#">
    <!-- LOGO -->
    <img src="image/lOGO_RADIT_STIAWAN-removebg-preview.png" alt="Logo Gabutin" width="40" class="me-2">

    <!-- NAMA -->
     Gabutin Coffee
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="./">Dashboard</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="btn btn-dark btn-sm" href="login.php">Login Admin</a>
                </li>
                <a href="logout.php"
   onclick="return confirm('Yakin ingin logout?')"
   class="btn btn-danger">
   Logout
</a>

            </ul>
        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Ngopi Santai, Ide Mengalir ☕</h1>
                <p class="mt-3">
                    Gabutin Coffee Shop adalah tempat nongkrong nyaman dengan
                    kopi pilihan, makanan berat, dan cemilan favorit.
                </p>
                <a href="menu.php" class="btn btn-custom mt-3">Lihat Menu</a>
            </div>

            <div class="col-md-6 text-center">
            <!-- TEMPAT LOGO / FOTO PRODUK -->
<div style="
    width: 300px;
    height: 300px;
    margin: 0 auto 15px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    background: #fff;
">
    <img 
        src="image/foto.jpg" 
        alt="Menu Gabutin Coffeshop"
        style="
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        "
    >
</div>

            </div>
        </div>
    </div>
</section>

<!-- ===== MENU ===== -->
<section class="container my-5" id="menu.php">
    <h3 class="text-center fw-bold mb-4">Menu Favorit</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="menu-card p-3 text-center">
                <h5 class="fw-bold">Minuman</h5>
                <p>Kopi susu, espresso, latte, dll</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="menu-card p-3 text-center">
                <h5 class="fw-bold">Makanan Berat</h5>
                <p>Nasi, pasta, rice bowl</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="menu-card p-3 text-center">
                <h5 class="fw-bold">Cemilan</h5>
                <p>Snack, roti bakar, kentang</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
    © 2025 Gabutin Coffee Shop • Created by Radit Stiawan
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

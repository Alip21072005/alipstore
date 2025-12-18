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
        --glass-bg: rgba(255, 255, 255, 0.8);
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: #f0f2f5;
        color: #1a1d20;
        overflow-x: hidden;
    }

    /* Modern Gradient Background */
    .hero-section {
        background: radial-gradient(circle at top right, var(--accent-color), transparent),
            linear-gradient(135deg, var(--primary-color) 0%, #00d4ff 100%);
        color: white;
        padding: 100px 0 80px;
        border-radius: 0 0 50px 50px;
        margin-bottom: -50px;
    }

    /* Glassmorphism Card */
    .card-toko {
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .card-toko:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(13, 110, 253, 0.15);
        background: white;
    }

    /* Feature: Visit Badge */
    .visit-count {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 0.7rem;
        background: rgba(13, 110, 253, 0.1);
        color: var(--primary-color);
        padding: 4px 10px;
        border-radius: 10px;
        font-weight: 700;
    }

    .icon-circle {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2.5rem;
        color: var(--primary-color);
        transition: 0.3s;
    }

    .card-toko:hover .icon-circle {
        background: var(--primary-color);
        color: white;
        transform: rotate(-10deg);
    }

    .owner-label {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.65rem;
        font-weight: 800;
        color: #adb5bd;
        margin-bottom: 5px;
        display: block;
    }

    .btn-modern {
        border-radius: 15px;
        padding: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        transition: 0.3s;
        border: none;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        color: white;
    }

    .btn-modern:hover {
        opacity: 0.9;
        transform: scale(1.02);
        color: white;
    }

    /* Floating Animation for Hero */
    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }

        100% {
            transform: translateY(0px);
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
        style="background: rgba(13, 110, 253, 0.8); backdrop-filter: blur(5px);">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#"><i class="bi bi-cpu-fill me-2"></i>HUB SI</a>
            <a href="/phpmyadmin/" target="_blank" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="bi bi-database me-1"></i> Admin
            </a>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container mt-4" data-aos="zoom-in">
            <i class="bi bi-rocket-takeoff fs-1 mb-3 floating d-block text-warning"></i>
            <h1 class="display-4 fw-800 mb-2">Portal Toko Mahasiswa</h1>
            <p class="lead opacity-75 fw-light">Satu pintu untuk mengeksplorasi kreativitas digital Sistem Informasi
                Dehasen</p>
        </div>
    </div>

    <div class="container mb-5" style="position: relative; z-index: 10;">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">

            <div class="col" data-aos="fade-up" data-aos-delay="100">
                <div class="card card-toko h-100 p-4 border-0">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i> 1.2k</span>
                    <div class="text-center mt-3">
                        <div class="icon-circle shadow-sm"><i class="bi bi-lightning-charge"></i></div>
                        <span class="owner-label">Verified Merchant</span>
                        <h3 class="fw-bold mb-4">Alip Store</h3>
                        <a href="/alipmaulana/" class="btn btn-modern w-100">Enter Shop <i
                                class="bi bi-arrow-up-right-circle ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="200">
                <div class="card card-toko h-100 p-4 border-0">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i> 856</span>
                    <div class="text-center mt-3">
                        <div class="icon-circle shadow-sm"><i class="bi bi-gem"></i></div>
                        <span class="owner-label">Top Rated</span>
                        <h3 class="fw-bold mb-4">Kedai Kito</h3>
                        <a href="/sopiamarini/" class="btn btn-modern w-100">Enter Shop <i
                                class="bi bi-arrow-up-right-circle ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <div class="card card-toko h-100 p-4 border-0">
                    <span class="visit-count"><i class="bi bi-eye-fill me-1"></i> 520</span>
                    <div class="text-center mt-3">
                        <div class="icon-circle shadow-sm"><i class="bi bi-cup-hot-fill"></i></div>
                        <span class="owner-label">New Arrival</span>
                        <h3 class="fw-bold mb-4">Kedai Gue</h3>
                        <a href="/dementrius/" class="btn btn-modern w-100">Enter Shop <i
                                class="bi bi-arrow-up-right-circle ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col" data-aos="fade-up" data-aos-delay="400">
                <div class="card card-toko h-100 p-4 border-0"
                    style="background: rgba(0,0,0,0.03); border: 2px dashed #dee2e6;">
                    <div class="text-center mt-3 py-4">
                        <div class="mb-3 text-muted"><i class="bi bi-plus-circle-dotted fs-1"></i></div>
                        <h4 class="fw-bold text-muted">Join the Hub</h4>
                        <p class="text-muted small px-3">Daftarkan project UMKM Digital Anda sekarang.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="mt-5 py-5 text-center">
        <div class="container text-muted">
            <hr class="mb-5 opacity-25">
            <p class="mb-0 fw-bold">© 2025 Kolektif Sistem Informasi</p>
            <p class="small opacity-50">Universitas Dehasen Bengkulu</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,
        once: true
    });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Project VPS | Alip Maulana</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .hero-section {
        background: linear-gradient(rgba(0, 123, 255, 0.8), rgba(0, 123, 255, 0.8)), url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 80px 0;
        margin-bottom: 50px;
    }

    .card-project {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        background: white;
    }

    .card-project:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .icon-box {
        font-size: 3rem;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    .btn-visit {
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-cpu me-2"></i>Alip VPS Center</a>
                <div class="ms-auto">
                    <a href="/phpmyadmin" target="_blank" class="btn btn-outline-light btn-sm"><i
                            class="bi bi-database-fill-gear me-1"></i> Database Management</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di Portal VPS Saya</h1>
            <p class="lead">Direktori Project Website & Sistem Informasi Sistem Informasi Dehasen</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="text-center mb-5">
            <h3 class="fw-bold">Daftar Website Tersedia</h3>
            <hr class="mx-auto bg-primary" style="width: 100px; height: 3px;">
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">

            <div class="col">
                <div class="card card-project p-4 text-center">
                    <div class="icon-box">
                        <i class="bi bi-shop"></i>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">Kedai Kito Online</h4>
                        <p class="card-text text-muted">Sistem informasi penjualan makanan dan minuman dengan pemesanan
                            via WhatsApp.</p>
                        <div class="mt-auto pt-3">
                            <a href="/alipmaulana/" class="btn btn-primary btn-visit w-100">
                                Buka Website <i class="bi bi-box-arrow-up-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-project p-4 text-center">
                    <div class="icon-box text-secondary">
                        <i class="bi bi-plus-circle-dotted"></i>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold text-secondary">Project Kedua</h4>
                        <p class="card-text text-muted">Tempat untuk project sistem informasi Anda selanjutnya di VPS
                            ini.</p>
                        <div class="mt-auto pt-3">
                            <button class="btn btn-secondary btn-visit w-100" disabled>Coming Soon</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-project p-4 text-center">
                    <div class="icon-box text-success">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">Portfolio Alip</h4>
                        <p class="card-text text-muted">Halaman profil profesional dan daftar riwayat hidup digital.</p>
                        <div class="mt-auto pt-3">
                            <a href="#" class="btn btn-success btn-visit w-100">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-primary text-white pt-5 pb-4 mt-5">
        <div class="container text-center">
            <p class="small">Copyright &copy; 2025 <strong class="text-warning">Alip Maulana</strong> - Sistem Informasi
                Dehasen.</p>
            <div class="fs-4">
                <i class="bi bi-github mx-2"></i>
                <i class="bi bi-globe mx-2"></i>
                <i class="bi bi-server mx-2"></i>
            </div>
        </div>
    </footer>
</body>

</html>
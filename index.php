<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sistem Informasi | Hub Kelas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7f6;
    }

    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .hero-section {
        background: linear-gradient(rgba(13, 110, 253, 0.85), rgba(13, 110, 253, 0.85)), url('https://images.unsplash.com/photo-1522071823991-b9671f9d7f1f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
    }

    .card-toko {
        border: none;
        border-radius: 20px;
        transition: all 0.3s ease;
        background: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .card-toko:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .owner-badge {
        font-size: 0.75rem;
        background: #e9ecef;
        color: #495057;
        padding: 4px 12px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 10px;
    }

    .btn-visit {
        border-radius: 12px;
        font-weight: 600;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#"><i class="bi bi-grid-fill me-2"></i>Toko Sistem Informasi waduh</a>
                <div class="ms-auto">
                    <a href="/phpmyadmin/" target="_blank" class="btn btn-light btn-sm fw-bold">
                        <i class="bi bi-database-fill me-1"></i> Database Portal
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="display-5 fw-bold text-uppercase">Toko Sistem Informasi </h1>
            <p class="lead">Kumpulan Project UMKM Digital Mahasiswa Sistem Informasi Dehasen</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <div class="col">
                <div class="card card-toko h-100 p-4">
                    <div class="text-center mb-3">
                        <div class="owner-badge">Owner: Alip Maulana</div>
                        <h4 class="fw-bold mb-2">Kedai Kito Online</h4>
                        <p class="text-muted small">Pusat jajanan lezat dengan cita rasa autentik khas Bengkulu.</p>
                    </div>
                    <div class="mt-auto">
                        <a href="/alipmaulana/" class="btn btn-primary btn-visit w-100">
                            Kunjungi Toko <i class="bi bi-arrow-right-short ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-toko h-100 p-4 border-1 border-dashed">
                    <div class="text-center mb-3">
                        <div class="owner-badge text-primary bg-primary-subtle">Tersedia</div>
                        <h4 class="fw-bold mb-2 text-muted">Toko Teman 1</h4>
                        <p class="text-muted small">Project toko online mahasiswa berikutnya akan tampil di sini.</p>
                    </div>
                    <div class="mt-auto">
                        <button class="btn btn-outline-secondary btn-visit w-100" disabled>Coming Soon</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-toko h-100 p-4 border-1 border-dashed">
                    <div class="text-center mb-3">
                        <div class="owner-badge text-primary bg-primary-subtle">Tersedia</div>
                        <h4 class="fw-bold mb-2 text-muted">Toko Teman 2</h4>
                        <p class="text-muted small">Project toko online mahasiswa berikutnya akan tampil di sini.</p>
                    </div>
                    <div class="mt-auto">
                        <button class="btn btn-outline-secondary btn-visit w-100" disabled>Coming Soon</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-white py-4 mt-5 border-top">
        <div class="container text-center text-muted">
            <p class="small mb-0">&copy; 2025 Kolektif Kelas Sistem Informasi - Universitas Dehasen</p>
        </div>
    </footer>
</body>

</html>

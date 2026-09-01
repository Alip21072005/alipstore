<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container">
                <!-- Logo + Brand -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="images/logo.png" alt="Logo Kedai Kito" width="40" height="40" class="me-2">
                    Kedai Kito
                </a>
                <!-- Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategori.php">Data Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produk.php">Data Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keluar.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main class="section py-5">
        <div class="container text-center">
            <h3 class="mb-4">Selamat Datang Administrator</h3>
            <p class="lead">
                 baju bagus
            </p>

            <!-- Gambar utama -->
            <img src="images/dashboard.jpg" alt="Dashboard Kedai Kito" class="img-fluid rounded shadow mt-4">
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="bg-primary text-light p-3 text-center mt-5">
            <small>&copy; 2025 - Kedai Kito Online</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
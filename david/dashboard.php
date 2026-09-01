<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('image/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .section {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 50px 0;
            border-radius: 10px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!---- header ---->
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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

    <!--- content --->
    <div class="section">
        <div class="container">
            <h3>Selamat Datang Administrator</h3>
            <p>"Lorem ipsum" adalah teks tiruan yang biasa digunakan dalam dunia desain grafis dan penerbitan untuk
                mengisi ruang teks sementara. Teks ini sebenarnya tidak memiliki makna yang jelas karena merupakan hasil
                modifikasi dari teks Latin klasik karya Cicero.</p>
            <p>Namun, jika kamu ingin versi terjemahan bebas berdasarkan struktur kalimatnya, berikut ini interpretasi
                kreatifnya: "Lorem ipsum" adalah teks contoh yang digunakan untuk menunjukkan bentuk visual dari sebuah
                dokumen atau jenis huruf tanpa terganggu oleh isi sebenarnya. Meskipun terlihat seperti bahasa Latin,
                sebagian besar tidak memiliki arti yang koheren. Teks ini digunakan untuk menilai tata letak, tipografi,
                dan desain halaman.</p>
        </div>
    </div>

    <!--- footer --->
    <footer>
        <div class="mt-5 bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2025 - Kedai Kito Online</small>
        </div>
    </footer>

</body>

</html>
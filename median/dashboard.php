<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Kedai Kito Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>
    <!---- header ---->
    <header>

        <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="#">Kedai Kito</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Dashboard</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="login">Log-Out</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--- content --->
    <div class="section">
        <div class="container ">
           <h3>Selamat datang di <strong>KedaiKito</strong></h3>
          Kami menyediakan berbagai pilihan sepatu berkualitas dari merek ternama dengan desain modern,
nyaman digunakan, dan harga yang bersaing. Kepuasan pelanggan adalah prioritas kami, sehingga
setiap produk yang kami tawarkan telah melalui proses seleksi kualitas terbaik.
</p>
                </div>
            </div>
        </div>
    </div>

    <!--- footer --->
    <footer>
        <div class="mt-5 bg-primary text-light p-3 text-center">
            <small>Copyright &copy; 2023 - Kedai Kito Online</small>
        </div>
    </footer>

</body>

</html>

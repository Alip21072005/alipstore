<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Nada Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .login-card {
        width: 100%;
        max-width: 400px;
        padding: 2rem;
        border: none;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .brand-logo {
        color: #0d9488;
        font-weight: 800;
        letter-spacing: 2px;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .form-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #4b5563;
    }

    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 12px;
        border: 1px solid #d1d5db;
        transition: all 0.2s;
    }

    .form-control:focus {
        border-color: #0d9488;
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
    }

    .btn-login {
        background-color: #111827;
        color: white;
        padding: 0.75rem;
        border-radius: 12px;
        font-weight: 600;
        border: none;
        transition: all 0.3s;
        margin-top: 1rem;
    }

    .btn-login:hover {
        background-color: #0d9488;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 148, 136, 0.2);
    }

    .footer-text {
        font-size: 0.75rem;
        color: #9ca3af;
        margin-top: 2rem;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <div class="brand-logo">NADA</div>
            <p class="text-muted small">Silakan masuk ke panel manajemen</p>
        </div>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="user" placeholder="Masukkan username" required
                        autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="••••••••" required>
            </div>

            <button type="submit" name="submit" class="btn btn-login w-100">
                Masuk Sekarang
            </button>
        </form>

        <div class="footer-text">
            &copy; 2025 Nada Store System. All rights reserved.
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        // Menggunakan MD5 sesuai dengan kode awal Anda
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username ='" . $user . "' AND password = '" . MD5($pass) . "'");

        if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->idadmin;
            echo '<script>window.location="dashboard.php"</script>';
        } else {
            echo '<div class="container mt-3" style="max-width:400px">
                    <div class="alert alert-danger border-0 rounded-3 small text-center" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i> Username atau Password salah!
                    </div>
                  </div>';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
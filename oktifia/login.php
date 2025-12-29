<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Kedai Kito</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #0d6efd 0%, #003d99 100%);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .login-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        width: 100%;
        max-width: 400px;
    }

    .card-header {
        background-color: #fff;
        border-bottom: none;
        padding: 30px 30px 10px 30px;
        text-align: center;
    }

    .card-header h4 {
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #dee2e6;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }

    .btn-login {
        background-color: #0d6efd;
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-login:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .icon-box {
        font-size: 3rem;
        color: #0d6efd;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>

    <div class="login-card card">
        <div class="card-header">
            <div class="icon-box">
                <i class="bi bi-person-circle"></i>
            </div>
            <h4>ADMIN LOGIN</h4>
            <p class="text-muted small">Silakan masuk ke akun Anda</p>
        </div>
        <div class="card-body p-4">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted text-uppercase">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i
                                class="bi bi-person text-muted"></i></span>
                        <input type="text" class="form-control bg-light border-start-0" name="user"
                            placeholder="Masukkan Username" required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted text-uppercase">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i
                                class="bi bi-lock text-muted"></i></span>
                        <input type="password" class="form-control bg-light border-start-0" name="pass"
                            placeholder="Masukkan Password" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-login w-100 shadow-sm">
                    LOG IN
                </button>
            </form>
        </div>
        <div class="card-footer bg-light border-top-0 py-3 text-center">
            <small class="text-muted">&copy; 2025 Kedai Kito Online</small>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        // Pastikan nama tabel dan kolom sesuai di database Anda
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username ='" . $user . "' AND password = '" . MD5($pass) . "'");

        if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->idadmin;
            echo '<script>window.location="dashboard.php"</script>';
        } else {
            echo '<script>alert("Username atau Password Anda Salah !!")</script>';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
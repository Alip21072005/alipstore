<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Yunda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        /* Latar belakang soft pink gradient */
        background: radial-gradient(circle at top right, #fff0f3, #ffe5ec);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        padding: 2.5rem;
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 25px 50px -12px rgba(255, 77, 109, 0.15);
    }

    .brand-logo {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        letter-spacing: 3px;
        font-size: 2rem;
        margin-bottom: 0.2rem;
    }

    .form-label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #590d22;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-control {
        padding: 0.8rem 1.2rem;
        border-radius: 15px;
        border: 1.5px solid #ffe5ec;
        background-color: #fffcfd;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #ff85a2;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(255, 133, 162, 0.15);
    }

    .btn-login {
        background: linear-gradient(135deg, #ff85a2 0%, #ff4d6d 100%);
        color: white;
        padding: 0.85rem;
        border-radius: 15px;
        font-weight: 700;
        border: none;
        transition: all 0.4s;
        margin-top: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-login:hover {
        background: linear-gradient(135deg, #ff4d6d 0%, #c9184a 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(255, 77, 109, 0.3);
        color: white;
    }

    .footer-text {
        font-size: 0.75rem;
        color: #ff758f;
        margin-top: 2.5rem;
        text-align: center;
        font-weight: 500;
    }

    /* Floating Heart Decoration */
    .icon-box {
        width: 60px;
        height: 60px;
        background: #fff0f3;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: #ff4d6d;
        font-size: 1.8rem;
    }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="text-center">
            <div class="icon-box">
                <i class="bi bi-person-heart"></i>
            </div>
            <div class="brand-logo">YUNDA</div>
            <p class="text-muted small mb-4">Management Access Panel</p>
        </div>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="user" placeholder="Nama admin" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="••••••••" required>
            </div>

            <button type="submit" name="submit" class="btn btn-login w-100">
                Masuk ke Dashboard <i class="bi bi-arrow-right-short ms-1"></i>
            </button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            session_start();
            include 'koneksi.php';

            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

            $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username ='" . $user . "' AND password = '" . MD5($pass) . "'");

            if (mysqli_num_rows($cek) > 0) {
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->idadmin;
                echo '<script>window.location="dashboard.php"</script>';
            } else {
                echo '<div class="mt-4">
                        <div class="alert alert-danger border-0 rounded-4 small text-center shadow-sm" role="alert" style="background-color: #fff0f3; color: #ff4d6d;">
                            <i class="bi bi-heartbreak-fill me-2"></i> Username atau Password salah!
                        </div>
                      </div>';
            }
        }
        ?>

        <div class="footer-text">
            &copy; 2025 <strong>Yunda Management System</strong><br>
            All rights reserved.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
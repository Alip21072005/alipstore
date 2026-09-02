<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $user = dummy_real_escape_string($conn, $_POST['user']);
    $pass = $_POST['pass'];

    $cek = dummy_query($conn, "SELECT * FROM admin WHERE username = '$user' AND password = '" . md5($pass) . "'");

    if (dummy_num_rows($cek) > 0) {
        $d = dummy_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->idadmin; 
        
        echo '<script>window.location="dashboard.php"</script>';
    } else {
        echo '<script>alert("Username atau Password Anda Salah !!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Eksklusif | Kedai gue</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--primary-gradient);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        /* Dekorasi Lingkaran Latar Belakang */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            animation: float 6s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .login-card {
            background: var(--glass-bg);
            border: none;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
        }

        .login-header h2 {
            font-weight: 800;
            color: #4a4a4a;
            letter-spacing: -1px;
            margin-bottom: 5px;
        }

        .brand-logo {
            width: 80px;
            height: 80px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(118, 75, 162, 0.3);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 2px solid #eee;
            background: #fdfdfd;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #667eea;
        }

        .btn-login {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 15px rgba(118, 75, 162, 0.4);
            color: white;
        }

        .footer-text {
            font-size: 12px;
            color: #888;
            margin-top: 25px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="circle" style="width: 200px; height: 200px; top: 10%; left: 10%;"></div>
    <div class="circle" style="width: 300px; height: 300px; bottom: 5%; right: 5%; animation-delay: 2s;"></div>

    <div class="container d-flex justify-content-center">
        <div class="login-card animate__animated animate__zoomIn">
            <div class="login-header text-center">
                <div class="brand-logo">
                    <i class="fas fa-store"></i>
                </div>
                <h2>KEDAI GUE</h2>
                <p class="text-muted small mb-4">Silakan login untuk mengelola toko Anda</p>
            </div>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold small">USERNAME</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-user text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" name="user" placeholder="Masukkan username" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small">PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" class="form-control border-start-0" name="pass" placeholder="********" required>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary btn-login">
                        Login Sekarang <i class="fas fa-sign-in-alt ms-2"></i>
                    </button>
                </div>
            </form>

            <div class="footer-text">
                &copy; 2023 Kedai gue Online <br>
                <span class="fw-bold text-primary">Admin Control Panel</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

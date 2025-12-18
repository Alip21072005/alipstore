<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Kito Online | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            color: #fff;
            overflow: hidden;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            padding: 25px 20px 10px;
        }

        .login-header h3 {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .login-header p {
            font-size: 14px;
            opacity: 0.85;
        }

        .login-body {
            padding: 25px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            outline: none;
        }

        .form-label {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .btn-login {
            background: #ffffff;
            color: #4e54c8;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
        }

        .login-footer {
            text-align: center;
            padding-bottom: 20px;
            font-size: 12px;
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <form action="" method="POST">
        <div class="login-wrapper">
            <div class="login-card">

                <div class="login-header">
                    <h3>Radit Shop</h3>
                    <p>Silakan login untuk melanjutkan </p>
                </div>

                <div class="login-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="user" class="form-control" placeholder="Masukkan username" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-login">
                        Login
                    </button>
                </div>

                <div class="login-footer">
                    © 2025 Radit Shop
                </div>

            </div>
        </div>
    </form>

    <?php
    
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username='" . $user . "' AND password='" . MD5($pass) . "'");

if (mysqli_num_rows($cek) > 0) {
    session_start();
    $_SESSION['admin'] = true;   // ✅ INI SAJA
    $_SESSION['id'] = $d->idadmin;
    header("Location: dashboard.php");
}


    echo '<script>window.location="dashboard.php"</script>';

        } else {
            echo '<script>alert("Username atau Password Anda Salah !!")</script>';
        }
    
    ?>

</body>

</html>

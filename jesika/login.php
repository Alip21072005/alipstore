<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Toko Jule Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #ff5fa2, #ff85c1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.25);
            background-color: #fff;
        }

        .login-header {
            background: linear-gradient(135deg, #ff4d94, #ff80bf);
            color: white;
            text-align: center;
            padding: 22px;
            font-weight: bold;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }

        .form-control:focus {
            border-color: #ff5fa2;
            box-shadow: 0 0 0 0.2rem rgba(255, 95, 162, 0.25);
        }

        .btn-login {
            background-color: #ff4d94;
            border: none;
            border-radius: 30px;
            padding: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #e63e85;
        }

        .card-footer {
            background-color: #fff0f6;
        }
    </style>
</head>

<body>

    <form action="" method="POST">
        <div class="card login-card" style="width: 380px;">
            <div class="login-header">
                🌸 LOGIN ADMIN
            </div>

            <div class="card-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" class="form-control" name="user" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Masukkan password" required>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" name="submit" class="btn btn-login text-white">
                        Login
                    </button>
                </div>
            </div>

            <div class="card-footer text-center text-muted">
                <small>Toko Jule Online © 2025</small>
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user = dummy_real_escape_string($conn, $_POST['user']);
        $pass = dummy_real_escape_string($conn, $_POST['pass']);

        $cek = dummy_query($conn, "SELECT * FROM admin 
            WHERE username = '" . $user . "' 
            AND password = '" . MD5($pass) . "'");

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

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Kedai Kito Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .login-header {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 20px;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .btn-login {
            border-radius: 30px;
        }
    </style>
</head>

<body>

    <form action="" method="POST">
        <div class="card login-card" style="width: 380px;">
            <div class="login-header">
                🔐 LOGIN ADMIN
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="user" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Masukkan password" required>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-login">
                        Login
                    </button>
                </div>
            </div>
            <div class="card-footer text-center text-muted">
                <small>Kedai Kito Online © 2025</small>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
    /* ===== GLOBAL ===== */
    body {
        min-height: 100vh;
        margin: 0;
        font-family: "Segoe UI", sans-serif;

        /* BACKGROUND FOTO + OVERLAY GELAP */
        background:
            linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
            url("image/bg.jpg");

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===== LOGIN CARD ===== */
    .login-card {
        width: 100%;
        max-width: 400px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .login-card .card-header {
        background: #ffffff;
        font-weight: 600;
        font-size: 16px;
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
    }

    .login-card .card-body {
        padding: 20px;
    }

    .login-card .card-footer {
        padding: 15px 20px;
        border-top: 1px solid #ddd;
        background: #ffffff;
    }

    .form-control {
        border-radius: 6px;
        padding: 10px 12px;
        font-size: 14px;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #0d6efd;
    }

    .btn-primary {
        background: #0d6efd;
        border: none;
        border-radius: 6px;
        padding: 10px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background: #0b5ed7;
    }
    </style>
</head>

<body>

    <form action="" method="POST">
        <div class="login-card card">

            <div class="card-header">
                LOGIN
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Masukkan password" required>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary w-100">
                    Login
                </button>
            </div>

        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user    = mysqli_real_escape_string($conn, $_POST['user']);
        $pass    = mysqli_real_escape_string($conn, $_POST['pass']);

        $cek = mysqli_query($conn, "SELECT * FROM user WHERE username ='" . $user . "' AND password = '" . MD5($pass) . "'");

        if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->idadmin;
            echo '<script>window.location="dashboard.php"</script>';
        } else {
            echo '<script>alert("SALAH MPRUY")</script>';
        }
    }

    ?>
</body>

</html>
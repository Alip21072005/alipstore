<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

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
</body>

</html>
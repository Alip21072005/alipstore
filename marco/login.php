<?php
session_start(); // Session harus dimulai paling atas
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Menggunakan MD5 sesuai kode asli Anda
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND password = '" . md5($pass) . "'");

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
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Kedai Kito Online</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 100px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">LOGIN</h4>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="user" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" id="inputPassword" class="form-control" name="pass"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div class="card-footer d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Login Sekarang</button>
                        </div>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">&copy; 2025 Kedai Kito Online</small>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
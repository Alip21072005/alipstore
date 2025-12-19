<?php
session_start(); // Letakkan di paling atas
include 'koneksi.php';

if (isset($_POST['submit'])) {
    // Membersihkan input
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = $_POST['pass']; // Ambil password asli dulu

    // Mencari user berdasarkan username saja
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

    if (mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_object($cek);
        
        // Verifikasi password (Contoh jika menggunakan MD5 seperti kode asli Anda)
        if (MD5($pass) == $d->password) {
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->idadmin;
            echo '<script>window.location="dashboard.php"</script>';
        } else {
            echo '<script>alert("Username atau Password Anda Salah !!")</script>';
        }
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
    <title>Kedai Kito Online - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">LOGIN KEDAI KITO</h5>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="user" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="card-footer d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <p class="text-center mt-3 text-muted">&copy; 2025 Kedai Kito</p>
            </div>
        </div>
    </div>
</body>

</html>
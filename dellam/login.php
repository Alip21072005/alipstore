<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Kedai Kito</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body id="bg-login">
    <div class="login-card shadow">
        <h4 class="text-center mb-3 fw-bold">Kedai Kito</h4>
        <p class="text-center text-muted mb-4">Login Admin</p>
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="user" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>
        <?php
        session_start();
        include 'koneksi.php';
        if (isset($_POST['submit'])) {
            $user = mysqli_real_escape_string($conn, $_POST['user']);
            $pass = $_POST['pass'];
            $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
            if (mysqli_num_rows($cek) > 0) {
                $d = mysqli_fetch_object($cek);
                if (password_verify($pass, $d->password)) {
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->idadmin;
                    echo '<script>window.location="dashboard.php"</script>';
                } else {
                    echo '<div class="alert alert-danger mt-3">Password salah!</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3">Username tidak ditemukan!</div>';
            }
        }
        ?>
    </div>
</body>
</html>
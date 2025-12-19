<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Kedai Kito</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-page">

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-header">
                <img src="image/logoIncess.jpeg" class="login-logo" alt="Logo">
                <h4>Admin Login</h4>
                <p>Kedai princess fina</p>
            </div>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="user" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Masukkan password" required>
                </div>

                <button type="submit" name="submit" class="btn btn-login w-100">
                    Login
                </button>
            </form>

        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $cek = mysqli_query($conn, "SELECT * FROM admin 
            WHERE username = '$user' 
            AND password = '" . MD5($pass) . "'");

        if (mysqli_num_rows($cek) > 0) {
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->idadmin;
            echo '<script>window.location="dashboard.php"</script>';
        } else {
            echo '<script>alert("Username atau Password salah!")</script>';
        }
    }
    ?>

</body>

</html>

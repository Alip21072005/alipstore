<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Kedai Online</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            session_start();
            include 'koneksi.php';

            $user    = dummy_real_escape_string($conn, $_POST['user']);
            $pass    = dummy_real_escape_string($conn, $_POST['pass']);

            $cek = dummy_query($conn, "SELECT * FROM admin WHERE username ='" . $user . "' AND password = '" . MD5($pass) . "'");

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
    </div>
</body>

</html>
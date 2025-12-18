<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Najwa Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <form action="" method="POST">
        <div class="container mt-3">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center fw-bold">
                            LOGIN | NAJWA STORE
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="user" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="inputPassword5" class="form-control" name="pass"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'koneksi.php';

        $user    = mysqli_real_escape_string($conn, $_POST['user']);
        $pass    = mysqli_real_escape_string($conn, $_POST['pass']);

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
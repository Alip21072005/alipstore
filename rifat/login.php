<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Kito Online</title>
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
                        <div class="card-header">
                            LOGIN
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="username">Username</label>
                                <input type="username" class="form-control" name="user" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="inputPassword5" class="form-control" name="pass"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
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

        $user    = dummy_real_escape_string($conn, $_POST['user']);
        $pass    = dummy_real_escape_string($conn, $_POST['pass']);

        $cek = dummy_query($conn, "SELECT * FROM user WHERE username ='" . $user . "' AND password = '" . MD5($pass) . "'");

        if (dummy_num_rows($cek) > 0) {
            $d = dummy_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->idadmin;
            echo '<script>window.location="produk.php"</script>';
        } else {
            echo '<script>alert("SALAH MPRUY")</script>';
        }
    }

    ?>
</body>

</html>
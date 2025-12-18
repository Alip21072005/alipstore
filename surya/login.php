<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['status_login']) && $_SESSION['status_login'] === true) {
    header("Location: dashboard.php");
    exit;
}

$error = "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Admin | Tokoh Buah Being Muhammad Online</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #0d6efd, #198754);
    min-height: 100vh;
    display: flex;
    align-items: center;
}
.card { border-radius: 1.2rem; }
.brand { font-weight: 800; }
</style>
</head>

<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-5 col-lg-4">

<div class="card shadow-lg">
<div class="card-body p-4">

<h4 class="text-center brand mb-1">🍉 Tokoh Buah</h4>
<p class="text-center text-muted small mb-4">Being Muhammad Online</p>

<h5 class="text-center fw-bold mb-3">
<i class="bi bi-shield-lock"></i> Login Admin
</h5>

<?php if ($error != "") { ?>
<div class="alert alert-danger text-center"><?= $error; ?></div>
<?php } ?>

<form method="POST">
<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="user" class="form-control" required autofocus>
</div>

<div class="mb-4">
<label class="form-label">Password</label>
<input type="password" name="pass" class="form-control" required>
</div>

<button type="submit" name="submit" class="btn btn-primary w-100">
<i class="bi bi-box-arrow-in-right"></i> Login
</button>
</form>

</div>
</div>

</div>
</div>
</div>

<?php
if (isset($_POST['submit'])) {

    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = md5($_POST['pass']);

    $cek = mysqli_query($conn,
        "SELECT * FROM admin 
         WHERE username='$user' 
         AND password='$pass'
         LIMIT 1"
    );

    if (mysqli_num_rows($cek) === 1) {
        $d = mysqli_fetch_object($cek);

        $_SESSION['status_login'] = true;
        $_SESSION['a_global']     = $d;
        $_SESSION['id']           = $d->idadmin;

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

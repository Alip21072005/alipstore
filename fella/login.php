<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kedai Kito Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap (tetap dipakai) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom Style -->
    <style>
        body {
            background-color: #ffd6d6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Comic Sans MS', sans-serif;
        }

        .login-box {
            width: 380px;
            text-align: center;
        }

        .login-title {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .login-title span:nth-child(1){color:#b5e48c;}
        .login-title span:nth-child(2){color:#ffd166;}
        .login-title span:nth-child(3){color:#ef476f;}
        .login-title span:nth-child(4){color:#90dbf4;}

        .input-group-custom {
            background: #e6f8d5;
            border-radius: 30px;
            padding: 10px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .input-group-custom input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            margin-left: 10px;
        }

        .password-box {
            background: #fff3b0;
        }

        .login-btn {
            background: #ff8fab;
            border: none;
            border-radius: 50px;
            width: 60px;
            height: 40px;
            font-size: 20px;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #ff7096;
        }
    </style>
</head>

<body>

<form action="" method="POST">
    <div class="login-box">

        <!-- Title -->
        <div class="login-title">
            <span>L</span><span>o</span><span>g</span>-<span>In</span>
        </div>

        <!-- Username -->
        <div class="input-group-custom">
            👤
            <input type="text" name="user" placeholder="User Name" required>
        </div>

        <!-- Password -->
        <div class="input-group-custom password-box">
            🔒
            <input type="password" name="pass" placeholder="Password" required>
        </div>

        <!-- Button -->
        <button type="submit" name="submit" class="login-btn">
            →
        </button>

    </div>
</form>

<?php
if (isset($_POST['submit'])) {
    session_start();
    include 'koneksi.php';

    $user = dummy_real_escape_string($conn, $_POST['user']);
    $pass = dummy_real_escape_string($conn, $_POST['pass']);

    $cek = dummy_query($conn,
        "SELECT * FROM user 
         WHERE username='$user' 
         AND password='".md5($pass)."'"
    );

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
</body>
</html>

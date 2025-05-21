<?php

session_start();

include "backend/koneksi.php";

if (isset($_SESSION['user'])) {
    header('location:admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="backend/cek-login.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" required name="username" id="username">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" required name="password" id="password">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Belum mempunyai akun? <a href="register.php">Registrasi</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
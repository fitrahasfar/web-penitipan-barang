<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Register Akun</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header class="text-center">Registrasi</header>
            <form action="backend/cek-register.php" method="post">
                <div class="field input">
                    <label for="nama">Nama</label>
                    <input type="text" required name="nama" id="nama">
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" required name="email" id="email">
                </div>
                
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" required name="username" id="username">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" required name="password" id="password">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>

                <div class="links">
                    Sudah mempunyai akun? <a href="index.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
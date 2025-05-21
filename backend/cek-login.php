<?php
session_start();

require 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query_select = mysqli_query($connect, "SELECT * from tuser WHERE username = '$username' AND password = '$password'");

if (empty($username) or empty($password)) {
    echo "<script>alert('Username/Password Tidak Boleh Kosong');
        document.location='../index.php';
        </script>";
} else {
    if (mysqli_num_rows($query_select) > 0) {
        $data = mysqli_fetch_array($query_select);
        $_SESSION['user'] = $data;

        echo '<script>alert("Selamat Datang, ' . $data['nama'] . '");
            location.href = "../admin.php";</script>';
    } else {
        echo "<script>alert('Username/Password Salah');
        document.location='../index.php';
        </script>";
    }
}

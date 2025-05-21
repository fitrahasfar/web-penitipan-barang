<?php
    require 'koneksi.php';

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query_input = "INSERT INTO  tuser (nama, email, username, password)
                    VALUES ('$nama', '$email', '$username', '$password')";

    if(mysqli_query($connect, $query_input)){
        echo '<script>alert("Akun Telah Berhasil Dibuat");
            location.href = "../index.php";</script>';
    }else{
        echo '<script>alert("Gagal Membuat Akun");
            location.href = "../register.php";</script>';
    }
?>
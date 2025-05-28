<?php

    $hostname = "localhost";
    $user="root";
    $password="";
    $database="webcrud";

    $connect = mysqli_connect($hostname, $user, $password, $database)
    or
    die("Connection Failed".mysqli_connect_error());


?>

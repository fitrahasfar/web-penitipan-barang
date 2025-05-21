<?php

    $hostname = "localhost";
    $user="root";
    $password="";
    $database="web-crud";

    $connect = mysqli_connect($hostname, $user, $password, $database)
    or
    die("Connection Failed".mysqli_connect_error());


?>
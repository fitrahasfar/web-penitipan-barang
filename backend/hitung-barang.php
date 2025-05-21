<?php

include 'koneksi.php';

$allBarang = mysqli_query($connect, "select * from tbarang");
$cBarang = mysqli_num_rows($allBarang);

$bSimpan = mysqli_query($connect, "select * from tbarang WHERE status = 'Disimpan'");
$cSimpan = mysqli_num_rows($bSimpan);

$bAmbil = mysqli_query($connect, "select * from tbarang WHERE status = 'Diambil'");
$cAmbil = mysqli_num_rows($bAmbil);

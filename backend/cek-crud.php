<?php
require 'koneksi.php';

//Input Barang
if (isset($_POST['inputData'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_barang    = $_POST['nama_barang'];
    $jenis_barang   = $_POST['jenis_barang'];
    $tempat         = $_POST['tempat'];
    $tggl_titip     = $_POST['tggl_titip'];
    $status         = 'Disimpan';

    $query_input = "INSERT INTO  tbarang (nama_pelanggan, nama_barang, jenis_barang, tempat, tggl_titip, status)
                    VALUES ('$nama_pelanggan', '$nama_barang', '$jenis_barang', '$tempat', '$tggl_titip', '$status')";

    if (mysqli_query($connect, $query_input)) {
        echo '<script>alert("Data Berhasil Ditambahkan");
            location.href = "../admin.php";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan");
        location.href = "../admin.php";</script>';
    }
}

//Ambil Barang
if (isset($_POST['confirmData'])) {
    $id_barang       = $_POST['id_barang'];
    $tggl_ambil     = $_POST['tggl_ambil'];
    $status         = 'Diambil';

    $query_confirm = "UPDATE tbarang SET tggl_ambil = '$tggl_ambil', status = '$status'
                    WHERE id_barang = '$id_barang'";

    if (mysqli_query($connect, $query_confirm)) {
        echo '<script>alert("Barang Telah Dikembalikan");
            location.href = "../admin.php";</script>';
    } else {
        echo '<script>alert("Data Gagal Dikembalikan");
        location.href = "../admin.php";</script>';
    }
}

//Update Barang
if (isset($_POST['updateData'])) {
    $id_barang       = $_POST['id_barang'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nama_barang    = $_POST['nama_barang'];
    $jenis_barang   = $_POST['jenis_barang'];
    $tempat         = $_POST['tempat'];
    $tggl_titip     = $_POST['tggl_titip'];

    $query_update = "UPDATE tbarang SET nama_pelanggan = '$nama_pelanggan', nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', tempat = '$tempat', tggl_titip = '$tggl_titip'
                    WHERE id_barang = '$id_barang'";

    if (mysqli_query($connect, $query_update)) {
        echo '<script>alert("Data Berhasil Diubah");
            location.href = "../admin.php";</script>';
    } else {
        echo '<script>alert("Data Gagal Diubah");
        location.href = "../admin.php";</script>';
    }
}

//Delete Barang
if (isset($_POST['deleteData'])) {
    $id_barang       = $_POST['id_barang'];

    $query_delete = "DELETE FROM tbarang WHERE id_barang = '$id_barang'";

    if (mysqli_query($connect, $query_delete)) {
        echo '<script>alert("Data Berhasil Dihapus");
            location.href = "../admin.php";</script>';
    } else {
        echo '<script>alert("Data Gagal Dihapus");
        location.href = "../admin.php";</script>';
    }
}

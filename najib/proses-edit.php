<?php
include 'koneksi.php';
$id_mahasiswa = $_POST['id_mahasiswa'];
$nim       = $_POST['nim'];
$nama      = $_POST['nama'];
$jekel     = $_POST['jekel'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = date('Y-m-d',strtotime($_POST['tgl_lahir']));
$alamat    = $_POST['alamat'];

$query = "UPDATE mahasiswa 
        SET nim = '$nim',
            nama = '$nama',
            jekel = '$jekel',
            tempat_lahir = '$tmp_lahir',
            tgl_lahir = '$tgl_lahir',
            alamat = '$alamat'
        WHERE id_mahasiswa = '$id_mahasiswa'";

$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    header('Location: index.php');
} else {
    header('Location: form-edit.php');
}
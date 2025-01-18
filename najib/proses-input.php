<?php
include 'koneksi.php';

$nim       = $_POST['nim'];
$nama      = $_POST['nama'];
$jekel     = $_POST['jekel'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = date('Y-m-d',strtotime($_POST['tgl_lahir']));
$alamat    = $_POST['alamat'];

$query = "INSERT INTO mahasiswa (nim, nama, jekel, tempat_lahir, tgl_lahir, alamat) VALUES ('$nim','$nama','$jekel','$tmp_lahir','$tgl_lahir','$alamat')";
$hasil = mysqli_query($db, $query);
if ($hasil == true){
  header('Location: index.php');
} else {
  header('Location: index.php');
}

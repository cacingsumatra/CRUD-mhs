<?php
include 'koneksi.php';
$id_mahasiswa = $_GET['id_mahasiswa'];

$query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
  header('Location: index.php');
} else {
  header('Location: index.php');
}
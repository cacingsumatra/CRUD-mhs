<?php
include 'koneksi.php';

$query = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($db, $query);

// Menampung semua data mahasiswa
$data_mahasiswa = array();

// Tiap baris dari hasil query dikumpulkan ke $data_mahasiswa
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_mahasiswa[] = $row;
}
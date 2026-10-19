<?php
include "koneksi.php";

$nis      = isset($_POST['nis']) ? mysqli_real_escape_string($koneksi, $_POST['nis']) : '';
$id_mapel = isset($_POST['id_mapel']) ? mysqli_real_escape_string($koneksi, $_POST['id_mapel']) : '';
$nip      = isset($_POST['nip']) ? mysqli_real_escape_string($koneksi, $_POST['nip']) : '';
$nilai    = isset($_POST['nilai']) ? mysqli_real_escape_string($koneksi, $_POST['nilai']) : '';

if (empty($nis) || empty($id_mapel) || empty($nip) || empty($nilai)) {
    die("Gagal simpan: Ada data form yang belum terisi atau 'name' di form tambah.php belum cocok!");
}

$query = "INSERT INTO nilai (nis, id_mapel, nip, nilai) VALUES ('$nis', '$id_mapel', '$nip', '$nilai')";
$sql   = mysqli_query($koneksi, $query);

if ($sql) {
    header("location:index.php");
    exit;
} else {
    echo "Query Eror: " . mysqli_error($koneksi);
}
?>
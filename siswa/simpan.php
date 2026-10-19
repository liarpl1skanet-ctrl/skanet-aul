<?php
session_start();
include "koneksi.php";

$nis    = isset($_POST['nis']) ? trim($_POST['nis']) : '';
$nama   = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

if ($nis === '' || $nama === '' || $alamat === '') {
    die("GAGAL SIMPAN: Ada field yang kosong.<br>
         nis = '$nis'<br>
         nama = '$nama'<br>
         alamat = '$alamat'<br><br>
         Cek lagi apakah 'name' di form tambah.php persis: nis, nama, alamat.");
}

$nis    = mysqli_real_escape_string($koneksi, $nis);
$nama   = mysqli_real_escape_string($koneksi, $nama);
$alamat = mysqli_real_escape_string($koneksi, $alamat);

// Cek dulu apakah NIS sudah dipakai (karena biasanya NIS itu primary key/unik)
$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis = '$nis'");

if (mysqli_num_rows($cek) > 0) {
    die("GAGAL SIMPAN: NIS '$nis' sudah terdaftar. Gunakan NIS lain.");
}

$query = "INSERT INTO siswa (nis, nama, alamat) VALUES ('$nis', '$nama', '$alamat')";
$sql   = mysqli_query($koneksi, $query);

if ($sql) {
    header("Location: index.php");
    exit;
} else {
    die("GAGAL SIMPAN: Query insert error -> " . mysqli_error($koneksi) . "<br><br>Query: $query");
}
?>
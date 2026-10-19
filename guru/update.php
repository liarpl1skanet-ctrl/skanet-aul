<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$nip    = isset($_POST['nip']) ? trim($_POST['nip']) : '';
$nama   = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

if ($nip === '' || $nama === '' || $alamat === '') {
    die("GAGAL SIMPAN: Ada field yang kosong.");
}

$stmt = mysqli_prepare($koneksi, "UPDATE guru SET nama = ?, alamat = ? WHERE nip = ?");
mysqli_stmt_bind_param($stmt, "sss", $nama, $alamat, $nip);
$sukses = mysqli_stmt_execute($stmt);

if ($sukses) {
    header("Location: index.php");
    exit;
} else {
    die("GAGAL SIMPAN: " . mysqli_error($koneksi));
}
?>
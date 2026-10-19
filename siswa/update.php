<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

$nis    = isset($_POST['nis']) ? trim($_POST['nis']) : '';
$nama   = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

if ($nis === '' || $nama === '' || $alamat === '') {
    die("GAGAL SIMPAN: Ada field yang kosong.");
}

$stmt = mysqli_prepare($koneksi, "UPDATE siswa SET nama = ?, alamat = ? WHERE nis = ?");
mysqli_stmt_bind_param($stmt, "sss", $nama, $alamat, $nis);
$sukses = mysqli_stmt_execute($stmt);

if ($sukses && mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: index.php");
    exit;
} elseif ($sukses) {
    header("Location: index.php");
    exit;
} else {
    die("GAGAL SIMPAN: " . mysqli_error($koneksi));
}
?>
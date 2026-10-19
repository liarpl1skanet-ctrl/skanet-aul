<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['nis']) || trim($_GET['nis']) === '') {
    header("Location: index.php");
    exit;
}

$nis = trim($_GET['nis']);

$stmt = mysqli_prepare($koneksi, "DELETE FROM siswa WHERE nis = ?");
mysqli_stmt_bind_param($stmt, "s", $nis);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: index.php");
exit;
?>
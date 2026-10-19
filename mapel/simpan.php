<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $id_mapel   = mysqli_real_escape_string($koneksi, $_POST['id_mapel']);
    $nama_mapel = mysqli_real_escape_string($koneksi, $_POST['nama_mapel']);
    $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $nama_guru  = mysqli_real_escape_string($koneksi, $_POST['nama_guru']);

    $query = mysqli_query($koneksi, "INSERT INTO mapel (id_mapel, nama_mapel, nama_siswa, nama_guru) VALUES ('$id_mapel', '$nama_mapel', '$nama_siswa', '$nama_guru')");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: tambah.php");
    exit;
}
<?php
include '../koneksi.php';

if (isset($_GET['id_mapel'])) {
    $id_mapel = mysqli_real_escape_string($koneksi, $_GET['id_mapel']);

    $query = mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel = '$id_mapel'");

    if ($query) {
        header("Location: index.php?status=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit;
}
?>
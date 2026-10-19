<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai = '$id'");

    if ($query) {
        echo "<script>
                alert('Data nilai berhasil dihapus!');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location.href='index.php';
              </script>";
    }
} else {
    header("Location: index.php");
}
?>
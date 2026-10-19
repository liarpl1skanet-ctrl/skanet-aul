<?php

$koneksi = mysqli_connect("localhost", "root", "", "skanet_aul");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
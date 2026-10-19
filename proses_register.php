<?php

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];



$cek = mysqli_query($koneksi, 
"SELECT * FROM users WHERE username='$username'");


if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
        alert('Username sudah digunakan!');
        window.location='register.php';
    </script>";

} else {


    
    $simpan = mysqli_query($koneksi,
    "INSERT INTO users (username, password)
     VALUES ('$username','$password')");


    if($simpan){

        echo "
        <script>
            alert('Registrasi berhasil!');
            window.location='login.php';
        </script>";

    } else {

        echo "
        <script>
            alert('Registrasi gagal!');
            window.location='register.php';
        </script>";

    }

}

?>
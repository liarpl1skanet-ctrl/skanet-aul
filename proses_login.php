<?php

session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if(!$query){
    die("Query Error : " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);

if($data){

    $_SESSION['username'] = $data['username'];
    $_SESSION['login'] = true;

    echo "
    <script>
        alert('Login berhasil!');
        window.location='index.php';
    </script>
    ";

}

else{

    echo "
    <script>
        alert('Username atau password salah!');
        window.location='index.php';
    </script>
    ";

}

?>
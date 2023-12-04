<?php
session_start(); 

include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username' and password='$password' and status='1' ");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    header("location:../index.php");
} else {
    echo "<script>alert('Username atau Password Anda Salah !!'); window.location.href='../login.php'; </script>";
    //header("location:../login.php");
}

?>
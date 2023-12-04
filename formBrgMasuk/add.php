<?php

session_start();
include "../koneksi.php";

$id_masuk = $_POST['id_masuk'];
$tgl_masuk = $_POST['tgl_masuk'];
$id_barang = $_POST['id_barang'];
$jml = $_POST['jml'];
$user = $_SESSION['username'];

if (empty($data['error'])){
    $query = "INSERT INTO tb_masuk SET id_masuk='$id_masuk', tgl_masuk='$tgl_masuk', id_barang='$id_barang', jml_masuk='$jml', updater='$user'";
    mysqli_query($koneksi, $query) or die("gagal eksekusi SQL: " . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = "gagal";
}

echo json_encode($data);
?>

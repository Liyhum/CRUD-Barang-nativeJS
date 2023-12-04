<?php

session_start();
include "../koneksi.php";

$id_brg = $_POST['id_brg'];
$nama_brg = $_POST['nama_brg'];
$satuan = $_POST['satuan'];
$jenis = $_POST['jenis'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$input_date = date('Y-m-d H:i:s');
$user = $_SESSION['username'];

if (empty($data['error'])){
    $query = "INSERT into tb_barang set id_barang='$id_brg', nama_barang='$nama_brg', satuan='$satuan', jenis='$jenis',stok_awal='$stok',harga='$harga'";
    mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
    $data = 1;
} else {
    $data = "gagal";
}

echo json_encode($data);
?>
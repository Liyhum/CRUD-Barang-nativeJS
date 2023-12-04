<?php

session_start();
include "../koneksi.php";

$id_satuan = $_POST['id_satuan'];
$satuan = $_POST['satuan'];

if (empty($data['error'])){
    $query = "INSERT into tb_satuan set id_satuan='$id_satuan', satuan='$satuan'";

    mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
    $data = 1;
} else {
    $data = "gagal";
}

echo json_encode($data);
?>
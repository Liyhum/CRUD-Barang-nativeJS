<?php

include "../koneksi.php";

$id_jenis = $_POST['id_jenis'];
$jenis = $_POST['jenis'];

if (empty($data['error'])){
    $query = "UPDATE tb_jenis set jenis='$jenis' WHERE id_jenis='$id_jenis' ";

    mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
    $data = 1;
} else {
    $data = "gagal";
}

echo json_encode($data);
?>
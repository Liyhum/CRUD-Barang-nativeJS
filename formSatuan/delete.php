<?php

include "../koneksi.php";

$id_satuan = $_POST['id_satuan'];

$query = "DELETE FROM tb_satuan WHERE id_satuan='$id_satuan'";
mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
if ($query == true) {
    $data = '1';
} else {
    $data = 'Data Gagal Dihapus!!';
}

echo $data;
// echo json_encode($data);

?>
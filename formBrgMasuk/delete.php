<?php

include "../koneksi.php";

$id_masuk = $_POST['id_masuk'];

$query = "DELETE FROM tb_masuk WHERE id_masuk='$id_masuk'";
mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
if ($query == true) {
    $data = '1';
} else {
    $data = 'Data Gagal Dihapus!!';
}

echo $data;
// echo json_encode($data);

?>
<?php

include "../koneksi.php";

$id_brg = $_POST['id_brg'];

$query = "DELETE FROM tb_barang WHERE id_barang='$id_brg'";
mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
if ($query == true) {
    $data = '1';
} else {
    $data = 'Data Gagal Dihapus!!';
}

echo $data;
// echo json_encode($data);

?>
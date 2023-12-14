<?php

include "../koneksi.php";

$id_keluar = $_POST['id_keluar'];

$query = "DELETE FROM tb_keluar WHERE id_keluar='$id_keluar'";
mysqli_query($koneksi, $query) or die("gagal eksekusi SQL".mysqli_error());
if ($query == true) {
    echo '1';
} else {
    echo 'Data Gagal Dihapus!!';
}


?>
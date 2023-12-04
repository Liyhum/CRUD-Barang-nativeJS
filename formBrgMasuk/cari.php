<?php

include "../koneksi.php";

$id_brg = $_GET['id'];
$array = array();

$query = "SELECT 
    a.*, COALESCE(SUM(b.jml_masuk), 0) AS total_masuk,
    COALESCE(SUM(c.jml_keluar), 0) AS total_keluar,
    (a.stok_awal + COALESCE(SUM(b.jml_masuk), 0) - COALESCE(SUM(c.jml_keluar), 0)) AS stok_saat_ini
FROM 
    tb_barang a
LEFT JOIN 
    tb_masuk b ON a.id_barang = b.id_barang
LEFT JOIN 
    tb_keluar c ON a.id_barang = c.barang_id
WHERE 
    a.id_barang = '$id_brg'
GROUP BY 
    a.id_barang";

$data = mysqli_query($koneksi, $query);

if (!$data) {
    die("Error in SQL query: " . mysqli_error($koneksi));
}

while ($row = $data->fetch_assoc()) {
    $array = $row;
}

echo json_encode($array);
?>

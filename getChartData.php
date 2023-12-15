<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT
    tb_barang.nama_barang AS category,
    COALESCE(SUM(tb_masuk.jml_masuk), 0) AS masuk,
    COALESCE(SUM(tb_keluar.jml_keluar), 0) AS keluar
FROM
    tb_barang
LEFT JOIN
    tb_masuk ON tb_barang.id_barang = tb_masuk.id_barang
LEFT JOIN
    tb_keluar ON tb_barang.id_barang = tb_keluar.barang_id
GROUP BY
    tb_barang.id_barang, tb_barang.nama_barang
ORDER BY
    tb_barang.id_barang") or die(mysqli_error($koneksi));

// Inisialisasi array untuk menyimpan data grafik
$chartData = [
    'categories' => [],
    'masuk' => [],
    'keluar' => [],
];

// Ambil hasil query
while ($result = mysqli_fetch_array($query)) {
    $chartData['categories'][] = $result['category'];
    $chartData['masuk'][] = (int)$result['masuk'];
    $chartData['keluar'][] = (int)$result['keluar'];
}

// Konversi array ke format JSON
$jsonData = json_encode($chartData);

// Set header agar browser tahu bahwa respons ini berupa JSON
header('Content-Type: application/json');

// Kembalikan data sebagai respons
echo $jsonData;

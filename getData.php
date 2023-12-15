<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT
    (SELECT COUNT(*) FROM tb_user) AS userCount,
    (SELECT COUNT(*) FROM tb_barang) AS itemCount,
    (SELECT SUM(jml_masuk) FROM tb_masuk) AS incomingCount,
    (SELECT SUM(jml_keluar) FROM tb_keluar) AS outgoingCount") or die(mysqli_error($koneksi));

// Ambil hasil query
$result = mysqli_fetch_array($query);

// Format data sebagai array
$data = [
    'userData' => $result['userCount'] ?? 0,
    'itemCountData' => $result['itemCount'] ?? 0,
    'incomingData' => $result['incomingCount'] ?? 0,
    'outgoingData' => $result['outgoingCount'] ?? 0,
];

// Konversi array ke format JSON
$jsonData = json_encode($data);

// Set header agar browser tahu bahwa respons ini berupa JSON
header('Content-Type: application/json');

// Kembalikan data sebagai respons
echo $jsonData;

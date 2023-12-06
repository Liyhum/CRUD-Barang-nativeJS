<?php

session_start();
include "../koneksi.php";

$id_masuk = $_POST['id_masuk'];
$tgl_masuk = $_POST['tgl_masuk'];
$barang_id = $_POST['barang_id'];
$jml_masuk = $_POST['jml']; // Corrected variable name
$input_date = date('Y-m-d H:i:s');
$user = $_SESSION['username'];

// Assuming you want to check if there is no error, so initializing $data as an empty array
$data = [];

if (!empty($tgl_masuk) && !empty($barang_id) && !empty($jml_masuk)) {
    // Sanitize and validate user input to prevent SQL injection
    $tgl_masuk = mysqli_real_escape_string($koneksi, $tgl_masuk);
    $barang_id = mysqli_real_escape_string($koneksi, $barang_id);
    $jml_masuk = mysqli_real_escape_string($koneksi, $jml_masuk);

    $query = "UPDATE tb_masuk SET tgl_masuk='$tgl_masuk', id_barang='$barang_id', jml_masuk='$jml_masuk' WHERE id_masuk='$id_masuk'";

    mysqli_query($koneksi, $query) or die("gagal eksekusi SQL" . mysqli_error($koneksi));
    $data = 1;
} else {
    $data = "gagal";
}

echo json_encode($data);
?>

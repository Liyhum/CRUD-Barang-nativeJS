<?php 

include "../koneksi.php";

$data = array(); // Inisialisasi variabel data

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
// $create_data = date('Y-m-d H:i:s');

if (!empty($user_id) && !empty($username) && !empty($password) && !empty($status)) {
    // Validasi data
    $query = "INSERT INTO tb_user (user_id, username, password, status) VALUES ('$user_id', '$username', '$password', '$status')";
    $result = mysqli_query($koneksi, $query);

    $data = ($result) ? 1 : "gagal" .mysqli_error($koneksi);
} else {
    $data = "Data tidak lengkap";
}

echo json_encode($data);

?>
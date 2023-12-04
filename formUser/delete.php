<?php

include "../koneksi.php";

$user_id = $_POST['user_id'];

if (!empty($user_id)) {
    $query = "DELETE FROM tb_user WHERE user_id=?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "s", $user_id);
mysqli_stmt_execute($stmt);

    if ($result) {
        echo '1';
    } else {
        echo 'gagal hapus !';
    }
} else {
    echo 'ID Pengguna tidak valid';
}

?>

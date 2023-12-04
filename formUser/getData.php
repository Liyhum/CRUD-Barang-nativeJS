<?php

include "../koneksi.php";
$no = 1;
$query = mysqli_query($koneksi,"SELECT * from tb_user Order by user_id asc") or die(mysqli_error($koneksi));
while ($result =mysqli_fetch_array($query)){
?>

<tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $result['user_id'];?></td>
    <td><?php echo $result['username'];?></td>
    <td> 
    <input type="password" class="form-control" id="editPassword" name="editPassword" value="<?php echo $result["password"] ?> " disable>
    <td><?php if($result['status'] == 1){echo 'Aktif';}?><?php if ($result['status'] == 2) {echo 'Tidak Aktif';}?></td>

    <td><button class="btn btn-sm btn-primary" onclick="edit_data('<?php echo $result['user_id'];?>')">Edit Data</button>
    <button class="btn btn-sm btn-danger" onclick="delete_data('<?php echo $result['user_id'];?>')">Delete</button></td>
</tr>

<?php } ?>
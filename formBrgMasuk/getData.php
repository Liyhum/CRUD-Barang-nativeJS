<?php

    include "../koneksi.php";
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_masuk a INNER JOIN tb_barang b ON a.id_barang = b.id_barang ORDER BY a.tgl_masuk DESC ") or die(mysqli_error($koneksi));

    if (!$query) {
        die('Error: ' . mysqli_error($koneksi));
    }

    while ($result = mysqli_fetch_array($query)){
?>    

<tr>
    <td><input type="checkbox" id="select_id" class="cek" value="<?php echo $result['id_barang']; ?>"></td>
    <td><?php echo $no++; ?></td>
    <td><?php echo $result['id_barang']; ?></td>
    <td><?php echo $result['nama_barang']; ?></td>
    <td><?php echo $result['jenis']; ?></td>
    <td><?php echo $result['satuan']; ?></td>
    <td><?php echo $result['stok_awal']; ?></td>
    <td><button class="btn btn-sm btn-primary" onclick="edit_data('<?php echo $result['user_id'];?>')">Edit Data</button>
    <button class="btn btn-sm btn-danger" onclick="delete_data('<?php echo $result['user_id'];?>')">Delete</button></td>
</tr>

<?php } ?>

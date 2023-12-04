<?php

    include "../koneksi.php";
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * from tb_barang ") or die(mysqli_error($koneksi));

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
    <td><?php echo $result['harga']; ?></td>
    
</tr>

<?php } ?>

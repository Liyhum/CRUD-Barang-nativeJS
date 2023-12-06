<?php
    include "../koneksi.php";
    $query = mysqli_query($koneksi, "SELECT a.id_masuk, a.tgl_masuk, b.id_barang, b.nama_barang, SUM(a.jml_masuk) AS total_masuk
                                      FROM tb_masuk a
                                      INNER JOIN tb_barang b ON a.id_barang = b.id_barang
                                      GROUP BY a.id_barang
                                      ORDER BY a.tgl_masuk DESC") or die(mysqli_error($koneksi));

    if (!$query) {
        die('Error: ' . mysqli_error($koneksi));
    }

    $no = 1;
    while ($result = mysqli_fetch_array($query)){
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $result['id_masuk']; ?></td>
        <td><?php echo $result['tgl_masuk']; ?></td>
        <td><?php echo $result['id_barang']; ?></td>
        <td><?php echo $result['nama_barang']; ?></td>
        <td><?php echo $result['total_masuk']; ?></td>
        <td>
            <button class="btn btn-sm btn-primary" onclick="edit_data('<?php echo $result['id_masuk'];?>')" value="<?php echo $result['id_masuk'];?>">Edit Data</button>
            <button class="btn btn-sm btn-danger" onclick="delete_data('<?php echo $result['id_masuk'];?>')">Delete</button>
        </td>
    </tr>
<?php } ?>

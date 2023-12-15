<?php

include "../koneksi.php";
$no = 1;
$query = mysqli_query($koneksi, "SELECT
    tb_barang.*,
    COALESCE(SUM(tb_masuk.jml_masuk), 0) AS total_masuk,
    COALESCE(SUM(tb_keluar.jml_keluar), 0) AS total_keluar
FROM
    tb_barang
LEFT JOIN
    tb_masuk ON tb_barang.id_barang = tb_masuk.id_barang
LEFT JOIN
    tb_keluar ON tb_barang.id_barang = tb_keluar.barang_id
GROUP BY
    tb_barang.id_barang, tb_barang.nama_barang, tb_barang.jenis, tb_barang.stok_awal, tb_barang.harga, tb_barang.satuan
ORDER BY
    tb_barang.id_barang") or die(mysqli_error($koneksi));

while ($result = mysqli_fetch_array($query)) {
?>

    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $result['id_barang']; ?></td>
        <td><?php echo $result['nama_barang']; ?></td>
        <td><?php echo $result['jenis']; ?></td>
        <td><?php echo $result['satuan']; ?></td>
        <td><?php echo $result['stok_awal']; ?></td>
        <td><?php echo $result['total_masuk']; ?></td>
        <td><?php echo $result['total_keluar']; ?></td>
        <td><?php echo $result['stok_awal'] - $result['total_keluar'] + $result['total_masuk']; ?></td>
    </tr>

<?php } ?>
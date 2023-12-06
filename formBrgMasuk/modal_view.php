<?php
    include "../koneksi.php";
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_masuk a INNER JOIN tb_barang b ON a.id_barang = b.id_barang ORDER BY a.tgl_masuk DESC ") or die(mysqli_error($koneksi));

    // Simpan data ke dalam array untuk ditampilkan dalam satu modal
    $allData = [];
    while ($result = mysqli_fetch_array($query)) {
        $allData[] = $result;
    }
?>

<!-- Modal untuk menampilkan semua data -->
<div class="modal fade" id="modal_view_all" >
    <div class="modal-dialog" style= "max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Semua Data Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allData as $data): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['id_masuk']; ?></td>
                                <td><?php echo $data['tgl_masuk']; ?></td>
                                <td><?php echo $data['id_barang']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['jml_masuk']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

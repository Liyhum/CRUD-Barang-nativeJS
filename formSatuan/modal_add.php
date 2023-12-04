<?php
     include '../koneksi.php';

    $query = "SELECT MAX(id_satuan) AS kode FROM tb_satuan";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
    $kode_satuan = $data['kode'];
    $urutan = (int)$kode_satuan;
    $urutan++;
    $idSatuan = sprintf("%02s", $urutan);
?>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Master Satuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>ID Satuan</label>
                <input type="text" class="form-control" id="id_satuan" name="id_satuan" value="<?php echo $idSatuan ?>" readonly>
                <label>Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" id="btn_simpan" class="btn btn-primary btn-sm">Simpan Data</button>
            </div>
        </div>
    </div>
</div>

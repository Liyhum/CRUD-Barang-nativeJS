<?php
    include '../koneksi.php';
    $query ="SELECT MAX(id_jenis)AS kode FROM tb_jenis";
    $sql = mysqli_query($koneksi,$query);
    $data = mysqli_fetch_array($sql);
    $kode_jenis = $data['kode'];
    // nilai 1 dan 4 itu diambil dari id_barang di database, nilai 1 untuk huruf B, nilai 4 untuk angka 0001
    $urutan = (int) $kode_jenis;
    $urutan++;
    // $huruf = "B";
    $idJenis = sprintf("%02s",$urutan);
?>
<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Master Jenis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <label for="">ID Jenis</label>
                        <input type="text" class="form-control" id="id_jenis" name="id_jenis" 
                        value="<?php echo $idJenis ?>" readonly>
                        <label for="">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_simpan" class="btn btn-primary btn-sm">Simpan Data</button>
                        </div>
                    </div>

                </div>

</div>
<script src="formJenis/jenis.js"></script>
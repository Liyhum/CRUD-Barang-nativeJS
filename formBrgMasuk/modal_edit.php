<?php
    include '../koneksi.php';
    $id_masuk = $_GET['id_masuk'];
    $query ="SELECT * FROM tb_masuk WHERE id_masuk='$id_masuk'" ;
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_array($sql);

    $id_masuk=$data['id_masuk'];
    $tgl_masuk=$data['tgl_masuk'];
    $barang_id=$data['id_barang'];
    $jml_masuk=$data['jml_masuk'];
    
?>
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>ID Masuk</label>
                <input type="text" class="form-control" id="id_masuk_e" name="id_masuk_e" value="<?php echo $id_masuk ?>" readonly>
                <label>Tanggal Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk_e" name="tgl_masuk_e" value="<?php echo $tgl_masuk?>">
                <label>ID Barang</label>
                <select name="barang_id_e" class="form-control select2bs4" id="barang_id_e" style="width: 100%;">
                    <?php
                    $query_barang ="SELECT * FROM tb_barang ";
                    $sql_barang=mysqli_query($koneksi,$query_barang);
                    while($data_barang=mysqli_fetch_array($sql_barang)){
                        $select = ($barang_id == $data_barang['id_barang']) ? "selected" : "";

                        echo "<option $select value='".$data_barang['id_barang']."'>".$data_barang['id_barang'].' - '.$data_barang['']."</option>";
                    }
                    ?>
                </select>
                <label>Jumlah Masuk</label>
                <input type="number" class="form-control" id="jml_masuk_e" name="jml_masuk_e" value="<?php echo $jml_masuk?>">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" id="btn_ubah" class="btn btn-info">Ubah Data</button>
            </div>
        </div>
    </div>
</div>

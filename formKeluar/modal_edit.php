<?php
    include '../koneksi.php';
    $id_keluar = $_GET['id_keluar'];
    $query = "SELECT * FROM tb_keluar where id_keluar='$id_keluar'" ;
    $sql = mysqli_query($koneksi,$query);
    $data = mysqli_fetch_array($sql);
    $id_keluar = $data['id_keluar'];
    $tgl_keluar = $data['tgl_keluar'];
    $barang_id = $data['barang_id'];
    $jml_keluar = $data['jml_keluar'];
    
?>
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Barang Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <label>ID Keluar</label>
                            <input type="text" class="form-control" id="id_keluar_e" name="id_keluar_e" value="<?php echo $id_keluar ?>" readonly>
                            <label>Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tgl_keluar_e" name="tgl_keluar_e" value="<?php echo $tgl_keluar ?>">
                            <label>ID Barang</label>
                            <select name="barang_id_e"  id="barang_id_e" class="form-control select2bs4" style="width: 100%;">
                                <?php
                                include './koneksi.php';
                                $query ="SELECT * FROM tb_barang ";
                                $sql=mysqli_query($koneksi,$query);
                                while($data=mysqli_fetch_array($sql)){
                                    if($barang_id == $data['id_brg']){
                                        $select="selected";

                                    }else{
                                        $select="";
                                    }
                                  echo"<option $select value='".$data['id_brg']."'>".$data['id_brg'].' - '.$data['nama_brg']."</option>";

                                }
                                ?>
                            </select>
                            <label>Jumlah Keluar</label>
                            <input type="number" class="form-control" id="jml_e" name="jml_e" value="<?php echo $jml_keluar ?>">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_ubah" class="btn btn-info">Ubah Data</button>
                        </div>
                    </div>

                </div>

</div>
<script src="formKeluar/keluar.js"></script>
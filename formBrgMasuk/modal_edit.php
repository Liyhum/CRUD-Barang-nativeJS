<?php
    include '../koneksi.php';
    $id_masuk = $_GET['id_masuk'];
    $query ="SELECT * FROM tb_masuk where id_masuk='$id_masuk'" ;
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_array($sql);
    $id_brg=$data['id_barang'];
    $nama_brg=$data['nama_barang'];
    $jenis=$data['jenis'];
    $satuan=$data['satuan'];
    $stok_awal=$data['stok_awal'];
    $harga=$data['harga'];
    
?>
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Master Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <label>ID Barang</label>
                            <input type="text" class="form-control" id="id_brg_e" name="id_brg_e" value="<?php echo $id_brg ?>" readonly>
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="nama_brg_e" name="nama_brg_e" value="<?php echo $nama_brg ?>">
                            <label>Jenis Barang</label>
                            <select name="jenis_e" class="form-control" id="jenis_e">
                                <option <?php if($nama_brg == 'ATK') { echo 'selected';} ?>>ATK</option>
                                <option <?php if($nama_brg == 'Minuman') { echo 'selected';} ?>>Minuman</option>
                                <option <?php if($nama_brg == 'Makanan') { echo 'selected';} ?>>Makanan</option>
                            </select>
                            <label>Satuan</label>
                            <select name="satuan_e" class="form-control" id="satuan_e">
                                <?php
                                include './koneksi.php';
                                $query ="SELECT * FROM tb_satuan ";
                                $sql=mysqli_query($koneksi,$query);
                                while($data=mysqli_fetch_array($sql)){
                                    if($satuan==$data['id_satuan']){
                                        $select="selected";

                                    }else{
                                        $select="";
                                    }
                                  echo"<option $select value='".$data['satuan']."'>".$data['satuan']."</option>";

                                }
                                ?>
                            </select>
                            <label>Stok Awal</label>
                            <input type="number" class="form-control" id="stok_e" name="stok_e" value="<?php echo $stok_awal ?>">
                            <label>Harga</label>
                            <input type="number" class="form-control" id="harga_e" name="harga_e" value="<?php echo $harga ?>">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_ubah" class="btn btn-info">Ubah Data</button>
                        </div>
                    </div>

                </div>

</div>
<!-- <script src="barang/brg.js"></script> -->
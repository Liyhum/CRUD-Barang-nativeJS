<?php
    include '../koneksi.php';
    $query ="SELECT MAX(id_barang)AS kode FROM tb_barang";
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_array($sql);
    $kode_brg=$data['kode'];
    // nilai 1 dan 4 itu diambil dari id_barang di database, nilai 1 untuk huruf B, nilai 4 untuk angka 0001
    $urutan=(int) substr($kode_brg,1,4);
    $urutan++;

    $huruf="B";
    $idBarang=$huruf.sprintf("%04s",$urutan);
?>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Master Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <label>ID Barang</label>
                            <input type="text" class="form-control" id="id_brg" name="id_brg" value="<?php echo $idBarang ?>" readonly>
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="nama_brg" name="nama_brg">
                            <label>Jenis Barang</label>
                            <select name="jenis" class="form-control" id="jenis">
                                <option>ATK</option>
                                <option>Minuman</option>
                                <option>Makanan</option>
                            </select>
                            <label>Satuan</label>
                            <select name="satuan" class="form-control" id="satuan">
                                <?php
                                include './koneksi.php';
                                $query ="SELECT * FROM tb_satuan";
                                $sql=mysqli_query($koneksi,$query);
                                while($data=mysqli_fetch_array($sql)){
                                  echo"<option value='".$data['satuan']."'>".$data['satuan']."</option>";
                                }
                                ?>
                            </select>
                            <label>Stok Awal</label>
                            <input type="number" class="form-control" id="stok" name="stok">
                            <label>Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_simpan" class="btn btn-primary btn-sm">Simpan Data</button>
                        </div>
                    </div>

                </div>
    <!-- <script src="barang/brg.js"></script> -->
</div>
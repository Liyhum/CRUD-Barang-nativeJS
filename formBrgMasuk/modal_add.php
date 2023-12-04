<?php
    include '../koneksi.php';
    $query ="SELECT MAX(id_masuk)AS kode FROM tb_masuk";
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_array($sql);
    $kode_brg=$data['kode'];
    // nilai 1 dan 4 itu diambil dari id_barang di database, nilai 1 untuk huruf B, nilai 4 untuk angka 0001
    $urutan=(int) substr($kode_brg,12,4);
    $urutan++;

    $huruf="TM";
    $tgl = date('Ymd');
    $idMasuk =$huruf.'-'.$tgl.'-'.sprintf("%04s",$urutan);



?>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Barang Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <label>ID Masuk</label>
                            <input type="text" class="form-control" id="id_masuk" name="id_masuk" value="<?php echo $idMasuk ?>" readonly>
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                            <label>ID Barang</label>
                            <select name="barang_select" class="form-control select2bs4" id="barang_select" style="width: 100%;">
                                <?php
                                include '../koneksi.php';
                                $query ="SELECT * FROM tb_barang";
                                $sql=mysqli_query($koneksi,$query);
                                while($data=mysqli_fetch_array($sql)){
                                  echo"<option value='".$data['id_barang']."'>".$data['nama_barang']."</option>";
                                }
                                ?>
                            </select>
                            <label>Nama barang</label>
                            <input type="text" class="form-control" id="nm_barang" name="nm_barang" readonly>
                            <label>Stok Awal</label>
                            <input type="number" class="form-control" id="stok" name="stok" readonly>
                            <label>Jumlah Masuk</label>
                            <input type="number" class="form-control" id="jml_masuk" name="jml_masuk">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_simpan" class="btn btn-primary btn-sm">Simpan Data</button>
                        </div>
                    </div>

                </div>
    <!-- <script src="barang/brg.js"></script> -->
</div>
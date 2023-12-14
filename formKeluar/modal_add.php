<?php
    include '../koneksi.php';
    $query ="SELECT MAX(id_keluar)AS kode FROM tb_keluar";
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_array($sql);
    $kode_keluar=$data['kode'];
    // nilai 1 dan 4 itu diambil dari id_keluar di database, nilai 1 untuk huruf B, nilai 4 untuk angka 0001
    $urutan=(int) substr($kode_keluar,12,4);
    $urutan++;

    $huruf = "TK";
    $tgl = date('Ymd');
    $idkeluar = $huruf.'-'.$tgl.'-'.sprintf("%04s",$urutan);
?>
<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Barang Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <label>ID Keluar</label>
                            <input type="text" class="form-control" id="id_keluar" name="id_keluar" value="<?php echo $idkeluar ?>" readonly>
                            <label>Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                            <label>ID Barang</label>
                            <select name="barang_id"  id="barang_id" class="form-control select2bs4" style="width: 100%;">
                                <?php
                                include '../koneksi.php';
                                $query ="SELECT * FROM tb_barang";
                                $sql=mysqli_query($koneksi,$query);
                                while($data=mysqli_fetch_array($sql)){
                                  echo"<option value='".$data['id_barang']."'>".$data['id_barang'].' - '.$data['nama_barang']."</option>";
                                }
                                ?>
                            </select>
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="nama_brg" name="nama_brg" readonly>
                            <label>Stok Barang</label>
                            <input type="text" class="form-control" id="stok" name="stok" readonly>
                            <label>Jumlah Keluar</label>
                            <input type="number" class="form-control" id="jml" name="jml">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="btn_simpan" class="btn btn-primary btn-sm">Simpan Data</button>
                        </div>
                    </div>

                </div>

</div>
<script src="formKeluar/keluar.js"></script>
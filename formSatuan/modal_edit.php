<?php
    include '../koneksi.php';
    $id_satuan = $_GET['id_satuan'];
    $query ="SELECT * FROM tb_satuan where id_satuan='$id_satuan'" ;
    $sql=mysqli_query($koneksi,$query);
    $data=mysqli_fetch_array($sql);
    $id_satuan=$data['id_satuan'];
    $satuan=$data['satuan'];
?>

<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Master Satuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>ID Satuan</label>
                <input type="text" class="form-control" id="id_satuan_e" name="id_satuan_e" value="<?php echo $id_satuan ?>" readonly>
                <label>Satuan</label>
                <input type="text" class="form-control" id="satuan_e" name="satuan_e" value="<?php echo $satuan ?>">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" id="btn_ubah" class="btn btn-info">Ubah Data</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#modal_edit').on('shown.bs.modal', function () {
            // Attach the click event handler after the modal is shown
            $('#btn_ubah').on('click', function(e) {
                var id_satuan = $('#id_satuan_e').val();
                var satuan = $('#satuan_e').val();

                if (id_satuan == '') {
                    alert('Satuan ID wajib diisi!');
                } else if (satuan == '') {
                    alert('Satuan wajib diisi!');      
                } else {
                    var str_data = "id_satuan=" + id_satuan +
                        "&satuan=" + satuan;
                    $.ajax({
                        type: "POST",
                        url: "formSatuan/edit.php",
                        dataType: "text",
                        data: str_data,
                        success: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                            });
                            if (data == '1') {
                                loadData();
                                $('#modal_edit').modal('hide');
                                // toastr.success('Data berhasil diubah');
                                Toast.fire({
                                    icon: "success",
                                    title: "Data Berhasil diubah",
                                });
                            } else {
                                alert(data);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    });
</script>

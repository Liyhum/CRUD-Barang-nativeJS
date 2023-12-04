$(document).ready(function() {
    $("#tabel").DataTable();
    loadData();
    // $(".select2").select2();
    $(".select2bs4").select2({
        theme: "bootstrap4",
    });

    $("#btn_add").click(function() {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        $.ajax({
            url: "formBrgMasuk/modal_add.php",
            type: "get",
            success: function(data) {
                $("#konten").html(data);
                $("#modal_add").modal("show");
                reset();
            },
        });
    });
    $("#btn_edit").click(function() {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        var cek = $(".cek:checked");
        if (cek.length == 1) {
            var id = [];
            $(cek).each(function() {
                id.push($(this).val());
                // alert(id);
                var str_data = "id_brg=" + id;
                $.ajax({
                    url: "formBrgMasuk/modal_edit.php",
                    type: "get",
                    data: str_data,
                    success: function(data) {
                        $("#konten").html(data);
                        $("#modal_edit").modal("show");
                        //reset();
                    },
                });
            });
        } else {
            alert("pilih data satu saja!!");
        }
    });
    $(document).on("click", "#btn_delete", function(e) {
        // alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        var cek = $(".cek:checked");
        if (cek.length > 0) {
            var id = [];
            console.log(cek);
            reset();
            $(cek).each(function() {
                id.push($(this).val());
                // alert(id);
                var str_data = "id_brg=" + id;
                $.ajax({
                    url: "formBrgMasuk/delete.php",
                    type: "POST",
                    data: str_data,
                    success: function(data) {
                        // alert(data);
                        if (data == "1") {
                            // alert('data berhasil dihapus');
                            loadData();
                            // toastr.success("Data Berhasil Dihapus");
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
                            Toast.fire({
                                icon: "success",
                                title: "Data Berhasil Dihapus",
                            });
                        } else {
                            toastr.info(data);
                        }
                    },
                });
            });
        } else {
            alert("pilih data satu saja!!");
        }
    });

    function reset() {
        // $('#id_brg').val('');
        $("#tgl_masuk").val("");
        $("#barang_select").val("").change();
        $("#nm_barang").val("");
        $("#stok").val("");
        $("#jml_masuk").val("");
    }

    $(document).on("change", "#barang_select", function(e) {
        var id = $(this).val();
        var str_data = "id=" + id;
        $.ajax({
            url: "formBrgMasuk/cari.php",
            type: "get",
            data: str_data,
            dataType: "json",
            success: function(data) {
                if (data && typeof data === "object") {
                    $("#nm_barang").val(data.nama_barang);
                    $("#stok").val(data.stok_saat_ini);
                } else {
                    console.error("Invalid data received from the server");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
            },
        });
    });

    $(document).on("click", "#btn_simpan", function(e) {
        // alert('Apakah Ini Berfungsi ??');
        var id_masuk = $("#id_masuk").val();
        var tgl_masuk = $("#tgl_masuk").val();
        var id_barang = $("#barang_select").val();
        var jml = $("#jml_masuk").val();
        if (id_masuk == "") {
            alert("id_masuk wajib di isi !!");
        } else if (tgl_masuk == "") {
            alert("tgl_masuk wajib di isi !!");
        } else if (id_barang == "") {
            alert("id_barang wajib di isi !!");
        } else if (jml == "") {
            alert("jml wajib di isi !!");
        } else {
            var str_data =
                "id_masuk=" +
                id_masuk +
                "&tgl_masuk=" +
                tgl_masuk +
                "&id_barang=" +
                id_barang +
                "&jml=" +
                jml;
            $.ajax({
                type: "POST",
                url: "formBrgMasuk/add.php",
                dataType: "text",
                data: str_data,
                success: function(data) {
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
                    // alert(data);
                    if (data == "1") {
                        // alert ('Data Berhasil Disimpan');
                        loadData();
                        $("#modal_add").modal("hide");
                        // toastr.success("Data Berhasil Disimpan");
                        // showSuccessToast("Data Berhasil Diubah");

                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil ditambahkan",
                        });
                    } else {
                        // alert(data);
                        Toast.fire({
                            icon: "info",
                            title: "Data Gagal ditambahkan",
                        });
                        // toastr.info(data);
                    }
                },
            });
        }
    });
    $(document).on("click", "#btn_ubah", function(e) {
        // alert("Apakah Ini Berfungsi ??");
        var id_brg_e = $("#id_brg_e").val();
        var nama_brg_e = $("#nama_brg_e").val();
        var jenis_e = $("#jenis_e").val();
        var satuan_e = $("#satuan_e").val();
        var stok_e = $("#stok_e").val();
        var harga_e = $("#harga_e").val();
        if (id_brg_e == "") {
            alert("id_brg_e wajib di isi !!");
        } else if (nama_brg_e == "") {
            alert("nama_brg_e wajib di isi !!");
        } else if (jenis_e == "") {
            alert("jenis_e wajib di isi !!");
        } else if (satuan_e == "") {
            alert("satuan_e wajib di isi !!");
        } else if (stok_e == "") {
            alert("stok_e wajib di isi !!");
        } else if (harga_e == "") {
            alert("harga_e wajib di isi !!");
        } else {
            var str_data =
                "id_brg=" +
                id_brg_e +
                "&nama_brg=" +
                nama_brg_e +
                "&jenis=" +
                jenis_e +
                "&satuan=" +
                satuan_e +
                "&stok=" +
                stok_e +
                "&harga=" +
                harga_e;
            $.ajax({
                type: "POST",
                url: "formBrgMasuk/edit.php",
                dataType: "text",
                data: str_data,
                success: function(data) {
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
                    if (data == "1") {
                        //alert ('Data Berhasil Diubah');
                        loadData();
                        $("#modal_edit").modal("hide");
                        // toastr.success("Data Berhasil Diubah");
                        // showSuccessToast("Data Berhasil Diubah");
                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil Diubah",
                        });
                    } else {
                        //alert(data);
                        toastr.info(data);
                    }
                },
            });
        }
    });
});

function test() {
    alert("test");
}

function loadData() {
    $.ajax({
        url: "formBrgMasuk/getData.php",
        type: "get",
        success: function(data) {
            $("#tabel").dataTable().fnClearTable();
            $("#tabel").dataTable().fnDraw();
            $("#tabel").dataTable().fnDestroy();
            $("#tabel tbody").html(data);
            $("#tabel").dataTable({
                lengthMenu: [
                    [10, 20, 25, 50, 100, 15, 5, -1],
                    ["10", "20", "25", "50", "100", "15", "5", "Show all"],
                ],
                paging: true,
                searching: true,
                ordering: true,
            });
        },
    });
}

function edit_data(a) {
    $.ajax({
        url: "formBrgMasuk/modal_edit.php",
        type: "get",
        data: {
            user_id: a,
        },
        success: function(data) {
            $("#konten").html(data);
            $("#modal_edit").modal("show");
        },
    });
}

function delete_data(a) {
    $.ajax({
        url: "formBrgMasuk/delete.php",
        type: "POST",
        data: {
            id_masuk: a,
        },
        success: function(data) {
            if ((data = "1")) {
                loadData();
                toastr.success("Data Berhasil Dihapus");
            } else {
                toastr.info(data);
            }
        },
    });
}
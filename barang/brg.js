$(function () {
    $("#tabel").DataTable();
    loadData();
    $("#btn_add").click(function () {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        $.ajax({
            url: "barang/modal_add.php",
            type: "get",
            success: function (data) {
                $("#konten").html(data);
                $("#modal_add").modal("show");
                reset();
            },
        });
    });
    $("#btn_edit").click(function () {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        var cek = $(".cek:checked");
        if (cek.length == 1) {
            var id = [];
            $(cek).each(function () {
                id.push($(this).val());
                // alert(id);
                var str_data = "id_brg=" + id;
                $.ajax({
                    url: "barang/modal_edit.php",
                    type: "get",
                    data: str_data,
                    success: function (data) {
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
    $(document).on("click", "#btn_delete", function (e) {
        // alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();

        var cek = $(".cek:checked");
        if (cek.length > 0) {
            var id = [];
            console.log(cek);
            reset();
            $(cek).each(function () {
                id.push($(this).val());
                // alert(id);
                var str_data = "id_brg=" + id;
                $.ajax({
                    url: "barang/delete.php",
                    type: "POST",
                    data: str_data,
                    success: function (data) {
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
        $("#nama_brg").val("");
        $("#satuan").val("");
        $("#jenis").val("");
        $("#stok").val("");
        $("#harga").val("");
    }
    $(document).on("click", "#btn_simpan", function (e) {
        // alert('Apakah Ini Berfungsi ??');
        var id_brg = $("#id_brg").val();
        var nama_brg = $("#nama_brg").val();
        var satuan = $("#satuan").val();
        var jenis = $("#jenis").val();
        var stok = $("#stok").val();
        var harga = $("#harga").val();
        if (id_brg == "") {
            alert("id_brg wajib di isi !!");
        } else if (nama_brg == "") {
            alert("nama_brg wajib di isi !!");
        } else if (satuan == "") {
            alert("satuan wajib di isi !!");
        } else if (jenis == "") {
            alert("jenis wajib di isi !!");
        } else if (stok == "") {
            alert("stok wajib di isi !!");
        } else if (harga == "") {
            alert("harga wajib di isi !!");
        } else {
            var str_data =
                "id_brg=" +
                id_brg +
                "&nama_brg=" +
                nama_brg +
                "&satuan=" +
                satuan +
                "&jenis=" +
                jenis +
                "&stok=" +
                stok +
                "&harga=" +
                harga;
            $.ajax({
                type: "POST",
                url: "barang/add.php",
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
                            title: "Data Berhasil ditambahkan",
                        });
                        // toastr.info(data);
                    }
                },
            });
        }
    });
    $(document).on("click", "#btn_ubah", function (e) {
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
                url: "barang/edit.php",
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
        url: "barang/getData.php",
        type: "get",
        success: function (data) {
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
        url: "barang/modal_edit.php",
        type: "get",
        data: {
            user_id: a,
        },
        success: function (data) {
            $("#konten").html(data);
            $("#modal_edit").modal("show");
        },
    });
}

function delete_data(a) {
    $.ajax({
        url: "barang/delete.php",
        type: "POST",
        data: {
            user_id: a,
        },
        success: function (data) {
            if ((data = "1")) {
                loadData();
                toastr.success("Data Berhasil Dihapus");
            } else {
                toastr.info(data);
            }
        },
    });
}
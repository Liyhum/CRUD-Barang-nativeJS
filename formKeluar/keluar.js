$(function() {
    $("#tabel").DataTable();
    loadData();

    $(".select2bs4").select2({
        theme: "bootstrap4",
    });

    $("#btn_filter").click(function(e) {
        //alert('Apakah Ini Berfungsi ??');
        filterData();
        e.stopImmediatePropagation();
        return false;
    });

    $("#btn_add").click(function(e) {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        $.ajax({
            url: "formKeluar/modal_add.php",
            type: "get",
            success: function(data) {
                $("#konten").html(data);
                $("#modal_add").modal("show");
                reset();
            },
        });
        e.stopImmediatePropagation();
        return false;
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
                var str_data = "id_keluar=" + id;
                $.ajax({
                    url: "formKeluar/modal_edit.php",
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

    $("#btn_delete").click(function() {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();

        var cek = $(".cek:checked");
        if (cek.length > 0) {
            var id = [];
            $(cek).each(function() {
                id.push($(this).val());
                // alert(id);
                var str_data = "id_keluar=" + id;
                $.ajax({
                    url: "formKeluar/delete.php",
                    type: "POST",
                    data: str_data,
                    success: function(data) {
                        if ((data = "1")) {
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
                            // toastr.success("Data Berhasil Dihapus");
                            loadData();
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
        // $('#id_keluar').val('');
        $("#tgl_keluar").val("");
        $("#barang_id").val("").change();
        $("#jml").val("");
        $("#stok").val("");
        $("#nama_brg").val("");
    }

    $("#barang_id").on("change", function(e) {
        //alert('tes');
        var id = $("#barang_id").val();
        var str_data = "id=" + id;
        // alert(str_data);
        $.ajax({
            url: "formKeluar/cari.php",
            type: "get",
            data: str_data,
            dataType: "json",
            success: function(data) {
                // alert(data[0].nama_barang);
                // console.log("Da", data[0]);
                $("#nama_brg").val(data[0].nama_barang);
                $("#stok").val(data[0].stok_saat_ini);
            },
        });
    });

    $("#btn_simpan").on("click", function(e) {
        //alert('Apakah Ini Berfungsi ??');
        var id_keluar = $("#id_keluar").val();
        var tgl_keluar = $("#tgl_keluar").val();
        var barang_id = $("#barang_id").val();
        var jml = $("#jml").val();

        if (id_keluar == "") {
            alert("id_keluar wajib di isi !!");
        } else if (tgl_keluar == "") {
            alert("tgl_keluar wajib di isi !!");
        } else if (barang_id == "") {
            alert("barang_id wajib di isi !!");
        } else if (jml == "") {
            alert("jml wajib di isi !!");
        } else {
            var str_data =
                "id_keluar=" +
                id_keluar +
                "&tgl_keluar=" +
                tgl_keluar +
                "&barang_id=" +
                barang_id +
                "&jml=" +
                jml;
            $.ajax({
                type: "POST",
                url: "formKeluar/add.php",
                dataType: "text",
                data: str_data,
                success: function(data) {
                    if (data == "1") {
                        // alert("Data Berhasil Disimpan");
                        loadData();
                        $("#modal_add").modal("hide");
                        // toastr.success("Data Berhasil Disimpan");
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
                            title: "Data Berhasil Disimpan",
                        });
                    } else {
                        //alert(data);
                        toastr.info(data);
                    }
                },
            });
        }
    });

    $("#btn_ubah").on("click", function(e) {
        //alert('Apakah Ini Berfungsi ??');
        var id_keluar_e = $("#id_keluar_e").val();
        var tgl_keluar_e = $("#tgl_keluar_e").val();
        var jml_e = $("#jml_e").val();
        var barang_id_e = $("#barang_id_e").val();

        if (id_keluar_e == "") {
            alert("id_keluar_e wajib di isi !!");
        } else if (tgl_keluar_e == "") {
            alert("tgl_keluar_e wajib di isi !!");
        } else if (jml_e == "") {
            alert("jml_e wajib di isi !!");
        } else if (barang_id_e == "") {
            alert("barang_id_e wajib di isi !!");
        } else {
            var str_data =
                "id_keluar=" +
                id_keluar_e +
                "&tgl_keluar=" +
                tgl_keluar_e +
                "&jml=" +
                jml_e +
                "&barang_id=" +
                barang_id_e;
            $.ajax({
                type: "POST",
                url: "formKeluar/edit.php",
                dataType: "text",
                data: str_data,
                success: function(data) {
                    if (data == "1") {
                        // alert("Data Berhasil Diubah");
                        loadData();
                        $("#modal_edit").modal("hide");
                        // toastr.success("Data Berhasil Diubah");
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

function filterData() {
    var start = $("#start").val();
    var end = $("#end").val();
    var str_data = "start=" + start + "&end=" + end;
    $.ajax({
        url: "formKeluar/loadData.php",
        type: "get",
        data: str_data,
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
                dom: "Bfrtip",
                buttons: [{
                        extend: "excelHtml5",
                        text: "Report Excel",
                        title: "Data Barang keluar",
                        filename: "Data Barang keluar",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                            modifier: {
                                page: "current",
                            },
                        },
                    },
                    {
                        extend: "pdf",
                        text: "Report PDF",
                        title: "Data Barang keluar",
                        filename: "Data Barang keluar",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        },
                        custumize: function(doc) {
                            doc.content[1].table.width = [
                                "10%",
                                "20%",
                                "20%",
                                "20%",
                                "20%",
                                "10%",
                            ];
                        },
                    },
                ],
            });
        },
    });
}

function loadData() {
    $.ajax({
        url: "formKeluar/getData.php",
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
                searching: true,
                dom: "Bfrtip",
                buttons: [{
                        extend: "excelHtml5",
                        text: "Report Excel",
                        title: "Data Barang keluar",
                        filename: "Data Barang keluar",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                            modifier: {
                                page: "current",
                            },
                        },
                    },
                    {
                        extend: "pdf",
                        text: "Report PDF",
                        title: "Data Barang keluar",
                        filename: "Data Barang keluar",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5],
                        },
                        custumize: function(doc) {
                            doc.content[1].table.width = [
                                "10%",
                                "20%",
                                "20%",
                                "20%",
                                "20%",
                                "10%",
                            ];
                        },
                    },
                ],
            });
        },
    });
}

function edit_data(a) {
    $.ajax({
        url: "formKeluar/modal_edit.php",
        type: "get",
        data: {
            id_keluar: a,
        },
        success: function(data) {
            $("#konten").html(data);
            $("#modal_edit").modal("show");
        },
    });
}

function delete_data(a) {
    $.ajax({
        url: "formKeluar/delete.php",
        type: "POST",
        data: {
            id_keluar: a,
        },
        success: function(data) {
            if (data === "1") {
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
                loadData();
            } else {
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
                    icon: "error",
                    title: data,
                });
            }
        },
    });
}
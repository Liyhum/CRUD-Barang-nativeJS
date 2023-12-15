$(document).ready(function() {
    $("#tabel").DataTable();
    loadData();
    // $(".select2").select2();

    $(document).on("click", "#btn_add", function(e) {
        //alert('Apakah Ini Berfungsi ??');
        //$('#modal_add').modal('show');
        //reset();
        $.ajax({
            url: "formBrgMasuk/modal_add.php",
            type: "get",
            success: function(data) {
                $("#konten").html(data);
                $("#modal_add").modal("show");
                console.log("KEBUKA ");

                $(".select2bs4").select2({
                    theme: "bootstrap4",
                });
                reset();
            },
        });
    });
    $(document).on("click", "#btn_lihat", function(e) {
        $.ajax({
            url: "formBrgMasuk/modal_view.php", // Sesuaikan dengan path file PHP Anda
            type: "GET", // Atau POST jika diperlukan
            success: function(data) {
                // Manipulasi atau tampilkan data di sini
                $("#konten").html(data);

                $("#modal_view_all").modal("show");
            },
            error: function(error) {
                console.error("Error:", error);
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

                        $(".select2bs4").select2({
                            theme: "bootstrap4",
                        });
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
                console.log("AJAX error:", status, error);
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
            alert("ID wajib di isi !!");
        } else if (tgl_masuk == "") {
            alert("Tanggal wajib di isi !!");
        } else if (id_barang == "") {
            alert("Barang wajib di isi !!");
        } else if (jml == "") {
            alert("Jumlah wajib di isi !!");
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
        var id_masuk_e = $("#id_masuk_e").val();
        var tgl_masuk_e = $("#tgl_masuk_e").val();
        var jml_e = $("#jml_masuk_e").val();
        var barang_id_e = $("#barang_id_e").val();

        if (id_masuk_e == "") {
            alert("id_masuk_e wajib di isi !!");
        } else if (tgl_masuk_e == "") {
            alert("tgl_masuk_e wajib di isi !!");
        } else if (jml_e == "") {
            alert("jml_e wajib di isi !!");
        } else if (barang_id_e == "") {
            alert("barang_id_e wajib di isi !!");
        } else {
            var str_data =
                "id_masuk=" +
                id_masuk_e +
                "&tgl_masuk=" +
                tgl_masuk_e +
                "&jml=" +
                jml_e +
                "&barang_id=" +
                barang_id_e;
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
                        Toast.fire({
                            icon: "info",
                            title: data,
                        });
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
            id_masuk: a,
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
            if ((data = "1")) {
                loadData();
                Toast.fire({
                    icon: "success",
                    title: "Data Berhasil Dihapus",
                });
            } else {
                Toast.fire({
                    icon: "info",
                    title: data,
                });
            }
        },
    });
}
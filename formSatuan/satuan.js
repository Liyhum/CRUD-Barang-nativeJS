$(function() {
    $("#tabel").DataTable();
    loadData();

    $("#btn_add_satuan").click(function() {
        console.log("TEST KLIK");
        $.ajax({
            url: "formSatuan/modal_add.php",
            type: "get",
            success: function(data) {
                $("#konten").html(data);
                $("#modal_add").modal("show");
                reset();
            },
        });
        // $("#modal_add").modal("show");
        // reset();
    });

    function reset() {
        // $("#id_satuan").val("");
        $("#satuan").val("");
    }

    $(document).on("click", "#btn_simpan", function(e) {
        console.log("TEST");
        var id_satuan = $("#id_satuan").val();
        var satuan = $("#satuan").val();

        if (id_satuan == "") {
            alert("satuan ID wajib diisi !");
        } else if (satuan == "") {
            alert("username wajib diisi !");
        } else if (satuan == "") {} else {
            var str_data = "id_satuan=" + id_satuan + "&satuan=" + satuan;
            $.ajax({
                type: "POST",
                url: "formSatuan/add.php",
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
                        loadData();
                        $("#modal_add").modal("hide");
                        // toastr.success("data berhasil disimpan");
                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil Disimpan",
                        });
                    } else {
                        alert(data);
                    }
                },
            });
        }
    });

    $("#btn_ubah").on("click", function(e) {
        var id_satuan = $("#id_satuan_e").val();
        var satuan = $("#satuan_e").val();

        if (id_satuan == "") {
            alert("satuan ID wajib diisi !");
        } else if (satuan == "") {
            alert("satuan wajib diisi !");
        } else {
            var str_data = "id_satuan=" + id_satuan + "&satuan=" + satuan;
            $.ajax({
                type: "POST",
                url: "formSatuan/edit.php",
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
                        loadData();
                        $("#modal_edit").modal("hide");
                        // toastr.success("data berhasil diubah");
                        Toast.fire({
                            icon: "success",
                            title: "Data Berhasil diubah",
                        });
                    } else {
                        alert(data);
                    }
                },
            });
        }
    });
});

function loadData() {
    $.ajax({
        url: "formSatuan/getData.php",
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
        url: "formSatuan/modal_edit.php",
        type: "get",
        data: {
            id_satuan: a,
        },
        success: function(data) {
            $("#konten").html(data);
            $("#modal_edit").modal("show");
        },
    });
}

function delete_data(a) {
    $.ajax({
        url: "formSatuan/delete.php",
        type: "POST",
        data: {
            id_satuan: a,
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
                // toastr.success("data berhasil dihapus");
                Toast.fire({
                    icon: "success",
                    title: "Data Berhasil dihapus",
                });
                loadData();
            } else {
                toastr.info(data);
            }
        },
    });
}
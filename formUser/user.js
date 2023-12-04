document.addEventListener("DOMContentLoaded", function() {
    $("#tabel").DataTable();
    loadData();

    $("#btn_add").click(function() {
        $("#modal_add").modal("show");
        reset();
    });

    function reset() {
        $("#user_id").val("");
        $("#username").val("");
        $("#password").val("");
        $("#status").val("");
    }
    $("#btn_simpan").on("click", function(e) {
        var user_id = $("#user_id").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var status = $("#status").val();

        if (user_id == "") {
            alert("user ID wajib diisi !");
        } else if (username == "") {
            alert("username wajib diisi !");
        } else if (password == "") {
            alert("password wajib diisi !");
        } else if (status == "") {
            alert("status wajib diisi !");
        } else {
            var str_data =
                "user_id=" +
                user_id +
                "&username=" +
                username +
                "&password=" +
                password +
                "&status=" +
                status;
            $.ajax({
                type: "POST",
                url: "formUser/add.php",
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
        alert("TEST ANYING");
    });
});

function loadData() {
    $.ajax({
        url: "formUser/getData.php",
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

function updateData(data) {
    // alert("TEST ANYING");
    var user_id = $("#user_id_e").val();
    var username = $("#username_e").val();
    var password = $("#password_e").val();
    var status = $("#status_e").val();

    if (user_id == "") {
        alert("user ID wajib diisi !");
    } else if (username == "") {
        alert("username wajib diisi !");
    } else if (password == "") {
        alert("password wajib diisi !");
    } else if (status == "") {
        alert("status wajib diisi !");
    } else {
        var str_data =
            "user_id=" +
            user_id +
            "&username=" +
            username +
            "&password=" +
            password +
            "&status=" +
            status;
        $.ajax({
            type: "POST",
            url: "formUser/edit.php",
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
}

function edit_data(a) {
    $.ajax({
        url: "formUser/modal_edit.php",
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

function togglePassword() {
    var input = document.getElementById("editPassword");
    var icon = document.getElementById("toggleIcon");
    // input.type = "text";
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
    console.log(input.type);
}

function delete_data(a) {
    $.ajax({
        url: "formUser/delete.php",
        type: "POST",
        data: {
            user_id: a,
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
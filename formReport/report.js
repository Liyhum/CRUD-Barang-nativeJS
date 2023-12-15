document.addEventListener("DOMContentLoaded", function () {
    $("#tabel").DataTable({
        lengthMenu: [
            [10, 20, 25, 50, 100, 15, 5, -1],
            ["10", "20", "25", "50", "100", "15", "5", "Show all"],
        ],
        paging: true,
        searching: false,
        ordering: true,
        buttons: [
            'copy', 'excel', 'pdf'
        ],
    });

    loadData();
});

function loadData() {
    $.ajax({
        url: "formReport/getData.php",
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
                buttons: [
                    'excel', 'pdf'
                ],
            });
        },
    });
}
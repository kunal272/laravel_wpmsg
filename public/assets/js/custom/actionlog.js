$(document).ready(function (e) {
    getData(1);

    $(document).on("click", "#indexTablePagination a", function (event) {
        event.preventDefault();
        $("li").removeClass("active");
        $(this).parent("li").addClass("active");
        var url = $(this).attr("href");
        var page = $(this).attr("href").split("page=")[1];
        IndexTablePageno = page;
        sessionStorage.setItem("pageno", page);
        var pageno = sessionStorage.getItem("pageno");
        if (pageno) {
            page = pageno;
        } else {
            page = 1;
        }
        getData(page);
    });
});


function getData(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/actionlog/data",
        type: "POST",
        data: { page: page },
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable('#ActionLogsTable')) {
                $('#ActionLogsTable').DataTable().destroy();
            }
            $("#dataTable").html(data);

            $("#ActionLogsTable").DataTable({
                paging: false,
                info: false,
                searching: true,
                stateSave: true,
            });
            $("#ActionLogsTable").removeClass('dataTable');
        },
        complete: function () {
            $(".loader-wrapper").addClass("d-none");
        },
        error: function (error) {
            console.log(error);
            // alert("Error");
        },
    });
}

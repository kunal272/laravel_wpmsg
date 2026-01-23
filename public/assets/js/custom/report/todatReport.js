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

    $(document).on("click", ".toggle-link", function (e) {
        e.preventDefault();

        var id = $(this).data("id");
        var type = $(this).data("type"); // message | error

        var $visible = $(".visible-content." + type + id);
        var $hidden = $(".hidden-content." + type + id);

        if ($hidden.is(":visible")) {
            $hidden.slideUp();
            $visible.show();
            $(this).text("Read More...");
        } else {
            $visible.hide();
            $hidden.slideDown();
            $(this).text("Read Less");
        }
    });


});



function getData(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/todayreport/data",
        type: "POST",
        data: { page: page },
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable("#todayReportTable")) {
                $("#todayReportTable").DataTable().destroy();
            }
            $("#dataTable").html(data);
            $("#TotalRecords").empty().html($("#totalcount").val());
            $("#todayReportTable").DataTable({
                paging: false,
                info: false,
                searching: true,
                stateSave: false,
            });
            $("#todayReportTable").removeClass("dataTable");
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

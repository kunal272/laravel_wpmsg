$(document).ready(function () {

    getData(1);

    /* ================= PAGINATION ================= */
    $(document).on("click", "#indexTablePagination a", function (event) {
        event.preventDefault();

        $("li").removeClass("active");
        $(this).parent("li").addClass("active");

        let page = $(this).attr("href").split("page=")[1];
        sessionStorage.setItem("pageno", page);

        getData(page);
    });

    /* ================= OPEN ADD MODAL ================= */
    $(document).on("click", "#addTemplateBtn", function (e) {
        e.preventDefault();
        $("#addTemplateForm")[0].reset();
        $("#addTemplateModal").modal("show");
    });

    /* ================= ADD TEMPLATE ================= */
    $(document).on("submit", "#addTemplateForm", function (e) {
        e.preventDefault();

        $.ajax({
            url: baseUrl + "/templates/add",
            type: "POST",
            data: $(this).serialize(),
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {
                if (data.error) {
                    showToast("error", data.error);
                } else {
                    showToast("success", data.success);
                    $("#addTemplateForm")[0].reset();
                    $("#addTemplateModal").modal("hide");
                    getData(1);
                }
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
            }
        });
    });

    /* ================= OPEN EDIT MODAL ================= */
    $(document).on("click", ".editTemplate", function () {

        let id = $(this).data("id");

        $.ajax({
            url: baseUrl + "/templates/edit",
            type: "POST",
            data: { id: id },
            beforeSend: function () {
                $("#loader1").removeClass("d-none");
            },
            success: function (data) {
                if (data.error) {
                    Swal.fire("Error!", data.error, "error");
                } else {
                    $("#editTemplateForm input[name=id]").val(data.id);
                    $("#editTemplateForm input[name=template_name]").val(data.template_name);
                    $("#editTemplateForm textarea[name=message]").val(data.message);
                    $("#editTemplateModal").modal("show");
                }
            },
            complete: function () {
                $("#loader1").addClass("d-none");
            }
        });
    });

    /* ================= UPDATE TEMPLATE ================= */
    $(document).on("submit", "#editTemplateForm", function (e) {
        e.preventDefault();

        $.ajax({
            url: baseUrl + "/templates/update",
            type: "POST",
            data: $(this).serialize(),
            beforeSend: function () {
                $("#loader1").removeClass("d-none");
            },
            success: function (data) {
                if (data.error) {
                    showToast("error", data.error);
                } else {
                    showToast("success", data.success);
                    $("#editTemplateForm")[0].reset();
                    $("#editTemplateModal").modal("hide");
                    var page = sessionStorage.getItem("pageno") ?? 1;
                    getData(1);
                }
            },
            complete: function () {
                $("#loader1").addClass("d-none");
            }
        });
    });

    /* ================= DELETE TEMPLATE ================= */
    $(document).on("click", ".deleteTemplate", function () {

        let id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "This template will be permanently deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            confirmButtonText: "Yes, permanently delete"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: baseUrl + "/templates/delete",
                    type: "POST",
                    data: { id: id },
                    beforeSend: function () {
                        $("#loader1").removeClass("d-none");
                    },
                    success: function (data) {
                        Swal.fire("Deleted!", data.success, "success");
                        getData(sessionStorage.getItem("pageno") ?? 1);
                    },
                    complete: function () {
                        $("#loader1").addClass("d-none");
                    }
                });
            }
        });
    });

});


/* ================= LOAD TABLE DATA ================= */
function getData(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/templates/data",
        type: "POST",
        data: { page: page },
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {

            if ($.fn.DataTable.isDataTable('#templateTable')) {
                $('#templateTable').DataTable().destroy();
            }

            $("#dataTable").html(data);

            $("#templateTable").DataTable({
                paging: false,
                info: false,
                searching: true,
                stateSave: false
            });

            $("#templateTable").removeClass("dataTable");
        },
        complete: function () {
            $(".loader-wrapper").addClass("d-none");
        }
    });
}

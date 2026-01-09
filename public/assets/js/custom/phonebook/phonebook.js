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

    // $(document).on("click", "#indexTablePagination1 a", function (event) {
    //     event.preventDefault();
    //     $("li").removeClass("active");
    //     $(this).parent("li").addClass("active");
    //     var url = $(this).attr("href");
    //     var page = $(this).attr("href").split("page=")[1];
    //     IndexTablePageno = page;
    //     sessionStorage.setItem("pageno", page);
    //     var pageno = sessionStorage.getItem("pageno");
    //     if (pageno) {
    //         page = pageno;
    //     } else {
    //         page = 1;

    //     }
    //     loadPhonebookContacts(page);
    // });



    $(document).on('change', '#ActiveInactive', function () {
        var checkbox = $(this);
        var status = checkbox.prop("checked") == true ? 1 : 0;
        var id = checkbox.data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to change it!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Change it!"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: baseUrl + "/blocdddkrenewal/statuschange",
                    method: 'POST',
                    beforeSend: function () {
                        $(".loader-wrapper").removeClass("d-none");
                    },
                    data: {
                        status: status,
                        dlrCode: id
                    },
                    success: function (response) {
                        showToast('success', "The status has been changed successfully.");
                        getData(1);
                    },
                    error: function (error) {
                        showToast('error', "There was an error changing the status.");
                        checkbox.prop("checked", !checkbox.prop("checked"));
                    },
                    complete: function () {
                        $(".loader-wrapper").addClass("d-none");
                    },
                });
            } else {
                checkbox.prop("checked", !status);
            }
        });
    });

    $(document).on("click", "#addPhoneBookBtn", function (e) {
        e.preventDefault();
        $("#addPhonebookForm")[0].reset();
        $("#addPhonebookModal").modal('show');

    })


    $(document).on("submit", "#addPhonebookForm", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var formdata = new FormData($("#addPhonebookForm")[0]);
        $.ajax({
            url: baseUrl + '/phonebook/add',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,

            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {
                if (data.hasOwnProperty("error")) {
                    showToast('error', data.error);
                } else {
                    showToast('success', data.success);
                    $("#addPhonebookForm")[0].reset();
                    $("#addPhonebookModal").modal("hide");
                    var page = sessionStorage.getItem("pageno") ?? 1;
                    getData(page);
                }
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
            },
            error: function (error) {
                console.log(error);
                // alert("Error");
            },
        });
    });

    $(document).on("click", ".deletePhonebook", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "This action will permanently delete the phonebook and all its contacts. This cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, permanently delete",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    url: baseUrl + "/phonebook/delete",
                    type: "post",
                    data: {
                        id: id
                    },
                    beforeSend: function () {
                        $("#loader1").removeClass("d-none");
                    },
                    success: function (data) {
                        if (data.hasOwnProperty("error")) {
                            Swal.fire("Error!", data.error, "error");
                        } else {
                            Swal.fire({ title: "Deleted!", text: data.success, icon: "success" });

                            var page = sessionStorage.getItem("pageno");
                            getData(page);
                        }
                    },
                    complete: function () {
                        $("#loader1").addClass("d-none");
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });

            }
        });

    });

    // OPEN EDIT MODAL
    $(document).on("click", ".editPhonebook", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: baseUrl + "/phonebook/edit",
            method: "post",
            data: {
                id: id
            },
            cache: false,
            beforeSend: function () {
                $("#loader1").removeClass("d-none");
            },
            success: function (data) {
                if (data.hasOwnProperty("error")) {
                    Swal.fire("Error!", data.error, "error");
                } else {
                    // Swal.fire("Success!", data.success, "success");
                    $('.viewData').html(data);
                    $("#editPhonebookModal").modal("show");
                }
            },
            complete: function () {
                $("#loader1").addClass("d-none");
            },
            error: function (err) { },
        });

    });

    // UPDATE PHONEBOOK
    $(document).on("submit", "#editPhonebookForm", function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: baseUrl + "/phonebook/update",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $("#loader1").removeClass("d-none");
            },
            success: function (data) {
                if (data.error) {
                    showToast('error', data.error);
                } else {
                    showToast('success', data.success);
                    $("#editPhonebookForm")[0].reset();
                    $("#editPhonebookModal").modal("hide");
                    var page = sessionStorage.getItem("pageno") ?? 1;
                    getData(page);
                }
            },
            complete: function () {
                $("#loader1").addClass("d-none");
            }
        });
    });

    $(document).on("click", ".viewPhonebook", function () {
        let id = $(this).data("id");

        $.ajax({
            url: baseUrl + "/phonebook/view",
            type: "POST",
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr("content")
            },
            beforeSend: function () {
                $("#loader1").removeClass("d-none");
            },
            success: function (data) {
                if (data.error) {
                    Swal.fire("Error!", data.error, "error");
                } else {
                    $(".viewData").html(data);
                    $("#viewPhonebookModal").modal("show");
                    $("#ContactPhonebookTable").DataTable({
                        paging: true,
                        info: true,
                        searching: true,
                        stateSave: false
                    });
                    $("#ContactPhonebookTable").removeClass('dataTable');
                }
            },
            complete: function () {
                $("#loader1").addClass("d-none");
            }
        });
    });


});


function getData(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/phonebook/data",
        type: "POST",
        data: { page: page },
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable('#phonebookTable')) {
                $('#phonebookTable').DataTable().destroy();
            }
            $("#dataTable").html(data);
            $("#TotalRecords").empty().html($("#totalcount").val());
            $("#phonebookTable").DataTable({
                paging: false,
                info: false,
                searching: true,
                stateSave: false,
            });
            $("#phonebookTable").removeClass('dataTable');

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

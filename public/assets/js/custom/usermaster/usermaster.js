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

    $(document).on("change", ".select-all-chk", function (e) {
        e.preventDefault();
        var $row = $(this).closest('tr');
        var isChecked = $(this).is(':checked');
        if (isChecked) {
            $row.find('input[type="checkbox"]').not(this).prop('checked', isChecked);
        } else {
            $row.find('input[type="checkbox"]').not(this).prop('checked', false);
        }
    });

    $(document).on('click', '.toggle-password', function () {
        var id = $(this).attr("id").replace("toggle-", "");
        var inpuid = $("#password-" + id);
        $(this).toggleClass("fa-eye fa-eye-slash");

        if (inpuid.prop("type") == "password") {
            inpuid.prop("type", "text");
            setTimeout(function () {
                inpuid.prop("type", "password");
            }, 7000);

        } else {
            inpuid.prop("type", "password");
        }
    });

    $(document).on("click", ".Save_btn", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var permissions = {};

        $(this).closest('tr').find('input[type="checkbox"]').each(function () {
            permissions[$(this).attr('name')] = $(this).is(':checked') ? 1 : 0;
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: baseUrl + "/usermaster/givepermission",
            type: 'POST',
            data: {
                id,
                permissions
            },
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {

                if (data.hasOwnProperty("error")) {
                    showToast("error", data.error);

                } else {
                    showToast("success", data.success);

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
    })

    // $(document).on('click', '#AddDlrDetails', function (e) {
    //     $('#AddDlrDetailsModal').modal('show')
    // })

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

    $(document).on("click", "#addUserBtn", function (e) {
        e.preventDefault();
        $("#addNewUserForm")[0].reset();
        $("#addNewUserModal").modal('show');

    })


    $(document).on("submit", "#addNewUserForm", function (e) {
        e.preventDefault();
        var formdata = $(this).serialize();
        $.ajax({
            url: baseUrl + '/usermaster/addNewUser',
            type: 'POST',
            data: formdata,
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {
                if (data.hasOwnProperty("error")) {
                    showToast('error', data.error);
                } else {
                    showToast('success', data.success);
                    $("#addNewUserForm")[0].reset();
                    $("#addNewUserModal").modal("hide");
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

});


function getData(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/usermaster/data",
        type: "POST",
        data: { page: page },
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable('#userMasterTable')) {
                $('#userMasterTable').DataTable().destroy();
            }
            $("#dataTable").html(data);
            $("#TotalRecords").empty().html($("#totalcount").val());
            $("#userMasterTable").DataTable({
                paging: false,
                info: false,
                searching: true,
                stateSave: false,

            });
            $("#userMasterTable").removeClass('dataTable');

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

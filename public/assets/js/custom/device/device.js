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
        $("#addDeviceForm")[0].reset();
        $("#addDeviceModal").modal('show');

    })


    $(document).on("submit", "#addDeviceForm", function (e) {
        e.preventDefault();
        var formdata = $(this).serialize();
        $.ajax({
            url: baseUrl + '/device/addDevice',
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
                    $("#addDeviceForm")[0].reset();
                    $("#addDeviceModal").modal("hide");
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


    $(document).on('click', '.btn-scan', function () {

        let id = $(this).data('id');

        $('#qrBox').html('<p class="text-muted">Generating QR...</p>');
        $('#qrModal').modal('show');

        $.ajax({
            url: baseUrl + "/device/scanDevice",
            type: 'POST',
            data: { id: id },
            beforeSend: function () {
                $('#qrBox').html(
                    "<div class='text-center'><div class='spinner-border text-primary'></div><p>Loading...</p></div>"
                );
            },
            success: function (res) {
                if (res.success) {
                    $('#qrBox').html(
                        '<img src="' + res.qr_image + '" class="img-fluid">'
                    );

                    // START STATUS CHECK
                    startStatusCheck(id);

                } else {
                    $('#qrBox').html(
                        '<p id="qrStatus" class="text-danger">' + res.message + '</p>'

                    );
                }
            },

            error: function () {
                $('#qrBox').html(
                    "<p class='text-danger text-center'>QR service unavailable.</p>");

            }
        });
    });


    $(document).on('click', '.btn-logout', function () {

        let deviceId = $(this).data('id');

        Swal.fire({
            title: 'Logout?',
            text: 'Are you sure you want to logout this device?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Logout'
        }).then((result) => {

            if (!result.isConfirmed) return;

            $.ajax({
                url: baseUrl + '/device/logout', // Node API
                type: 'POST',
                data: { id: deviceId },
                beforeSend: function () {
                    $(".loader-wrapper").removeClass("d-none");
                },

                success: function (res) {

                    if (!res.status) {
                        Swal.fire('Error', res.message, 'error');
                        return;
                    } else {
                        Swal.fire('Success', res.message, 'success');
                        var page = sessionStorage.getItem("pageno") ?? 1;
                        getData(page);
                    }

                },
                complete: function () {
                    $(".loader-wrapper").addClass("d-none");
                },

                error: function () {
                    Swal.fire('Error', 'Logout service unavailable', 'error');
                }
            });

        });
    });



});

let statusInterval = null;

function startStatusCheck(deviceId) {

    if (statusInterval) {
        clearInterval(statusInterval);
    }

    statusInterval = setInterval(function () {

        $.ajax({
            url: baseUrl + "/device/checkStatus",
            type: 'POST',
            data: { id: deviceId },

            success: function (res) {

                // API error
                if (!res.success) {
                    // $('#qrModal #qrStatus').addclass('text-danger');
                    $('#qrModal #qrStatus').text(res.message || 'Status error');

                    return;
                }

                if (res.is_ready) {
                    clearInterval(statusInterval);

                    Swal.fire({
                        icon: 'success',
                        title: 'WhatsApp Connected!',
                        text: res.message || 'Device connected successfully',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#qrModal').modal('hide');
                        getData(1);
                    });
                    return;
                }

                // Waiting for QR scan
                if (res.status === 'QR_REQUIRED') {
                    // $('#qrModal #qrStatus').addclass('text-success');
                    $('#qrModal #qrStatus').text('Waiting for scan...');
                }
            }

        });

    }, 3000);
}





function getData(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/device/data",
        type: "POST",
        data: { page: page },
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable('#deviceTable')) {
                $('#deviceTable').DataTable().destroy();
            }
            $("#dataTable").html(data);
            $("#TotalRecords").empty().html($("#totalcount").val());
            $("#deviceTable").DataTable({
                paging: false,
                info: false,
                searching: true,
                stateSave: false,

            });
            $("#deviceTable").removeClass('dataTable');

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

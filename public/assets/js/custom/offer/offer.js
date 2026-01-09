$(document).ready(function (e) {
    const data = $("#filterform").serialize();
    $(document).ready(function () {
        $("#ordertype").select2({
            placeholder: "Select Order Type",
            allowClear: true,
            width: '100%'
        });
    });

    getData(1, data);

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
        const data = $("#filterform").serialize() + "&page=" + page;
        getData(page, data);
    });

    // ===================== Date Picker (flatpickr) =====================
    flatpickr("#SearchStartDate", {
        dateFormat: "d-m-Y",
    });

    flatpickr("#SearchEndDate", {
        dateFormat: "d-m-Y",
    });


    // ===================== AJAX Search =====================
    $(document).on("click", "#SearchAll", function (e) {
        e.preventDefault();
        const data = $("#filterform").serialize();
        getData(1, data);
    });

    $(document).on("click", "#addOfferBtn", function (e) {
        e.preventDefault();
        $("#AddOfferModal").modal('show');
        flatpickr("#StartDate", {
            dateFormat: "d-m-Y",
        });

        flatpickr("#StartTime", {
            enableTime: true,
            noCalendar: true,
            time_24hr: false,
            dateFormat: "h:i K",
            defaultDate: new Date()
        });


        flatpickr("#EndDate", {
            dateFormat: "d-m-Y",
        });

        flatpickr("#EndTime", {
            enableTime: true,
            noCalendar: true,
            time_24hr: false,
            dateFormat: "h:i K",
            defaultDate: new Date()
        });
    });

    $(document).on("submit", "#AddOfferDetails", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: baseUrl + "/offer/add",
            data: $(this).serialize(),
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {

                if (data.hasOwnProperty("error")) {
                    showToast('error', data.error);
                } else {
                    showToast('success', data.success);
                    $("#AddOfferModal").modal('hide');
                    $("#AddOfferDetails")[0].reset();
                    var data = $("#filterform").serialize();
                    getData(1, data);
                }
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
            },
            error: function (error) {
                console.log(error);
            },
        });

    });



    $(document).on("click", "#btnEditOffer", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        let id = $(this).data("id");
        $.ajax({
            url: baseUrl + "/offer/edit",
            type: "POST",
            data: {
                id: id,
            },
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {
                $(".modalData").html(data);
                $("#editOfferModal").modal("show");
                flatpickr("#txtStartDate", {
                    // dateFormat: "d-m-Y",
                });

                flatpickr("#txtStartTime", {
                    enableTime: true,
                    noCalendar: true,
                    time_24hr: false,
                    dateFormat: "h:i K",
                    // defaultDate: new Date()
                });


                flatpickr("#txtEndDate", {
                    // dateFormat: "d-m-Y",
                });

                flatpickr("#txtEndTime", {
                    enableTime: true,
                    noCalendar: true,
                    time_24hr: false,
                    dateFormat: "h:i K",
                    // defaultDate: new Date()
                });
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    $(document).on("submit", "#offerUpdateForm", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        let form = $(this);
        let formData = form.serialize();
        $.ajax({
            url: baseUrl + "/offer/update",
            type: "POST",
            data: formData,
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {
                if (data.hasOwnProperty("error")) {
                    showToast("error", data.error);
                } else {
                    showToast("success", data.success);
                    var data = $("#filterform").serialize();
                    getData(1, data);
                }
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
                $('#editOfferModal').modal('hide');
                $('#offerUpdateForm')[0].reset();
            },
            error: function (error) {
                console.log(error);
            },
        });

    });

    $(document).on("click", "#btnDeleteOffer", function (event) {
        event.preventDefault();
        let id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to delete this offer?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

                $.ajax({
                    url: baseUrl + "/offer/delete",
                    type: "POST",
                    data: { id: id },

                    beforeSend: function () {
                        $(".loader-wrapper").removeClass("d-none");
                    },

                    success: function (data) {
                        if (data.hasOwnProperty("error")) {
                            showToast("error", data.error);
                        } else {
                            Swal.fire("Deleted!", data.success, "success");
                            let formData = $("#filterform").serialize();
                            getData(1, formData);
                        }
                    },

                    complete: function () {
                        $(".loader-wrapper").addClass("d-none");
                    },

                    error: function (err) {
                        console.log(err);
                    },
                });
            }
        });
    });

    $(document).on("click", "#btnActiveInActive", function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        let id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to change the offer status?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, change it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + "/offer/status",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    beforeSend: function () {
                        $(".loader-wrapper").removeClass("d-none");
                    },
                    success: function (data) {
                        if (data.hasOwnProperty("error")) {
                            showToast("error", data.error);
                        } else {
                            showToast("success", data.success);
                            var data = $("#filterform").serialize();
                            getData(1, data);
                        }
                    },
                    complete: function () {
                        $(".loader-wrapper").addClass("d-none");
                    },
                    error: function (err) {
                        console.log(err);
                    },
                });

            }
        });
    });

});


function getData(page, data) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseUrl + "/offer/data",
        type: "POST",
        data: data,
        beforeSend: function () {
            $(".loader-wrapper").removeClass("d-none");
        },
        success: function (data) {
            // Destroy existing DataTable if already initialized
            if ($.fn.DataTable.isDataTable('#offerListTable')) {
                $('#offerListTable').DataTable().destroy();
            }
            $("#dataTable").html(data);

            $("#offerListTable").DataTable({
                paging: false,
                info: true,
                searching: true,
                stateSave: true,
            });
            $("#offerListTable").removeClass('dataTable');
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

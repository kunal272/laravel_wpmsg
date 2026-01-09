$(document).ready(function () {
    $(document).on("submit", "#AddKeysForm", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: baseUrl + "/addkey/senddata",
            data: $(this).serialize(),
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {

                if (data.hasOwnProperty("error")) {
                    showToast('error', data.error);
                } else {
                    Swal.fire({
                        title: "Success!",
                        icon: "success",
                        html: "<b class=text-success mb-2 pb-2>Added Keys : " + data.addkey +
                            "</b><br><b class=text-danger mb-2 pb-2> Duplicate Keys : " + data
                                .duplicate +
                            "</b><br><b class=text-primary mb-2 pb-2> Total Keys : " +
                            data.totalkey + "</b>",
                    });
                    $("#AddKeysForm")[0].reset();
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
});

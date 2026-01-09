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
            url: baseUrl + "/addkeyfamilypack/senddata",
            data: $(this).serialize(),
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {

                if (data.hasOwnProperty("error")) {
                    Swal.fire({
                        title: "Oops...",
                        text: data.error,
                        icon: "error"
                    });
                } else {
                    const message = '<strong style="color:green">Added Keys: ' + data
                        .success.added + "</strong>" + '<br>' +
                        '<strong style="color:red">Duplicate Keys: ' + data.success
                            .duplicate + "</strong>";
                    Swal.fire({
                        title: "Success!",
                        html: message,
                        icon: "success"

                    });
                    $("#AddKeysForm")[0].reset();
                    $("#validityInMonth").val(null).trigger('change');
                    $("#Edition").val(null).trigger('change');
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

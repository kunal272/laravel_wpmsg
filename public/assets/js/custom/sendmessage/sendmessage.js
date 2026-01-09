$(document).ready(function () {

    // Auto fill message from template
    $('#templateSelect').change(function () {
        let msg = $(this).val();
        $('#messageBox').val(msg);
    });

    // Submit Send Message
    $('#sendMessageForm').submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: baseUrl + '/sendmessage/send',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".loader-wrapper").removeClass("d-none");
            },
            success: function (data) {
                if (data.hasOwnProperty("error")) {
                    Swal.fire('Error', data.error, 'error');
                } else {
                    Swal.fire('Success', data.success, 'success');
                    $('#sendMessageForm')[0].reset();
                }
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

});

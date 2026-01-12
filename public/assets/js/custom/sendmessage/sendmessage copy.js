$(document).ready(function () {

    // Template select → fill message + preview
    $('#templateSelect').on('change', function () {
        let msg = $(this).val();
        $('#messageBox').val(msg);
        updatePreview(msg);
    });

    // Live typing preview
    $('#messageBox').on('input', function () {
        updatePreview($(this).val());
    });

    function updatePreview(message) {
        if ($.trim(message) === '') {
            $('#messagePreview').html(
                '<span class="preview-placeholder">Message preview will appear here...</span>'
            );
        } else {
            $('#messagePreview').text(message);
        }
    }

    // Submit form
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
                if (data.error) {
                    Swal.fire('Error', data.error, 'error');
                } else {
                    Swal.fire('Success', data.success, 'success');
                    $('#sendMessageForm')[0].reset();
                    updatePreview('');
                }
            },
            complete: function () {
                $(".loader-wrapper").addClass("d-none");
            }
        });
    });

});

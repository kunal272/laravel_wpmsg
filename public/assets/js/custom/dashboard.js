$(document).ready(function () {

    function loadDashboardTable(type, containerId) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: baseUrl + "/dashboard/table",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                type: type
            },
            beforeSend: function () {
                $("#" + containerId).html(
                    "<div class='text-center'><div class='spinner-border text-primary'></div><p>Loading...</p></div>"
                );
            },
            success: function (html) {
                $("#" + containerId).html(html);
            },
            error: function (xhr) {
                $("#" + containerId).html(
                    "<p class='text-danger text-center'>Failed to load data.</p>");
                console.error(xhr.responseText);
            }
        });
    }

    // Load all tables automatically on dashboard load
    loadDashboardTable('source_summary', 'SourceContainer');
    loadDashboardTable('product_summary', 'ProductContainer');
    loadDashboardTable('order_today', 'OrderToday');
    loadDashboardTable('order_yesterday', 'OrderYesteday');
    loadDashboardTable('order_ten_day', 'OrderTenDays');
    loadDashboardTable('key_stock', 'KeyStockContainer');
    loadDashboardTable('key_not_send', 'KeyNotSend');
    loadDashboardTable('UnActivated_Keys', 'UnActivatedKeys');
    loadDashboardTable('keyActive_Status', 'KeyStatus');
});

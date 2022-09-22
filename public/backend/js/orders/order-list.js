$(document).ready(function () {
    // Set datepicker for input
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    // // Catch event 
    // $('.datepicker-to-order-date').on('click', function () {
    //     // $('.datepicker-from-order-date').focus();

    //     $('.datepicker-to-order-date').datepicker({
    //         minDate: new Date(2021, 10, 30),
    //         // maxDate: new Date(2021, 2, 5),
    //         setDate: new Date(2021, 10, 30)
    //     });
    // });
});

/**
 * 
 * @param {*} that 
 * @param {*} orderId 
 */
function processOrderDetail(that, orderId) {
    if ($(that).hasClass('fa-chevron-up')) {
        $('.order-' + orderId).show();

        // Remove Class And Add Class
        $(that).removeClass('fa-chevron-up fa-chevron-down')
            .addClass('fa-chevron-down');
    } else {
        $('.order-' + orderId).hide();

        // Remove Class And Add Class
        $(that).removeClass('fa-chevron-up fa-chevron-down')
            .addClass('fa-chevron-up');
    }
}

/**
 * 
 * @param {*} that 
 */
 function submitFilterOrder(that) {
    // Get value of per_page
    var perPage = $(that).val();
    
    // Set value for input hidden
    $('#per-page').val(perPage);

    // Trigger submit form
    $('#frm-order-search').submit();
}

function modalOrderStatus(that, url) {
    // Reset Value for Modal
    resetOrderStatus();

    // Get Value for Variable
    var selector = $(that).closest('tr');
    var orderId = selector.data('order-id');
    var fullName = selector.data('full-name');
    var totalQuantity = selector.data('total-quantity');
    var totalMoney = selector.data('total-money');
    var status = selector.data('status');

    console.log(selector)

    // Set Value for Modal
    $('#modal-fullname').val(fullName);
    $('#modal-total-quantity').val(totalQuantity);
    $('#modal-total-money').val(totalMoney);
    $('.status[value="'+ status +'"]').prop('checked', true);
    $('#modal-order-id').val(orderId);
    $('#update-order-status-url').val(url);

    // Display Modal
    $('#modal-update-order-status').modal();
}

function resetOrderStatus() {
    // Set Default Value for Modal
    $('#modal-fullname').val('');
    $('#modal-total-quantity').val('');
    $('#modal-money').val('');
    $('#modal-order-id').val('');
    $('#update-order-status-url').val('');
}

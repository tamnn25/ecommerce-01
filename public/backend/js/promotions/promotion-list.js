$(document).ready(function () {
    // Format Datetime
    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
});

/**
 * 
 * @param {*} that 
 */
function submitFilterPromotion(that) {
    // Get value of per_page
    var perPage = $(that).val();

    // Set value for input hidden
    $('#per-page').val(perPage);

    // Trigger submit form
    $('#frm-promotion-search').submit();
}

$(document).ready(function () {
    // Format Datetime
    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'YYYY-MM-DD'
        },
        "autoUpdateInput": false
    });

    // Format Price
    $('#price').priceFormat({
        prefix: 'VNĐ ',
        centsSeparator: '.',
        thousandsSeparator: ','
    });

    // Select2
    $('.category-select2').select2({
        placeholder: "Select a Category"
    });
});

/**
 * 
 * @param {*} that 
 */
function submitFilterProduct(that) {
    // Get value of per_page
    var perPage = $(that).val();
    
    // Set value for input hidden
    $('#per-page').val(perPage);

    // Trigger submit form
    $('#frm-product-search').submit();
}

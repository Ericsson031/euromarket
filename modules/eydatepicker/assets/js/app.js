function check_shipping_date() {
    if ($('#processed_shipping_date').val() == '') {
        alert(datepickerWarning);
        $('#shipping_date').focus();
        $('#shipping_date').trigger('click');
        return false;
    }
    else {
        return true;
    }
}

$(document).ready(function() {
    if ($('#order form').length) {
        $('#order form').submit(function() {
            return check_shipping_date()
        });
    }
    else {
        //one page checkout
        $('#HOOK_PAYMENT a').live("click", function() {
            return check_shipping_date()
        });
        $('#paypal_payment_form').live("submit", function() {
            return check_shipping_date()
        });
    }
});
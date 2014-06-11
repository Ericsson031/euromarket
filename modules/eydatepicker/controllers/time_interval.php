<?php
include_once(dirname(__FILE__) . '/../../../config/config.inc.php');
include_once(dirname(__FILE__) . '/../../../config/settings.inc.php');
include_once(dirname(__FILE__) . '/../../../classes/Cookie.php');
// require_once(dirname(__FILE__).'/../../../init.php');

$temp = explode('-', $_POST['selDate']);
$selDate = $temp[0] . '-' . ($temp[1] < 10 ? '0' . $temp[1] : $temp[1]) . '-' . ($temp[2] < 10 ? '0' . $temp[2] : $temp[2]);

$day = date("N", strtotime($_POST['selDate']));

$sel_date = date('Y-m-d', strtotime($_POST['selDate']));
$cur_date = date('Y-m-d', time());

$context_shop_id = (int) Shop::getContextShopID(true);
$data = Db::getInstance()->ExecuteS("SELECT hours FROM  " . _DB_PREFIX_ . "availableweekdays WHERE id_shop=" . (int) $context_shop_id . " AND active=1 AND day='" . intval($day) . "' ORDER BY hours");
if (empty($data)) {
    // get all shop settings if we don't have data for this shop
    $data = Db::getInstance()->ExecuteS("SELECT hours FROM  " . _DB_PREFIX_ . "availableweekdays WHERE id_shop=0 AND active=1 AND day='" . intval($day) . "' ORDER BY hours");
}

$hours = explode(',', $data[0]['hours']);
//order hours
if (!empty($hours[0])) {
    echo '<select name="shipping_hour" id="shipping_hour" onChange="update_dates();">';
    foreach ($hours as $hour) {
        if ($cur_date == $sel_date) {
            //remove past hours
            $range_item = explode('-', $hour);
            $range_item_final = (isset($range_item[1]) ? $range_item[1] : $range_item[0]);

            //date hour of range item
            $current_time = time();
            $range_item_date = date('Y-m-d ', $current_time) . ' ' . $range_item_final;

            $hour_item_time = strtotime($range_item_date);
            $preparation_time = Configuration::get("PS_HOURS_TO_PREPARE_ORDER") * 3600;

            //don't display past items
            if ($hour_item_time < $current_time + $preparation_time) {
                continue;
            } else {
                $interval_start_time = strtotime(date('Y-m-d ', $current_time) . ' ' . $range_item[0]);
                // only first item passed the hour
                if ($current_time + $preparation_time > $interval_start_time) {
                    $hour = date('H:i', $current_time + $preparation_time) . (isset($range_item[1]) ? '-' . $range_item[1] : '');
                }
            }
        }
        echo '<option value="' . $hour . '">' . $hour . '</option>';
    }
    echo '</select>';
}


if (Configuration::get("PS_ORDER_PROCESS_TYPE") != 0) {
    //onestepcheckout
    $link = new LinkCore();
    ?>
    <script type="text/JavaScript">
        function update_dates() {
        var recyclablePackage = 0;
        var gift = 0;
        var giftMessage = '';
        var idCarrier = 0;

        var shipping_hour = '';
        var shipping_date = '<?php echo (!empty($_POST['selDate']) ? $_POST['selDate'] : ''); ?>';

        if($('#shipping_hour').length) {
        shipping_hour = $('#shipping_hour').val();
        }

        if($('#processed_shipping_date').length) {
        shipping_date = $('#processed_shipping_date').val();
        }

        if ($('input#recyclable:checked').length)
        recyclablePackage = 1;
        if ($('input#gift:checked').length)
        {
        gift = 1;
        giftMessage = encodeURIComponent($('textarea#gift_message').val());
        }

        if ($('input[name=id_carrier]:checked').length)
        {
        idCarrier = $('input[name=id_carrier]:checked').val();
        checkedCarrier = idCarrier;
        }

        $.ajax({
        type: 'POST',
        url: orderOpcUrl,
        async: false,
        cache: false,
        dataType : "json",
        data: 'ajax=true&method=updateCarrierAndGetPayments&shipping_date='+shipping_date+'&shipping_hour='+shipping_hour+'&id_carrier=' + idCarrier + '&recyclable=' + recyclablePackage + '&gift=' + gift + '&gift_message=' + giftMessage + '&token=' + static_token ,
        success: function(jsonData)
        {
        if (jsonData.hasError)
        {
        var errors = '';
        for(error in jsonData.errors)
        //IE6 bug fix
        if(error != 'indexOf')
        errors += jsonData.errors[error] + "\n";
        alert(errors);
        }
        else
        {
        updateCartSummary(jsonData.summary);
        updatePaymentMethods(jsonData);
        updateHookShoppingCart(jsonData.summary.HOOK_SHOPPING_CART);
        updateHookShoppingCartExtra(jsonData.summary.HOOK_SHOPPING_CART_EXTRA);
        $('#opc_payment_methods-overlay').fadeOut('slow');
        $('#opc_delivery_methods-overlay').fadeOut('slow');
        }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to save carrier \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
        });
        }
        update_dates();
    </script>
    <?php
} else {
    ?>
    <script type="text/JavaScript">
        function update_dates() {}
    </script>
    <?php
}
?>
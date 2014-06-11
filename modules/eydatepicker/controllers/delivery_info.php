<?php

require('common.php');

// load model
require($settings['root_path_models'] . 'Deliveryinfo.php');
$deliveryinfoModel = new Deliveryinfo;

$deliveryinfoModel->id = (int) Tools::getValue('id');
$id_order = (int) Tools::getValue('id_order');
if ($deliveryinfoModel->id > 0) {
	$deliveryinfoModel->updateField('shipping_date', Tools::getValue('shipping_date'));
	$deliveryinfoModel->updateField('shipping_hour', Tools::getValue('shipping_hour'));
} else {
	$deliveryinfoModel->insert(array(
		'id_cart' => 0,
		'id_order' => $id_order,
		'shipping_hour' => pSQL(Tools::getValue('shipping_hour')),
		'shipping_date' => pSQL(Tools::getValue('shipping_date'))
	));
}
echo 'data has been saved';

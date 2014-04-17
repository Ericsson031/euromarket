<?php
require('common.php');

// load model
require($settings['root_path_models'].'Deliveryinfo.php');
$deliveryinfoModel = new Deliveryinfo;

$deliveryinfoModel->id = (int)Tools::getValue('id');
$deliveryinfoModel->updateField('shipping_date', Tools::getValue('shipping_date'));
$deliveryinfoModel->updateField('shipping_hour', Tools::getValue('shipping_hour'));

echo 'data has been saved';
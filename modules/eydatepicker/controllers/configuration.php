<?php
require('common.php');

if(Tools::getValue('action') == 'update') {
	Configuration::updateValue('PS_CUTOFF_HOUR', Tools::getValue('PS_CUTOFF_HOUR'));
	Configuration::updateValue('PS_HOURS_TO_PREPARE_ORDER', Tools::getValue('PS_HOURS_TO_PREPARE_ORDER'));
	Configuration::updateValue('PS_FUTURE_DAYS', Tools::getValue('PS_FUTURE_DAYS'));
	Configuration::updateValue('PS_CALENDAR_INLINE', Tools::getValue('PS_CALENDAR_INLINE'));
	Configuration::updateValue('PS_FIRST_AVAILABLE_DELIVERY_DAY', Tools::getValue('PS_FIRST_AVAILABLE_DELIVERY_DAY'));
	echo 'Data has been saved'; exit;
}

$smarty->assign('BE_SAFE', Configuration::get('BE_SAFE'));
$smarty->assign('PS_CUTOFF_HOUR', Configuration::get('PS_CUTOFF_HOUR'));
$smarty->assign('PS_HOURS_TO_PREPARE_ORDER', Configuration::get('PS_HOURS_TO_PREPARE_ORDER'));
$smarty->assign('PS_FUTURE_DAYS', Configuration::get('PS_FUTURE_DAYS'));
$smarty->assign('PS_CALENDAR_INLINE', Configuration::get('PS_CALENDAR_INLINE'));
$smarty->assign('PS_FIRST_AVAILABLE_DELIVERY_DAY', Configuration::get('PS_FIRST_AVAILABLE_DELIVERY_DAY'));

$smarty->display(realpath(dirname(__FILE__).'/../views/templates').'/admin/configuration.tpl');
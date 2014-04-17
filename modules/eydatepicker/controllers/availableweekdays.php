<?php
require('common.php');

// load model
require($settings['root_path_models'].'Availableweekdays.php');
$availableweekdaysModel = new Availableweekdays;

if(Tools::getValue('action') == 'update') {
	$availableweekdaysModel->id = (int)Tools::getValue('pk');
	$availableweekdaysModel->updateField(Tools::getValue('name'), Tools::getValue('value'));
	return 1;
}


$data = $availableweekdaysModel->getData();

$day_names = array();
$day_names['1'] = ('Monday');
$day_names['2'] = ('Tuesday');
$day_names['3'] = ('Wednesday');
$day_names['4'] = ('Thursday');
$day_names['5'] = ('Friday');
$day_names['6'] = ('Saturday');
$day_names['7'] = ('Sunday');
		
$smarty->assign('data', $data);
$smarty->assign('day_names', $day_names);
$smarty->display(realpath(dirname(__FILE__).'/../views/templates').'/admin/availableweekdays.tpl');
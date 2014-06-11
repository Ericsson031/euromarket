<?php

include_once('../../../config/config.inc.php');
include_once('../../../config/settings.inc.php');
include_once('../../../classes/Cookie.php');
$cookie = new Cookie('psAdmin');

if((int)$cookie->id_employee == 0) {
	// not admin
	echo 'please login to backoffice';
	exit;
}
Configuration::updateValue('DTPKR_ACTV', '1');
Configuration::updateValue('DTPKR_DM', 'myeuromarket.com'); 
$smarty->assign('showreg', Configuration::get('DTPKR_ACTV'));
//$smarty->assign('showreg', False);

$settings = array();
$settings['root_path_models'] = realpath(dirname(__FILE__).'/../models').'/';

require($settings['root_path_models'].'AppModel.php');

$smarty->assign('web_path_templates', __PS_BASE_URI__.'modules/eydatepicker/views/templates/');
$smarty->assign('web_path_controllers', __PS_BASE_URI__.'modules/eydatepicker/controllers/');

// multishop code
if (!(!Shop::isFeatureActive() || Shop::getTotalShops(false, null) < 2)) {
	if(isset($_GET['id_shop'])) {
		$cookie->id_shop = (int)$_GET['id_shop'];
		$cookie->write();
		echo 'ok'; exit;
	}
	Shop::setContext(Shop::CONTEXT_SHOP, (int)$cookie->id_shop);
	$smarty->assign('IS_MULTISHOP', 1);
}
else {
	$smarty->assign('IS_MULTISHOP', 0);
}


// get shops
if (!(!Shop::isFeatureActive() || Shop::getTotalShops(false, null) < 2)) {
	$context_shop_id = Shop::getContextShopID(true);

	$shops = array();
	$html = '<select id="id_shop" name="id_shop">';
	$html .= '<option value="">'.Translate::getAdminTranslation('All shops').'</option>';
	$tree = Shop::getTree();
	foreach ($tree as $gID => $group_data) {
		foreach ($group_data['shops'] as $sID => $shopData)
			if ($shopData['active'])
				$html .= '<option '.($context_shop_id == $sID?' selected="selected" ':'').' value="'.$sID.'">&raquo; '.($context->controller->multishop_context_group == false ? htmlspecialchars($group_data['name']).' - ' : '').$shopData['name'].'</option>';
	}
	$html .= '</select>';
	$smarty->assign('shop_list_html_select', $html);
	$smarty->assign('context_shop_id', $context_shop_id);
}
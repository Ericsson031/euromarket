<?php

if (!defined('_PS_VERSION_'))
	exit;

if (!defined('__DIR__')) {
	define('__DIR__', realpath(dirname(__FILE__)));
}

require_once(realpath(dirname(__FILE__) . '/models/AppModel.php'));

class Eydatepicker extends Module
{

	public function __construct()
	{
		$this->name = 'eydatepicker';

		// used to avoid having the same config variables with other plugins
		// @todo to implement this code for config variables
		$this->code = 'EYDPCKR';

		$this->tab = 'front_office_features';
		$this->version = '4.1.0';
		$this->author = 'ecommy.com';
		$this->need_instance = 0;
		$this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.6');

		parent::__construct();

		$this->displayName = $this->l('Datepicker with hours by ecommy.com');
		$this->description = $this->l('Shows a date picker during checkout. Please press configure before using this plugin.');

		$this->models['Deliveryinfo'] = AppModel::loadModel('Deliveryinfo');
	}

	public function install()
	{
		if (!$this->installDB() || !parent::install() || !$this->registerHooks() || !$this->installConfig()) {
			return false;
		}
		return true;
	}

	public function installDB()
	{
		// install database modifications
		Db::getInstance()->Execute("
CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "eydpckr_delivery_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shop` int(11) NOT NULL DEFAULT '0',
  `id_order` int(11) DEFAULT NULL,  
  `id_cart` int(11) DEFAULT NULL,
  `shipping_hour` varchar(50) DEFAULT NULL,
  `shipping_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`)
);
");

		// recreate tables
		Db::getInstance()->Execute("DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "availableweekdays`");
		$data = Db::getInstance()->ExecuteS("SELECT COUNT(*) as nr FROM information_schema.tables WHERE TABLE_SCHEMA = '" . _DB_NAME_ . "' AND TABLE_NAME = '" . _DB_PREFIX_ . "availableweekdays'");
		if ((int) $data[0]['nr'] == 0) {
			Db::getInstance()->Execute("
CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "availableweekdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shop` int(11) NOT NULL DEFAULT '0',
  `day` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hours` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
      ");
			Db::getInstance()->Execute("
      INSERT INTO `" . _DB_PREFIX_ . "availableweekdays` (`id`, `day`, `active`, `hours`) VALUES
(1, 1, 1, '08:00-12:00,13:00-17:00'),
(2, 2, 1, '08:00-12:00,13:00-17:00'),
(3, 3, 1, '08:00-12:00,13:00-17:00'),
(4, 4, 1, '08:00-12:00,13:00-17:00'),
(5, 5, 1, '08:00-12:00,13:00-17:00'),
(6, 6, 1, '08:00-12:00,13:00-17:00'),
(7, 7, 0, '08:00-12:00,13:00-17:00');
      ");
		}

		// recreate tables
		Db::getInstance()->Execute("DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "restricteddays`");
		$data = Db::getInstance()->ExecuteS("SELECT COUNT(*) as nr FROM information_schema.tables WHERE table_schema = '" . _DB_NAME_ . "' AND table_name = '" . _DB_PREFIX_ . "restricteddays'");
		if ((int) $data[0]['nr'] == 0) {
			Db::getInstance()->Execute("
      CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "restricteddays` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
		`id_shop` int(11) NOT NULL DEFAULT '0',		
        `day` tinyint(2) NOT NULL,
        `month` tinyint(2) NOT NULL,
        `description` varchar(255) NOT NULL,
        `active` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM;
      ");
		}

		return true;
	}

	private function installConfig()
	{
		return (
				Configuration::updateValue('PS_FUTURE_DAYS', 100) &&
				Configuration::updateValue('PS_HOURS_TO_PREPARE_ORDER', 5) &&
				Configuration::updateValue('PS_FIRST_AVAILABLE_DELIVERY_DAY', 1) &&
				Configuration::updateValue('PS_CALENDAR_INLINE', 0) &&
				Configuration::updateValue('PS_CUTOFF_HOUR', 12));
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	// configuration
	public function getContent()
	{
		$context_shop_id = (int) Context::getContext()->shop->id;
		$shop = Shop::getShop($context_shop_id);

		$base_uri = __PS_BASE_URI__;
		if (!empty($shop)) {
			$base_uri = $shop['uri'];
		}

		header("Location: " . $base_uri . 'modules/eydatepicker/controllers/admin.php');
		exit;
	}

	private function registerHooks()
	{
		return (
				// used to update orders table
				$this->registerHook('actionValidateOrder') &&
				$this->registerHook('actionPDFInvoiceRender') &&
				$this->registerHook('processCarrier') &&
				$this->registerHook('displayAdminOrder') &&
				$this->registerHook('header') &&
				$this->registerHook('displayMobileHeader') &&
				$this->registerHook('beforeCarrier'));
	}

	function hookActionPDFInvoiceRender($params)
	{
		$order_invoice_list = $params['order_invoice_list'];
		$list = $order_invoice_list->getResults();
		foreach ($list as $order_invoice) {
			$id_order = $order_invoice->id_order;
			$info = $this->models['Deliveryinfo']->getDeliveryInfo($id_order);
			if (!empty($info['shipping_date'])) {
				Context::getContext()->smarty->assign('shipping_date', $info['shipping_date']);
				Context::getContext()->smarty->assign('shipping_hour', $info['shipping_hour']);
			}
		}
		// @todo multipdf
	}

	/**
	 * code executed after an order is validated
	 */
	function hookActionValidateOrder($params)
	{
		$orderObject = $params['order'];
		$cartObject = $params['cart'];

		$delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) $cartObject->id);

		if (!empty($delivery_info)) {
			$delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) $cartObject->id);
			$this->models['Deliveryinfo']->id = $delivery_info['id'];
			$this->models['Deliveryinfo']->update(array(
				'id_order' => (int) $orderObject->id
			));
		}
	}

	function hookDisplayAdminOrder($params)
	{
		$id_order = (int) $params['id_order'];
		$info = $this->models['Deliveryinfo']->getDeliveryInfo($id_order);

		// get shipping date / hour

		$this->smarty->assign('dateFormat', $this->dateStringToDatepickerFormat($this->context->language->date_format_lite));

		$context_shop_id = (int) Context::getContext()->shop->id;
		$shop = Shop::getShop($context_shop_id);

		$base_uri = __PS_BASE_URI__;
		if (!empty($shop)) {
			$base_uri = $shop['uri'];
		}

		$this->smarty->assign('basedir', $base_uri);

		$this->smarty->assign('id', $info['id']);
		$this->smarty->assign('id_order', $id_order);

		if (empty($info['shipping_date'])) {
			$this->smarty->assign('shipping_date', 'no date selected');
		} else {
			$this->smarty->assign('shipping_date', date($this->context->language->date_format_lite, strtotime($info['shipping_date'])));
		}
		$this->smarty->assign('shipping_date_raw', $info['shipping_date']);
		$this->smarty->assign('shipping_hour', $info['shipping_hour']);
		return $this->display(__FILE__, 'views/templates/hook/orderdetail.tpl');
	}

	function hookProcessCarrier($params)
	{
		$shipping_date = Tools::getValue('shipping_date');
		$shipping_hour = Tools::getValue('shipping_hour');
                
		$cartObject = $params['cart'];
		if (!empty($shipping_date)) {
			$delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) $cartObject->id);
			if (empty($delivery_info)) {
				$this->models['Deliveryinfo']->insert(array(
					'id_cart' => (int) $cartObject->id,
					'shipping_hour' => pSQL($shipping_hour),
					'shipping_date' => pSQL($shipping_date)
				));
			} else {
				$this->models['Deliveryinfo']->id = $delivery_info['id'];
				$this->models['Deliveryinfo']->update(array(
					'shipping_hour' => pSQL($shipping_hour),
					'shipping_date' => pSQL($shipping_date)
				));
			}
		}
	}

	function hookDisplayMobileHeader($params)
	{
		return $this->headerHook($params);
	}

	function hookHeader($params)
	{
		return $this->headerHook($params);
	}

	function headerHook($params)
	{
		$this->context->smarty->assign('modulename', $this->name);
		$this->context->smarty->assign('basedir', __PS_BASE_URI__);
		$this->context->smarty->assign('langcode', $this->context->language->iso_code);
		$this->context->smarty->assign('date_format_lite', $this->context->language->date_format_lite);

		return $this->display(__FILE__, 'views/templates/hook/header.tpl');
	}

	function hookBeforeCarrier($params)
	{
		//eval(gzinflate(base64_decode(rawurldecode('XZe1DsRGGIQfJ4lcmEmpzszMTWQ8M%2FPT59LGlSWvtNbu%2FN%2FMlGfa%2F5mlW0lg%2FxRlPhXln9%2F3GPNpmNdy2%2F736Y9SuYrBgJGtfaA6pJTvmEXXRSu2eLNsNTDjR7iFh%2F8G6SrDJQiTk27uUfBxzTSl8A6eyyGN36JwzmK81%2FDdsjuQ6UFftMvNg7K%2BEFbNVkMBVnAvLXaatBzBTBoJzJra2YmUFpUAjGvqNikCSIaWs0I9xdRgCbpxP0M0D3cTvGotHdUH1CJC5wognE7HY%2BIbjiYQQN%2B8us4Th%2Fv2%2FrqJRIaozmLWUPvW%2BkTIctj1Viz8NRig0UtnsLQtUhlIxnKVgKOleDjd3AFkAy1W2S2VmGPcRo4sxgzZW83J4sdwURlC6Pdk9DtBdR81LzE8SGpnila0gLmspJTi9ejI11UFFaVkqlccEfNXEV79Z7YjDH7H6VFzTEf8JXUm8NXucgDcI2HZhLuVJib3YhPe%2BXAeHdSQbVkzTENsoGXTczv3e6%2F7SDYIQ5WCZ%2FB7Pepw6E7v42QlhTZWaIupZYr7xA2sZmvzhSOwa9LpkV2rh%2BsOZY6GsX%2By0kjgjKSOcqy97MFSvQUNKuNPyFKz9sW84be1e5UeYri%2B1ualmynPu9x5LyQqns40sjCkkK5tOB8NvJGaFN1kDqIJh%2BXbOFfaYuE8Z5bM0RVFt00Tnb8w%2FsxCOZdmjEnBen%2FiPERisWrOVomq2wg14E2BXgi%2BGGSEGXxH5QkfHUI0ocVv6GgGJr86qJErEbG4a%2BS0MnAWBYFVw3Mr41mpqYEo5sio7rEFA2VGsUv2kxW7FzmsvaQ6XHPXc83UEUIvvgfTS9DSwiwIyqyQLrnE7uynRwkAp%2BIiVKUJCqQfSlhUdvGFq7q6r0JoljNeZAnKvhzRTZHicXDbGsB7wj55XFc8a47cLhgzSjrMSUWj9mlmYqPjhvikgaW5Eo%2F1pXJLo9jcPfZD63wa0e%2FQO1v8RDmXQ4CI%2B2SWAwJWmyKFlNG%2BVw1lh0yGycanEdigpiriGh7FQebe%2BhnM00myrqOMhDF3lxQunCYUAoelwot8%2F5zmqWRPm5vR4XgWElwvPEiq3TnEpAy9hClNVOxxRgXRRz%2BeG%2BrITkRPdZAuSETFa9xpVg34sZ0Yk38Hap%2FOBvcG7Azqq7wPhYTVs4VWI0lMO73gdPoI061vjkNUxsV8lPux%2B0SbpsPAnIIjnOX5LJss1rDRkRSNnKiPnYCxoS450XeFqSTyk2%2B61bjRykHhtc%2Byz8Ygd6ObHX411qE7Umlnl4FwTizluJTaGq2ZzK5QJlYP4Lu1sxvZpofIElFydjgRiXh6BPS2tlaKC%2FCzg%2BQm%2BOTyUhzeAZ66OUkdBAc9jYFSvX7NAhuIUYLF%2F0YrqoR%2Bv9Ui8hnTs%2B4G7%2FXCxC0RToRP%2BoXgkqMmhDtoNyYX5Nx4XH7Bo0rocAywDK2AjyX%2F3r1oFoe8BbZMI1MhQuHcAVQ7pfQBpA%2BRI50iohao9NSDvqbHpZ7c2zb8C4aTy8XDHWGkOcEeBivRLbIIJSGGFYNa2kYuiTHE4JImA3Bv2KPOeE9CUuR8is44GjdVRWkF9IOdg9e989Me%2FD3MRH0oIqFJ%2BaFMA8kX66FX5ZM%2BlHQuoA1sGHrKwvKSAcqLrwracrWfCTH89qAhJfXR%2FZg3fwTkwChVWtX2R9J0tBJdWPuWsUAueSyvOztj9fxZSUPp%2BeWkfd%2B3X6szPwUEED4BjgGvaJ%2FCe%2B1UqRRaN3h8Ga%2Bf6IZmki8PWfGpxvFQhASmhONdox7MJ9VvWBqOvBmkfmYksTxRsFdMnNiwqnlRnkq7Q2YzlvF6hvODj1uV6gAhvULyhgbuGox6hN8wOIQbC17C%2FFWAAXN5%2FKHp3Kd9JBMwGyN6PqAWs%2B6sVsY91NG711A9gKX3GAc%2FC68I44dWI6tqaxvWdzR6pGXZVUCTKSpfA3vWSddrbGdCrvqt%2BRF5d5zquvWQ4%2BBH8imqn0ew8k3LTFzcfrhWM8guJmurlSEPnhNj4Kjz8EA0xokmVtmgDqkj0PbEwXkM7B7VW0YzX3UYTWPLGXrByO9PvQxpqQ4fFOp8sLjRzXndY1ae%2Br1pnuPPHUSg1yvCnR%2Fk5ykc%2BySnsz3rPVPno%2FjWz3xWjICzOqtBoMy9CYWD7htUUn%2F4mBrH%2BIST6ZerTIWii1p1QiwovU52bg3qccqhDOVL7WJCK3ujKNuD3q6kM3iINOWa0pf6XibYlCwrGKJ0vJlfQI1%2BDqXbEA%2FuzWSPmoJZgLsWU2TfRuh8DZ%2BIT4MRv8OsLBv1QnvTjl6KNgoeHbOpUKkhT%2BkQ5ckDPayzNfXoI6W1eR2eVrxVWqA01IvUj1KdVdoMyZacw1UM4T%2B%2B5pT37yyrNqsvTeQYja8Me9rTsTlRj89%2FWHwtr0KZit6FBr8riQkDZ5nWOrnDmGww77oDYrUfr7sXHLvPZJFkRYKIUvT7CU%2FLH25tyKpArQqsqNQQtTG8nALhJSdMPspWHt9Gilcb1WLGeRyDb3X6EPmcAu8jHYrWwNWijYr3InSYaVsOJZBd%2FOoOvzSmiTsKrTRkZQHUhGjo0tebR528RjbqzRfxlaEudw528C7RAQBiVYgA0xjSgFi4zWtPsc33R%2BdrKOFIGZhKlRrMDdoUgOHKCLjqgJ0ykaXSZvOWl8ahEx5g%2FPZ8xIGF%2FCKcgR1n9YuF%2FSHEVhvpuDVopk276SGjoWhJN2exRfpwZXbsQLOD%2BcLKkmvNoPDjv5qvcJATZJ5WCAvGJUXQJ9MwMbVVGRLKOBUY2uZYYAUfU7DDhzmcOXvq%2FFBFCIWEn1nFsyYFTiDf8z7YxPKr0uF3hgyjhXYqSRkloK6HXnYE3%2BQVSTlO4ij02xDaowV%2B4dRF9eZQ%2FElqb6o7rQs%2F5Cczz75ht0rEr4OUVpIJQOwYWoAnNKxGCRKfh1nlNDznbpIjA1LkwBpQ6Ppu7KCk5hmavrNsN3rThjFqVkIZKbnUVvn5qFvPI6nfnrW4kNov6JGXvGwKQ3YIM6rzs4e5XoywZ5lLN531MLwu99JpXOCfhaVMR8D0ddhcqf9Z8OsB75UkMDa4ZpnkKMSWMPHlPDiGPlfU21U5WnrdJia2bbWBqejnc9gbyH38OwAIryXv7qSdlpQv%2FzVaJQVtK10M6kfGFKG%2F%2FCXOpnOQWayXu7gTkW2j37XDDUz3mOpqqH3Ym%2BHT60k7fW7cNEMQfdMlhyZsfO9fMwDCbyOUBfPxi1oGe%2F8W0t1f5fibq6Nuen1ultx%2BG8xMiaN3KZC6aGbAmvaVfr44An7iGbA%2FBSn2BqSg970ajJ5ZdNaUG0ONihgQQX53%2FX%2B6a1VauHmuj7ijFcbxF6AO6L1K%2FIhDNKFOc3usivSq5iBj6HQ5DKsOOrvVi%2Fqyr9NVMkM3BXrOUV6nDGiSoO1fGsmKaIKwsyhKjAsc9MKDTocu0N7FTxpJleu198pITTF8FADYXWzbP94g4blEf2xBzJaoPedqnOk5M3kCs8ybgsdv9Q0bV93ULf5EAjE2zgqwnjFdPvi0l%2FkWLTtS1R6I1LB5rzYKysPy0KfHAkeX8NHzzJC1knOVgAsfasA15I1jaQkRrUzoB7PrJGZG7W%2FwWIKOQbp9lb%2FA%2FnxBUD96cAEaXu1yF4oLBc9Eup0kzqqMsYvl15uEYCEQg0OB4FjRn51S%2FgbjxDMUhzTxzFcAA%2FrxU19FY58tZ464851gWKa5t96WRdm%2FD9JOgK7w7AB3fD428xWNVgqC2BCUJwn6fsDK5got5Ejz8SeVZot2ozeZEck5V7TjjUFb1E7QByvoI26hfRBRjTWq3fYhUDeXVnklMTygE5bmVM%2BDVMkisWHTrk%2Bm9T3iWOfujWZ%2BFDjdoUv4bPh%2BYD3wreVKRuFY7m%2BE8RojCcthIirUSTxFA6%2BDsCFiF1AE107x3A1NRb9BIIISSXnXYvtWFTlNzrinagvojPlkLxgLOslIZqxsEX8Xqh9fMH%2Fe8UExeLkou4ivO7Vb7G1eNDeU%2FNKfx0Wz3XjAKfsRJSMoFtaqRQdcjCuwtLNOVGmkt0%2BZr95%2FB6zmy99aNf%2BFWt7sDjLqlzISGXdnKDWdpP1TnKedR1hmVgWUCtXxfvp4UbFOoR4hLvnNhyyCIdFuICQvWq9qgEQqbgyLkE7m6aiX4JOREB570z%2FwJ7KRNNW34FsPxrDxS8pyRV1urineq4NZSw1%2F16jBXUf5DQB%2FRsVs33FetK4odFkVmgLCF%2Bi0ZiA3Q0q35b3IgEXey2k%2BMBvOosXbfIJIJWXBfGmfr9SggOtP%2F3YCBpa58%2BatGZ67wpLYsllgcHG3liXyNoSGgdcSi%2FfFVkqFEqpeOwYUBo6IImQgL2wW3kSJ%2F02IPIPSaE8j4qllLCMKs%2Fd%2BPYo4qoXeTeIJpe%2BIdInTLLeSsRMBinPeykkoEEQ2IGzUOgjBCXhq0BSqiGYTZzir5ixi4CQ1LwFjvXjNPWYsviXEmNVXiphqCOmDBavTOsGb%2B5jtr2JYSrB%2FhWpYtSxK5eNpci%2FVhioF6HfBhP017NpyXoBWHWrcHo5OoY9H1uvv73O0wCJfRH99llpQRn88oWDPzG6%2BGHo5C60xoIHWxeWhmunV2rA9s5NlL8iNGp31V5y4HoRz9Q6ZBYnRzUiPL%2BqhdjWlmAVUWvFIB2yTUW2NDQQlW%2BMaAFqwgTysMiCFp48YP5d9gRZeTStc3vv6dVE36GYCsgbLqcBq3dURDi7LxETGyK4EmMCf1RptQJVjEHdmaSiXNZKsuXAjsXcSvtOOHfA%2F8A36sWFiZ%2B7E%2BEURsu8S8AiedWyfDwjdUnDEjS9fkZ6Hp2FVE1OGQ4CJmL6dOiRGo36t6ns6nXSd%2BK8KfKNu38f3d5%2FOSFc4A0V3%2B02QKbmpKNPuwWWP5NUnlqY7Y55aPcXFq3KOvqLTYvw%2B8%2BqoBcOD9D6v8s8Xo5AiOES5PqctaVYVU3U3GDibdm0GsONdwY%2Br2XIIfNGfz50Y1JnvgAlXCXSf8eeVNyGScGVnleWMeXowthwLXy12RwETFiWsj5Mp6VEcMvodJRSB7PoYmAiZW25s66WwVozarJrfABdEwYioyKqEbYvCs3iYDfuHIeANokms3hc7LHPHWt%2FsxjE81aX9aZZZ41M%2B94W5syGx1%2B03t6QEydyvVcnTAucSa9ULmn03Tt6VEu%2B4r%2Bcf9UA41dLY1%2FRihoKwVKGve0msvyRTf71jsztnnKPzaxny%2FC0AeOfqnnt9S1JTL8c%2FWm0aURQhXPvJsmWDK8RvaJXJAE2J1zZICwbVSWTJb3oRQudwBO4K8p8YBeEghZb42UNumpkGw%2BBmGy4G0RaMQdvngNjUUAvoE34DZAu6GmqRy%2BdnmuA7dmeze7tF6nMje6B6tpLUWwf2Bh9IHw7yudKt%2Bed4vyA0Wi3kdyTqf0yPhhxP3yZY2AR7tpKnDihLB8Gr%2BLVJ%2Ffnjr9%2Fz978%3D'))));
	
            //$actv = Configuration::get('DTPKR_ACTV');
            //$domain = $this->getHost();
            //$reg_domain = $this->getHost(Configuration::get('DTPKR_DM'));
            //if ($actv != 1 || $reg_domain != $domain) { Configuration::updateValue('DTPKR_ACTV', '0');
            //echo 'Please register the datepicker plugin first. Thank you.';
            //exit;
            //} // multishop related 
            $context_shop_id = (int)Shop::getContextShopID(true);
            $data = Db::getInstance()->ExecuteS("SELECT day, active FROM " . _DB_PREFIX_ . "availableweekdays WHERE id_shop=".(int)$context_shop_id." ORDER BY day");
            $disabled_week_days_array = array();
            //sunday is 0 for us is 7 
            $disableWeekDays = '[';
            if (!empty($data)) { $hasdisableddays = false;
            foreach ($data as $line) { if ($line['active'] == 0) { $disabled_week_days_array[] = $line['day'];
            // from 1 to 7 
            } if ($line['day'] == 7) $line['day'] = 0;
            if ($line['active'] == 0) $hasdisableddays = true;
            $disableWeekDays .= ($line['active'] == 0 ? $line['day'] . ',' : '');
            } if ($hasdisableddays) $disableWeekDays = substr($disableWeekDays, 0, - 1);
            } $disableWeekDays .= ']';
            $data = Db::getInstance()->ExecuteS("SELECT day, month FROM " . _DB_PREFIX_ . "restricteddays WHERE active=1 AND (id_shop=".(int)$context_shop_id." OR id_shop=0) ORDER BY day");
            $disabled_days_array = array();
            $disableDays = '[';
            if (!empty($data)) { foreach ($data as $line) { $disabled_days_array[] = ($line['month'] < 10 ? '0' . $line['month'] : $line['month']) . '-' . ($line['day'] < 10 ? '0' . $line['day'] : $line['day']);
            $disableDays .= '"' . $line['month'] . '-' . $line['day'] . '",';
            } $disableDays = substr($disableDays, 0, - 1);
            } $disableDays .= ']';
            $firstAvailableDay = Configuration::get("PS_FIRST_AVAILABLE_DELIVERY_DAY");
            if (date('G') >= intval(Configuration::get("PS_CUTOFF_HOUR"))) { $firstAvailableDay++;
            } // find the real first free day 
            $test = 1;
            $current_timestamp = time() + $firstAvailableDay * 3600 * 24;
            $backup = 0;
            // just in case to avoid infinite loop 
            do {
                // test week day, if it's not disabled we are good to go 
            if (!in_array(date('N', $current_timestamp), $disabled_week_days_array) && !in_array(date('m-d', $current_timestamp), $disabled_days_array)) { 
            // we break the cycle 
            $test = 0;
            }             
            else 
            { $current_timestamp += 3600 * 24;
            } $backup++;
            } while ($test == 1 && $backup < 1000);
            $firstAvailableDay = (int) ( ($current_timestamp - time()) / (3600 * 24) );
            $datepicker_config_data = array();
            $datepicker_config_data['dateFormat'] = $this->dateStringToDatepickerFormat($this->context->language->date_format_lite);
            $datepicker_config_data['disableWeekDays'] = $disableWeekDays;
            $datepicker_config_data['disableDays'] = $disableDays;
            $datepicker_config_data['minDate'] = (int) $firstAvailableDay;
            $datepicker_config_data['maxDate'] = (int) Configuration::get("PS_FUTURE_DAYS");
            $datepicker_config_data['show_calendar_inline'] = (int) Configuration::get("PS_CALENDAR_INLINE");
            $datepicker_config_data['basedir'] = __PS_BASE_URI__;
            
            $this->context->smarty->assign($datepicker_config_data);
	return $this->display(__FILE__, 'views/templates/hook/ordercarrier.tpl');
	}

	function dateStringToDatepickerFormat($dateString)
	{
		$pattern = array(
			//day
			'd', //day of the month
			'j', //3 letter name of the day
			'l', //full name of the day
			'z', //day of the year
			//month
			'F', //Month name full
			'M', //Month name short
			'n', //numeric month no leading zeros
			'm', //numeric month leading zeros
			//year
			'Y', //full numeric year
			'y'  //numeric year: 2 digit
		);
		$replace = array(
			'dd', 'd', 'DD', 'o',
			'MM', 'M', 'm', 'mm',
			'yy', 'y'
		);
		foreach ($pattern as &$p) {
			$p = '/' . $p . '/';
		}
		return preg_replace($pattern, $replace, $dateString);
	}

	function getHost($dom = '', $fast = false)
	{
		// general
		$dom = !$dom ? $_SERVER['SERVER_NAME'] : $dom;
		// for parse_url()                  ftp://           http://          https://
		$dom = !isset($dom[5]) || ($dom[3] != ':' && $dom[4] != ':' && $dom[5] != ':') ? 'http://' . $dom : $dom;
		// remove "/path/file.html", "/:80", etc.
		$dom = parse_url($dom, PHP_URL_HOST);
		// replace absolute domain name by relative (http://www.dns-sd.org/TrailingDotsInDomainNames.html)
		$dom = trim($dom, '.');
		// for fast check
		$dom = $fast ? str_replace(array('www.', 'ww.'), '', $dom) : $dom;
		// separate domain level
		$lvl = explode('.', $dom); // 0 => www, 1 => example, 2 => co, 3 => uk
		// fast check
		if ($fast) {
			if (!isset($lvl[2])) {
				return isset($lvl[1]) ? $dom : false;
			}
		}
		// set levels
		krsort($lvl); // 3 => uk, 2 => co, 1 => example, 0 => www
		$lvl = array_values($lvl); // 0 => uk, 1 => co, 2 => example, 3 => www
		$_1st = $lvl[0];
		$_2nd = isset($lvl[1]) ? $lvl[1] . '.' . $_1st : false;
		$_3rd = isset($lvl[2]) ? $lvl[2] . '.' . $_2nd : false;
		$_4th = isset($lvl[3]) ? $lvl[3] . '.' . $_3rd : false;
		// tld check
		require(__DIR__ . '/assets/tld.txt'); // includes "$tlds"-Array or feel free to use this instead of the cache version:
		//$tlds = array('co.uk', 'co.jp');
		$tlds = array_flip($tlds); // needed for isset()
		// fourth level is TLD
		if ($_4th && !isset($tlds['!' . $_4th]) && (isset($tlds[$_4th]) || isset($tlds['*.' . $_3rd]))) {
			$dom = isset($lvl[4]) ? $lvl[4] . '.' . $_4th : false;
		}
		// third level is TLD
		else if ($_3rd && !isset($tlds['!' . $_3rd]) && (isset($tlds[$_3rd]) || isset($tlds['*.' . $_2nd]))) {
			$dom = $_4th;
		}
		// second level is TLD
		else if (!isset($tlds['!' . $_2nd]) && (isset($tlds[$_2nd]) || isset($tlds['*.' . $_1st]))) {
			$dom = $_3rd;
		}
		// first level is TLD
		else {
			$dom = $_2nd;
		}
		return $dom ? $dom : false;
	}

}

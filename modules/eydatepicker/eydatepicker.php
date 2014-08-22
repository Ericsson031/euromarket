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

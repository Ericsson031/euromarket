<?php

if (!defined('_PS_VERSION_'))
	exit;

class OrderDelete extends Module
{
	/* @var boolean error */
	protected $errors = false;
	
	public function __construct()
	{
		$this->name = 'orderdelete';
		$this->tab = 'administration';
		$this->version = '1.0';
		$this->author = 'Nemo';
		$this->need_instance = 0;

	 	parent::__construct();

		$this->displayName = $this->l('Order Delete');
		$this->description = $this->l('Erase useless orders and related data in one click.');
	}
	
	public function install()
	{
		if (!parent::install())
			return false;
		return true;
	}
	
	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}



	public function getContent(){
		$output = '<h2>'.$this->displayName.'</h2>';
		if (Tools::isSubmit('submitDeleteOrder'))
		{

			$id = Tools::getValue('deletefrom');

			if (!is_numeric($id))
				$this->errors[] = $this->l('Invalid ID');
			else {

				// Prepare and delete secondary data

				$order_details  = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
					SELECT id_order_detail
					FROM '._DB_PREFIX_.'order_detail
					WHERE id_order >= '.$id);


				foreach ($order_details as $odd) {
					if(!Db::getInstance()->delete(_DB_PREFIX_.'order_return_detail', 'id_order_detail = '.$odd['id_order_detail']))
						$this->errors[] = $this->l('Error: '.mysql_error());
					if(!Db::getInstance()->delete(_DB_PREFIX_.'order_slip_detail', 'id_order_detail = '.$odd['id_order_detail']))
						$this->errors[] = $this->l('Error: '.mysql_error());	

					if(_PS_VERSION_ > '1.5.0')
					{
						if(!Db::getInstance()->delete(_DB_PREFIX_.'order_detail_tax', 'id_order_detail = '.$odd['id_order_detail']))
							$this->errors[] = $this->l('Error: '.mysql_error());							
					}				
				}

				$joins = '';
				$selectEls = '';
				    

				$carts = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
					SELECT id_cart
					FROM '._DB_PREFIX_.'orders
					WHERE id_order >= '.$id);
				
				if (_PS_VERSION_ > '1.5.0') {

					$cartRule = 'LEFT JOIN '._DB_PREFIX_.'order_cart_rule AS ods ON ods.id_order = od.id_order';

					// invoices
					$order_invoices  = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
						SELECT id_order_invoice
						FROM '._DB_PREFIX_.'order_invoice
						WHERE id_order >= '.$id);

					foreach ($order_invoices as $oi) {
						if(!Db::getInstance()->delete(_DB_PREFIX_.'order_invoice_tax', 'id_order_invoice = '.$oi['id_order_invoice']))
							$this->errors[] = $this->l('Error: '.mysql_error());						
					}
									
					$selectEls .= ', oi, oip, op'; 
					$joins .= 'LEFT JOIN '._DB_PREFIX_.'order_invoice AS oi ON oi.id_order = od.id_order';
					$joins .= ' LEFT JOIN '._DB_PREFIX_.'order_invoice_payment AS oip ON oip.id_order = od.id_order';	
					$joins .= ' LEFT JOIN '._DB_PREFIX_.'order_payment AS op ON op.order_reference = od.reference';	

					foreach ($carts as $cart) {
						if(!Db::getInstance()->delete('cart_cart_rule', 'id_cart = '.$cart['id_cart']))
							$this->errors[] = $this->l('Error: '.Db::getInstance()->getMsgError());
						if(!Db::getInstance()->delete('cart_product', 'id_cart = '.$cart['id_cart']))
							$this->errors[] = $this->l('Error: '.Db::getInstance()->getMsgError());	
					}
				} else { // 1.4

					// deal with taxes
					$selectEls .= ', ot'; 
					$joins .= 'LEFT JOIN '._DB_PREFIX_.'order_tax AS ot ON ot.id_order = od.id_order';
					$cartRule = 'LEFT JOIN '._DB_PREFIX_.'order_discount AS ods ON ods.id_order = od.id_order';

					foreach ($carts as $cart) {
						if(!Db::getInstance()->delete(_DB_PREFIX_.'cart_discount', 'id_cart = '.$cart['id_cart']))
							$this->_errors[] = $this->l('Error: '.mysql_error());
						if(!Db::getInstance()->delete(_DB_PREFIX_.'cart_product', 'id_cart = '.$cart['id_cart']))
							$this->_errors[] = $this->l('Error: '.mysql_error());	
					}					
				}

				/*

order_cart_rule

				*/
				
				
				// Finally, erase order id associated data!
				$q = '
					DELETE od, odd, ods, oh, ort, os'.$selectEls.'
					FROM 
					'._DB_PREFIX_.'orders AS od
					LEFT JOIN '._DB_PREFIX_.'order_detail AS odd ON odd.id_order = od.id_order
					'.$cartRule.'
					LEFT JOIN '._DB_PREFIX_.'order_history AS oh ON oh.id_order = od.id_order
					LEFT JOIN '._DB_PREFIX_.'order_return AS ort ON ort.id_order = od.id_order
					LEFT JOIN '._DB_PREFIX_.'order_slip AS os ON os.id_order = od.id_order
					'.$joins.'
					WHERE od.id_order >='.$id;
				if(!Db::getInstance()->Execute($q))
					$this->errors[] = $this->l('Error: '.mysql_error());


			}
			if (empty($this->_errors))
				$output .= $this->displayConfirmation('Orders cleaned!');
			else
				$output .= $this->displayError(implode(', ', $$this->_errors));
		}
		return	$output.$this->_displayForm();
	}
	
	private function _displayForm()
	{
		global $cookie;

		$output = '
			<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
		';
		$output .= '
		<p>
			<label>'.$this->l('Start deleting orders from id #').'</label>
			<div class="margin-form">
				<input type="text" name="deletefrom" value=""/><br />
				<span>'.$this->l('ID of the order to start erasing from').'</span>
			</div>
		</p>
		<p class="warn">'.$this->l('WARNING! Backup you database before proceeding!').'</p>
		<p class="center"><input type="submit" class="button" name="submitDeleteOrder" value="'.$this->l('Delete!').'"></p>
		';

		$output .= '
				</fieldset>
			</form>';

		return $output;
	}
	
}

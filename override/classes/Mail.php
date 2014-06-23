<?php

class Mail extends MailCore
{

	/**
	 * override send class so we can customize email templates
	 */
	public static function Send($id_lang, $template, $subject, $template_vars, $to,
		$to_name = null, $from = null, $from_name = null, $file_attachment = null, $mode_smtp = null, $template_path = _PS_MAIL_DIR_, $die = false, $id_shop = null)
	{
		switch ($template)
		{
			case 'order_conf':
			case 'cliente':
			case 'new_order':
				$cart_id = (int)Context::getContext()->cart->id;

				require_once(realpath(dirname(__FILE__).'/../../modules/eydatepicker/models/AppModel.php'));
				$delivery_info =  AppModel::loadModel('Deliveryinfo');
				$delivery_info = $delivery_info->getDeliveryInfoByCartId($cart_id);
                                
                                print_r($delivery_info );
				if(!empty($delivery_info)) {
					$template_vars['{shipping_date}'] = date(Context::getContext()->language->date_format_lite, strtotime($delivery_info['shipping_date']));
					$template_vars['{shipping_hour}'] = $delivery_info['shipping_hour'];
				}
				else {
					$template_vars['{shipping_date}'] = 'fail';
					$template_vars['{shipping_hour}'] = 'fail';
				}
				break;
		}
		return parent::Send($id_lang, $template, $subject, $template_vars, $to,
		$to_name , $from , $from_name , $file_attachment , $mode_smtp , $template_path, $die , $id_shop );
	}        
         
}


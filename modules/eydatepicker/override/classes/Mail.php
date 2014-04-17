<?php

class Mail extends MailCore
{
	/**
	 * override send class so we can customize email templates
	 */ 
	public static function Send($id_lang, $template, $subject, $template_vars, $to, $to_name = NULL, $from = NULL, $from_name = NULL, $file_attachment = NULL, $mode_smtp = NULL, $template_path = _PS_MAIL_DIR_, $die = false, $id_shop = NULL, $bcc = NULL)
	{
		switch ($template)
		{
			case 'order_conf':
				$template_path = realpath(dirname(__FILE__).'/../../modules/eydatepicker/mails').'/';

				$template_vars['{shipping_date}'] = Context::getContext()->cookie->shipping_date;
				$template_vars['{shipping_hour}'] = Context::getContext()->cookie->shipping_hour;
				break;
		}
		return parent::Send($id_lang, $template, $subject, $template_vars, $to, $to_name, $from, $from_name, $file_attachment, $mode_smtp, $template_path, $die, $id_shop, $bcc);
	}
}
<?php

class Tools extends ToolsCore
{


	/**
	 * no change over the original method
	 */
	public static function displayDate($date, $id_lang = null, $full = false, $separator = null)
	{
		if (!$date || !($time = strtotime($date)))
			return $date;

		if ($date == '0000-00-00 00:00:00' || $date == '0000-00-00')
			return '';

		if (!Validate::isDate($date) || !Validate::isBool($full))
			throw new PrestaShopException('Invalid date');

		$context = Context::getContext();
		$date_format = ($full ? $context->language->date_format_full : $context->language->date_format_lite);
		return date($date_format, $time);
	}
}


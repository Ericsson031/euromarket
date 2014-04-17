<?php
/*
	Module Name: pesimplefooter
	Module URI: http://www.prestaext.com
	Description: Custom footer layout.
	Version: 1.0
	Author: prestaext.com
	Author URI: http://www.prestaext.com
	Copyright (C) 2011 prestaext.com. 

*/

include_once('../../config/config.inc.php');
include_once('../../init.php');
include_once('pesimplefooter.php');

$pesimplefooter = new pesimplefooter();
if (!Tools::isSubmit('secure_key') OR Tools::getValue('secure_key') != $pesimplefooter->secure_key OR !Tools::isSubmit('action'))
	die(1);

if (Tools::getValue('action') == 'dnd')
{
	if ($table = Tools::getValue('tableplef'));
	{
		$pos = 0;
		foreach ($table as $key =>$row)
		{
			$ids = explode('_', $row);
			Db::getInstance()->Execute('
			UPDATE `'._DB_PREFIX_.'pl_simplefooter` 
			SET `order` = '.(int)$pos.' 
			WHERE `id_pesf` = '.(int)$ids[2] );
			$pos++;
		}
	}
}



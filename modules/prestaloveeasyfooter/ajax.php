<?php
include_once('../../config/config.inc.php');
include_once('../../init.php');
include_once('prestaloveeasyfooter.php');

$prestaloveeasyfooter = new prestaloveeasyfooter();
if (!Tools::isSubmit('secure_key') OR Tools::getValue('secure_key') != $prestaloveeasyfooter->secure_key OR !Tools::isSubmit('action'))
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
			UPDATE `'._DB_PREFIX_.'pl_easyfooter` 
			SET `order` = '.(int)$pos.' 
			WHERE `id_plef` = '.(int)$ids[2] );
			$pos++;
		}
	}
}



<?php

/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <jevin9@gmail.com> wrote this module. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return. Jevin O. Sewaruth.
 * ----------------------------------------------------------------------------
 */

if (!defined('_PS_VERSION_'))
	exit;

class ipossync extends Module
{
	public function __construct()
	{
		$this->name = 'iPos sync';
		$this->tab = 'quick_bulk_update';
		$this->version = '1.0';
		$this->author = 'Erik Plestenjak';

		parent::__construct();

		$this->displayName = $this->l('iPos synchronization module');
		$this->description = $this->l('This is a module for one was sinchronis');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');

		$this->_checkContent();

		$this->context->smarty->assign('module_name', $this->name);
	}

	public function install()
	{
		if (!parent::install() ||
			!$this->registerHook('displayHeader') ||
			!$this->registerHook('displayLeftColumn') ||
			!$this->registerHook('displayRightColumn') ||
			!$this->registerHook('displayFooter') ||
			!$this->_createContent())
			return false;
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
			!$this->_deleteContent())
			return false;
		return true;
	}
	
	/*
	$target = Tools::getValue('id');
	$name = Tools::getValue('name');
	Db::getInstance()->insert('target_table', array(
		'id_target' => (int)$target,
		'name'      => pSQL($name),
	));
	
	
	 Db::getInstance()->update($table, $data, $where = '', $limit = 0, $null_values = false, $use_cache = true, $add_prefix = true);
*/
}

?>

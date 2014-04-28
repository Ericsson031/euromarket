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
		$this->description = $this->l('This is a module for one way sinchronisation from iPOS to prestashop.');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');

		$this->context->smarty->assign('module_name', $this->name);
	}

	public function install()
	{
		if (!parent::install)
			return false;
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}
}

?>

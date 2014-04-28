<?php

if (!defined('_PS_VERSION_'))
	exit;

class hidestock extends Module
{
	public function __construct()
	{
		$this->name = 'hidestock';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Erik Plestenjak';

		parent::__construct();

		$this->displayName = $this->l('products filtering module');
		$this->description = $this->l('This is a module for filtering/hiding products out of stock on the frontend.');

		$this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');

		$this->context->smarty->assign('module_name', $this->name);
	}
	
	public function hookActionProductListOverride($params)
	{
			echo 'exec';
			$this->context->smarty->assign('categoryNameComplement', '');
			$this->nbProducts = $this->category->getProducts(null, null, null, $this->orderBy, $this->orderWay, true);
			$this->pagination((int)$this->nbProducts); // Pagination must be call after "getProducts"			
			$this->cat_products = $this->category->getProducts($this->context->language->id, (int)$this->p, (int)$this->n, $this->orderBy, $this->orderWay);	
			//modification for not displaying 0 quantity products
						
			foreach($this->cat_products as $elementKey => $element) {
				foreach($element as $valueKey => $value) {
					if($valueKey == 'quantity' && $value == '0'){
						//delete this particular object from the $array
						unset($this->cat_products[$elementKey]);
					} 
				}
			}
			
			return array(
			'nbProducts' => $this->nbProducts,
			'catProducts' => $this->cat_products,);
			echo 'finished';
	}

	public function install()
	{
		return parent::install() && $this->registerHook('actionProductListOverride');
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
}

?>

<?php

if (!defined('_PS_VERSION_'))
	exit;

class ipossyncUpdateprestashopModuleFrontController extends ModuleFrontController
{
	public function initContent()
	{
		parent::initContent();		
		
		/* You can access it via one these URLs <strong>index.php?fc=module&module=skeleton&controller=details</strong> or <strong>module/skeleton/details</strong>.*/
		
		// in chron    http://www.eurobalkanshop.com/module/ipossync/updateprestashop		
		// Iterate through returned records
		

		for($i=80;$i<3400;$i++)
		{	
		$id_product = (int)Db::getInstance()->getValue('SELECT id_product FROM '._DB_PREFIX_.'product WHERE id_product='.$i);
		if($id_product){
			
		$product = new Product($i, true);
        $product->price = 10000;
        $product->minimal_quantity = 1;
		$product->quantity = 0;
		echo $i.'<br/>';		
		//print_r($product);
        $product->save();
		}
		}
		
		/*
		for($i=1;$i<3400;$i++)
		{	
		$id_product = (int)Db::getInstance()->getValue('SELECT id_product FROM '._DB_PREFIX_.'product WHERE id_product='.$i);
		if($id_product){	
			Db::getInstance()->query('INSERT INTO ps_stock_available (id_product,id_shop_group)
VALUES ('.$i.',1);');
	
			echo $i.'<br/>';
		}
		}
		*/
		
		//$product = new Product(90, true);
		print_r($product);
		$this->context->smarty->assign(array(
			'ipos_db' => 'sucess',
			'updated_products' => 'test1',
		));

		//$this->setTemplate('updateprestashop.tpl');		
	}
}

?>

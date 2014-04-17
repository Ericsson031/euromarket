<?php

class AppModel {
	public $id;
	public $table;
	public $order;
	
	public static function loadModel($model) {
		require_once(dirname(__FILE__).'/'.basename($model).'.php');
		return new $model;
	}
	
	public function getData($options = null) {
		$default_options = array('order' => _DB_PREFIX_ . $this->table.'.id DESC');
		$options = array_merge($default_options, (array)$options);

		$context_shop_id = (int)Shop::getContextShopID(true);
		$results = Db::getInstance()->executeS("SELECT * FROM " . _DB_PREFIX_ . $this->table." 
			WHERE id_shop='".$context_shop_id."'
			ORDER BY ".$options['order']);
		return $results;
	}
		
	public function updateField($field_name, $value) {
		$context_shop_id = (int)Shop::getContextShopID(true);
		Db::getInstance()->update($this->table, array($field_name => pSQL($value), 'id_shop' => $context_shop_id), 'id='.(int)$this->id);
	}	
	
	public function update($data) {
		$context_shop_id = (int)Shop::getContextShopID(true);
		Db::getInstance()->update($this->table, $data, 'id='.(int)$this->id);
	}	
	
	public function insert($data) {
		$data['id_shop'] = (int)Shop::getContextShopID(true);
		Db::getInstance()->insert($this->table, $data);
	}
	
	public function delete() {
		Db::getInstance()->delete($this->table, 'id = '.(int)$this->id);
	}
}
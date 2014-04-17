<?php

class Deliveryinfo extends AppModel {
	public $id;
	public $table = 'eydpckr_delivery_info';
	
	
	public function getDeliveryInfo($order_id) {
		$results = Db::getInstance()->getRow("SELECT * FROM " . _DB_PREFIX_ . $this->table . " WHERE id_order='".(int)$order_id."'");
		return $results;
	}
	public function getDeliveryInfoByCartId($cart_id) {
		$results = Db::getInstance()->getRow("SELECT * FROM " . _DB_PREFIX_ . $this->table . " WHERE id_cart='".(int)$cart_id."'");
		return $results;
	}	
}
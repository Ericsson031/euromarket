<?php

class Restricteddays extends AppModel {
	public $id;
	public $table = 'restricteddays';
	
	public function getData($options = null) {
		return parent::getData(array('order' => '`month`, `day`'));
	}
	
}
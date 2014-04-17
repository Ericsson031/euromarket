<?php

class Restricteddays extends AppModel {
	public $id;
	public $table = 'restricteddays';
	
	public function getData() {
		return parent::getData(array('order' => '`month`, `day`'));
	}
	
}
<?php
require('common.php');

if($showreg == 1) {
	header("Location: ".__PS_BASE_URI__.'modules/eydatepicker/controllers/admin.php');
	exit;
}

$smarty->display(realpath(dirname(__FILE__).'/../views/templates').'/admin/register.tpl');
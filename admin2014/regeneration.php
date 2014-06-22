<?php 
// display logged in status
define('PS_ADMIN_DIR', getcwd());
include(PS_ADMIN_DIR.'/../config/config.inc.php');

print_r('<h1>'.Configuration::get('last_image').'</h1>');
?>
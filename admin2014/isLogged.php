<?php 
// display logged in status
define('PS_ADMIN_DIR', getcwd());
include(PS_ADMIN_DIR.'/../config/config.inc.php');

/* Header can't be included, so cookie must be created here */
$cookie = new Cookie('psAdmin');
if ($cookie->id_employee)    
    echo 1;
else        
    echo 0;
?>
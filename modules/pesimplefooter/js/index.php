<?php
/*
	Module Name: pesimplefooter
	Module URI: http://www.prestaext.com
	Description: Custom footer layout.
	Version: 1.0
	Author: prestaext.com
	Author URI: http://www.prestaext.com
	Copyright (C) 2011 prestaext.com. 

*/

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
						
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
						
header("Location: ../");
?>
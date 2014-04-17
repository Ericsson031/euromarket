<?php
/**
 * Terrifico functions and definitions
 *
 * @package Terrifico
 */
// The path to Themes Functions
define("path", get_template_directory() . "/functions");
require_once path . "/framework-functions.php"; 			// Theme Custom Functions
require_once path . "/image-sliders.php"; 					// Theme Custom Functions
require_once path . "/framework-metaboxes.php";				// Theme Custom Metaboxes
require_once path . "/framework-woocommerce.php";			// WooCommerce
require_once ('admin/index.php');							// Slightly Modified Options Framework


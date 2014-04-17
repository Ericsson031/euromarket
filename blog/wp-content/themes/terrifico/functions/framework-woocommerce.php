<?php
/**
 * Terrifico functions and definitions
 *
 * Enabling support for WooCommerce
 *
 * @package Terrifico
 */

// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page' );
}
?>
<?php
global $woo_options;

/*-----------------------------------------------------------------------------------*/
/* This theme supports WooCommerce													 */
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'terrifico_woocommerce_support' );
function terrifico_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', 'terrifico_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'terrifico_theme_wrapper_end', 10);
 
/**
 * Load start of theme wrapper function	
 * @since 1.0
*/
function terrifico_theme_wrapper_start() {
global $data; 
/** 
 * Check position of the sidebar 
 */
if ( $data['sidebar_pos'] == "left" ) {$sidebar = 'right' ;};
if ( $data['sidebar_pos'] == "right" ) {$sidebar = 'left' ;};
?>
	<div id="main" class="<?php echo $data['layout']; ?>">
		<div id="post-area">
		<?php if ( $data['display_sidebar'] == 1 ) { ?>
			<div id="post-frame" class="<?php echo $sidebar ?>">
				<div id="post-article" class="one-column">
		<?php }else{ ?>
			<div id="post-frame-full">
				<div id="post-article" class="one-column">
		<?php } ?>
<?php }
 
/**
 * Load the end of theme wrapper function	
 * @since 1.0
*/
function terrifico_theme_wrapper_end() { 
global $data; 
/** 
 * Check position of the sidebar 
 */
if ( $data['sidebar_pos'] == "left" ) {$sidebar = 'right' ;};
if ( $data['sidebar_pos'] == "right" ) {$sidebar = 'left' ;};
?>
  				</div>	
			</div><!-- #post-frame -->
			<?php if ( $data['display_sidebar'] == 1 ) { ?>
			<div id="sidebar-frame" class="<?php echo $data['sidebar_pos']; ?>">
				<?php get_sidebar(); ?>
			</div>	
		<?php }; ?>
		</div><!-- #post-area -->
	</div><!-- #Main -->
<?php }
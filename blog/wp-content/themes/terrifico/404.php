<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Terrifico
 */
global $data;
get_header(); ?>
	<div id="main" class="<?php echo $data['layout']; ?>">
	<?php global $data; 
	/** 
	 * Check position of the sidebar 
	 */
	if ( $data['sidebar_pos'] == "left" ) {$sidebar = 'right' ;};
	if ( $data['sidebar_pos'] == "right" ) {$sidebar = 'left' ;};
	?>
		<div id="post-area">
		<?php if ( $data['display_sidebar'] == 1 ) { ?>
			<div id="post-frame" class="<?php echo $sidebar ?>">
		<?php }else{ ?>
			<div id="post-frame-full">
		<?php } ?>
				<div id="post-article">
					<br>
					<h1><?php _e('Error 404 - Page not found!', 'terrifico'); ?></h1>
					<div class="sorry"><?php _e('Sorry! It seems that the page you are looking for is not here.', 'terrifico'); ?></div>
				</div><!--post-article-->		
			</div><!--post-frame-->
			<?php if ( $data['display_sidebar'] == 1 ) { get_template_part('main-sidebar'); }; /* Load main sidebar if enabled */ ?>
		</div><!--post-area-->
	</div><!--main-->
<?php get_footer(); ?>
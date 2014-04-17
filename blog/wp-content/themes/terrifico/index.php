<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terrifico
 */
global $data;
get_header(); ?>
	<div id="main" class="<?php echo $data['layout']; ?>">
	<?php if ( $data['front_page_blog_index'] == 1 ) { /* Check if static home page is enable */ ?>
		<?php if (is_home() && ! is_paged()) { 
			$block = $data['homepage_blocks']['enabled']; /* Load home page layout manager blocks */
			if ($block):
			foreach ($block as $key=>$value) {
				switch($key) {
				case 'image_slider':
					 if ( $data['slider_select'] == "flex" ) { terrifico_flex_slider(); /* Load theme Flex slider function */ };
					 if ( $data['slider_select'] == "refine") { terrifico_refine_slide(); /* Load theme Refine slider function */};
				break;
				case 'tagline':
					terrifico_tag_line(); /* Load theme tag line function */
				break;			
				case 'content_boxes':
					terrifico_content_boxes(); /* Load theme content boxes function */
				break;
				case 'latest_work':
					terrifico_latest_work(); /* Load theme latest work function */
				break;
				case 'from_blog':
					terrifico_from_blog();  /* Load theme from the blog function */
				break;	
				case 'key_features':
					terrifico_key_features(); /* Load theme key features function */
				break;													
			}
			}
			endif;
			?>		
		<?php } else { ?>
			<?php get_template_part( 'loop', 'index' ); ?>
		<?php } ?>
	<?php } else { ?>
		<?php get_template_part( 'loop', 'index' ); ?>
	<?php } ?>
	</div><!--main-->
<?php get_footer(); ?>
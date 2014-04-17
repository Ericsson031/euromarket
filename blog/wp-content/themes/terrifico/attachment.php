<?php
/**
 * Template file used to render a single attachment (attachment post-type) page.   
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
				<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
						<div id="post-article" <?php post_class(); ?>>
							<a class="blog-title" href="<?php the_permalink() ?>"><h3 <?php post_class(); ?>><i class="icon-edit"></i><?php the_title(); ?></h3></a>	
							<?php get_template_part('meta'); ?>
							<?php the_content();?>
							<?php get_template_part('title-meta'); ?>
						</div><!--post-article-->
				<?php endwhile; else: ?>
				<div id="post-article">
					<br>
					<h1><?php _e('Search', 'terrifico'); ?></h1>
					<div class="sorry"><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'terrifico'); ?></div>
				</div><!--post-article-->		
				<?php endif; ?>
			</div><!--post-frame-->
			<?php if ( $data['display_sidebar'] == 1 ) { get_template_part('main-sidebar'); }; /* Load main sidebar if enabled */ ?>
		</div><!--post-area-->
	</div><!--main-->
<?php get_footer(); ?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
				<?php if ( have_posts() ) : while (have_posts() ) : the_post(); /* Queue posts */?>
						<div id="post-article">
							<a class="blog-title" href="<?php the_permalink() ?>"><h3 <?php post_class(); ?>><i class="icon-edit"></i><?php the_title(); ?></h3></a>	
							<?php //get_template_part('meta'); ?>
							<?php the_content();?>
							<?php get_template_part('title-meta'); ?>
						</div><!--post-article-->
						<?php if ($data['enable_comments'] == 1 ) { comments_template( '', true );};?>
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
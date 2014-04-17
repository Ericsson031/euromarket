<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terrifico
 */
terrificoglobal $data;
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
			<?php if ( have_posts() ) : while (have_posts() ) : the_post(); /* Queue posts */ ?>
			  <?php /*
 					 * Pull in a different sub-template, depending on the Post Format.
					 */ ?>
				<?php if(get_post_format()) { ?>
					<div id="post-article" <?php post_class(); ?>>
						<?php get_template_part('post-formats'); ?>
						<?php the_excerpt();?>
						<?php get_template_part('title-meta'); ?>
					</div><!--post-article-->
				<?php }else{?>
					<div id="post-article" <?php post_class(); ?>>
						<?php if ( has_post_thumbnail() ) { ?>
							<a class="meta-section" href="<?php the_permalink() ?>">
								<?php the_post_thumbnail('full'); ?>
								<aside class="blog-date">
									<div>
										<span><?php the_time('j'); ?></span>
										<span><?php the_time('F'); ?></span>
									</div>
								</aside>
							</a>
						<?php }?>
						<a class="blog-title" href="<?php the_permalink() ?>"><h3 <?php post_class(); ?>><i class="icon-edit"></i><?php the_title(); ?></h3></a>	
						<?php get_template_part('meta'); ?>
						<?php the_excerpt();?>
						<?php get_template_part('title-meta'); ?>
					</div><!--post-article-->
				<?php } ?>
			<?php endwhile; else: ?>
			<div id="post-article">
				<br>
				<h1><?php _e('Search', 'terrifico'); ?></h1>
				<div class="sorry"><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'terrifico'); ?></div>
			</div><!--post-article-->		
			<?php endif; ?>
			<div class="clear"></div>
		<?php 
			/** 
			 * Load function to display navigation to next/previous pages
			*/
			terrifico_pagination(); ?>
		</div><!--post-frame-->
	<?php if ( $data['display_sidebar'] == 1 ) { get_template_part('main-sidebar'); }; /* Load main sidebar if enabled */?>
	</div><!--post-area-->	</div><!--main-->
<?php get_footer(); ?>
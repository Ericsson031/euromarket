<?php
/**
 * The Template for displaying all single posts.
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
				<?php if ( have_posts() ) : while (have_posts() ) : the_post(); /* Queue posts */ ?>
			  <?php /*
 					 * Pull in a different sub-template, depending on the Post Format.
					 */ ?>
					<?php if(get_post_format()) { ?>
						<div id="post-article" <?php post_class(); ?>>
							<?php get_template_part('post-formats-single'); ?>
							<?php the_content();?>
							<?php get_template_part('title-meta'); ?>
						</div><!--post-article-->
					<?php }else{?>
						<div id="post-article" <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() ) { ?>
								<a class="meta-section" href="<?php the_permalink() ?>">
									<?php the_post_thumbnail('full'); ?>
								</a>
							<?php }?>
							<a class="blog-title" href="<?php the_permalink() ?>"><h3 <?php post_class(); ?>><i class="icon-edit"></i><?php the_title(); ?></h3></a>	
							<?php get_template_part('meta'); ?>
							<?php the_content();?>
							<?php get_template_part('title-meta'); ?>
						</div><!--post-article-->
					<?php } ?>
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
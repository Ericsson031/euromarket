<?php
/**
 * @package Terrifico
 */
global $data; ?>
<div id="page-header-wrap" class="<?php echo $data['layout']; ?>">
	<div id="page-header-box">
		<div class="page-header">
			<?php if (is_home()) { ?>
				<?php if ($data['star_char_on'] == 1 ) { ?><h1><i class="icon-<?php echo $data['char_name']; ?>"></i></h1><?php } ?>
				<h2><?php _e('Home', 'terrifico'); ?></h2>
			<?php } else { ?>
					<?php if ($data['star_char_on'] == 1 ) { ?><h1><i class="icon-<?php echo $data['char_name']; ?>"></i></h1><?php } ?>
					<?php $parent_title = get_the_title($post); ?>
					<?php if ( is_category() ) { ?>
						<h2><?php single_cat_title(); ?></h2>	 
					<?php } ?>
					<?php if ( is_single() ) { ?>
						<h2><?php echo $parent_title ?></h2>	 
					<?php } ?>
					<?php if ( is_page() ) { ?>
						<h2><?php echo $parent_title ?></h2>	 
					<?php } ?>
					<?php if ( is_author() ) { ?>
						<?php $curauth = $wp_query->get_queried_object(); ?>
						<h2><?php esc_html_e('Posts by ','terrifico'); echo ' ',$curauth->nickname; ?></h2>	 
					<?php } ?>
					<?php if ( is_search() ) { ?>
						<h2><?php esc_html_e('Search results for','terrifico') ?> <?php the_search_query() ?></h2>	 
					<?php } ?>
					<?php if ( is_day() ) { ?>
						<h2><?php esc_html_e('Posts made in','terrifico') ?> <?php the_time('F jS, Y'); ?></h2>	 
					<?php } ?>
					<?php if ( is_month() ) { ?>
						<h2><?php esc_html_e('Posts made in','terrifico') ?> <?php the_time('F, Y'); ?></h2>	 
					<?php } ?>
					<?php if ( is_year() ) { ?>
						<h2><?php esc_html_e('Posts made in','terrifico') ?> <?php the_time('Y'); ?></h2>	 
					<?php } ?>
					<?php if ( is_tag() ) { ?>
						<h2><?php esc_html_e('Posts Tagged &quot;','terrifico') ?><?php single_tag_title(); echo('&quot;'); ?></h2>	 
					<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
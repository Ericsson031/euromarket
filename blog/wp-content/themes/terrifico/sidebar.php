<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Terrifico
 */

if ( ! dynamic_sidebar( 'main-sidebar' ) ) : ?>
	<div id="archives" class="widget">
		<h4 class="widget-title"><?php _e( 'Archives', 'terrifico' ); ?></h4>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</div>
	<div id="meta" class="widget">
		<h4 class="widget-title"><?php _e( 'Meta', 'terrifico' ); ?></h4>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
	</div>
<?php endif; ?>

<?php
/**
 * @package Terrifico
 */
global $data; ?>
<?php if($data['footer_widgets_on']): ?>
<footer class="footer-area">
	<?php
		if (   ! is_active_sidebar('footer-widget-1')
			&& ! is_active_sidebar('footer-widget-2')
			&& ! is_active_sidebar('footer-widget-3')
			&& ! is_active_sidebar('footer-widget-4')
		)
			return;
	?>
		<div class="footer-block">
			<?php dynamic_sidebar('footer-widget-1'); ?>
		</div>
		<div class="footer-block">
			<?php dynamic_sidebar('footer-widget-2'); ?>
		</div>
		<div class="footer-block">
			<?php dynamic_sidebar('footer-widget-3'); ?>
		</div>
		<div class="footer-block last-block">
			<?php dynamic_sidebar('footer-widget-4'); ?>
		</div>
</footer>
<?php endif; ?>
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Terrifico
 */
global $data; ?>
	<div class="clear"></div>
	<div id="footer" class="<?php echo $data['layout']; ?>">
		<div id="footer-box">
			<?php if ( $data['pre_footer_enable'] == 1 ) { get_template_part( 'pre-footer' ); }; ?>
			<div class="clear"></div>
			<?php if ( $data['footer_social_enable'] == 1 ) { get_template_part( 'social-footer' ); }; ?>
			<div class="clear"></div>
			<?php if ( $data['footer_widgets_on'] == 1 ) { get_sidebar('footer'); }; ?>
			<div class="clear"></div>
		</div><!--footer-box-->
	</div><!--footer-->
	<?php if ( $data['show_footer_copyright'] == 1 ) { get_template_part( 'copyright' ); }; ?>
</div><!--grid-container-->
<?php wp_footer(); ?>
</body>
</html>
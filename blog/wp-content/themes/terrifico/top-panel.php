<?php
/**
 * @package Terrifico
 */
global $data; ?>
	<div id="top-panel" class="<?php echo $data['layout']; ?>">
		<div id="info-box">
			<?php if ( $data['top_contact_enable'] == 1 ) { get_template_part( 'contact-bar' ); }; ?>
			<?php if(class_exists('Woocommerce')) { ?>
				<?php if ( $data['header_social_enable'] == 1 && $data['shopping_cart_enable'] == 0 ) { get_template_part( 'social-bar' ); }; ?>
				<?php if ( $data['shopping_cart_enable'] == 1 ) { get_template_part( 'shopping-cart' ); } ;?>
			<?php } else { ?>
				<?php if ( $data['header_social_enable'] == 1 ) { get_template_part( 'social-bar' ); }; ?>
			<?php } ?>
		</div><!-- #info-box -->
	</div><!-- #top-panel -->

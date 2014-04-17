<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Terrifico
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $data; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ($data['enable_favicon'] == 1 ) { ?>
	<link rel="shortcut icon" href="<?php echo $data['favicon']; ?>" type="image/x-icon" />
<?php } ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php terrifico_custom_styling(); ?>
<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
<div id="grid-container">
	<?php if ( $data['top_panel_enable'] == 1 ) { get_template_part( 'top-panel' ); }; ?>
	<div class="clear"></div>
	<div id="branding" class="<?php echo $data['layout']; ?>">
		<header id="header">
			<div id="logo">
				<?php if ( $data['text_logo_enable'] != 1 ) { ?>
					<a href="<?php echo home_url(); ?>/"><img src="<?php echo $data['logo']; ?>" alt="<?php echo $data['logo_alt_text']; ?>"/></a>
				<?php } else { ?>
					<a href="<?php echo home_url(); ?>/"><?php echo $data['logo_alt_text']; ?></a>
				<?php } ?>
			</div>		
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'container' => false,'menu_id'=>'menu-main-navigation','menu_class' => 'sf-menu sf-js-enabled sf-shadow' )); ?>
			</nav><!--site-navigation-->
			<script type="text/javascript">
				var sf=jQuery.noConflict();
    			sf(window).load(function(){
      			// superFish
       			sf('ul.sf-menu').supersubs({
       			minWidth:    16, // minimum width of sub-menus in em units
       			maxWidth:    40, // maximum width of sub-menus in em units
       			extraWidth:  1 // extra width can ensure lines don't sometimes turn over
     			})
    			.superfish(); // call supersubs first, then superfish
     			});
			</script>
		</header>
	</div><!--branding-->
	<?php if ( $data['front_page_blog_index'] == 1 ) {?>
		<?php if (! is_home()) { get_template_part( 'page-header' ); }; ?>
	<?php } else { ?>
		<?php get_template_part( 'page-header' ); ?>
	<?php } ?>

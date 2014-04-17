<?php
/**
 * Terrifico functions and definitions
 *
 * @package Terrifico
 * @since 1.0
 */

/** 
 * Makes theme available for translation
 * @since 1.0
 */
load_theme_textdomain( 'terrifico', get_template_directory() . '/languages' );

/** 
 * This theme styles the visual editor with editor-style.css to match the theme style.
 */
add_editor_style();

/** 
 * Default RSS feed links
 */
add_theme_support('automatic-feed-links');

/**
 * Register Navigation
 */
register_nav_menu('main_navigation', __('Primary Menu', 'terrifico') );

/** 
 * Support a variety of post formats.
 */
add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'link', 'quote' ) );

/** 
 * Custom image size for featured images, displayed on "standard" posts.
 */

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 2500, 9999 ); // Unlimited height, soft crop

/** 
 * Sets up the content width.
 */
if ( ! isset( $content_width ) )
	$content_width = 1024;

/**
 * Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
 * @since 1.0
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

/**
 * Sets up theme custom backgrounds
 * @since 1.0
 */

$custombg = array(

	'default-color' => 'ffffff',

	'default-image' => get_template_directory_uri() . '/images/bg/bg6.jpg',

	);	
add_theme_support( 'custom-background', $custombg );


/**
 * Sets up theme defaults CSS rules
 * @since 1.0
 */
function terrifico_custom_styling() {
	global $data;
	
	
	$custom_bg = $data['custom_bg'];
	$custom_bg_enable = $data['custom_bg_enable'];
	$body_font = $data['google_font_body'];
	$body_font_size = $data['body_font_size'];
	$body_font_color = $data['body_font_color'];
	$h1_font_size = $data['h1_font_size'];
	$h2_font_size = $data['h2_font_size'];
	$h3_font_size = $data['h3_font_size'];
	$h4_font_size = $data['h4_font_size'];
	$h5_font_size = $data['h5_font_size'];
	$h6_font_size = $data['h6_font_size'];
	$google_font_logo = $data['google_font_logo'];
	$logo_font_size = $data['logo_font_size'];
	$text_logo_color = $data['text_logo_color'];
	$text_logo_weight = $data['text_logo_weight'];
	$top_panel_height = $data['top_panel_height'];
	$top_panel_enable = $data['top_panel_enable'];
	$google_font_menu = $data['google_font_menu'];
	$nav_font_size = $data['nav_font_size'];
	$nav_top_margin = $data['nav_top_margin'];
	$nav_font_color = $data['nav_font_color'];
	$nav_bg_color = $data['nav_bg_color'];
	$nav_bg_hover_color = $data['nav_bg_hover_color'];
	$header_bg_color = $data['header_bg_color'];
	$header_height = $data['header_height'];
	$header_top_margin = $data['header_top_margin'];
	$header_bottom_margin = $data['header_bottom_margin'];
	$logo_top_margin = $data['logo_top_margin'];
	$logo_left_margin = $data['logo_left_margin'];
	$top_panel_bg_color = $data['top_panel_bg_color'];
	$contact_text_color = $data['contact_text_color'];
	$top_contact_top_margin = $data['top_contact_top_margin']; 
	$slider_caption_width = $data['slider_caption_width'];
	$slider_text_color = $data['slider_text_color'];
	$slider_descr_color = $data['slider_descr_color'];
	$nav_hover_font_color = $data['nav_hover_font_color'];
	$slider_caption_left_margin = $data['slider_caption_left_margin'];
	$tagline_bg_color = $data['tagline_bg_color'];
	$tagline_text_color = $data['tagline_text_color'];
	$tagline_border_color = $data['tagline_border_color'];
	$display_tag_border = $data['display_tag_border'];
	$column_header_color = $data['column_header_color'];
	$footer_bg_color = $data['footer_bg_color'];
	$footer_widget_title_color = $data['footer_widget_title_color'];
	$copyright_bg_color = $data['copyright_bg_color'];
	$meta_section_bg_color = $data['meta_section_bg_color'];
	$blog_title_color = $data['blog_title_color'];
	$sidebar_bg_color = $data['sidebar_bg_color'];
	$sidebar_text_color = $data['sidebar_text_color'];
	$sidebar_text_hover_color = $data['sidebar_text_hover_color'];
	$widget_title_bg_color = $data['widget_title_bg_color'];
	$widget_title_color = $data['widget_title_color'];
	$content_box_bg_color = $data['content_box_bg_color'];
	$from_blog_bg_color = $data['from_blog_bg_color'];
	$prefooter_link_color = $data['prefooter_link_color'];
	$social_icons_color = $data['social_icons_color'];
		
	$output = '';
	if ( $social_icons_color !='' )
	$output .= '#social-bar-footer ul li a i, #social-bar ul li a i {color:' . $social_icons_color . ' !important}' . "\n";	

	if ( $prefooter_link_color !='' )
	$output .= '#prefooter ul.links li a {color:' . $prefooter_link_color . ' !important}' . "\n";	

	if ( $from_blog_bg_color !='' )
	$output .= '#from-blog-wrap {background-color:' . $from_blog_bg_color . ' !important}' . "\n";	

	if ( $content_box_bg_color !='' )
	$output .= '#content-wrap {background-color:' . $content_box_bg_color . ' !important}' . "\n";	

	if ( $widget_title_color !='' )
	$output .= '.widget-title, .widget-title .rsswidget {color:' . $widget_title_color . ' !important}' . "\n";	

	if ( $widget_title_bg_color !='' )
	$output .= '.widget-title {background-color:' . $widget_title_bg_color . ' !important}' . "\n";	
	
	if ( $sidebar_text_hover_color !='' )
	$output .= '#sidebar-frame ul li a:hover {color:' . $sidebar_text_hover_color . ' !important}' . "\n";

	if ( $sidebar_text_color !='' )
	$output .= '#sidebar-frame ul li a, .widget .textwidget {color:' . $sidebar_text_color . ' !important}' . "\n";

	if ( $sidebar_bg_color !='' )
	$output .= '.widget {background-color:' . $sidebar_bg_color . ' !important}' . "\n";

	if ( $blog_title_color !='' )
	$output .= '#respond, #post-article .link-box a, #post-article .quote-author, #post-article .quote-text ,#post-article .meta-wrap a, #post-article .meta-wrap, #post-article .blog-title, #post-article .title-meta .blog-socials a, #post-article .title-meta .blog-posted-by .icon-user, #post-article .title-meta .blog-posted-by a {color:' . $blog_title_color . ' !important}' . "\n";
	$output .= '.title-meta {border-top: 5px solid' . $blog_title_color . ' !important}' . "\n";
	$output .= '#post-article .title-meta .left-border {border-left: 1px solid' . $blog_title_color . ' !important}' . "\n";

	if ( $meta_section_bg_color !='' )
	$output .= '#portfolio .portfolio-tabs li.active a, #portfolio .portfolio-tabs li a:hover, .widget_search #searchsubmit, .page-header h1, #post-article aside {background-color:' . $meta_section_bg_color . ' !important}' . "\n";
	$output .= '#post-article aside:after {border-color:' . $meta_section_bg_color . ' transparent transparent !important}' . "\n";
	$output .= '#post-article .blog-date:after, #post-article .blog-date:before {border-top-color:' . $meta_section_bg_color . ' !important}' . "\n";

	if ( $copyright_bg_color !='' )
	$output .= '#copyright {background-color:' . $copyright_bg_color . ' !important}' . "\n";

	if ( $footer_widget_title_color !='' )
	$output .= '.footer-area h4 {color:' . $footer_widget_title_color . ' !important}' . "\n";

	if ( $footer_bg_color !='' )
	$output .= '#footer {background-color:' . $footer_bg_color . ' !important}' . "\n";

	if ( $column_header_color )
	$output .= '#content-holder2 h4, #content-holder3 h4, #content-holder4 h4 {color:' . $column_header_color . ' !important}' . "\n";

	if ( $display_tag_border == 1 )
	$output .= '#content-holder3 .caroufredsel_wrapper {border: 1px solid ' . $tagline_border_color . ' !important}' . "\n";

	if ( $tagline_text_color )
	$output .= '.reading-box {color:' . $tagline_text_color . ' !important}' . "\n";

	if ( $tagline_bg_color )
	$output .= '#tagline-wrap, .reading-box {background-color:' . $tagline_bg_color . ' !important}' . "\n";

	if ( $slider_caption_left_margin )
	$output .= '.slide-caption {margin-left:' . $slider_caption_left_margin . '% !important}' . "\n";

	if ( $nav_hover_font_color )
	$output .= '#menu-main-navigation ul li a:hover {color:' . $nav_hover_font_color . ' !important}' . "\n";

	if ( $slider_descr_color )
	$output .= '.slide-caption p {color:' . $slider_descr_color . ' !important}' . "\n";

	if ( $slider_text_color )
	$output .= '.slide-caption h3 {color:' . $slider_text_color . ' !important}' . "\n";

	if ( $slider_caption_width )
	$output .= '.slide-caption {width:' . $slider_caption_width . '% !important}' . "\n";

	if ( $top_contact_top_margin )
	$output .= '#contact-bar {margin-top:' . $top_contact_top_margin . 'px !important}' . "\n";

	if ( $contact_text_color)
	$output .= '#info-box #account-set a, #info-box #shopping-cart a, #top-panel, #contact-bar a {color:'. $contact_text_color .' !important;}' . "\n";

	if ( $top_panel_bg_color)
	$output .= '#top-panel {background-color:'. $top_panel_bg_color .' !important;}' . "\n";

	if ( $logo_left_margin )
	$output .= '#logo {margin-left:' . $logo_left_margin . 'px !important}' . "\n";

	if ( $logo_top_margin )
	$output .= '#logo {margin-top:' . $logo_top_margin . 'px !important}' . "\n";

	if ( $header_bottom_margin )
	$output .= '#branding {margin-bottom:' . $header_bottom_margin . 'px !important}' . "\n";

	if ( $header_top_margin )
	$output .= '#branding {margin-top:' . $header_top_margin . 'px !important}' . "\n";

	if ( $header_height )
	$output .= '#branding {height:' . $header_height . 'px !important}' . "\n";

	if ( $header_bg_color !='' )
	$output .= '#branding {background-color:' . $header_bg_color . ' !important}' . "\n";

	if ( $nav_bg_hover_color !='' )
	$output .= '#menu-main-navigation ul, #menu-main-navigation li a:hover, #menu-main-navigation li:hover a {background-color:' . $nav_bg_hover_color . '!important}' . "\n";

	if ( $nav_bg_color !='' )
	$output .= '#site-navigation {background-color:' . $nav_bg_color . '!important}' . "\n";

	if ( $nav_font_color !='' )
	$output .= '#menu-main-navigation a {color:' . $nav_font_color . '!important}' . "\n";

	if ( $nav_top_margin )
	$output .= '#site-navigation {margin-top:' . $nav_top_margin . 'px !important}' . "\n";

	if ( $nav_font_size )
	$output .= '#menu-main-navigation {font-size:' . $nav_font_size .'px !important}' . "\n";

	if ( $google_font_menu != 'None' )
	$output .= '#menu-main-navigation {font-family:' . $google_font_menu . '!important}' . "\n";

	if ( $top_panel_enable !='0')
	$output .= '#top-panel {height:'. $top_panel_height .'px !important;}' . "\n";

	if ( $text_logo_weight )
	$output .= '#logo a {font-weight:' . $text_logo_weight . '!important}' . "\n";

	if ( $text_logo_color )
	$output .= '#logo a {color:' . $text_logo_color . '!important}' . "\n";

	if ( $google_font_logo )
	$output .= '#logo {font-family:' . $google_font_logo . '!important}' . "\n";

	if ( $logo_font_size )
	$output .= '#logo {font-size:' . $logo_font_size . 'px !important}' . "\n";

	if ( $custom_bg_enable == 1 )
	$output .= 'body {background-image: url(' . $custom_bg . ') !important;}' . "\n";
		
	if ( $body_font != 'None' )
	$output .= 'body {font-family:' . $body_font . '!important}' . "\n";

	if ( $body_font_size )
	$output .= 'body {font-size:' . $body_font_size .'px !important}' . "\n";
	
	if ( $body_font_color )
	$output .= 'body, .paginate a {color:' . $body_font_color .' !important}' . "\n";
	
	if ( $h6_font_size )
	$output .= 'h6 {font-size:'. $h6_font_size .'px !important;}' . "\n";

	if ( $h5_font_size )
	$output .= 'h5 {font-size:'. $h5_font_size .'px !important;}' . "\n";

	if ( $h4_font_size )
	$output .= 'h4 {font-size:'. $h4_font_size .'px !important;}' . "\n";

	if ( $h3_font_size )
	$output .= 'h3 {font-size:'. $h3_font_size .'px !important;}' . "\n";

	if ( $h2_font_size )
	$output .= 'h2 {font-size:'. $h2_font_size .'px !important;}' . "\n";

	if ( $h1_font_size )
	$output .= 'h1 {font-size:'. $h1_font_size .'px !important;}' . "\n";


	// Output styles

	if ( isset( $output ) && $output != '' ) {

		$output = strip_tags( $output );

		$output = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . $output . "</style>\n";

		echo $output;

	}

}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 * @since 1.0
 *
 */
function terrifico_wp_title( $title, $sep ) {
	global $paged, $page;
	
	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'terrifico' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'terrifico_wp_title', 10, 2 );

/** 
 * Add scripts function
 * @since 1.0
 */
add_action('wp_enqueue_scripts','terrifico_add_script_function');

function terrifico_add_script_function() {

/** 
 * Load Styles
 * @since 1.0
 */
wp_enqueue_style('terrifico', get_stylesheet_uri());
wp_enqueue_style ('reset', get_stylesheet_directory_uri() . '/css/reset.css');
wp_enqueue_style ('basic', get_stylesheet_directory_uri() . '/css/basic.css');
wp_enqueue_style ('top-panel', get_stylesheet_directory_uri() . '/css/top-panel.css');
wp_enqueue_style ('menu', get_stylesheet_directory_uri() . '/css/menu.css');
wp_enqueue_style ('layout', get_stylesheet_directory_uri() . '/css/layout.css');
wp_enqueue_style ('blog', get_stylesheet_directory_uri() . '/css/blog.css');
wp_enqueue_style ('footer', get_stylesheet_directory_uri() . '/css/footer.css');
wp_enqueue_style ('image-sliders', get_stylesheet_directory_uri() . '/css/image-sliders.css');
wp_enqueue_style ('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
wp_enqueue_style ('elements', get_stylesheet_directory_uri() . '/css/elements.css');
wp_enqueue_style ('sidebar', get_stylesheet_directory_uri() . '/css/sidebar.css');
wp_enqueue_style ('comments', get_stylesheet_directory_uri() . '/css/comments.css');
wp_enqueue_style ('woocommerce', get_stylesheet_directory_uri() . '/css/woocommerce.css');
global $data;
if($data['google_font_body'] != 'None'):
	wp_enqueue_style ('body-font', 'http://fonts.googleapis.com/css?family='. urlencode($data['google_font_body']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
endif;
if($data['google_font_menu'] != 'None'):
	wp_enqueue_style ('menu-font', 'http://fonts.googleapis.com/css?family='. urlencode($data['google_font_menu']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
endif;
if($data['google_font_logo'] != 'None'):
	wp_enqueue_style ('logo-font', 'http://fonts.googleapis.com/css?family='. urlencode($data['google_font_logo']) .':400,400italic,700,700italic&subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
endif;
/** 
 * Load Scripts
 * @since 1.0
 */
wp_enqueue_script('jquery');
wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js');
wp_enqueue_script('supersubs', get_stylesheet_directory_uri() . '/js/supersubs.js');
wp_enqueue_script('flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider.js');
wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js');
wp_enqueue_script('easing', get_stylesheet_directory_uri() . '/js/jquery.easing.js');
wp_enqueue_script('hoverintent', get_stylesheet_directory_uri() . '/js/jquery.hoverIntent.js');
wp_enqueue_script('carousel', get_stylesheet_directory_uri() . '/js/jquery.carouFredSel-6.2.1.js');
wp_enqueue_script('mosaic', get_stylesheet_directory_uri() . '/js/mosaic.1.0.1.js');
wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js');
wp_enqueue_script('smoothscroll', get_stylesheet_directory_uri() . '/js/jquery.smooth-scroll.min.js');
wp_enqueue_script('cycle', get_stylesheet_directory_uri() . '/js/jquery.cycle.lite.js');
wp_enqueue_script('tinynav', get_stylesheet_directory_uri() . '/js/tinynav.min.js');
wp_enqueue_script('refineslide', get_stylesheet_directory_uri() . '/js/jquery.refineslide.js');
wp_enqueue_script('respond', get_stylesheet_directory_uri() . '/js/respond.min.js');
}

/** 
 * Register widgetized locations
 * @since 1.0
 */
register_sidebar(array(
	'name' => __( 'Main Sidebar', 'terrifico' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="widget-title"><h4>',
	'after_title' => '</h4></div>',
));

register_sidebar(array(
	'name' =>  __( 'Footer Widget 1', 'terrifico' ),
	'id' => 'footer-widget-1',
	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => __( 'Footer Widget 2', 'terrifico' ),
	'id' => 'footer-widget-2',
	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => __( 'Footer Widget 3', 'terrifico' ),
	'id' => 'footer-widget-3',
	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));

register_sidebar(array(
	'name' => __( 'Footer Widget 4', 'terrifico' ),
	'id' => 'footer-widget-4',
	'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));


/** 
 * Load function to change excerpt length
 * @since 1.0
 */
function terrifico_excerpt_length( $length ) {
	global $data;
	
	if(isset($data['blog_excerpt'])) {
		return $data['blog_excerpt'];
	}
}
add_filter('excerpt_length', 'terrifico_excerpt_length', 999);


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">[...]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/** 
 * Displays navigation to next/previous pages
 * @since 1.0
 */
function terrifico_pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

/**
 * Load Comments Support
 * @since 1.0	
*/
function terrifico_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'terrifico' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'terrifico' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment, 35); ?>
				</div><!--comment-author .vcard-->
				<div class="comment-date">
					<span>on</span>	 <?php comment_date('F j, Y'); ?>
				</div>
				<div class="comment-author-name">
					<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
					<?php edit_comment_link( __( 'Edit', 'terrifico' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'terrifico' ); ?></em>
					<br>
				<?php endif; ?>

			</div>

			<div class="comment-content"><?php comment_text(); ?>
			<span>
				<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'terrifico' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!--reply-->
			</span>
			</div>

		</div><!--comment-->

	<?php
			break;
	endswitch;
}

/**
 * Load key features function	
 * @since 1.0
*/
function terrifico_key_features() {
global $data; ?>
<div id ="key-features-wrap">
	<div id="content-holder5">
		<div class="one_half">
			<div class="feature">
				<h2 class="fearute-text">
					<?php if ($data['first_feature_column_image']!="") {?>
						<img width="64" height="64" alt="featured icon" src="<?php echo $data['first_feature_column_image']; ?>">
					<?php } else {?>
						<i class="icon-<?php echo $data['first_feature_column_fai']; ?>"></i>
					<?php } ?>
					<?php echo $data['first_feature_column_header']; ?>
				</h2>
				<p><?php echo $data['first_feature_column_text']; ?></p>
			</div>
		</div>
		<div class="one_half">
			<div class="feature">
				<h2 class="fearute-text">
					<?php if ($data['second_feature_column_image']!="") {?>
						<img width="64" height="64" alt="featured icon" src="<?php echo $data['second_feature_column_image']; ?>">
					<?php } else {?>
						<i class="icon-<?php echo $data['second_feature_column_fai']; ?>"></i>
					<?php } ?>
					<?php echo $data['second_feature_column_header']; ?>
				</h2>
				<p><?php echo $data['second_feature_column_text']; ?></p>
			</div>
		</div>
		<div class="one_half">
			<div class="feature">
				<h2 class="fearute-text">
					<?php if ($data['third_feature_column_image']!="") {?>
						<img width="64" height="64" alt="featured icon" src="<?php echo $data['third_feature_column_image']; ?>">
					<?php } else {?>
						<i class="icon-<?php echo $data['third_feature_column_fai']; ?>"></i>
					<?php } ?>
					<?php echo $data['third_feature_column_header']; ?>
				</h2>
				<p><?php echo $data['third_feature_column_text']; ?></p>
			</div>
		</div>
		<div class="one_half">
			<div class="feature">
				<h2 class="fearute-text">
					<?php if ($data['fourth_feature_column_image']!="") {?>
						<img width="64" height="64" alt="featured icon" src="<?php echo $data['fourth_feature_column_image']; ?>">
					<?php } else {?>
						<i class="icon-<?php echo $data['fourth_feature_column_fai']; ?>"></i>
					<?php } ?>
					<?php echo $data['fourth_feature_column_header']; ?>
				</h2>
				<p><?php echo $data['fourth_feature_column_text']; ?></p>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php } 

/**
 * Load tag line function	
*/
function terrifico_tag_line() {
	global $data; ?>
<div id ="tagline-wrap">	
	<div id="content-holder1">	
		<section class="reading-box">
			<h2 class="margin-bottom-10"><?php echo $data['tagline_header']; ?></h2>
			<p class="read-desc"><?php echo $data['tagline_text']; ?></p>
			<a class="continue button large <?php echo $data['tagline_button_color']; ?>" href="<?php echo $data['tagline_button_url']; ?>"><?php echo $data['tagline_button_text']; ?></a>
		</section>
	</div>
</div>
<?php }

/**
 * Load content boxes function	
 * @since 1.0
*/
function terrifico_content_boxes() {
global $data; ?>
<div id="content-wrap">
	<div id="content-holder2">
		<div class="content-box-wrap">
			<section class="columns content-boxes columns-3 center-align">
				<article class="col">
					<div class="heading heading-and-icon">
						<?php if ($data['first_column_image']!="") {?>
							<img width="28" height="28" alt="1col" src="<?php echo $data['first_column_image']; ?>">
						<?php } ?>
						<h4><?php echo $data['first_column_header']; ?></h4>
					</div>
						<?php echo $data['first_column_text']; ?>
					<div class="clear"></div>
					<div class="margin-top-20"></div>
					<span class="more">
						<a class="button small <?php echo $data['boxes_button_color']; ?>"  href="<?php echo $data['first_column_url']; ?>"><?php echo $data['first_column_button'];?></a>
					</span>
				</article>
				<article class="col">
					<div class="heading heading-and-icon">
						<?php if ($data['second_column_image']!="") {?>
							<img width="28" height="28" alt="1col" src="<?php echo $data['second_column_image']; ?>">
						<?php } ?>
						<h4><?php echo $data['second_column_header']; ?></h4>
					</div>
						<?php echo $data['second_column_text']; ?>
					<div class="clear"></div>
					<div class="margin-top-20"></div>
					<span class="more">
						<a class="button small <?php echo $data['boxes_button_color']; ?>"  href="<?php echo $data['second_column_url']; ?>"><?php echo $data['second_column_button'];?></a>
					</span>
				</article>
				<article class="col">
					<div class="heading heading-and-icon">
						<?php if ($data['third_column_image']!="") {?>
							<img width="28" height="28" alt="1col" src="<?php echo $data['third_column_image']; ?>">
						<?php } ?>
						<h4><?php echo $data['third_column_header']; ?></h4>
					</div>
						<?php echo $data['third_column_text']; ?>
					<div class="clear"></div>
					<div class="margin-top-20"></div>
					<span class="more">
						<a class="button small <?php echo $data['boxes_button_color']; ?>" href="<?php echo $data['third_column_url']; ?>"><?php echo $data['third_column_button'];?></a>
					</span>
				</article>
			</section>
		</div>
	</div>
</div>
<?php }

/**
 * Load from the blog function	
 * @since 1.0
*/
function terrifico_from_blog() {
	global $data;
	$blog_items = $data['from_blog_items'];
	$blog_cat = $data['blog_category'];
?>
<div id="from-blog-wrap">
	<div id="content-holder3">
		<?php if ( $data['blog_sect_title'] ==1) { ?> 
			<div class="title">
				<h4 class="center"><?php echo $data['blog_sect_title_text']; ?></h4>
			</div>	
		<?php } ?>
		<div class="list_carousel">
			<ul id="from-blog">
				<?php query_posts('showposts='.$blog_items.'&category_name='.$blog_cat); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<li>
					<div class="mosaic-block fade">
						<a href="<?php the_permalink(); ?>" class="mosaic-overlay">
							<div class="details">
								<h4><?php the_title(); ?></h4>
								<?php the_excerpt();?>
							</div>
						</a>
						<div class="mosaic-backdrop">
							<div class="image-holder">
								<?php the_post_thumbnail(); ?>
							</div>
						</div><!--mosaic-backdrop-->				
					</div><!--mosaic-block-->
				</li>
				<?php endwhile; ?>
				<?php endif; ?>	
			</ul>
			<div class="blog-pagination" id="blog-pag"></div>
		</div>
	</div>
</div>
	<div class="clear"></div>
<script type="text/javascript">  			
var blog=jQuery.noConflict();
	blog(window).load(function($){
		blog('#from-blog').carouFredSel({
	    auto : false,
	    pagination  : "#blog-pag"
	});
	});	

var mos2=jQuery.noConflict();
	mos2(window).load(function($){			
		mos2('.circle').mosaic({
			opacity		:	0.8			//Opacity for overlay (0-1)
		});
	
		mos2('.fade').mosaic();
				
		mos2('.bar').mosaic({
			animation	:	'slide'		//fade or slide
		});
				
		mos2('.bar2').mosaic({
			animation	:	'slide'		//fade or slide
		});
				
		mos2('.bar3').mosaic({
			animation	:	'slide',	//fade or slide
			anchor_y	:	'top'		//Vertical anchor position
		});
				
		mos2('.cover').mosaic({
			animation	:	'slide',	//fade or slide
				hover_x		:	'400px'		//Horizontal position on hover
		});
				
		mos2('.cover2').mosaic({
			animation	:	'slide',	//fade or slide
			anchor_y	:	'top',		//Vertical anchor position
			hover_y		:	'80px'		//Vertical position on hover
		});
				
		mos2('.cover3').mosaic({
			animation	:	'slide',	//fade or slide
			hover_x		:	'400px',	//Horizontal position on hover
			hover_y		:	'300px'		//Vertical position on hover
		});
		    
		});
		    
</script>
<?php }


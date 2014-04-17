<?php

add_action('init','of_options');

	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"from_blog"		=> "From The Blog",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"image_slider"	=> "Image Slider",
				"tagline"		=> "Tagline Section",
				"content_boxes"	=> "Content Boxes",
				"key_features"  => "Key Features",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		// Button Colors
		$button_colors = array("green" => "green","darkgreen" => "darkgreen","orange" => "orange", "blue" => "blue", "red" => "red" ,"pink" => "pink", "darkgray" => "darkgray","lightgray" => "lightgray");
		
		// Animation Effecta
		$animation_effects = array("fade" => "fade", "random" => "random", "slideV" => "slideV", "slideH" => "slideH", "sliceV" => "sliceV", "sliceH" => "sliceH", "cubeV" => "cubeV", "cubeH" => "cubeH", "scale" => "scale", "kaleidoscope" => "kaleidoscope", "fan" => "fan", "blindV" => "blindV", "blindH" => "blindH");
		
		// Image Sliders
		$slider_select = array("flex" => "Flex Slider", "refine" => "Refine Slide");

		$portfolio_layout = array("2-columns" => "2-columns","3-columns" => "3-columns","4-columns" => "4-columns");
		
		$portfolio_animation = array("circle" =>"circle","fade" =>"fade","bar" =>"bar","bar2" =>"bar2","bar3" =>"bar3","cover" =>"cover","cover2" =>"cover2","cover3" =>"cover3");
		
		// Font Sizes
		$font_sizes = array(
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
			'32' => '32',
			'33' => '33',
			'34' => '34',
			'35' => '35',
			'36' => '36',
			'37' => '37',
			'38' => '38',
			'39' => '39',
			'40' => '40',
			'41' => '41',
			'42' => '42',
		);

		// Google Fonts
		$google_fonts = array(
							"0" => "None",
							"PT Sans" => "PT Sans",
							"PT Sans Caption" => "PT Sans Caption",
							"PT Sans Narrow" => "PT Sans Narrow",
							"Roboto Slab" => "Roboto Slab",
						);



/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// General Settings
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
					
$of_options[] = array( "name" => "Image Logo",
					"desc" => "You can upload a logo for your theme, or specify an image URL directly",
					"id" => "logo",
					"std" => get_template_directory_uri()."/images/logo.png",
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => "Logo ALT Text",
					"desc" => "Specifies an alternate text for the logo",
					"id" => "logo_alt_text",
					"std" => "logo",
					"type" => "text");
					
$of_options[] = array( 	"name" 		=> "Text Logo",
						"desc" 		=> "Enable/Disable text logo",
						"id" 		=> "text_logo_enable",
						"std" 		=> 1,
						"folds"		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Select Logo Font Family",
					"desc" => "Select a font family for body text",
					"id" => "google_font_logo",
					"std" => "PT Sans",
					"fold" 		=> "text_logo_enable", /* the switch hook */
					"type" => "select",
					"options" => $google_fonts); 
					
$of_options[] = array( "name" => "Logo Font Size (px)",
					"desc" => "Default is 38",
					"id" => "logo_font_size",
					"std" => "38",
					"min" => "12",
					"step" => "1",
					"max"  => "120",
					"fold" => "text_logo_enable", /* the switch hook */
					"type" => "sliderui");
					
$of_options[] = array( "name" => "Logo Color",
					"desc" => "Pick logo color (default is #dd9933)",
					"id" => "text_logo_color",
					"std" => "#dd9933",
					"fold" 		=> "text_logo_enable", /* the switch hook */
					"type" => "color");
					
$of_options[] = array( 	"name" 		=> "Logo Text Weight",
						"desc" 		=> "Select logo text weight<br /> Min: 300, max: 800, step: 100, default value: 300",
						"id" 		=> "text_logo_weight",
						"std" 		=> "300",
						"fold" 		=> "text_logo_enable", /* the switch hook */
						"min" 		=> "300",
						"step"		=> "100",
						"max" 		=> "800",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "Custom Favicon",
						"desc" 		=> "Enable/Disable custom favicon",
						"id" 		=> "enable_favicon",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "You can upload a favicon for your theme, or specify a favicon image URL directly. Image size should be (16px x 16px)",
					"id" => "favicon",
					"std" => "",
					"fold" 		=> "enable_favicon", /* the switch hook */
					"type" => "media");

$of_options[] = array( "name" => "Website Layout",
					"desc" => "",
					"id" => "layout",
					"std" => "wide",
					"type" => "select",
					"options" => array(
						'boxed' => 'Boxed',
						'wide' => 'Wide',
					));

$of_options[] = array( 	"name" 		=> "Sidebar",
						"desc" 		=> "Enable/Disable the sidebar",
						"id" 		=> "display_sidebar",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Default Sidebar Position",
					"desc" => "Select the defeault position of the sidebar",
					"id" => "sidebar_pos",
					"std" => "right",
					"fold" => "display_sidebar", /* the switch hook */
					"options" => array('right' => 'Right', 'left' => 'Left'),
					"type" => "select");
				
$of_options[] = array( 	"name" 		=> "Comments",
						"desc" 		=> "Enable/Disable the comments on posts or pages",
						"id" 		=> "enable_comments",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
													
// Background
$of_options[] = array( 	"name" 		=> "Background",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Predefined Background Images",
						"desc" 		=> "Enable/Disable predefined background images",
						"id" 		=> "custom_bg_enable",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> "Background Images",
						"desc" 		=> "Select a background pattern.",
						"id" 		=> "custom_bg",
						"std" 		=> $bg_images_url."bg6.jpg",
						"fold" 		=> "custom_bg_enable", /* the switch hook */
						"type" 		=> "tiles",
						"options" 	=> $bg_images,
				);

// Typography Options
$of_options[] = array( 	"name" 		=> "Typography",
						"type" 		=> "heading"
				);
				
$of_options[] = array( "name" => "Select Body Font Family",
					"desc" => "Select a font family for body text",
					"id" => "google_font_body",
					"std" => "Roboto Slab",
					"type" => "select",
					"options" => $google_fonts); 
					
$of_options[] = array( "name" => "Body Font Size (px)",
					"desc" => "Default is 14",
					"id" => "body_font_size",
					"std" => "14",
					"type" => "select",
					"options" => $font_sizes);
					
$of_options[] = array( "name" =>  "Body Font Color",
					"desc" => "Pick body font color. ( Default: #444444 )",
					"id" => "body_font_color",
					"std" => "#444444",
					"type" => "color");


$of_options[] = array( "name" => "H1 Heading Font Size",
					"desc" => "Default is 40",
					"id" => "h1_font_size",
					"std" => "40",
					"type" => "select",
					"options" => $font_sizes);

$of_options[] = array( "name" => "H2 Heading Font Size",
					"desc" => "Default is 34",
					"id" => "h2_font_size",
					"std" => "34",
					"type" => "select",
					"options" => $font_sizes);

$of_options[] = array( "name" => "H3 Heading Font Size",
					"desc" => "Default is 22",
					"id" => "h3_font_size",
					"std" => "22",
					"type" => "select",
					"options" => $font_sizes);

$of_options[] = array( "name" => "H4 Heading Font Size",
					"desc" => "Default is 20",
					"id" => "h4_font_size",
					"std" => "20",
					"type" => "select",
					"options" => $font_sizes);

$of_options[] = array( "name" => "H5 Heading Font Size",
					"desc" => "Default is 16",
					"id" => "h5_font_size",
					"std" => "16",
					"type" => "select",
					"options" => $font_sizes);

$of_options[] = array( "name" => "H6 Heading Font Size",
					"desc" => "Default is 10",
					"id" => "h6_font_size",
					"std" => "10",
					"type" => "select",
					"options" => $font_sizes);

// Header Options
$of_options[] = array( 	"name" 		=> "Header Options",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Top Panel",
						"desc" 		=> "Enable or Disable panel above the logo",
						"id" 		=> "top_panel_enable",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
					
$of_options[] = array( 	"name" 		=> "Top Panel Social Links",
						"desc" 		=> "Enable or Disable social links inside the top panel",
						"id" 		=> "header_social_enable",
						"std" 		=> 0,
						"fold" 		=> "top_panel_enable", /* the switch hook */
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

if(class_exists('Woocommerce')) {
	$of_options[] = array( 	"name" 		=> "Top Panel Shopping Cart",
							"desc" 		=> "Enable or Disable shopping cart inside the top panel. When enabled, top panel social links section will be disabled",
							"id" 		=> "shopping_cart_enable",
							"std" 		=> 1,
							"fold" 		=> "top_panel_enable", /* the switch hook */
							"on" 		=> "Enable",
							"off" 		=> "Disable",
							"type" 		=> "switch"
					);

}

$of_options[] = array( "name" => "Top Panel Height (px)",
					"desc" => "Default is 40",
					"id" => "top_panel_height",
					"std" => "40",
					"fold" => "top_panel_enable", /* the switch hook */
					"min" => "0",
					"step" => "1",
					"max"  => "300",
					"type" => "sliderui");

$of_options[] = array( "name" => "Top Panel Background Color",
					"desc" => "Pick the top panel beckground color (default is #262c33)",
					"id" => "top_panel_bg_color",
					"std" => "#262c33",
					"fold" 		=> "top_panel_enable", /* the switch hook */
					"type" => "color");

$of_options[] = array( 	"name" 		=> "Top Panel Contact Us Section",
						"desc" 		=> "Enable or Disable contact section",
						"id" 		=> "top_contact_enable",
						"std" 		=> 1,
						"fold" 		=> "top_panel_enable", /* the switch hook */
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Contact Us Section Text",
					"desc" => "Enter text to display on the top panel",
					"id" => "top_panel_contact_text",
					"std" => "Have any questions? Contact us",
					"fold" 		=> "top_panel_enable", /* the switch hook */
					"type" => "text");

$of_options[] = array( "name" => "Top Panel Contact Us Section Top Margin (px)",
					"desc" => "Default is 12",
					"id" => "top_contact_top_margin",
					"std" => "12",
					"fold" => "top_panel_enable", /* the switch hook */
					"min" => "0",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");
					
$of_options[] = array( "name" => "Contact Email Address",
					"desc" => "Enter email address to display on the top panel",
					"id" => "top_panel_email",
					"std" => "info@yourdomain.com",
					"fold" 		=> "top_panel_enable", /* the switch hook */
					"type" => "text");
					
$of_options[] = array( "name" => "Contact Phone Number",
					"desc" => "Enter phone number to display on the top panel",
					"id" => "top_panel_phone",
					"std" => "888-888-8888",
					"fold" 		=> "top_panel_enable", /* the switch hook */
					"type" => "text");

$of_options[] = array( "name" => "Contact Us Section Font Color",
					"desc" => "Pick breadcrumbs bottom border color (default is #ffffff)",
					"id" => "contact_text_color",
					"std" => "#ffffff",
					"fold" 		=> "top_panel_enable", /* the switch hook */
					"type" => "color");

$of_options[] = array( "name" => "Header Background Color",
					"desc" => "Pick a background color (default is #323b44)",
					"id" => "header_bg_color",
					"std" => "#323b44",
					"type" => "color");
					
$of_options[] = array( "name" => "Header Height (px)",
					"desc" => "Default is 85",
					"id" => "header_height",
					"std" => "85",
					"min" => "85",
					"step" => "1",
					"max"  => "300",
					"type" => "sliderui");

$of_options[] = array( "name" => "Header Top Margin (px)",
					"desc" => "Default is 0",
					"id" => "header_top_margin",
					"std" => "0",
					"min" => "0",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");

$of_options[] = array( "name" => "Header Bottom Margin (px)",
					"desc" => "Default is 0",
					"id" => "header_bottom_margin",
					"std" => "0",
					"min" => "0",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");

$of_options[] = array( "name" => "Logo Top Margin (px)",
					"desc" => "Default is 20",
					"id" => "logo_top_margin",
					"std" => "20",
					"min" => "0",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");

$of_options[] = array( "name" => "Logo Left Margin (px)",
					"desc" => "Default is 20",
					"id" => "logo_left_margin",
					"std" => "20",
					"min" => "0",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");
				
$of_options[] = array( 	"name" 		=> "Character in Page Header",
						"desc" 		=> "Enable/Disable character in page header",
						"id" 		=> "star_char_on",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( "name" => "Character Icon Name",
					"desc" => "Enter icon character neame",
					"id" => "char_name",
					"std" => "star-empty",
					"fold" => "star_char_on", /* the switch hook */
					"type" => "text");

// Pre-Footer Options
$of_options[] = array( 	"name" 		=> "Pre-Footer",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Pre-Footer Panel",
						"desc" 		=> "Enable/Disable pre-footer panel",
						"id" 		=> "pre_footer_enable",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Pre-Footer Links Color",
					"desc" => "Pick a the color of the links (default is #ffffff)",
					"id" => "prefooter_link_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options[] = array( "name" => "Pre-Footer Box #1 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text1",
					"std" => "Site Map",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #1 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url1",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #2 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text2",
					"std" => "Search Terms",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #2 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url2",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #3 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text3",
					"std" => "Advanced Search",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #3 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url3",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #4 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text4",
					"std" => "Contact Us",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #4 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url4",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #5 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text5",
					"std" => "Site Map",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #5 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url5",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #6 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text6",
					"std" => "Search Terms",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #6 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url6",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #7 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text7",
					"std" => "Advanced Search",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #7 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url7",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #8 Text",
					"desc" => "Enter text to be used in the pre-footer box",
					"id" => "pre_footer_text8",
					"std" => "Contact Us",
					"type" => "text");

$of_options[] = array( "name" => "Pre-Footer Box #8 URL",
					"desc" => "Enter url for the box",
					"id" => "pre_footer_url8",
					"std" => "#",
					"type" => "text");

// Footer Options
$of_options[] = array( 	"name" 		=> "Footer Options",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "Footer Background Color",
					"desc" => "Pick a background color (default is #323b44)",
					"id" => "footer_bg_color",
					"std" => "#323b44",
					"type" => "color");

$of_options[] = array( "name" => "Copyright Section Background Color",
					"desc" => "Pick a background color (default is #262C33)",
					"id" => "copyright_bg_color",
					"std" => "#262C33",
					"type" => "color");

$of_options[] = array( "name" => "Footer Widget Title Color",
					"desc" => "Pick a widget title color (default is #ffffff)",
					"id" => "footer_widget_title_color",
					"std" => "#ffffff",
					"type" => "color");


$of_options[] = array( 	"name" 		=> "Social Links Panel",
						"desc" 		=> "Enable/Disable social links panel",
						"id" 		=> "footer_social_enable",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);


$of_options[] = array( 	"name" 		=> "Footer Copyright Note",
						"desc" 		=> "Enable/Disable copyright note",
						"id" 		=> "show_footer_copyright",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Copyright Text",
                    "desc" => "",
                    "id" => "footer_copyright_text",
                    "std" => 'Copyright '.date('Y').' '.get_bloginfo('site_title'),
                    "type" => "textarea");

$of_options[] = array( 	"name" 		=> "Footer Widgets",
						"desc" 		=> "Enable/Disable footer widgets",
						"id" 		=> "footer_widgets_on",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

 
// Navigation Menu Options
$of_options[] = array( 	"name" 		=> "Navigation Menu",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Main Navigation  Menu Top Margin (px)",
						"desc" 		=> "Select the top margin <br /> Min: 0, max: 100, step: 1, default value: 20",
						"id" 		=> "nav_top_margin",
						"std" 		=> "20",
						"min" 		=> "0",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( "name" => "Select Main Navigation Menu Font Family",
					"desc" => "Select a font family for the main navigation menu",
					"id" => "google_font_menu",
					"std" => "0",
					"type" => "select",
					"options" => $google_fonts); 

$of_options[] = array( 	"name" 		=> "Main Navigation Menu Font Size (px)",
						"desc" 		=> "Select the font size <br /> Min: 10, max: 58, step: 1, default value: 14",
						"id" 		=> "nav_font_size",
						"std" 		=> "14",
						"min" 		=> "10",
						"step"		=> "1",
						"max" 		=> "58",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( "name" => "Main Navigation Menu Font Color",
					"desc" => "Pick a main navigation menu font color (default is #ffffff)",
					"id" => "nav_font_color",
					"std" => "#ffffff",
					"type" => "color");
					
$of_options[] = array( "name" => "Main Navigation Menu Background Color",
					"desc" => "Pick a background color for the main navigation menu (default is #323b44)",
					"id" => "nav_bg_color",
					"std" => "#323b44",
					"type" => "color");

$of_options[] = array( "name" => "Main Navigation Menu Hover Font Color",
					"desc" => "Pick a main navigation menu hover font color (default is #ffffff)",
					"id" => "nav_hover_font_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options[] = array( "name" => "Main Navigation Menu Background Hover Color",
					"desc" => "Pick a background hover color for the main navigation menu (default #262c33)",
					"id" => "nav_bg_hover_color",
					"std" => "#262c33",
					"type" => "color");

// Home Page
$of_options[] = array( 	"name" 		=> "Home Page",
						"type" 		=> "heading"
				);
					
$of_options[] = array( 	"name" 		=> "Use Static Front Home Page",
						"desc" 		=> "Enable will set up static home page / Disable will set the home page as blog posts index",
						"id" 		=> "front_page_blog_index",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Homepage Layout Manager",
					"desc" => "Organize how you want the layout to appear on the homepage",
					"id" => "homepage_blocks",
					"fold" => "front_page_blog_index", /* the switch hook */
					"std" => $of_options_homepage_blocks,
					"type" => "sorter");
				
// Slider Options
$of_options[] = array( 	"name" 		=> "Slider Options",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "Slider Options",
					"desc" => "Unlimited slider with drag and drop sortings.",
					"id" => "theme_slider",
					"std" => "",
					"type" => "slider");

$of_options[] = array( "name" => "Default Slider",
						"desc" => "Select a slider for the homepage",
						"id" => "slider_select",
						"std" => "Refine Slide",
						"type" => "select",
						"options" => $slider_select);

$of_options[] = array( "name" => "Slider Maximum Width (px)",
					"desc" => "Max slider width - should be set to image width",
					"id" => "slider_max_width",
					"std" => "1024",
					"min" => "800",
					"step" => "1",
					"max"  => "2500",
					"type" => "sliderui");

$of_options[] = array( "name" => "Slider Animation Effect:",
						"desc" => "",
						"id" => "slider_animation",
						"std" => "fade",
						"type" => "select",
						"options" => $animation_effects);

$of_options[] = array( 	"name" 		=> "Slideshow Speed",
						"desc" 		=> "Select the slideshow speed <br /> 1000 = 1 second, default value: 5000",
						"id" 		=> "slideshow_speed",
						"std" 		=> "5000",
						"min" 		=> "1000",
						"step"		=> "1000",
						"max" 		=> "20000",
						"type" 		=> "sliderui" 
				);
					
$of_options[] = array( 	"name" 		=> "Animation Speed",
						"desc" 		=> "Select the animation speed <br /> 1000 = 1 second, default value: 800",
						"id" 		=> "animation_speed",
						"std" 		=> "800",
						"min" 		=> "800",
						"step"		=> "100",
						"max" 		=> "2000",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "Slider Captions",
						"desc" 		=> "Enable/Disable captions on a slide",
						"id" 		=> "captions",
						"std" 		=> 0,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Slider Caption Width (%)",
					"desc" => "Default is 100",
					"id" => "slider_caption_width",
					"std" => "100",
					"fold" => "captions", /* the switch hook */
					"min" => "1",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");
					
$of_options[] = array( "name" => "Slider Caption Left Margin (%)",
					"desc" => "Default is 0",
					"id" => "slider_caption_left_margin",
					"std" => "0",
					"fold" => "captions", /* the switch hook */
					"min" => "0",
					"step" => "1",
					"max"  => "100",
					"type" => "sliderui");

					
$of_options[] = array( "name" =>  "Slider Text Title Color",
					"desc" => "Pick slider title color (default #ffffff)",
					"id" => "slider_text_color",
					"std" => "#ffffff",
					"fold" => "captions", /* the switch hook */
					"type" => "color");
					
$of_options[] = array( "name" =>  "Slider Text Description Color",
					"desc" => "Pick slider description color (default #ffffff)",
					"id" => "slider_descr_color",
					"std" => "#ffffff",
					"fold" => "captions", /* the switch hook */
					"type" => "color");

// Social Links Options
$of_options[] = array( 	"name" 		=> "Social Links",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "Social Icons Color",
					"desc" => "Pick a color for social icons (default #FFFFFF)",
					"id" => "social_icons_color",
					"std" => "#FFFFFF",
					"type" => "color");
					
$of_options[] = array( "name" => "Facebook",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "facebook_link",
					"std" => "#",
					"type" => "text"); 

$of_options[] = array( "name" => "Flickr",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "flickr_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "RSS",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "rss_link",
					"std" => "#",
					"type" => "text"); 

$of_options[] = array( "name" => "Twitter",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "twitter_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Youtube",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "youtube_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Pinterest",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "pinterest_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Tumblr",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "tumblr_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Google Plus",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "google_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "Dribbble",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "dribbble_link",
					"std" => "#",
					"type" => "text");

$of_options[] = array( "name" => "LinkedIn",
					"desc" => "Enter your profile URL. To remove it, just leave it blank",
					"id" => "linkedin_link",
					"std" => "#",
					"type" => "text");

// Blog Options
$of_options[] = array( 	"name" 		=> "Blog Options",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "Select Blog Category",
					"desc" => "Select a category to be used for the blog",
					"id" => "blog_category",
					"std" => "Select a category:",
					"type" => "select",
					"options" => $of_categories);

$of_options[] = array( 	"name" 		=> "Excerpt Length",
						"desc" 		=> "Input the number of words you want to cut from the content to be the excerpt of search and archive page",
						"id" 		=> "blog_excerpt",
						"std" 		=> "45",
						"min" 		=> "30",
						"step"		=> "1",
						"max" 		=> "300",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> "From the Blog Number of Items",
						"desc" 		=> "Enter number of items to display in the section From the Blog",
						"id" 		=> "from_blog_items",
						"std" 		=> "10",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( "name" =>  "Meta Section Background Color",
					"desc" => "Pick meta section background color (default ##dd3333)",
					"id" => "meta_section_bg_color",
					"std" => "#dd3333",
					"type" => "color");
					
$of_options[] = array( "name" =>  "Blog Title Color",
					"desc" => "Pick color (default #65676f)",
					"id" => "blog_title_color",
					"std" => "#65676f",
					"type" => "color");
					
$of_options[] = array( "name" =>  "Sidebar Background Color",
					"desc" => "Pick color (default #ffffff)",
					"id" => "sidebar_bg_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options[] = array( "name" =>  "Sidebar Text Color",
					"desc" => "Pick color (default #333333)",
					"id" => "sidebar_text_color",
					"std" => "#333333",
					"type" => "color");
					
$of_options[] = array( "name" =>  "Sidebar Text Hover Color",
					"desc" => "Pick color (default #1e73be)",
					"id" => "sidebar_text_hover_color",
					"std" => "#1e73be",
					"type" => "color");
					
$of_options[] = array( "name" =>  "Widget Title Background Color",
					"desc" => "Pick color (default #323B44)",
					"id" => "widget_title_bg_color",
					"std" => "#323B44",
					"type" => "color");

$of_options[] = array( "name" =>  "Widget Title Color",
					"desc" => "Pick color (default #ffffff)",
					"id" => "widget_title_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options[] = array( "name" => "From Blog Section Background Color",
					"desc" => "Pick a background color for the section (default #f5f5f5)",
					"id" => "from_blog_bg_color",
					"std" => "#f5f5f5",
					"type" => "color");


$of_options[] = array( 	"name" 		=> "Section Title",
						"desc" 		=> "Enable/Disable from the blog section title",
						"id" 		=> "blog_sect_title",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);
				
$of_options[] = array( "name" => "Section Title Text",
					"desc" => "Enter text to display in the header of the section",
					"id" => "blog_sect_title_text",
					"fold" => "blog_sect_title", /* the switch hook */
					"std" => "Latest From The Blog",
					"type" => "text");


//Home Page Tagline
$of_options[] = array( "name" => "Tagline",
					"type" => "heading");
					
$of_options[] = array( "name" => "Section Header",
					"desc" => "Enter text to display in the header of the section",
					"id" => "tagline_header",
					"std" => "Terrifico Multi-Purpose, Responsive  Wordpress Theme",
					"type" => "text");

$of_options[] = array( "name" => "Section Text",
					"desc" => "Enter text to display in the section",
					"id" => "tagline_text",
					"std" => "Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean egestas placerat hendrerit. Pellentesque dapibus, lectus quis fermentum feugiat, sapien lectus tincidunt tellus, vel malesuada sem nibh non dolor.",
					"type" => "textarea");

$of_options[] = array( "name" => "Button Text",
					"desc" => "Enter text to display in the header of the section",
					"id" => "tagline_button_text",
					"std" => "Learn More",
					"type" => "text");
					
$of_options[] = array( "name" => "Button URL",
					"desc" => "Enter URL. e.g. http://www.yoursite.com",
					"id" => "tagline_button_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Select Button Color",
					"desc" => "",
					"id" => "tagline_button_color",
					"std" => "green",
					"type" => "select",
					"options" => $button_colors); 

$of_options[] = array( "name" => "Tagline Background Color",
					"desc" => "Pick a background color for tagline (default #9db1ba)",
					"id" => "tagline_bg_color",
					"std" => "#9db1ba",
					"type" => "color");

$of_options[] = array( "name" => "Tagline Text Color",
					"desc" => "Pick a text color for tagline (default #ffffff)",
					"id" => "tagline_text_color",
					"std" => "#ffffff",
					"type" => "color");

$of_options[] = array( 	"name" 		=> "Tagline Border",
						"desc" 		=> "Enable/Disable tagline border",
						"id" 		=> "display_tag_border",
						"std" 		=> 1,
						"on" 		=> "Enable",
						"off" 		=> "Disable",
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => "Tagline Border Color",
					"desc" => "Pick a text color for tagline (default #323b44)",
					"id" => "tagline_border_color",
					"std" => "#323b44",
					"fold" => "display_tag_border", /* the switch hook */
					"type" => "color");

//Home Page Content Boxes
$of_options[] = array( "name" => "Content Boxes",
					"type" => "heading");

$of_options[] = array( "name" => "First Column Header",
					"desc" => "Enter text to display in the header of the first column",
					"id" => "first_column_header",
					"std" => "Responsive Design",
					"type" => "text");
					
$of_options[] = array( "name" => "First Column Text",
					"desc" => "Enter text to display in the body of the first column",
					"id" => "first_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
					"type" => "textarea");
					
$of_options[] = array( "name" => "First Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "first_column_image",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "First Column URL",
					"desc" => "Enter URL. e.g. http://www.yoursite.com",
					"id" => "first_column_url",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "First Button Text",
					"desc" => "Enter text to display in the button in the first column",
					"id" => "first_column_button",
					"std" => "Read More",
					"type" => "text");


$of_options[] = array( "name" => "Second Column Header",
					"desc" => "Enter text to display in the header of the second column",
					"id" => "second_column_header",
					"std" => "High Quality",
					"type" => "text");

$of_options[] = array( "name" => "Second Column Text",
					"desc" => "Enter text to display in the body of the second column",
					"id" => "second_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
					"type" => "textarea");

$of_options[] = array( "name" => "Second Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "second_column_image",
					"std" => "",
					"type" => "media");

$of_options[] = array( "name" => "Second Column URL",
					"desc" => "Enter URL. e.g. http://www.yoursite.com",
					"id" => "second_column_url",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Second Button Text",
					"desc" => "Enter text to display in the button in the second column",
					"id" => "second_column_button",
					"std" => "Read More",
					"type" => "text");


$of_options[] = array( "name" => "Third Column Header",
					"desc" => "Enter text to display in the header of the third column",
					"id" => "third_column_header",
					"std" => "eCommerce Ready",
					"type" => "text");
					
$of_options[] = array( "name" => "Third Column Text",
					"desc" => "Enter text to display in the body of the third column",
					"id" => "third_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
					"type" => "textarea");

$of_options[] = array( "name" => "Third Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "third_column_image",
					"std" => "",
					"type" => "media");

$of_options[] = array( "name" => "Third Column URL",
					"desc" => "Enter URL. e.g. http://www.yoursite.com",
					"id" => "third_column_url",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Third Button Text",
					"desc" => "Enter text to display in the button in the third column",
					"id" => "third_column_button",
					"std" => "Read More",
					"type" => "text");

$of_options[] = array( "name" => "Column Header Color",
					"desc" => "Pick a text color for column header (default #323b44)",
					"id" => "column_header_color",
					"std" => "#323b44",
					"type" => "color");
					
$of_options[] = array( "name" => "Section Background Color",
					"desc" => "Pick a background color for the section (default #ffffff)",
					"id" => "content_box_bg_color",
					"std" => "#ffffff",
					"type" => "color");
				
$of_options[] = array( "name" => "Select Button Color",
					"desc" => "",
					"id" => "boxes_button_color",
					"std" => "green",
					"type" => "select",
					"options" => $button_colors); 

// Home Page Key Features
$of_options[] = array( "name" => "Key Features",
					"type" => "heading");

$of_options[] = array( "name" => "Key Features Title Text",
					"desc" => "Enter text to display in the title of the section",
					"id" => "key_feature_title_text",
					"std" => "The Key Features",
					"type" => "text");

$of_options[] = array( "name" => "First Feature Column Header",
					"desc" => "Enter text to display in the header of the first column",
					"id" => "first_feature_column_header",
					"std" => "Powerful Admin Panel",
					"type" => "text");
					
$of_options[] = array( "name" => "First Feature Column Text",
					"desc" => "Enter text to display in the body of the first column",
					"id" => "first_feature_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor et, rhoncus rhoncus sem missa super dollorisy martin.",
					"type" => "textarea");
					
$of_options[] = array( "name" => "First Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "first_feature_column_image",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "First Feature Column Font Awesome Icon",
					"desc" => "Enter Font Awesome Icon to display in first column",
					"id" => "first_feature_column_fai",
					"std" => "cog",
					"type" => "text");
					
$of_options[] = array( "name" => "Second Feature Column Header",
					"desc" => "Enter text to display in the header of the second column",
					"id" => "second_feature_column_header",
					"std" => "Fully Responsive",
					"type" => "text");
					
$of_options[] = array( "name" => "Second Feature Column Text",
					"desc" => "Enter text to display in the body of the second column",
					"id" => "second_feature_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor et, rhoncus rhoncus sem missa super dollorisy martin.",
					"type" => "textarea");
					
$of_options[] = array( "name" => "Second Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "second_feature_column_image",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Second Feature Column Font Awesome Icon",
					"desc" => "Enter Font Awesome Icon to display in second column",
					"id" => "second_feature_column_fai",
					"std" => "edit",
					"type" => "text");
					
$of_options[] = array( "name" => "Third Feature Column Header",
					"desc" => "Enter text to display in the header of the third column",
					"id" => "third_feature_column_header",
					"std" => "Integrated eCommerce",
					"type" => "text");
					
$of_options[] = array( "name" => "Third Feature Column Text",
					"desc" => "Enter text to display in the body of the third column",
					"id" => "third_feature_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor et, rhoncus rhoncus sem missa super dollorisy martin.",
					"type" => "textarea");
					
$of_options[] = array( "name" => "Third Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "third_feature_column_image",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Third Feature Column Font Awesome Icon",
					"desc" => "Enter Font Awesome Icon to display in third column",
					"id" => "third_feature_column_fai",
					"std" => "heart",
					"type" => "text");

$of_options[] = array( "name" => "Fourth Feature Column Header",
					"desc" => "Enter text to display in the header of the fourth column",
					"id" => "fourth_feature_column_header",
					"std" => "High Quality",
					"type" => "text");
					
$of_options[] = array( "name" => "Fourth Feature Column Text",
					"desc" => "Enter text to display in the body of the fourth column",
					"id" => "fourth_feature_column_text",
					"std" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas neque diam, luctus at laoreet in, auctor ut tellus. Etiam enim lacus, ornare et tempor et, rhoncus rhoncus sem missa super dollorisy martin.",
					"type" => "textarea");
					
$of_options[] = array( "name" => "Fourth Column Image",
					"desc" => "Please choose an image or insert an image url to use in the column",
					"id" => "fourth_feature_column_image",
					"std" => "",
					"type" => "media");
					
$of_options[] = array( "name" => "Fourth Feature Column Font Awesome Icon",
					"desc" => "Enter Font Awesome Icon to display in fourth column",
					"id" => "fourth_feature_column_fai",
					"std" => "edit",
					"type" => "text");
					
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
?>

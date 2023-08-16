<?php
		/**
		* Remove wordpress logo/pages from admin bar
		* @global type $wp_admin_bar
		*/
require_once get_stylesheet_directory().'/inc/cm-customizer.php';

add_action('init','e80_add_supports');
function e80_add_supports() {
add_post_type_support('service', array('editor','excerpt'));
}

include_once('shortcode-slider.php');
include_once('shortcode-work.php');
// include_once('shortcode-portfolio.php');
include_once('shortcode-portfolio-fix.php');
include_once('shortcode-products.php');


add_action('wp_enqueue_scripts','theme_enqueue_styles',15);
function theme_enqueue_styles() {
	wp_dequeue_style('ert-bootstrap-min');
	wp_enqueue_style('bootstrap-stackpath','https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css');
	wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css');
	wp_enqueue_style('child-style',get_stylesheet_directory_uri().'/style.css',array('parent-style','bootstrap-stackpath'));
// 	wp_enqueue_style('fa-icon-style', 'https://use.fontawesome.com/releases/v5.15.2/css/all.css', array('child-style') );
	
	wp_enqueue_script('custom-script',get_stylesheet_directory_uri().'/custom.js', array('jquery'), null, false);
	#wp_enqueue_style('spi-blue',get_stylesheet_directory_uri().'/css-spi-blue.css',array('child-style'));
	wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',array('child-style'));
// 	wp_enqueue_script('custom-script',get_stylesheet_directory_uri().'/script.js',array('jquery'),null, true);
	// shortcode scripts
/*
	}

add_action('init','ert_plugin_scripts',15);
function ert_plugin_scripts() {
*/
	wp_enqueue_script( 'jquery.isotope', plugins_url('ert-enhenyero/lib/js/jquery.isotope.js'), array( 'jquery' ), false );
}

function cm_setup_theme_supported_features() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'cm_setup_theme_supported_features' );

if (!function_exists('e80_shortcode_get_started')) {
	// [cmi-sc-listpages]
	function e80_shortcode_get_started($atts) {
		$return = 
		'
	<div id="get-started-cta-1" class="section-main shortcode-cta-block" style="color:#fff; background-image:url(\'/wp-content/uploads/2016/03/0111.jpg\');">
		<div class="overlay color">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Tell Us About Your Project!</h2>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-default en-btn light fancybox-inline" href="#get-started-cta" role="button">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
	</div>
		';
		return $return;
		}	
	add_shortcode('spi-get-started','e80_shortcode_get_started');
	}

if( !function_exists('ert_enqueue_scripts') ) {

	function ert_enqueue_scripts() {

		// load the Internet Explorer specific stylesheet.
		wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/ie.css' , '20131205' );
		wp_style_add_data( 'ie-css', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/* Google fonts */
		wp_enqueue_style( 'Montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', array(), null, 'screen' );
		wp_enqueue_style( 'Muli', 'https://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic', array(), null, 'screen' );
		wp_enqueue_style( 'Montserrat+Subrayada', 'https://fonts.googleapis.com/css?family=Montserrat+Subrayada:400,700', array(), null, 'screen' );
		wp_enqueue_style( 'Raleway', 'https://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300', array(), null, 'screen' );

		/* Icons Fonts */
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/libraries/fonts/genericons.css', array(), '3.2' );
// 		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css', array(), null );
		wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/fonts/icons/flaticon.css', array(), '3.2' );

		/* Animate CSS */
		wp_enqueue_style( 'animate.min', get_template_directory_uri() . '/libraries/animate.min.css', array(), null );

		/* Bootstrap JS/CSS */
		wp_enqueue_style( 'ert-bootstrap-min', get_template_directory_uri() . '/libraries/bootstrap/bootstrap.min.css', array(), null );
		wp_enqueue_script( 'ert-bootstrap-min', get_template_directory_uri() . '/libraries/bootstrap/bootstrap.min.js', array( 'jquery' ),  null, true );

		wp_enqueue_script( 'modernizr.custom', get_template_directory_uri() . '/libraries/modernizr.custom.js', array( 'jquery' ),  null, true );
		wp_enqueue_script( 'jquery.easing.min', get_template_directory_uri() . '/libraries/jquery.easing.min.js', array( 'jquery' ),  null, true ); /* jQuery Easing */

		// load main stylesheet.
// 		wp_enqueue_style( 'ert-stylesheet', get_stylesheet_uri(), null );
		wp_enqueue_style( 'ert-responsive', get_template_directory_uri() . '/css/responsive.css', array(), '3.2' );

		/* Color Scheme */
		global $ert_option;

		if( IsNullOrEmptyString( $ert_option['opt_select_stylesheet'] ) ) : 
			$current_style = $ert_option['opt_select_stylesheet'];
		else :
			$current_style = 'default';
		endif;
		wp_enqueue_style( 'ert-theme-color', get_template_directory_uri() . '/css/colors/'.$current_style.'.css', array(), '3.2' );

		wp_enqueue_style( 'ert-switcher', get_stylesheet_directory_uri() . '/switcher.css', array(), '3.2' );
		wp_enqueue_script( 'ert-style-switcher', get_template_directory_uri() . '/libraries/fswit.js', array( 'jquery' ),  null, true );

		/* functions js */
		wp_enqueue_script( 'ert-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ),  null, true );
	}
	add_action( 'wp_enqueue_scripts', 'ert_enqueue_scripts' );
}



if (!function_exists('e80_shortcode_listpages')) {
	function e80_shortcode_listpages() {
		$return_pages = '<h2>Pages</h2><ul>'.wp_list_pages('echo=0&title_li=').'</ul>';
		return $return_pages;
		}	
	}
if (!function_exists('e80_shortcode_recentposts')) {
	function e80_shortcode_recentposts() {
		$return_posts = '';
		query_posts('showposts=16');
		if (have_posts()) {
			$return_posts .= '<h2>Blog</h2><h3>Categories</h3><ul>'.wp_list_categories('echo=0&title_li=').'</ul><h3>Recent Articles</h3><ul>';
			while (have_posts()) {
				the_post();
					$return_posts .= '<li><a href="'.get_the_permalink().'" rel="bookmark" title="Permanent Link to '.get_the_title().'">'.get_the_title().'</a></li>';
				}
			$return_posts .= '</ul>';
			}
		wp_reset_query();
		return $return_posts;
		}	
	}

add_shortcode('CMI-LISTPAGES','e80_shortcode_listpages');
add_shortcode('CMI-RECENTPOSTS','e80_shortcode_recentposts');

if (!function_exists('e80_custom_post_type_product')) {
	function e80_custom_post_type_product() {
		$labels = array(
			'name' =>  __('Products', TXT_DOMAIN ),
			'singular_name' => __('Products', TXT_DOMAIN ),
			'add_new' => __('Add New', TXT_DOMAIN ),
			'add_new_item' => __('Add New Product', TXT_DOMAIN ),
			'edit_item' => __('Edit Product', TXT_DOMAIN ),
			'new_item' => __('New Product', TXT_DOMAIN ),
			'all_items' => __('All Products', TXT_DOMAIN ),
			'view_item' => __('View Product', TXT_DOMAIN ),
			'search_items' => __('Search Product', TXT_DOMAIN ),
			'not_found' =>  __('No Product found', TXT_DOMAIN ),
			'not_found_in_trash' => __('No Product found in Trash', TXT_DOMAIN ),
			'parent_item_colon' => '',
			'menu_name' => __('Products', TXT_DOMAIN )
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true,
			'show_in_rest' => true, 
			'query_var' => true,
// 			'rewrite'  => array( 'slug' => 'products' ),
			'has_archive' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-portfolio',
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
		);

		register_post_type('product', $args);
	}
}
add_action('init', 'e80_custom_post_type_product', 0);

// Add Sections to the Customizer
function wp_bootstrap_starter_child_customize_register( $wp_customize ) {
	
	// 	 Site Main Header Section
	$wp_customize->add_section( 'main-header' , array(
	    'title'      => 'Search Settings',
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting('show-search-in-header', array(
		'default' => false,
		"transport" => "refresh"
	));
	
	$wp_customize->add_control('show-search-in-header', array(
		'label'   => 'Show Search in Navigation',
		'description' => 'Publish and refresh everything to see this change.',
		'section' => 'main-header',
		'type'    => 'checkbox',
	));	
	
}
add_action( 'customize_register', 'wp_bootstrap_starter_child_customize_register', 20 );

// Search Icon and dropdown form in Main Navigation

/**
 * Prints HTML with accessible site search icon and dropwdown search form in main nav.
 */
if( get_theme_mod('show-search-in-header') ) {
	function cm_add_search_form($items, $args) {
		if( $args->theme_location == 'primary' ){
			$items .= '<li id="menu-item-32113" '
					  . 'class="menu-item menu-item-type-custom menu-item-object-custom '
					  . 'menu-item-has-children dropdown '
					  . 'menu-item-32113 '
					  . 'nav-item" itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement">'
					  . '<a title="Search the site" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link search-nav-toggle" id="menu-item-dropdown-32113"><i class="fas fa-search" aria-hidden="true"></i> <span class="sr-only">Search</span></a>'
					  . '<ul class="dropdown-menu search-dropdown-menu" aria-labelledby="menu-item-2380" role="menu">'
					  . '<li itemscope="itemscope" '
					  . 'itemtype="https://www.schema.org/SiteNavigationElement" '
					  . 'id="menu-item-2380" '
					  . 'class="menu-item menu-item-type-custom menu-item-object-custom '
					  . 'menu-item-2380 '
					  . 'nav-item">'
					  . '<form role="search" method="get" class="dropdown-item search-form dropdown-search-form d-flex" '
					  . 'action="https://structuralpanels.ca/">'
					  . '<label class="m-0">'
					  . '<input type="search" class="search-field form-control" placeholder="Search …" '
					  . 'value="" name="s" title="Search for:"></label>'
					  . '<button type="submit" class="search-submit"><i class="fa fa-search"></i>'
					  . '</button></form></li></ul>';
	    }
	    
	    return $items;
	}
	add_filter('wp_nav_menu_items', 'cm_add_search_form', 10, 2);	
}

if (!function_exists('e80_custom_post_type_work')) {
	function e80_custom_post_type_work() {
		$labels = array(
			'name' =>  __('Works', TXT_DOMAIN ),
			'singular_name' => __('Works', TXT_DOMAIN ),
			'add_new' => __('Add New', TXT_DOMAIN ),
			'add_new_item' => __('Add New Work', TXT_DOMAIN ),
			'edit_item' => __('Edit Work', TXT_DOMAIN ),
			'new_item' => __('New Work', TXT_DOMAIN ),
			'all_items' => __('All Works', TXT_DOMAIN ),
			'view_item' => __('View Work', TXT_DOMAIN ),
			'search_items' => __('Search Work', TXT_DOMAIN ),
			'not_found' =>  __('No Work found', TXT_DOMAIN ),
			'not_found_in_trash' => __('No Work found in Trash', TXT_DOMAIN ),
			'parent_item_colon' => '',
			'menu_name' => __('Works', TXT_DOMAIN )
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite'  => array( 'slug' => 'works' ),
			'has_archive' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-portfolio',
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
			'taxonomies' => array('work-catagories'),
		);

		register_post_type('work', $args);
	}
}
add_action('init', 'e80_custom_post_type_work', 0);

if (!function_exists('e80_custom_post_type_tradeshow')) {
	function e80_custom_post_type_tradeshow() {
		$labels = array(
			'name' =>  __('Tradeshows', TXT_DOMAIN ),
			'singular_name' => __('Tradeshows', TXT_DOMAIN ),
			'add_new' => __('Add New', TXT_DOMAIN ),
			'add_new_item' => __('Add New Tradeshow', TXT_DOMAIN ),
			'edit_item' => __('Edit Tradeshow', TXT_DOMAIN ),
			'new_item' => __('New Tradeshow', TXT_DOMAIN ),
			'all_items' => __('All Tradeshows', TXT_DOMAIN ),
			'view_item' => __('View Tradeshow', TXT_DOMAIN ),
			'search_items' => __('Search Tradeshow', TXT_DOMAIN ),
			'not_found' =>  __('No Tradeshow found', TXT_DOMAIN ),
			'not_found_in_trash' => __('No Tradeshow found in Trash', TXT_DOMAIN ),
			'parent_item_colon' => '',
			'menu_name' => __('Tradeshows', TXT_DOMAIN )
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite'  => array( 'slug' => 'tradeshows' ),
			'has_archive' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-calendar-alt',
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
			'taxonomies' => array('tradeshow-catagories'),
		);

		register_post_type('tradeshow', $args);
	}
}
add_action('init', 'e80_custom_post_type_tradeshow', 0);



// Register Custom Taxonomy
function work_taxonomy()  {
	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Categories', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
		'search_items'               => __( 'Search categories', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used categories', 'text_domain' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy('work_categories', 'work', $args);
}

// Hook into the 'init' action
add_action('init', 'work_taxonomy', 0);



/*
if (!function_exists('e80_spi_custom_sidebars')) {
	function e80_spi_custom_sidebars() {
		$args = array(
			'id'            => 'sidebar_product_rockwall',
			'class'         => 'sidebar',
			'name'          => __( 'Product: Rockwall', 'text_domain' ),
			'description'   => __( 'This sidebar only appears on the Rockwall page.', 'text_domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );
		$args = array(
			'id'            => 'sidebar_product_isowall',
			'class'         => 'sidebar',
			'name'          => __( 'Product: Isowall', 'text_domain' ),
			'description'   => __( 'This sidebar only appears on the Isowall page.', 'text_domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );
	}
	add_action('widgets_init', 'e80_spi_custom_sidebars');
}
*/

function e80_custom_title_hint($new_title){
	$screen = get_current_screen();
	if  ( 'work' == $screen->post_type ) {
	  $new_title = 'Enter client\'s name here';
	}
	elseif  ( 'tradeshow' == $screen->post_type ) {
	  $new_title = 'Enter show title here';
	}
	return $new_title;
}
 
add_filter('enter_title_here', 'e80_custom_title_hint');





add_action('cmb2_admin_init', 'e80_spi_work_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function e80_spi_work_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_work_metadata_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'spi_work_metabox',
        'title'         => __( 'Additional Details', 'cmb2' ),
        'object_types'  => array( 'work', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'cmb_styles'	=> false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Add other metaboxes as needed
	$cmb->add_field( array(
	    'name'    => 'Alternate Title',
	    'desc'    => 'field description (optional)',
	    'default' => '',
	    'id'      => '_work_metadata_title',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name'    => 'Location',
	    'desc'    => 'Example: Toronto, Ontario',
	    'default' => '',
	    'id'      => '_work_metadata_location',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name' => 'Slide Images',
	    'desc' => '',
	    'id'   => 'work_slide_images',
	    'type' => 'file_list',
	    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
/*
	    // Optional, override default text strings
	    'options' => array(
	        'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
	        'remove_image_text' => 'Replacement', // default: "Remove Image"
	        'file_text' => 'Replacement', // default: "File:"
	        'file_download_text' => 'Replacement', // default: "Download"
	        'remove_text' => 'Replacement', // default: "Remove"
	    ),
*/
	) );
}

add_action('cmb2_admin_init', 'e80_spi_tradeshow_metadata');
function e80_spi_tradeshow_metadata() {
    $prefix = '_tradeshow_metadata_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'spi_tradeshow_metabox',
        'title'         => __( 'Tradeshow Details', 'cmb2' ),
        'object_types'  => array( 'tradeshow', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'cmb_styles'	=> false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

	$cmb->add_field( array(
	    'name'    => 'Alternate Title',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'alt_title',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name'    => 'Venue',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'location',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name'    => 'Street Address',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'address',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name'    => 'City',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'city',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name'    => 'Province',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'province',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name'    => 'Website URL',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'website',
	    'type'    => 'text_url',
	) );
	$cmb->add_field( array(
	    'name'    => 'Booth Number',
	    'desc'    => '',
	    'default' => '',
	    'id'      => $prefix.'booth',
	    'type'    => 'text',
	) );
	$cmb->add_field( array(
	    'name' => 'Start Date',
	    'id'   => $prefix.'start_date',
	    'type' => 'text_date_timestamp',
	    // 'timezone_meta_key' => 'wiki_test_timezone',
	    // 'date_format' => 'l jS \of F Y',
	) );
	$cmb->add_field( array(
	    'name' => 'End Date',
// 	    'desc'    => 'If multiple days',
	    'id'   => $prefix.'end_date',
	    'type' => 'text_date_timestamp',
	    // 'timezone_meta_key' => 'wiki_test_timezone',
	    // 'date_format' => 'l jS \of F Y',
	) );
}

if (!function_exists('e80_share_post_links')) {
	function encode_mailto_param($text) {
		return rawurlencode(htmlspecialchars_decode($text));
		}
	function e80_share_post_links($content) {
		if (is_singular(array('post'))) {
			$permalink = get_the_permalink();
			$title = get_the_title();
			$facebook = '<a href="https://www.facebook.com/sharer/sharer.php?u='.urlencode($permalink).'" target="_blank" rel="nofollow noopener noreferrer">Facebook</a>';
			$twitter = '<a href="https://twitter.com/intent/tweet?url='.urlencode($permalink).'" target="_blank" rel="nofollow noopener noreferrer">Twitter</a>';
			$google = '<a href="https://plus.google.com/share?url='.urlencode($permalink).'" target="_blank" rel="nofollow noopener noreferrer">Google+</a>';
			$linkedin = '<a href="https://www.linkedin.com/shareArticle?mini=true&url='.urlencode($permalink).'&title=&summary=&source=" target="_blank" rel="nofollow noopener noreferrer">LinkedIn</a>';
 			$fix_title = strlen($title) > 50 ? substr($title,0,50).'...' : $title;
 			$encode_title = encode_mailto_param($fix_title);
			$email_subject = '[Recommended] '.$fix_title;
			$encode_subject = encode_mailto_param($email_subject);
// 			$email_subject = '[Recommended]%20'.str_replace(' ', '%20', $fix_title);
			$email_message = 'Check out this article I think you\'ll like:%0A%0A'.$title.'%0A'.$permalink;
			$encode_message = encode_mailto_param($email_message);
// 			$email_message = 'Check out this article I think you\'ll like:%0A%0A'.$title.'%0A'.$permalink;
// 			$email_body = str_replace(' ', '%20', $email_message);
			$email = '<a href="mailto:?subject='.$encode_subject.'&body='.$encode_message.'">Email</a>';
// 			$email = '<a href="mailto:?subject='.$email_subject.'&body='.$email_body.'">Email</a>';
			$content .= '<p><em>Like this post? Share it on '.$twitter.', '.$linkedin.', '.$google.', '.$facebook.' or by '.$email.'.';
			if (comments_open()) $content .= '.. or start a conversation by leaving us a comment!';
			$content .= '</em></p>';
			}
		return $content;
		}
	//add_filter('the_content', 'e80_share_post_links');
	}

if(!function_exists('e80_show_custom_social_share_icons')){
	function e80_show_social_share_icons($slug = '', $title = ''){
		$html = '<footer class="with_top_border"><div class="entry-meta divided-content regular darklinks grey"><p><em>Like this post? Share it!</em></p>';
		$html .= '<div id="share-icons"><i class="fa fa-share-alt"></i>  <a title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u='.$slug.'" target="_blank" rel="nofollow noopener noreferrer" class="nolightbox"><i class="fa fa-facebook"></i></a>';
		$html .= '<a title="Share on Twitter" href="https://twitter.com/intent/tweet?url='.$slug.'" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-twitter-square"></i></a>';
		$html .= '<a title="Share on LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&amp;url='.$slug.'&amp;title=&amp;summary=&amp;source=" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-linkedin"></i></a>';
		$html .= '<a title="Share on Tumblr" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl='.$slug.'" target="_blank" rel="nofollow noopener noreferrer"><i class="fab fa-tumblr-square"></i></a>';
		$html .= '<a title="Share on Reddit" href="https://reddit.com/submit?url=https://aingerroofing.ca/5-benefits-of-choosing-metal-roofing-for-your-business/" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-reddit-square"></i></a>';
		$html .= '<a href="mailto:?subject=[Recommended]'.$title.'&amp;body=Check%20out%20this%20article%20I%20think%20you\'ll%20like:'.$title.'%0A'.$slug.'" title="Share by email"><i class="fa fa-envelope-square"></i></a></div></div></footer>';
		
		return $html;

		}
	}
	add_action( 'social_share', 'e80_show_social_share_icons', 10, 2 );

if(!function_exists('cm_rewrite_work_category')){
	 function cm_rewrite_work_category() {
	     // get the arguments of the already-registered taxonomy
	     $product_category_args = get_taxonomy( 'work_categories' ); // returns an object

	     // make changes to the args
	     // in this example there are three changes
	     // again, note that it's an object
	     $product_category_args->show_admin_column = true;
	     $product_category_args->rewrite['slug'] = 'industry';
	     $product_category_args->rewrite['with_front'] = false;

	     // re-register the taxonomy
	     register_taxonomy( 'work_categories', 'work', (array) $product_category_args );
	 	}
	}
 add_action( 'init', 'cm_rewrite_work_category', 11 );
 
 if(!function_exists('sidebar_cta_block')) {
	function sidebar_cta_block($atts) {
		$atts = shortcode_atts( array(
			'image' => 'false',
			'link' => 'false'
		), $atts );
		
		$sidebarButton = '<div class="sidebar-cta-button">';
			if($atts['link'] !== 'false') {
				$sidebarButton .= '<div class="close-sidebar"><i class="fas fa-times-circle"></i></div>';
				$sidebarButton .= '<a class="fancybox-inline" target="_blank" style="display:block" ';
				$sidebarButton .= 'href="'. $atts['link'] .'">';
					if($atts['link'] !== 'false') {
						$sidebarButton .= '<img src="'. $atts['image'] .'" alt="Click this image and fill out the form with details about your project.">';
					}
				$sidebarButton .= '</a>';
			}
		$sidebarButton .= '</div>';

		return $sidebarButton;
	}
	add_shortcode('sidebar-cta','sidebar_cta_block');
}

if(!function_exists('e80_testimonial_metaboxes')){

    add_action('cmb2_admin_init', 'e80_testimonial_metaboxes');

    function e80_testimonial_metaboxes() {
        $prefix = '_testimonial_';
        $cmb = new_cmb2_box(array(
            'id' => 'testimonial_page_metabox',
            'title' => __('Testimonial Details', 'testimonial'),
            'object_types' => array('testimonials'),
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true,
            ));
        $cmb->add_field(array(
            'name' => __('Title', 'testimonial'),
            'id' => $prefix.'title',
            'type' => 'text'
            ));
        $cmb->add_field(array(
            'name' => __('Pull quote', 'testimonial'),
            'id' => $prefix.'pullquote',
            'type' => 'textarea_small'
            ));
        $cmb->add_field(array(
            'name' => esc_html__('Location', 'testimonial'),
            'id' => $prefix.'location',
            'type' => 'text'
            ));

        }

    }

if ( ! function_exists( 'ert_paging_nav' ) ) :

    /**

     * Display navigation to next/previous set of posts when applicable.

     *

     * @since Enhenyero 1.0

     */

    function ert_paging_nav() {

        // Don't print empty markup if there's only one page.

        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {

            return;

        }



        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

        $pagenum_link = html_entity_decode( get_pagenum_link() );

        $query_args   = array();

        $url_parts    = explode( '?', $pagenum_link );



        if ( isset( $url_parts[1] ) ) {

            wp_parse_str( $url_parts[1], $query_args );

        }



        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );

        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';



        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';

        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';



        // Set up paginated links.

        $links = paginate_links( array(

            'base'     => $pagenum_link,

            'format'   => $format,

            'total'    => $GLOBALS['wp_query']->max_num_pages,

            'current'  => $paged,

            'mid_size' => 1,

            'add_args' => array_map( 'urlencode', $query_args ),

            'prev_text' => __( '&larr; Previous', TXT_DOMAIN ),

            'next_text' => __( 'Next &rarr;', TXT_DOMAIN ),

        ) );



        if ( $links ) :



            ?>

            <nav class="navigation paging-navigation" role="navigation">

                <!--h1 class="screen-reader-text"><?php _e( 'Posts navigation', TXT_DOMAIN ); ?></h1-->

                <div class="pagination loop-pagination">

                    <ul class="pagination">

                        <li> <?php echo html_entity_decode( $links ); ?> </li>

                    </ul>

                </div><!-- .pagination -->

            </nav><!-- .navigation -->

        <?php

        endif;

    }

endif;
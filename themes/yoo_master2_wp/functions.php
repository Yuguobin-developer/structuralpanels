<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// check compatibility
if (version_compare(PHP_VERSION, '5.3', '>=')) {

    // bootstrap warp
    require(__DIR__.'/warp.php');
}


/* Google Search Console
----------------------------------------------------------------------------------------------------*/

// Add Google Search Console verification code to the <head>
function google_search_console_head() {
    ?>
    <!-- Start Google Search Console -->
    <meta name="google-site-verification" content="pcvvdyuQnJFbO9zlqbgM5QLnt16IjpQJq-bPMLQUKPc" />
    <!-- End Google Search Console -->
    <?php
}
add_action( 'wp_head', 'google_search_console_head' );


/* Google Tag Manager
----------------------------------------------------------------------------------------------------*/

// Add Google Tag Manager javascript code as close to the opening <head> tag as possible
function google_tag_manager_head() {
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PTW8KSX');</script>
    <!-- End Google Tag Manager -->
    <?php
}
add_action( 'wp_head', 'google_tag_manager_head', 0 );

// Add Google Tag Manager noscript code immediately after the opening <body> tag
function google_tag_manager_body() {
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTW8KSX"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action( 'wp_footer', 'google_tag_manager_body' );


/* LearnDash
----------------------------------------------------------------------------------------------------*/

// Change Sender Email Address
function wpb_sender_email( $original_email_address ) {
return 'info@fluentmotion.com';
}
// Change Sender Name
function wpb_sender_name( $original_email_from ) {
return 'Fluent Motion Inc';
}
// Add Filters
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );


/* Wordpress Editor
----------------------------------------------------------------------------------------------------*/

// Disable the Gutenberg Editor
add_filter('use_block_editor_for_post', '__return_false');

// Disable the Gutenberg Widget Editor
add_filter( 'use_widgets_block_editor', '__return_false' );

// Hide the Gutenberg Call-Out from Dashboard
remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );


/* WooCommerce
----------------------------------------------------------------------------------------------------*/

add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_display_sold_out_loop_woocommerce' );

function bbloomer_display_sold_out_loop_woocommerce() {
    global $product;
    if ( ! $product->is_in_stock() ) {
        echo '<span class="soldout">Sold Out</span>';
    }
}

/* Custom Default Avatar */
add_filter( 'avatar_defaults', 'wpb_new_gravatar' );
  function wpb_new_gravatar ($avatar_defaults) {
    $myavatar = 'https://www.staging2.fluentmotion.com/wp-content/uploads/2021/11/custom-default-gravatar.png';
    $avatar_defaults[$myavatar] = "Default Gravatar";
  return $avatar_defaults;
}

/*  Exclude Online Course products from the shop page 
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'course' ), // Don't display products in the course category on the shop page.
           'operator' => 'NOT IN'
    );


    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' ); */


/* Wordpress User Profile - hide fields not being used
----------------------------------------------------------------------------------------------------*/

add_action('admin_init', 'user_profile_fields_disable');

function user_profile_fields_disable() {

global $pagenow;

// apply only to user profile or user edit pages
if ($pagenow!=='profile.php' && $pagenow!=='user-edit.php') {
return;
}

// do not change anything for the administrator
if (current_user_can('administrator')) {
return;
}

add_action( 'admin_footer', 'user_profile_fields_disable_js' );

}


/**
* Disables selected fields in WP Admin user profile (profile.php, user-edit.php)
*/
/* Remove Yoast SEO Social Profiles From All Users
 */

add_filter('user_contactmethods', 'yoast_seo_admin_user_remove_social');

function yoast_seo_admin_user_remove_social ( $contactmethods ) {
 unset( $contactmethods['facebook'] );
 unset( $contactmethods['instagram'] );
 unset( $contactmethods['linkedin'] );
 unset( $contactmethods['myspace'] );
 unset( $contactmethods['pinterest'] );
 unset( $contactmethods['soundcloud'] );
 unset( $contactmethods['tumblr'] );
 unset( $contactmethods['twitter'] );
 unset( $contactmethods['youtube'] );
 unset( $contactmethods['wikipedia'] );
 return $contactmethods;
}

/* remove colour scheme from User profile */

if ( is_admin() ) {
remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
add_action( 'personal_options', 'ozh_personal_options');
}

function ozh_personal_options() {
?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#your-profile .form-table:first, #your-profile h3:first").remove();
});
</script>
<?php
}


/* Testimonials
----------------------------------------------------------------------------------------------------*/

// Register Testimonials Post Type
function testimonials_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonials', 'text_domain' ),
		'archives'              => __( 'Testimonial Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'New Testimonial', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'search_items'          => __( 'Search Testimonials', 'text_domain' ),
		'not_found'             => __( 'No Testimonial found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No Testimonial found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Testimonial', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);

	$args = array(
		'label'                 => __( 'Testimonial', 'text_domain' ),
		'description'           => __( 'Testimonial Information Pages', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 12,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonials_post_type', 0 );

// Register Testimonials Posts Admin Order
function testimonials_posts_order_admin( $query ) {
    if ( is_admin() ) {
        $post_type = $wp_query->query['post_type'];
        if ( $post_type == 'testimonials' ) {
            $wp_query->set( 'orderby', 'menu_order' );
            $wp_query->set( 'order', 'ASC' );
        }
    }
}
add_filter( 'pre_get_posts', 'testimonials_posts_order_admin' );

// Register Testimonials Posts Order
function testimonials_posts_order( $query ) {
	if ( is_admin() )
		return;
	if ( $query->is_main_query() && is_post_type_archive( 'testimonials' ) ) {
		$query->set( 'orderby', 'menu_order' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'testimonials_posts_order' );

// Register Testimonials Posts Per Page
function testimonials_posts_per_page( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'testimonials' ) ) {
        $query->set( 'posts_per_page', '100' );
    }
}
add_action( 'pre_get_posts', 'testimonials_posts_per_page' );


/* Shortcodes
----------------------------------------------------------------------------------------------------*/

// Date

function year_shortcode () {
$year = date_i18n ('Y');
return $year;
}
add_shortcode ('year', 'year_shortcode');

function month_shortcode () {
$monthyear = date_i18n ('F');
return $month;
}
add_shortcode ('month', 'month_shortcode');

function yyyymmdd_shortcode () {
$yyyymmdd = date_i18n ('y-m-d'); return $yyyymmdd;
}
add_shortcode ('yyyymmdd', 'yyyymmdd_shortcode');

function monthyear_shortcode () {
$monthyear = date_i18n ('F Y');
return $monthyear;
}
add_shortcode ('monthyear', 'monthyear_shortcode');

function day_shortcode () {
$day = date_i18n ('l');
return $day;
}
add_shortcode ('day', 'day_shortcode');

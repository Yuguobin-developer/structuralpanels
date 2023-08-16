<?php
/**
 * Structural Panels Custom Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Enqueue scripts and styles.
 */
// functions.php (structuralinsulatedpanels theme)

function structuralinsulatedpanels_enqueue_scripts() {
    // Enqueue main stylesheet (style.css)
    wp_enqueue_style('structuralinsulatedpanels-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('structural-panels-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

    // Enqueue Font Awesome CSS
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3');

    // Enqueue custom JavaScript
    wp_enqueue_script('structuralinsulatedpanels-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'structuralinsulatedpanels_enqueue_scripts');


/**
 * Theme setup.
 */
function structural_panels_theme_setup() {
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add theme support for custom logo
    add_theme_support('custom-logo');

    // Add theme support for menus
    add_theme_support('menus');

    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'structural-panels-custom-theme'),
    ));
}
add_action('after_setup_theme', 'structural_panels_theme_setup');

/**
 * Custom meta information for posts.
 */
function structural_panels_custom_meta() {
    echo 'Custom meta information goes here.';
}

/**
 * Modify the excerpt length.
 */
function structural_panels_modify_excerpt_length($length) {
    return 30; // Change the excerpt length to 30 words
}
add_filter('excerpt_length', 'structural_panels_modify_excerpt_length');




add_action('acf/init', 'home_banner');
function home_banner() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a Image_text_two block
        acf_register_block(array(
            'name'              => 'image_text_two',
            'title'             => __('Home Banner'),
            'description'       => __('A home banner block.'),
            'render_template'   => 'template-parts/blocks/home_banner.php',
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}

add_action('acf/init', 'our_client');
function our_client() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a Image_text_two block
        acf_register_block(array(
            'name'              => 'our_client',
            'title'             => __('Our Clients'),
            'description'       => __('Our Clients block.'),
            'render_template'   => 'template-parts/blocks/our_client.php',
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}

add_action('acf/init', 'grid_post');
function grid_post() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a Image_text_two block
        acf_register_block(array(
            'name'              => 'grid_post',
            'title'             => __('Grid Post'),
            'description'       => __('Grid Posts block.'),
            'render_template'   => 'template-parts/blocks/grid_post.php',
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}

add_action('acf/init', 'column3_post');
function column3_post() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a Image_text_two block
        acf_register_block(array(
            'name'              => 'column3_post',
            'title'             => __('Column Post'),
            'description'       => __('Column Posts block.'),
            'render_template'   => 'template-parts/blocks/column3_post.php',
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}
// Add Options page for global potions
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page();
}
if (function_exists('acf_set_options_page_menu')){
acf_set_options_page_menu('Footer');
}
if( function_exists('acf_set_options_page_title') ) {
    acf_set_options_page_title( __('Footer') );
}









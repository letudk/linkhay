<?php 
/**
 * Funciton
 */
 
/**
 * Remove js not using
 */
require_once(get_template_directory() .'/inc/customize.php');
require_once(get_template_directory() .'/inc/categories_menu.php');

/**
 * Enqueue scripts and styles
 */

function theme_enqueue_scripts() {
    // all styles
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(), 6 );
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/all.css', array(), 5 );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css', array(), 6 );
    // all scripts
    wp_register_script('theme-script', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery') );
    wp_enqueue_script('theme-script');
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery') );
    wp_enqueue_script('bootstrap');
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
// # Remove Wp-Embed
function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );
# Remove EditURI
remove_action ('wp_head', 'rsd_link');
# Remove wlwmanifest link
remove_action( 'wp_head', 'wlwmanifest_link');
#Remove api.w.org relation link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
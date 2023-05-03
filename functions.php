<?php 
/**
 * Funciton
 */
 
require_once(get_template_directory() .'/inc/customize.php');
require_once(get_template_directory() .'/inc/categories_menu.php');
// require_once(get_template_directory() .'/inc/project.php');
require get_template_directory() . '/inc/project.php';

// kích hoạt trình soạn thảo cũ
add_filter('use_block_editor_for_post', '__return_false');
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
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') );
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

// Khởi chạy chức năng tối ưu hoá cho website-------------
// Remove jquery-migrate
function remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
    if ( $script->deps ) { 
        $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
    }
    }
    }
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

// add support thumbnail
add_theme_support('post-thumbnails');
add_post_type_support( 'project', 'thumbnail' );    
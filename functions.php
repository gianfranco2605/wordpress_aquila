<!-- Wordpress include this file automatically -->
<?php
/**
 * Theme Functions 
 * 
 * @packge Aquila
*/

use AQUILA_THEME\Inc\AQUILA_THEME;

if( ! defined( 'AQUILA_DIR_PATH' ) ) {
    // untrailingslashit remove the slash to ensures uniformity
    define( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

function aquila_get_theme_instance() {

    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();

}

aquila_get_theme_instance();

// style scripts
function aquila_enqueue_scripts() {
 
    // filemtime() is a function for versions in file changes
    // Enqueue Styles
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );

    wp_enqueue_style( 'bootstrap-css' , get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

    // Enqueue Scripts
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js' ), true );

    wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true );
    // OR
    // wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );
    // wp_enqueue_style( 'style-css' );
//     wp_register_script( 'main-js', AQUILA_DIR_URI . '/assets/main.js', ['jquery'], filemtime( AQUILA_DIR_PATH . '/assets/main.js' ), true );
//     wp_enqueue_script( 'main-js' );
//
}

add_action( "wp_enqueue_scripts", "aquila_enqueue_scripts" );

?>
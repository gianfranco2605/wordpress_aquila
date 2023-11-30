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

if( ! defined( 'AQUILA_DIR_URI' ) ) {
    // untrailingslashit remove the slash to ensures uniformity
    define( 'AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once AQUILA_DIR_PATH . '/inc/helpers/template-tags.php';

function aquila_get_theme_instance() {

    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();

}

aquila_get_theme_instance();

?>
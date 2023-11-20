<!-- Wordpress include this file automatically -->
<?php
/**
 * Theme Functions 
 * 
 * @packge Aquila
*/

// style scripts
function aquila_enqueue_scripts() {
 
    // filemtime() is a function for versions in file changes
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );

    wp_enqueue_script( 'main-js',get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '//assets/main.js' ), 'true' );

    // OR

    // wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );
    // wp_enqueue_style( 'style-css' );
//     wp_register_script( 'main-js', AQUILA_DIR_URI . '/assets/main.js', ['jquery'], filemtime( AQUILA_DIR_PATH . '/assets/main.js' ), true );
//     wp_enqueue_script( 'main-js' );
// 
}

add_action( "wp_enqueue_scripts", "aquila_enqueue_scripts" );

?>
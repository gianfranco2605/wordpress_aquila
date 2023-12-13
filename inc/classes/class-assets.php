<?php
/**
 * Enqueue theme assets
 * 
 * @package Aquila
*/
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets  {
    // Singleton to insure just one instance
    use Singleton;

    protected function __construct() {

        // //load class
        $this->setup_hooks();

    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( "wp_enqueue_scripts", [$this, "register_styles"] );
        add_action( "wp_enqueue_scripts", [$this, "register_scripts"] );
    }

    public function register_styles() {
        // filemtime() is a function for versions in file changes
    // Enqueue Styles
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );

    wp_enqueue_style( 'bootstrap-css' , get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

    }

    public function register_scripts() {
        // Enqueue Scripts
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js' ), true );
        wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true );
    // OR
    // wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );
    // wp_enqueue_style( 'style-css' );
    // wp_register_script( 'main-js', AQUILA_DIR_URI . '/assets/main.js', ['jquery'], filemtime( AQUILA_DIR_PATH . '/assets/main.js' ), true );
   // wp_enqueue_script( 'main-js' );
    }
}
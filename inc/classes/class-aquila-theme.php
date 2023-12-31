<?php
/**
 * Bootsrap the Theme 
 * 
 * @package Aquila
*/
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    // trait-singleton fie to insure not to instance double classes
    use Singleton;

    protected function __construct() {

        // //load class
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Block_Patterns::get_instance();
        Blocks::get_instance();
        Loadmore_Posts::get_instance();
        Loadmore_Single::get_instance();
        Register_Post_Types::get_instance();
        Register_Taxonomies::get_instance();
        

        $this->setup_hooks();

    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() {
        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true,
        ) );
        
        add_theme_support( 'custom-background', [
            'default-color'          => '#6f42c1',
            'default-image'          => '',
        ]);
        // feature image
        add_theme_support( 'post-thumbnails' );

        // for widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // for posts
        add_theme_support( 'automatic-feed-links' );

        // for valid html
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'gallery',
            'caption',
            'script',
            'style',
        ] );

        // gutenberg-styles
        add_theme_support( 'wp-block-styles' );

        // add options in the backend block gutenber wide-width and full-width
        add_theme_support( 'align-wide' );

        add_theme_support( 'editor-styles' );

          // for dynamite editor
        add_editor_style('assets/build/css/editor.css');

        // Register images sizes
        add_image_size( 'feature-thumbnail', 350, 233, true ); // true-> crop image

        // remove the core block patterns 
        remove_theme_support( 'core-block-patterns' );

        // width in front end
        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 1240;
        }

    }

}
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
        add_action( "enqueue_block_assets", [$this, "enqueue_editor_assets_front_end"] );
		add_action( "enqueue_block_editor_assets", [$this, "enqueue_editor_assets_back_end"] );
        
    }

    public function register_styles() {
        // filemtime() is a function for versions in file changes
    // Enqueue Styles
    wp_enqueue_style( 'bootstrap-css' , AQUILA_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false, 'all' );
	//Slick slider
	wp_enqueue_style( 'slick-css' , AQUILA_BUILD_LIB_URI . '/css/slick.css', [], false, 'all' );
	wp_enqueue_style( 'slick-theme-css' , AQUILA_BUILD_LIB_URI . '/css/slick-theme.css', ['slick-css'], false, 'all' );
    // sass 
    wp_enqueue_style( 'main-css', AQUILA_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime( AQUILA_BUILD_CSS_DIR_PATH . '/main.css' ), 'all' );
    
}

    public function register_scripts() {
        // Enqueue Scripts
		wp_enqueue_script( 'slick.js', AQUILA_BUILD_LIB_URI . '/js/slick.min.js', ['jquery'], false, true );
        wp_enqueue_script( 'main-js', AQUILA_BUILD_JS_URI . '/main.js', ['jquery', 'slick.js'], filemtime( AQUILA_BUILD_JS_DIR_PATH . '/main.js' ), true );
        wp_enqueue_script( 'bootstrap.js', AQUILA_BUILD_LIB_URI . '/js/bootstrap.min.js', ['jquery'], false, true );

		/** OR
		*wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( AQUILA_DIR_PATH . '/style.css' ), 'all' );
		*wp_enqueue_style( 'style-css' );
		*wp_register_script( 'main-js', AQUILA_DIR_URI . '/assets/main.js', ['jquery'], filemtime( AQUILA_DIR_PATH . '/assets/main.js' ), true );
	    *wp_enqueue_script( 'main-js' );
		*/
		
		

		// loadmore script
		wp_localize_script( 'main-js', 'siteConfig', [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'loadmore_post_nonce' )
		] ); 
		
    }

    public function enqueue_editor_assets_back_end() {

		$asset_config_file = sprintf( '%s/assets.php', AQUILA_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = require_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : filemtime( $asset_config_file );

		// Theme Gutenberg blocks JS.
		if ( is_admin() ) {
			wp_enqueue_script(
				'aquila-blocks-js',
				AQUILA_BUILD_JS_URI . '/blocks.js',
				$js_dependencies,
				$version,
				true
			);
		}

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'aquila-blocks-css',
			AQUILA_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			filemtime( AQUILA_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);

	}

	public function enqueue_editor_assets_front_end() {

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'aquila-blocks-css',
			AQUILA_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			filemtime( AQUILA_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);
	}
}


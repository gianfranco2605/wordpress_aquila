<?php
/**
 * Register Meta Boxes
 * 
 * @package Aquila
*/
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Meta_Boxes  {
    // Singleton to insure just one intance
    use Singleton;

    protected function __construct() {

        // //load class
        $this->setup_hooks();

    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );

    }

    public function add_custom_meta_box() {

        $screens = [ 'post', 'page' ];

        foreach ( $screens as $screen ) {
            add_meta_box( 
                'hide_page_title',                  //Unique Id
                __( 'Hide page title', 'aquila'),   //Box Title
                [ $this, 'custom_meta_box_html' ],  //Content callback, must be of type callable
                $screen,                             //Post type
                'side',
                'high'

            );
        } 
    }

    public function custom_meta_box_html( $post ) {

        $value = get_post_meta( $post->ID, 'Hide Page Title', true );

        ?>

        <label for="aquila-field"><?php esc_html_e( 'Hide Page Title', 'aquila' ) ?></label>

        <select name="aquila_field" id="aquila-field" class="postbox">

            <option value=""><?php esc_html_e( 'Select', 'aquila' ) ?></option>
            <option value="yes" <?php selected( $value, 'yes' ) ?>>
                <?php esc_html_e( 'Yes', 'aquila' ) ?>
            </option>
            <option value="no" <?php selected( $value, 'No' ) ?>>
                <?php esc_html_e( 'No', 'aquila' ) ?>
            </option>

        </select>
        <?php
    }

}
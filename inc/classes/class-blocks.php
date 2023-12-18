<?php
/**
 * Blocks 
 * 
 * @package Aquila
*/
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Blocks  {
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
        // Hook for regiter block category
        add_action( 'block_categories', [ $this, 'add_block_categories' ] );
    }

    public function add_block_categories( $categories ) {
        // categories from blocks by default
        $category_slugs = wp_list_pluck( $categories, 'slug' );
        // creating my own category
        return in_array( 'aquila', $category_slugs, true ) ?  $categories : 
                array_merge( $categories, [
                    [
                        'slug'  => 'aquila',
                        'title' => __( 'Aquila Blocks', 'aquila' ),
                        'icon'  => 'table-row-after'
                    ]
                ] );
    }

}
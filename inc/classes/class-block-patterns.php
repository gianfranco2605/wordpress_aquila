<?php
/**
 * Block Patterns
 * 
 * @package Aquila
*/
namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Block_Patterns  {
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
        add_action( 'init', [ $this, 'register_block_patterns' ] );
        add_action( 'init', [ $this, 'register_block_patterns_categories' ] );
    }

    public function register_block_patterns() {
        // wp_function
        if( function_exists( 'register_block_pattern' ) ) {

            $cover_content = $this->get_pattern_content('templates/patterns/cover');

            register_block_pattern(

                'aquila/two-columns', 
                [
                    'title'       => __( 'Aquila Two Columns', 'aquila' ),
                    'description' => __( 'Aquila Two Columns Block with image and text', 'aquila' ),
                    'categories'  => [ 'cover' ],
                    // heredoc syntax (<<<HTML ... HTML;)
                    'content'     => $cover_content,
                ]

                );

            $cover_content = $this->get_pattern_content('templates/patterns/two-columns');

            register_block_pattern(

                'aquila/cover', 
                [
                    'title'       => __( 'Aquila Cover', 'aquila' ),
                    'description' => __( 'Aquila Cover Block with image and text', 'aquila' ),
                    'categories'  => [ 'two-columns' ],
                    // heredoc syntax (<<<HTML ... HTML;)
                    'content'     => $cover_content,
                ]

                );
        }

    }

    public function get_pattern_content( $template_path ) {

            ob_start();

            get_template_part( $template_path );

            $pattern_content = ob_get_contents();

            ob_end_clean();

            return $pattern_content;

    }

    public function register_block_patterns_categories() {

        $pattern_categories = [
            'cover'    => __( 'Cover', 'aquila' ),
            'two-columns'    => __( 'Two Columns', 'aquila' ),
            'carousel' => __( 'Carousel', 'aquila' )
        ];

        if ( ! empty( $pattern_categories ) && is_array( $pattern_categories ) ) {

            foreach( $pattern_categories as $pattern_category => $pattern_category_label ) {

                register_block_pattern_category(
                    $pattern_category, 
                    [
                        'label' => $pattern_category_label
                    ]
                );
            }
        }
        
    }

}
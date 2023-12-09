<?php
/**
 * Template for entry header file
 * 
 * @package aquila
*/

$the_post_id = get_the_ID();
$hide_title = get_post_meta( $the_post_id, '_hide_page_title', true );
//post meta title 
$heading_class = ! empty( $hide_title ) && 'yes' === $hide_title ? 'hide' : '';


$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );

?>

<header class="entry-header">

    <?php
    //Feature Image
    if ( $has_post_thumbnail ) {

        ?>

        <div class="entry-image mb-3">

            <a href="<?php echo esc_url( get_the_permalink() ); ?>">

            <?php

            the_post_custom_thumbnail( 

                $the_post_id, 
                'feature-thumbnail', 
                [
                    'size' => '(max-width: 350px) 350px, 233px',
                    'class' => 'attachment-featured-large size-feature-image'
                ]

            )

            ?>

            </a>

        </div>

        <?php

    }

    //Printing the title 
    if ( is_single() || is_page() ) {

        printf(
            '<h1 class="page-title text-dark" %1$s>%2$s</h1>',
            esc_attr( $heading_class ),
            wp_kses_post( get_the_title() )

        );

    } else {
        
        printf(
            '<h2 class="entry-title mb-3"><a class="text-success" href="%1$s">%2$s</a></h2>',
            esc_url( get_the_permalink() ),
            wp_kses_post( get_the_title() )
        );

    }

    ?>

</header>
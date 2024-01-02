<?php
/**
 * Template Slick Carousel
 * 
 * @package aquila
*/

$args = [
    'posts_per_page'         => 10,
    'post_type'              => 'post',
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
];

$post_query = new \WP_Query( $args );

?>

<div class="posts-carousel">
    <!-- 1-slide -->
        <?php
            if( $post_query->have_posts() ) {
                while ( $post_query->have_posts() ) :
                    $post_query->the_post();
                    ?>
                    <div class="card">
                        <?php
                            if( has_post_thumbnail() ) {
                                the_post_custom_thumbnail(
                                    get_the_ID(),
                                    'featured-thumbnail',
                                    [
                                        'sizes' => '(max-width: 350px) 350px, 33px',
                                        'class' => 'w-100 '
                                    ]
                                    );
                                    ?>
                                    <?php

                            } else {
                                ?>
                                <img src="https://picsum.photos/200/300" alt="">

                                <?php
                            }

                        ?>

                        <div class="card-body">

                            <?php the_title( '<h3 class="card-title">', '</h3>' ) ?>

                            <?php aquila_the_excerpt() ?>

                            <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                                
                                <?php  esc_html_e( 'View More', 'aquila' ) ?>
                            </a>

                        </div>

                    </div>

                    <?php

                endwhile;    

            }

            wp_reset_postdata();
        ?>
    
</div>
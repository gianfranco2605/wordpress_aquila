<?php
/**
 * Single Post Template file
 * 
 * @package aquila
*/

get_header();
?>

<div id="primary">

    <main id="main" class="site-main mt-5" role="main">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-12">

                    <?php

                    if ( have_posts() ) :
                        if( is_home() && ! is_front_page() ) :
                    ?>
                        <header class="mb-5">
                            <h1 class="page-title">
                                <?php single_post_title(); ?>
                            </h1>
                        </header>
                    <?php

                        endif;

                        while ( have_posts() ) : the_post();
                            get_template_part( 'templates/content' );
                        endwhile;

                    endif; // End have_posts()
                    ?>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <!-- getting the template sidebar.php -->
                    <?php get_sidebar();?>
                </div>

            </div>

            <!-- loadmore shortcode -->
            <?php
                echo do_shortcode( '[single_post_listings]' );
                ?>

        </div>

    </main>

    <div class="container">

        <?php
            previous_post_link();
            next_post_link();
            get_template_part( 'templates/content-none' );
        ?>

    </div>

</div>

<?php

get_footer();

?>

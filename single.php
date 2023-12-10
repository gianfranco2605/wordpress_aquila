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

    <?php
        if ( have_posts() ) :

            ?>
            
            <div class="container">

                <?php
                    // check if i'm in the homepage but not in the front-page
                    if( is_home() && ! is_front_page() ) {

                        ?>

                        <header class="mb-5">

                            <h1 class="page-title">

                                <?php single_post_title(); ?>

                            </h1>

                        </header>

                        <?php
                    }

                    while ( have_posts() ) : the_post();


                            get_template_part( 'templates/content' );

                        ?>    

                        </div>


                            </div>

                            <?php

                    endwhile;

                    ?>

            </div>

            <?php

        else : 
            
        get_template_part( 'templates/content-none' );

        endif;

        get_template_part( 'templates/content-none' );

    ?>

    </main>

</div>

<?php

get_footer(); 


<?php
/**
 * Main Template file
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

                    // <!-- Variables for the columns -->
                    $index = 0;
                    $num_of_columns = 3;

                    while ( have_posts() ) : the_post();

                        if ( 0 === $index % $num_of_columns ) {

                            ?>

                            <div class="row">

                            <?php
                        }

                        ?>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            
                        <?php

                            get_template_part( 'templates/content' );

                        ?>    

                        </div>
                           

                        <?php

                        $index++;

                        if ( 0 !== $index && 0 ===  $index % $num_of_columns) {

                            ?>

                            </div>

                            <?php

                        }

                    endwhile;

                    ?>

            </div>

            <?php

        else : 
            
            get_template_part( 'templates/content-none' );
            

        endif;
        
        

        get_template_part( 'templates/content-none' );
        // aquila_pagination(); Not working deprecated??
    ?>

    </main>

</div>

<?php

get_footer(); 


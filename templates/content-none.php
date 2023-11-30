<?php
/**
 * Message post not found Template file
 * 
 * @package aquila
*/

?>

<section class="no-result not-found">

    <header class="page-header">

        <h1 class="page-title"><?php esc_html( 'Nothing Found', 'aquila' ) ?></h1>

    </header>

    <div class="page-content">

        <?php

        if ( is_home() && current_user_can( 'publish_posts' ) ) {

            ?>

                <h2>

            <?php

                printf(

                    wp_kses(

                        __( 'Ready to publish your first post? <a href="%s">Get Started Here</a>', 'aquila' ),

                        [
                            'a' => [
                                'href' => []
                            ]
                        ]

                            ),

                            esc_url( admin_url( 'post-new.php' ) )

                        );

            ?>
                </h2>

            <?php      

        } elseif ( is_search() ) {
            ?>
            <p><?php esc_html_e( 'Sorry but nothing matched your search item', 'aquila' ) ?></p>
            <?php
            get_search_form();

        } else {
            ?>
            <p><?php esc_html_e( 'Sorry we cannot find what you are looking for' ) ?></p>
            <?php
            get_search_form();
        }

        ?>

    </div>

</section>
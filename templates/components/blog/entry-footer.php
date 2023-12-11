<?php
/**
 * Template for entry footer
 * 
 * To be used inside the Wordpress the Loop 
 * 
 * @package aquila
*/

$the_post_id = get_the_id();
$article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );
// echo '<pre>';
// print_r( $article_terms );
// wp_die();

if ( empty( $article_terms ) || !is_array( $article_terms ) ) {
    return;
};

?>

<div class="entry-footer mt-4">

    <?php

        foreach( $article_terms as $key => $article_term ) {

            ?>

                <button class="btn border border-secondary nb-2 mr-2">

                    <a class="entry-footer-link text-black-50" href="<?php echo esc_url( get_term_link( $article_term ) ) ?>">
                        <?php echo esc_html( $article_term->name ); ?>
                    </a>

                </button>

            <?php

        }
    ?>

</div>
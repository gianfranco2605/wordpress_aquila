<?php
/**
 * Content Template file
 * 
 * @package aquila
*/

?>

<!-- prefix with the_ = echo outs
prefix with get_ = return something -->
<article id="post-<?php the_ID(); ?>" <? post_class( 'mb-5' ) ?>>

    <?php

    get_template_part( 'templates/components/blog/entry-header' );

    get_template_part( 'templates/components/blog/entry-meta' );

    get_template_part( 'templates/components/blog/entry-content' );

    get_template_part( 'templates/components/blog/entry-footer' );

    ?>

</article>
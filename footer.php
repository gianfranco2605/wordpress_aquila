<?php
/**
 * Footer Template
 * 
 * @package Aquila
*/
?>
            <footer class="p-3">

                <div class="container color-gray">

                    <div class="row gx-5">

                        <section class="col-lg-4 col-md-6 col-sm-12">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores voluptate, eaque ratione cupiditate mollitia, cum totam animi blanditiis ut deserunt neque culpa facilis rerum, officia in autem sequi dicta eius deleniti amet! Tempore adipisci consectetur, nesciunt in corporis quis accusantium et inventore sint magnam cum assumenda, quia autem, quaerat eveniet.
                        </section>

                        <section class="col-lg-4 col-md-6 col-sm-12">

                            <?php
                                if ( is_active_sidebar( 'sidebar-2' ) ) {

                                    dynamic_sidebar( 'sidebar-2' );
                                }
                            ?>

                        </section>

                        <section class="col-lg-4 col-md-6 col-sm-12">

                            <!-- svg templates -->
                            <ul class="d-flex">
                                <li class="list-unstyled">
                                    <a href="#" title="facebook">
                                        <svg width="48"><use href="#icon-facebook"></use></svg>
                                    </a>
                                </li>
                                <li class="list-unstyled">
                                    <a href="#" title="twitter">
                                        <svg width="48" ><use href="#icon-twitter"></use></svg>
                                    </a>
                                </li>
                                <li class="list-unstyled">
                                    <a href="#" title="linkedin">
                                        <svg width="48" ><use href="#icon-linkedin"></use></svg>
                                    </a>
                                </li>
                            </ul>

                        </section>

                    </div>

                </div>

            </footer>

        </div>
        
    </div>
<?php get_template_part( 'templates/content', 'svgs' ) ?>
<?php wp_footer(); ?>

</body>

</html>
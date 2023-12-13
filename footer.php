<?php
/**
 * Footer Template
 * 
 * @package Aquila
*/
?>

            <footer class="bg-info p-3">
                
                <div class="container ">

                    <?php
                        if ( is_active_sidebar( 'sidebar-2' ) ) {

                            dynamic_sidebar( 'sidebar-2' );
                        }
                    ?>

                </div>

            </footer>

        </div>
        
    </div>

<?php wp_footer(); ?>

</body>

</html>
<?php
/**
 * Custom Search Form
*/

?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>" class="form-inline my-2 my-lg-0">

<input class="form-control mr-sm-2" type="search" placeholder=<?php echo esc_attr_x( 'Search', 'placeholder', 'aquila' ); ?> value="<?php the_search_query(); ?>" aria-label="Search" name="s">

<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo esc_attr_x( 'Search', 'submit button', 'aquila' ); ?></button>

</form>
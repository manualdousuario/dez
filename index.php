<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */
if ( !defined( 'ABSPATH' ) ) exit; /* Previne acessos diretos ao tema que disparam um erro fatal: https://stackoverflow.com/questions/47877136/call-to-undefined-wordpress-function-get-header-errors-but-header-is-still-di */
get_header();
?>

<main id="primary" class="site-main">

	<?php
	$count = 0;
	if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		if ( ! is_paged() && 0 == $count ) :
			?>
				<?php if ( shortcode_exists( 'hf_form' ) ) {
					echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
				} ?>
		<?php
		
		elseif ( 3 == $count && shortcode_exists( 'sc' ) ) :
				echo do_shortcode( '[sc name="buttondown-newsletters"][/sc]' );
		endif;

	$count++;

endwhile;

the_posts_navigation( array( 'class' => 'link-alt', ) );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #main -->

<?php
get_footer();

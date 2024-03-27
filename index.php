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

get_header();
?>

<main id="primary" class="site-main">

	<?php
	$count = 0;
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
		<header>
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
		<?php
	endif;

	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		if ( ! is_paged() && 1 == $count ) :
			?>
			<div class="orbita-manual">
				<h2>Destaques do Órbita</h2>
				<?php echo do_shortcode( '[orbita-ranking comment-points="1" vote-points="3" days="10" limit="5"]' ); ?>
				<footer class="entry-footer">
					<a href="/orbita/">Todas as conversas &raquo;</a>
				</footer>
			</div>
		</div>
		<?php
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

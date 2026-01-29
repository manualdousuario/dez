<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dez
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_format() );

		$currentlang = get_bloginfo( 'language' );

		if ( ( ! is_paged() && $count == 0 ) && $currentlang == 'pt-BR' ) :
			echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
		elseif ( ( ! is_paged() && $count == 0 ) && $currentlang == 'en-US' ) :
			echo do_shortcode( '[sc name="newsletter-post-en"][/sc]' );
		endif;

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.

	if ( shortcode_exists( 'sc' ) && $currentlang == 'pt-BR' ) :
		echo do_shortcode( '[sc name="box-promocoes"][/sc]' ); 
	endif; ?>
</main><!-- #main -->

	<?php
	get_footer();

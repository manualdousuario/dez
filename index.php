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
get_header(); ?>

<main id="primary" class="site-main">

	<?php	
	$count = 0;
	if ( have_posts() ) :

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_format() );


			$currentlang = get_bloginfo( 'language' );

			if ( ( ! is_paged() && $count == 0 ) && $currentlang == 'pt-BR' ) :
				echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
			elseif ( ( ! is_paged() && $count == 0 ) && $currentlang == 'en-US' ) :
				echo do_shortcode( '[sc name="newsletter-post-en"][/sc]' );
			endif;

			$count++;

		endwhile;

		the_posts_navigation( array( 
			'prev_text' => 'Antigos &raquo;',
			'next_text' => '&laquo; Recentes',
		) );

		if ( shortcode_exists( 'sc' ) && $currentlang == 'pt-BR' ) :
			echo do_shortcode( '[sc name="box-promocoes"][/sc]' ); 
		endif;
		
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</main><!-- #main -->

<?php
get_footer();
?>
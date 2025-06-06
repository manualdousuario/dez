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
	// Variável para controlar se já exibimos o primeiro post de "links-do-dia"
	$primeiro_links_do_dia_exibido = false;
	
	$count = 0;
	if ( have_posts() ) :

		while ( have_posts() ) :
			the_post();

			// Verifica se é um post da tag "links-do-dia"
			if ( has_tag('links-do-dia') ) :
				// Se ainda não exibimos o primeiro post de "links-do-dia", exibe
				if ( ! $primeiro_links_do_dia_exibido && is_home() && ! is_paged() ) :
					$primeiro_links_do_dia_exibido = true;
				
				get_template_part( 'template-parts/content', get_post_type() );				
			endif;
				// Se não é o primeiro, pula este post (não exibe)
		else :
				// Posts normais (sem a tag "links-do-dia")
			get_template_part( 'template-parts/content', get_post_type() );
		endif;

		$currentlang = get_bloginfo( 'language' );

		if ( ( ! is_paged() && $count == 0 ) && $currentlang == 'pt-BR' ) :
			echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
		elseif ( ( ! is_paged() && $count == 0 ) && $currentlang == 'en-US' ) :
			echo do_shortcode( '[sc name="newsletter-post-en"][/sc]' ); 
		endif;

		$count++;

	endwhile;

	the_posts_navigation( array( 
		'class' => 'link-alt',
	) );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #main -->

<?php
get_footer();
?>
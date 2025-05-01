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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Previne acessos diretos ao tema
}

get_header();

// Verifica o idioma atual uma única vez
$current_lang = get_bloginfo( 'language' );
$newsletter_shortcode = ( 'pt-BR' === $current_lang ) ? 'newsletter-post' : 'newsletter-post-en';
?>

<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Conteúdo Principal', 'dez' ); ?>">
	<?php
	$count = 0;
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// Exibe o shortcode da newsletter apenas na primeira página e no primeiro post
			if ( ! is_paged() && 0 === $count ) {
				echo do_shortcode( "[sc name=\"{$newsletter_shortcode}\"][/sc]" );
			}

			$count++;
		endwhile;

		// Navegação entre posts
		the_posts_navigation( array(
			'prev_text' => esc_html__( 'Página anterior', 'dez' ),
			'next_text' => esc_html__( 'Próxima página', 'dez' ),
			'screen_reader_text' => esc_html__( 'Navegação entre posts', 'dez' ),
			'class' => 'link-alt',
		) );

	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</main><!-- #primary -->

<?php
get_footer();

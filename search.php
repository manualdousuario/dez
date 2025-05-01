<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Conteúdo principal', 'dez' ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados da pesquisa por: %s', 'dez' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation( array(
				'prev_text' => esc_html__( 'Página anterior', 'dez' ),
				'next_text' => esc_html__( 'Próxima página', 'dez' ),
				'screen_reader_text' => esc_html__( 'Navegação entre posts', 'dez' ),
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();

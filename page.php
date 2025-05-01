<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Conteúdo principal', 'dez' ); ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			/**
			 * Inclui o template part específico para páginas
			 * Se você quiser sobrescrever isso em um tema filho, crie um arquivo
			 * chamado content-page.php e ele será usado no lugar deste.
			 */
			get_template_part( 'template-parts/content', 'page' );

			// Se os comentários estiverem abertos ou houver comentários, carrega o template de comentários
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();

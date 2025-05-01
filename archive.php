<?php
/**
 * Template para exibir páginas de arquivo
 *
 * Este template é usado para exibir páginas de arquivo, como categorias,
 * tags, autores, datas e tipos de post personalizados.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Conteúdo do Arquivo', 'dez' ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Início do Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Inclui o template part específico para o tipo de post
				 * Se você quiser sobrescrever isso em um tema filho, crie um arquivo
				 * chamado content-___.php (onde ___ é o nome do Post Type) e ele será usado no lugar deste.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			// Navegação entre posts
			the_posts_navigation( array(
				'prev_text' => esc_html__( 'Página anterior', 'dez' ),
				'next_text' => esc_html__( 'Próxima página', 'dez' ),
				'screen_reader_text' => esc_html__( 'Navegação entre posts', 'dez' ),
			) );

		else :

			// Se não houver posts, exibe o template de "nenhum resultado"
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();

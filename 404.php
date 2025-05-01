<?php
/**
 * Template para exibir a página de erro 404
 *
 * Este template é exibido quando o WordPress não consegue encontrar
 * o conteúdo solicitado.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Página de Erro 404', 'dez' ); ?>">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Página não encontrada', 'dez' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Parece que nada foi encontrado neste local. Talvez tente uma busca?', 'dez' ); ?></p>

					<?php
				get_search_form(
					array(
						'aria_label' => esc_attr__( 'Buscar no site', 'dez' ),
					)
				);
				?>

				<div class="error-404-links">
					<h2><?php esc_html_e( 'Navegação rápida', 'dez' ); ?></h2>
					<ul>
						<li>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php esc_html_e( 'Página inicial', 'dez' ); ?>
							</a>
						</li>
						<li>
							<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
								<?php esc_html_e( 'Blog', 'dez' ); ?>
							</a>
						</li>
					</ul>
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #primary -->

<?php
get_footer();

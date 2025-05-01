<?php
/**
 * Template para exibir a página de arquivo do blog
 *
 * Este template exibe uma visão geral do blog com seções, arquivos por data
 * e nuvem de tags. É uma variação específica para páginas de arquivo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Arquivo do Blog', 'dez' ); ?>">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title">
					<?php
					/* translators: %s: Nome do blog */
					printf( esc_html__( 'Mapa do %s', 'dez' ), '<strong>' . esc_html( get_bloginfo( 'name' ) ) . '</strong>' );
					?>
				</h1>
			</header><!-- .entry-header -->

			<div class="entry-content archive-content">
				<p class="archive-description">
					<?php
					/* translators: %1$s: Data de início, %2$s: Nome do blog */
					printf(
						esc_html__( 'No ar desde %1$s, o %2$s já publicou milhares de posts. Abaixo, há alguns filtros para te ajudar a encontrar algo ou apenas navegar no nosso histórico.', 'dez' ),
						'15 de outubro de 2013',
						'<strong>' . esc_html( get_bloginfo( 'name' ) ) . '</strong>'
					);
					?>
				</p>

				<div class="archive-sections">
					<section class="archive-categories">
						<h2><?php esc_html_e( 'Seções', 'dez' ); ?></h2>
						<ul class="category-list">
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
									'show_count' => true,
							'title_li'   => '',
							'number'     => 0,
									'echo'       => true,
						)
					);
					?>
				</ul>
					</section>

					<section class="archive-dates">
						<h2><?php esc_html_e( 'Por datas', 'dez' ); ?></h2>
						<ul class="archive-list">
					<?php
							wp_get_archives(
								array(
						'type'            => 'yearly',
						'limit'           => '',
						'format'          => 'html',
						'before'          => '',
						'after'           => '',
									'show_post_count' => true,
									'echo'            => true,
						'order'           => 'DESC',
						'post_type'       => 'post',
								)
					);
					?>
				</ul>

						<h2><?php esc_html_e( 'Assuntos populares', 'dez' ); ?></h2>
						<div class="tag-cloud">
				<?php
				wp_tag_cloud(
					array(
						'smallest' => 12,
						'largest'  => 32,
						'unit'     => 'px',
						'number'   => 30,
						'orderby'  => 'name',
						'order'    => 'ASC',
						'taxonomy' => 'post_tag',
									'echo'     => true,
					)
				);
				?>
						</div>
					</section>
				</div>

			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->

	</main><!-- #primary -->

<?php
get_footer();

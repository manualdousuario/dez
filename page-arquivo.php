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

<main id="primary" class="site-main">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1>Mapa do <strong>Manual do Usuário</strong></h1>
		</header><!-- .entry-header -->

		<div class="e-content" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
			<p style="flex-basis: 100%">No ar desde 15 de outubro de 2013, o <strong>Manual do Usuário</strong> já publicou milhares de posts. Abaixo, há alguns filtros para te ajudar a encontrar algo ou apenas navegar no nosso histórico.</p>

			<div style="flex-basis: 1005">
				<h2>Assuntos populares</h2>
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
					)
				);
				?>
			</div>
			<div style="flex-basis: 50%"><h2>Seções</h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 0,
						)
					);
					?>
				</ul>
			</div>

			<div style="flex-basis: 50%;">
				<h2>Por datas</h2>
				<ul style="margin-bottom: var(--med-salto-medio);">
					<?php
					$args = array(
						'type'            => 'yearly',
						'limit'           => '',
						'format'          => 'html',
						'before'          => '',
						'after'           => '',
						'show_post_count' => 1,
						'echo'            => 1,
						'order'           => 'DESC',
						'post_type'       => 'post',
					);
					wp_get_archives( $args );
					?>
				</ul>
			</div>

		</div><!-- .page-content -->

	</article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php
get_footer();

<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="entry-header">
				<h1 class="entry-title">Ops, algo deu errado ☹️</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>A página que você tentou acessar não existe ou foi apagada. Que tal tentar uma pesquisa?</p>

					<?php
					get_search_form();
					?>

				<p>Ou então dê uma olhada no <a href="/arquivo/">mapa do site</a> ou retorne à <a href="/">página inicial</a>.</p>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();

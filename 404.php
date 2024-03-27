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
				<h1 class="entry-title">Ops, algo deu errado…</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>A página que você tentou acessar não existe, foi excluída ou está em outro lugar. Use a pesquisa para tentar encontrá-la:</p>

					<?php
					get_search_form();
					?>

				<p>Se preferir, dê uma olhada no <a href="/arquivo/">mapa do site</a> ou retorne à <a href="/">página inicial</a>.</p>

				<p>Acredita ter se deparado com um erro? <a href="mailto:ghedin@manualdousuario.net">Mande um e-mail</a> (e obrigado!).

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();

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
			<?php $currentlang = get_bloginfo( 'language' );
			if ( $currentlang == 'pt-BR' ) { ?>
				<header class="entry-header">
					<h1 class="p-name">Ops, algo deu errado…</h1>
				</header><!-- .entry-header -->

				<div class="e-content">
					<p>A página que você tentou acessar não existe, foi excluída ou está em outro lugar. Use a pesquisa para tentar encontrá-la:</p>

					<?php get_search_form(); ?>

					<p>Se preferir, dê uma olhada no <a href="/arquivo/">mapa do site</a> ou retorne à <a href="/">página inicial</a>.</p>

					<p>Acredita ter se deparado com um erro? <a href="mailto:ghedin@manualdousuario.net">Mande um e-mail</a> (e obrigado!).</p>
				</div>
			<?php } else { ?>
				<header class="entry-header">
					<h1 class="p-name">Whoops — something went wrong…</h1>
				</header><!-- .entry-header -->

				<div class="e-content">
					<p>The page you tried to access doesn't exist, has been deleted, or has moved. Try searching for it:</p>

					<?php get_search_form(); ?>

					<p>If you prefer, check the <a href="/arquivo/">site map</a> or return to the <a href="/">home page</a>.</p>

					<p>Think this is an error? <a href="mailto:ghedin@manualdousuario.net">Send an email</a> (and thanks!).</p>
				</div>
			<?php } ?>


		</section><!-- .error-404 -->

	</main><!-- #main -->

	<?php
	get_footer();

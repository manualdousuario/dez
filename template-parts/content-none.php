<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<section class="no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title">Sem resultados 🤔</h1>
	</header><!-- .page-header -->

	<div class="entry-content">
		<?php
		if ( is_search() ) :
			?>

			<p>O termo que você pesquisou não existe no arquivo do <strong>Manual do Usuário</strong>. Quer tentar outra vez?</p>
			<?php else : ?>

			<p>A página que você tentou acessar não existe ou foi apagada. Que tal tentar uma pesquisa?</p>

		<?php endif; ?>
			<p><?php get_search_form(); ?></p>
			<p>Ou então dê uma olhada no <a href="/arquivo/">mapa do site</a>.</p>
	</div><!-- .page-content -->
</section><!-- .no-results -->

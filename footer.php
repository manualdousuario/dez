<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dez
 */

?>

<footer id="colophon" class="site-footer">
	<nav class="footer-menu" role="navigation" aria-label="Menu do rodapé">
		<ul>
			<?php $currentlang = get_bloginfo( 'language' );
			if ( $currentlang == 'pt-BR' ) : ?>
				<li><a href="/sobre/">Sobre</a></li>
				<li><a href="/patrocine/">Patrocínio</a></li>
				<li><a rel="privacy-policy" href="/politica-de-privacidade/">Privacidade</a></li>
				<li><a href="mailto:ghedin@manualdousuario.net">Contato</a></li>
				<li class="lang-item"><a href="https://manualdousuario.net/en/" hreflang="en-US" lang="en-US">English</a></li>
			<? else : ?>
				<li><a href="/en/sponsorship/">Sponsorship</a></li>
				<li><a href="mailto:ghedin@manualdousuario.net">Contact</a></li>
				<li class="lang-item"><a href="https://manualdousuario.net/" hreflang="pt-BR" lang="pt-BR">Português</a></li>
			<? endif; ?>
		</ul>
	</nav>

	<div class="footer-credits">
		<?php get_search_form(); ?>
		<p><?php pll_e('Apoio'); ?>: <a href="https://buttondown.email/?utm_campaign=manual&amp;utm_source=footer">Buttondown</a></p>
		
		<p><?php pll_e('Associado à'); ?> <a href="https://ajor.org.br/">Ajor</a></p>
		
		<p>2013–<?php echo esc_html( gmdate( 'Y' ) ); ?>,&nbsp;<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br">CC BY-NC-SA 4.0</a></p>

		<p><a href="https://celere.dev"><img src="/wp-content/themes/dez/img/celere-badge-escuro.svg" alt="Otimizado por Célere" width="190" height="27" loading="lazy" /></a></p>
	</div>
</footer>

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
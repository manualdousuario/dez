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
	<p>Associado à <a href="https://ajor.org.br/">Ajor</a><br />
		Apoio: <a href="https://buttondown.email/?utm_campaign=manual&amp;utm_source=footer">Buttondown</a> &middot; <a href="https://www.teramundi.com/">Teramundi</a>
	</p>
	<p>
		<a href="mailto:ghedin@manualdousuario.net">Contato</a> &middot; <a href="/patrocine/">Patrocine</a> &middot; <a href="https://wordpress.com/pt-br/refer-a-friend/36MJNNnS0q22qAPWJwYA/">WordPress.com</a> &middot; <a href="https://manualdousuario.net/politica-de-privacidade/">Privacidade</a> &middot; <a href="https://app.pulsetic.com/status/zXGInCQ1">Status</a>
	</p>
	<p>
		2013–<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br">CC BY-NC-SA 4.0</a>
	</p>
	<p>
		<a id="dark-mode-toggle" name="dark-mode-toggle" alt="Alternar Tema (Claro ou Escuro)" title="Alternar Tema (Claro ou Escuro)" onClick="setDezTheme(event)"></a>
	</p>
</footer>
</div><!-- #page -->

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
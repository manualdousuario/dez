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
		<div class="site-footer-info">
			<h3>Institucional</h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/sobre' ) ); ?>">Sobre o Manual do Usuário</a></li>
				<li><a class="privacy-policy-link" href="/politica-de-privacidade/">Política&nbsp;de&nbsp;privacidade</a></li>
				<li><a href="mailto:contato@manualdousuario.net">Contato</a></li>
			</ul>
		</div>
		<div class="site-footer-projetos">
			<h3>Projetos</h3>
			<ul>
				<li><a href="https://pcdomanual.com">PC do Manual</a></li>
				<li><a href="https://notes.ghed.in/">Em inglês</a></li>
			</ul>
		</div>
		<div class="site-footer-apoios">
			<h3>Etc.</h3>
			<ul>
				<li>Associado à <a href="https://ajor.org.br">Ajor</a></li>
				<li>Apoio de <a href="https://www.teramundi.com/">Teramundi</a></li>
			</ul>
		</div>

		<div class="site-footer-footer">
			2013–<?php echo esc_html( gmdate( 'Y' ) ); ?>  — <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY-NC-SA 4.0</a><br />
			Hospedado por <a href="https://wordpress.com/pt-br/refer-a-friend/36MJNNnS0q22qAPWJwYA/">WordPress.com</a> &middot; <a href="https://status.manualdousuario.net">Status</a>
		</div>
	</footer>
</div><!-- #page -->

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>

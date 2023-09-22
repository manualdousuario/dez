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
		<div class="site-info">
			<p>Associado à <a href="https://ajor.org.br">Ajor</a> &middot; Apoio: <a href="https://www.teramundi.com/">Teramundi</a></p>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/sobre' ) ); ?>">Sobre</a></li>
				<li><a href="mailto:contato@manualdousuario.net">Contato</a></li>
				<li><a href="<?php echo esc_url( home_url( '/anuncie' ) ); ?>">Anuncie</a></li>
				<li><a class="privacy-policy-link" href="/politica-de-privacidade/">Política&nbsp;de&nbsp;privacidade</a></li>
			</ul>
			<p>Hospedado por <a href="https://wordpress.com/pt-br/refer-a-friend/36MJNNnS0q22qAPWJwYA/">WordPress.com</a><br>2013–<?php echo esc_html( gmdate( 'Y' ) ); ?>  — <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY-NC-SA 4.0</a></p>
			<p><a href="https://status.manualdousuario.net">Status</a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

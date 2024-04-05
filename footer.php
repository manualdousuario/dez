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
	<?php if ( ! is_404() ) :
		get_search_form(); 
	endif; ?>
	
	<p>
		<a href="mailto:ghedin@manualdousuario.net">Contato</a> &middot; <a href="/patrocine/">Patrocine</a></p>
		<p>Associado à <a href="https://ajor.org.br/">Ajor</a> &middot; Apoio de <a href="https://www.teramundi.com/">Teramundi</a><br />
		2013–<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br">CC BY-NC-SA 4.0</a>
	</p>
	<p>
		<a href="https://wordpress.com/pt-br/refer-a-friend/36MJNNnS0q22qAPWJwYA/">WordPress.com</a> &middot; <a href="https://manualdousuario.net/?koko-analytics-dashboard=1">Audiência</a> &middot; <a href="https://status.manualdousuario.net">Status</a>
	</p>
</footer>
</div><!-- #page -->

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
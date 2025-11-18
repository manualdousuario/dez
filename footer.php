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
	<div class="footer-credits">
		<?php	wp_nav_menu(
			array(
				'theme_location'	=> 'menu-rodape',
				'menu_id'					=> 'footer-links',
				'container'				=> 'false',
			)
		); ?>
		<p><?php pll_e('Associado à'); ?> <a href="https://ajor.org.br/">Ajor</a></p>
		<p><?php pll_e('Apoio'); ?>: <a href="https://buttondown.email/?utm_campaign=manual&amp;utm_source=footer">Buttondown</a></p>
		<p>2013–<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br">CC BY-NC-SA 4.0</a></p>
		<p><a href="https://celere.dev"><img src="/wp-content/themes/dez/img/celere-badge-escuro.svg" alt="Otimizado por Célere" width="190" height="27" loading="lazy" /></a></p>
	</div>

	<?php get_search_form(); ?>
</footer>

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
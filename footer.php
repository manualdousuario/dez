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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Previne acessos diretos ao tema
}
?>

<footer id="colophon" class="site-footer">
	<?php
	echo dez_get_cached_menu( 'menu-rodape' );
	?>
	<p><?php pll_e('Associado à'); ?> <a href="<?php echo esc_url( 'https://ajor.org.br/' ); ?>">Ajor</a></p>
	<p><?php pll_e('Apoio'); ?>: <a href="<?php echo esc_url( 'https://buttondown.email/?utm_campaign=manual&amp;utm_source=footer' ); ?>">Buttondown</a> &middot; <a href="<?php echo esc_url( 'https://www.teramundi.com/' ); ?>">Teramundi</a></p>
	<p>2013&ndash;<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="<?php echo esc_url( 'https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br' ); ?>">CC BY-NC-SA 4.0</a></p>
	<p><a href="<?php echo esc_url( 'https://celere.dev' ); ?>"><img src="<?php echo esc_url( '/wp-content/themes/dez/img/celere-badge-escuro.svg' ); ?>" alt="<?php esc_attr_e( 'Otimizado por Célere', 'dez' ); ?>" width="190" height="27" loading="lazy" /></a></p>
</footer>
</div><!-- #page -->

<a href="#" class="top" title="<?php esc_attr_e( 'Voltar ao topo', 'dez' ); ?>"></a>

<?php wp_footer(); ?>

</body>
</html>
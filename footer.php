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
	<div class="site-footer-creditos">
		<p>Associado à <a href="https://ajor.org.br/">Ajor</a><br />
			Apoio: <a href="https://buttondown.email/?utm_campaign=manual&amp;utm_source=footer">Buttondown</a> &middot; <a href="https://www.teramundi.com/">Teramundi</a>
		</p>
		<p>
			<a href="mailto:ghedin@manualdousuario.net">Contato</a> &middot; <a href="/patrocine/">Patrocine</a> &middot; <a href="https://manualdousuario.net/politica-de-privacidade/">Privacidade</a>
		</p>
		<p>
			2013–<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br">CC BY-NC-SA 4.0</a>
		</p>
	</div>
	<div class="site-footer-redes">
		<p>Acompanhe o <strong>Manual</strong> nas redes:</p>
		<ul>
			<li><a href="https://bsky.app/profile/manualdousuario.net"><img src="/wp-content/themes/dez/img/icone-bluesky.svg" alt="Bluesky" width="36" height="36" /></a></li>
			<li><a href="https://www.linkedin.com/in/rodrigoghedin/"><img src="/wp-content/themes/dez/img/icon-linkedin.svg" alt="LinkedIn" width="36" height="36" /></a></li>
			<li><a href="https://mastodon.social/@manualdousuario"><img src="/wp-content/themes/dez/img/icone-mastodon.svg" alt="Mastodon" width="36" height="36" /></a></li>
			<li><a href="https://t.me/manualdousuario"><img src="/wp-content/themes/dez/img/icon-telegram.svg" alt="Telegram" width="36" height="36" /></a></li>
			<li><a href="https://whatsapp.com/channel/0029Va9TDp2JZg4CZdt7Im1i"><img src="/wp-content/themes/dez/img/icone-whatsapp.svg" alt="WhatsApp" width="36" height="36" /></a></li>
		</ul>
	</div>
</footer>
</div><!-- #page -->

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
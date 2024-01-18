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
		<p>O <strong>Manual do Usuário</strong> é um blog focado em tecnologia, criado e mantido por Rodrigo Ghedin. <a href="/sobre">Saiba mais</a>.</p>
		<p>Inscreva-se na newsletter (e/ou assine o <a href="https://manualdousuario.net/feed/" class="rss-manual">feed RSS</a>):</p>

		<form action="https://sendy.manualdousuario.net/subscribe" method="post" accept-charset="utf-8"><label style="display: none;" for="email">Seu e-mail</label><input id="email-newsletter" name="email" type="email" placeholder="Qual é o seu e-mail?"><input type="hidden" name="list" value="5hbIBhgttipQeZXjMcG0jA"><input type="hidden" name="subform" value="yes"> <input type="submit" name="submit" id="submit-newsletter" value="Inscrever"></form>

		<p>Contato: <a href="mailto:ghedin@manualdousuario.net">ghedin@manualdousuario.net</a></p>
	</div>

	<?php get_search_form(); ?>

	<div class="dark-mode-toggle">
		<span class="dark-mode-toggle__label">Defina o tema do Manual:</span>
		<a href="#" onClick="setDezTheme(event, 'system')">🌗 Seguir o Sistema (Padrão)</a> &middot; <a href="#" onClick="setDezTheme(event, 'light')">🌞 Modo Claro</a> &middot <a href="#" onClick="setDezTheme(event, 'dark')">🌛 Modo Escuro</a>
	</div>

	<p class="site-footer-footer">
		Associado à <a href="https://ajor.org.br/">Ajor</a> &middot; Apoio de <a href="https://www.teramundi.com/">Teramundi</a><br />
		2013–<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.pt-br">CC BY-NC-SA 4.0</a> &middot; <a href="https://status.manualdousuario.net">Status</a>
	</p>
</footer>
</div><!-- #page -->

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
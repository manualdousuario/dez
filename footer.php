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
		<p>O <strong>Manual do Usuário</strong> é uma publicação independente que cobre tecnologia para pessoas, criado e mantido por mim, Rodrigo Ghedin. <a href="/sobre">Conheça o projeto</a>.</p>

		<p>Algumas partes deste site, como o tema/leiaute e o Órbita, são criações próprias e têm <a href="https://github.com/manualdousuario">o código-fonte aberto</a>. Contribuições são bem-vindas.</p>

		<p>Sugestões, críticas, avisos de erros e pitacos em geral são bem-vindos. <a href="mailto:contato@manualdousuario.net">Envie um e-mail</a> ou apareça <a href="https://matrix.to/#/#manualdousuario:matrix.org">no Matrix</a>.</p>

		<p>Acompanhe pela newsletter gratuita:</p>

		<form action="https://sendy.manualdousuario.net/subscribe" method="post" accept-charset="utf-8"><label style="display: none;" for="email">Seu e-mail</label><input id="email" name="email" type="email" placeholder="Qual é o seu e-mail?"><input type="hidden" name="list" value="5hbIBhgttipQeZXjMcG0jA"><input type="hidden" name="subform" value="yes"> <input type="submit" name="submit" id="submit" value="Inscrever"></form>

		<p>Atualizações instantâneas são publicadas no <a href="https://manualdousuario.net/feed/">feed RSS/Atom</a>; semi-instantâneas, nos canais do <a href="https://t.me/manualdousuario">Telegram</a> e <a href="https://whatsapp.com/channel/0029Va9TDp2JZg4CZdt7Im1i">WhatsApp</a>. Também estou no <a href="https://www.linkedin.com/in/rodrigoghedin/">LinkedIn</a> e no <a href="https://mastodon.social/@manualdousuario">Mastodon</a>.</p>

		<p>O <strong>Manual</strong> é associado à <a href="https://ajor.org.br/">Ajor</a> e tem o apoio da <a href="https://www.teramundi.com/">Teramundi</a>.</p>

		<p>Obrigado por ler :)</p>
	</div>

	<p class="site-footer-footer">
		<a href="/politica-de-privacidade/">Política de privacidade</a><br />
		Hospedado por <a href="https://wordpress.com/pt-br/refer-a-friend/36MJNNnS0q22qAPWJwYA/">WordPress.com</a> &middot; <a href="https://status.manualdousuario.net">Status</a><br />
		2013–<?php echo esc_html( gmdate( 'Y' ) ); ?> &middot; <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY-NC-SA 4.0</a>
	</p>
</footer>
</div><!-- #page -->

<a href="#" class="top" title="Voltar ao topo"></a>

<?php wp_footer(); ?>

</body>
</html>
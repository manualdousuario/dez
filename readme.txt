=== Dez ===

Contributors: automattic, Rodrigo Ghedin, Clarissa Mendes, Renan Altendorf, Joselito Júnior
Tags: featured-images, threaded-comments

Requires at least: 4.5
Tested up to: 8.1.12
Requires PHP: 5.6
Stable tag: 2.8.1
License: GNU General Public License v2 or later
License URI: LICENSE

== Description ==

Manual do Usuário Theme

== Installation ==

= Requirements =

- Node.js 16+
- PHP 5.6+
- npm 9.7+
- composer 2.5+

= Development (CLI basic commands) =

$ npm install - Install dependencies.

$ npm run minify:css - Minify CSS files.

$ npm run bundle - Generate a ZIP archive for distribution, excluding development and system files.

More information: https://github.com/Automattic/_s

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Dez includes support for WooCommerce and for Infinite Scroll in Jetpack.

== Changelog ==

= 2.8.1 - March 09 2024 =
* Acrescenta suporte a post format `link`
* Aumenta densidade do leiaute
* Reverte cores dos links no modo claro
* Simplifica menu principal
* Joga para baixo destaques do Órbita na capa
* Estende cabeçalho especial para mais páginas

= 2.7 - February 07 2024 =
* Corrige alinhamento do botão “Apoie”
* Altera fonte padrão para com serifa e adiciona Noto Serif na variável `--ff-serif`
* Altera cores dos links para padrões do HTML (`--cor-link-ori` e `--cor-link-vis` no tema claro)

= 2.6 - February 03 2024 =
* Adiciona seletor de modo claro/escuro no menu principal
* Corrige margens dos últimos elementos (ul, ol, li, p)
* Corrige form da newsletter no rodapé em telas pequenas (@MatFantinel)
* Estende e altera margens do bloco `.doe`
* Estende bloco do podcast (`.podcast_player`)
* Transforma bloco pós-posts (`single`) em um shortcode (do plugin Shortcode); 
não havia sido implementado na 2.5
* Acrescenta meta tag no cabeçalho para bloquear robô do Bing Chat/Copilot (via 
https://searchengineland.com/bing-adds-controls-for-webmasters-to-disallow-their-content-in-bing-chat-432174)

= 2.5 - January 20 2024 =
* Acrescenta link para gerenciar comentários no menu do usuário
* Acrescenta cor distinta no cabeçalho dos comentários vindos do fediverso/Mastodon (tema claro)
* Corrige cor da seta “voltar ao topo” no modo escuro
* Transforma bloco pós-posts (`single`) em um shortcode (do plugin Shortcode)

= 2.4 - January 13 2024 =
* Identifica comentários vindos do fediverso/Mastodon
* Estende imagens alinhadas à direita ou esquerda em telas pequenas (`<350px`)
* Remove atributos do cabeçalho em telas pequenas (`<350px`)
* Remove itens da administração do menu do usuário
* Acrescenta link permanente no post type `quote`
* Altera leiaute da tag `blockquote`

= 2.3 - January 5 2024 =
* Simplifica rodapé (`footer.php`)
* Acrescenta formulário de pesquisa no rodapé
* Remove item “Busca” do menu principal
* Acrescenta formulário de pesquisa nos resultados da pesquisa

= 2.2.4 - December 9 2023 =
* Acrescenta suporte a imagens AVIF
* Acrescenta async ao JavaScript do littlefootjs

= 2.2.2 - December 4 2023 = 
* Streamline comments meta box

= 2.2.1 - December 3 2023 = 
* Replace verified check with a *.svg file

= 2.2 - December 2 2023 = 
* Add comments icons

= 2.1.6 - December 1 2023 =
* Restrict highlight image to single posts

= 2.1.5 - November 30 2023 =
* Remove some old/unused stuff from style.css

= 2.1.4 - November 30 2023 =
* Change comments layout to remove Gravatar

= 2.1.3 - November 30 2023 =
* Add rel="preload" to style.min.css

= 2.1.2 - November 28 2023 =
* Fix footer distance in mobile view (<620px)
* Add social links and newsletter form to footer
* Fix differences in distance between blocks (8rem as a standard)
* Simplify padding around some elements
* Hide more fields in user profile

= 2.1.1 - November 25 2023 =
* Small fixes in CSS
* Remove manifest.webmanifest
* Fix Manual/Órbita header height difference

= 2.1 - November 18 2023 = 
* theme.json and functions.php reorganized
* Social icons changed for smaller versions/files
* footer.php changed
* Many layout fixes

= 2.0 - October 27 2023 =
* CSS refactored
* littlefoot.js updated to 4.0.1

= 1.1 - August 25 2023 =
* Fix Dynamic/Hidden Menu

= 1.0.22 - August 07 2023 =
* Fix Dynamic Menu

= 1.0.21 - July 12 2023 =
* Add Dynamic Menu

= 1.0.20 - July 05 2023 =
* Code review

= 1.0 - May 12 2015 =
* Initial release

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

=== Dez ===

Contributors: automattic, Rodrigo Ghedin, Clarissa Mendes, Renan Altendorf, Joselito Júnior
Tags: featured-images, threaded-comments

Requires at least: 4.5
Tested up to: 8.1.12
Requires PHP: 5.6
Stable tag: 3.4.3
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

$ npm run minify:js - Minify JS files.

$ npm run bundle - Generate a ZIP archive for distribution, excluding development and system files.

More information: https://github.com/Automattic/_s

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Dez includes support for WooCommerce and for Infinite Scroll in Jetpack.

== Changelog ==

= 3.4.3 - Oct 20 2024 =
* Adiciona `text-wrap: balance` a cabeçalhos `h1` e `h2`.
* Adiciona cores diferentes para caixas (`.ctx`) de patrocinadores (`.oferecimento`).
* Adiciona selo de “Destaque” para posts fixos (sticky) em `template-parts/content.php`.
* Altera cabeçalho (`header.php`).
* Altera `functions.php` para carregar jQuery apenas em páginas com comentários.
* Reformula visual da classe `.ctx`.
* Remove cores específicas do box da classe `.podcast_player`.
* Remove classe `.ctx-parceiros`.
* Remove barra fixa no topo do site.
* Remove biblioteca littleFoot.
* Remove aviso de “Comentários fechados” (`comments.php`).
* Diversas alterações pequenas no CSS.

= 3.4.2 - Ago 17 2024 =
* Altera prazos de validade do login (7 dias sem “lembrar-me”; 28 dias com).
* Remove código para honrar Do Not track do Jetpack Stats (por desuso).
* Reduz de 8rem para 5rem o tamanho máximo da fonte na classe `.numeros-enormes`.
* Remoção da classe `.ctx-parcerias`.
* Mudança estética no cabeçalho.
* Alterações de textos no rodapé.

= 3.4.1 - Jul 27 2024 =
* Corrige cor de fundo do `label` da classe `.ctx-parceiros`.
* Padroniza formatação dos de links de navegação (`.posts-navigation a`).
* Altera cabeçalho da página de resultados da pesquisa (`.search-results .page-header`).
* Encolhe um pouco o formulário de pesquisa no cabeçalho em telas grandes.
* Altera ordem das inserções de shortcodes (`sc`) no `index.php`.
* Altera exibição do bloco de destaques do Órbita no `index.php`.
* Deixa fonte do primeiro parágrafo em itálico nas citações do formato de post de citações (`.format-quote`).
* Acrescenta link para mesas no menu principal e nova classe `.menu-item-novo`.
* Reduz fonte do seletor em formulários para não gerar barra de rolagem horizontal em posts com comentários devido ao seletor de notificações por e-mail de novos comentários.

= 3.4 - Jul 5 2024 =
* Simplifica o cabeçalho a fim de ocupar menos espaço vertical em telas pequenas.
* Remove adornos do menu principal e do ícone do menu do usuário.
* Move ícone da aparência (claro/escuro) para o menu do usuário.
* Cria classe `.numeros-enormes`.
* Reduz breaking points a um (`<529px`).
* Remove sublinhado do ícone de curtir comentários (plugin Just Likes and Dislikes).
* Limpa classes no CSS sem uso.

= 3.3.1 - Jun 22 2024 =
* Corrige conflito da nova classe `.data` com o Órbita. (Altera a classe para 
`.data-home`).
* Formata classe para faixa no topo do site (`.dfad_pos_1`)

= 3.3 - Jun 21 2024 =
* Acrescenta blocos do plugin Shortcoder à capa (`index.php`): 1) aviso de conteúdos novos às sextas-feiras no topo; e 2) newsletters do diretório no meio dos posts
* Exibe datas apenas uma vez por dia na capa (`the_date();` em `template-parts/content.php`) e remove datas dos posts individuais, mantendo-as dentro dos posts
* Adiciona função/condicional `shortcode_exists()` onde precisava
* Corrige datas e permalinks dos resultados da pesquisa (`template-parts/content-search.php`)
* Altera leiaute dos blocos `ctx-`, prevê uso de `label` para sinalizar o tipo de bloco (ajuda na acessibilidade) e nova classe genérica `ctx`, mas mantém as classes antigas para retrocompatibilidade.
* Acrescenta bordas ao menu principal (`ul.nav-menu`) e botão do menu do leitor (`.menu-toggle-icon`)
* Move ícone do feed RSS/Atom do menu em texto para o dos ícones (`header.php`)
* Inverte posições dos links de responder e curtir comentários
* Ajustes no `style.css` para o plugin Just Likes and Dislikes
* Bloqueia o carregamento do arquivo `jlad-frontend.css`, do plugin Just Likes and Dislikes, no front-end (via `functions.php`)

= 3.2.3 - Jun 7 2024 =
* Restabelece o carregamento do jQuery no front-end, bloqueando o jQuery Migrate
* Acrescenta classes no CSS para o plugin Just Like Dislike
* Pequenos ajustes/simplificação da parte de formulários no CSS
* Remove imagens sem uso do diretório `/img`

= 3.2.2.3 - May 26 2024 =
* Reorganiza links do rodapé
* Destaca ícone do menu do usuário

= 3.2.2.2 - May 11 2024 =
* Restaura link da política de privacidade no `footer.php`
* Corrige espaçamento de lista dentro de lista (`li ul`)
* Acrescenta `margin-bottom` em `.wp-audio-shortcode` (player de podcast)
* Aumenta um pouco a distância (`margin-top`) do cabeçalho em relação à 
borda superior da janela
* Corrige exibição de listas (`ul`, `ol`) em comentários (`.comment-content`)
* Acrescenta atributo `has:` para encurtar `line-height` da tag `small` 
dentro de parágrafos

= 3.2.2.1 - May 3 2024 =
* Corrige tamanho do título dos podcasts na capa
* Corrige `scroll-behavior: smooth` para uso universal

= 3.2.2 - May 2 2024 =
* Corrige coloração do `p:last-child` dos blocos `ctx-*`
* Volta a exibir podcasts como posts normais na capa

= 3.2.1 - April 27 2024 =
* Remove abas Painel e Jetpack para usuários que não são admin
* Ajusta blocos `ctx-*` para telas pequenas
* Acrescenta bloco `ctx-parceiros`
* Acrescenta função para Jetpack Stats respeitar Do Not Track
* Acrescenta duas linhas ao `functions.php` para desativar carregamento 
do arquivo não usado `styles.min.css` com id `wp-components-css`, do Gutenberg

= 3.2 - April 21 2024 =
* Acrescenta links para regras de convivência e do Órbita no formulário 
de comentários para usuários logados
* Acrescenta `column-gap` nos links de navegação (post anterior e próximo) 
das conversas do Órbita
* Pequenos ajustes no CSS de formulários

= 3.1 - April 15 2024 =
* Adiciona opção de busca no header e padroniza o form de todo site
* Adiciona Mapa no menu de usuário
* Deixa código do header legível

= 3.0.2 - April 13 2024 =
* Altera retorno de itens nos feeds dos podcasts (`functions.php`);
* Corrige estilo do link “Todas as conversas” (Órbita) na capa (`index.php`);
* Remove CSS inline do plugin ActivityPub (`functions.php`);
* Remove `parsedown.php` (sem uso).

= 3.0.1 - April 7 2024 =
* Remove snippets de Markdown em comentáriso do `functions.php` 
devido a falha na renderização de HTML nos comentários.

= 3.0 - April 2 2024 =
* Correção da chamada do littlefoot.js no `functions.php`
* Inclusão de Markdown nos comentários via `functions.php`
* Refatoração e simplificação do `style.css`
* Novo leiaute para o cabeçalho em telas pequenas
* Leves mudanças na página de erro (`404.php`)
* Inclusão de novos links no rodapé
* Leiaute simplificado das caixas de destaque (`ctx-*`)
* Remoção da família de fontes sem serifa
* Remove gambiarra do formato AVIF do `functions.php`

= 2.9 - March 09 2024 =
* Adiciona classe `.link` ao link especial do post format Link
* Melhorias no menu principal em telas pequenas
* Altera função para remover todos os estilos 
adicionados pelo plugin ActivityPub
* Remove cor de fundo diferente para `.category-aplicativos`

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

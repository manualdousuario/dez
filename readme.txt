=== Dez ===

Contributors: automattic, Rodrigo Ghedin, Clarissa Mendes, Renan Altendorf, Joselito Júnior
Tags: featured-images, threaded-comments

Requires at least: 5.9
Tested up to: 6.9.1
Requires PHP: 7.4
Stable tag: 4.3
License: GNU General Public License v2 or later
License URI: LICENSE

== Description ==

Manual do Usuário Theme

== Installation ==

= Requirements =

- Node.js 16+
- PHP 7.4+
- npm 9.7+
- composer 2.5+

= Development (CLI basic commands) =

$ npm install - Install dependencies.

$ npm run minify:css - Minify CSS files.

$ npm run minify:js - Minify JS files.

$ npm run bundle - Generate a ZIP archive for distribution, excluding development and system files.

More information: https://github.com/Automattic/_s

== Changelog ==

= 4.2.1 - 13/2/2026 =
* Adiciona lista dos dez últimos textões no rodapé da capa e dos posts.
* Adiciona CSS para o plugin de Markdown nos comentários (.markdown-comments-help).
* Corrige barra de rolagem horizontal no texto .link-site.
* Remove a função light-dark() para melhorar compatibilidade com navegadores antigos.
* Altera CTA para assinatura no cabeçalho.

= 4.2 - 2/2/2026 =
* Adiciona código no início do index.php para evitar erro fatal na chamada do get_header().
* Adiciona suporte à meta tag “text-scale”.
* Reorganiza a chamada de todos os post formats dentro do content.php.
* Corrige espaçamento entre linhas de títulos do post format “quote”.
* Corrige espaçamento nos comentários e borda inferior do bloco da newsletter.
* Corrige chamada da template-part content.php nas páginas (page.php).
* Corrige chamada do content.php no search.php e archive.php.
* Corrige o if da chamada do formulário da newsletter no single.php.
* Altera formatação do bloco de inscrição na newsletter (.ctx-newsletter).
* Estende formulário da newsletter para todos os post formats.
* Reduz atraso para oferta de notificações push de 3min30s para 40s.

= 4.1.2 - 24/1/2026 =
* Corrige linha duplicada no menu principal.
* Corrige posição das dicas de Markdown na textarea do formulário de contato.
* Altera tamanhos das fontes de títulos (h1–h3) e títulos do post format “quote”.

= 4.1.1 - 17/1/2026 =
* Adiciona link de cadastro no menu principal.
* Adiciona versão em inglês do menu do rodapé.
* Adiciona estilo especial à página de patrocínios em inglês (/en/sponsorship).
* Corrige CTA dos patrocínios (`.patrocinio-okkre2025`).
* Remove “Bastidores” do menu principal.
* Remove parâmetros UTM dos feeds.
* Estende o fechamento automático de comentários para o Órbita (`functions.php`).

= 4.1 - 10/1/2026 =
* Adiciona quadrado sólido para indicar o fim de um post.
* Corrige o espaçamento entre blocos dos comentários quando há ou não comentários.
* Corrige espaçamento após o crédito de posts de citação (`.format-quote`).
* Corrige pseudo-classes (?) :before e :after, removendo um dos dois pontos (por algum motivo, não estava funcionando com dois).
* Corrige margem inferior do último comentário e de comentário único.
* Restaura snippet que remove emojis personalizados do WordPress.
* Restaura posts da categoria “Bastidores” (1) na capa do blog.

= 4.0.1 - 5/1/2026 =
* Altera orientação do menu principal em telas pequenas.
* Corrige overflow horizontal em telas pequenas.
* Corrige padding-inline do cabeçalho das páginas de arquivo (`.page-header`).
* Corrige os links da página de assinatura e do Órbita no menu principal.
* Corrige os parâmetros UTM dos feeds no `functions.php`.
* Corrige espaçamento entre comentários.
* Corrige a seta da tag `dd`.
* Restaura link para entrar/sair do WordPress/Órbita no menu principal.
* Restaura remoções de estilos e scripts no `functions.php`.

= 4.0 - 3/2/2026 =
* Divide as chamadas de posts por post formats no `./template-tags`.
* Cria leiautes para o post format “link”.
* Adiciona parâmetros UTM aos feeds principais e cria variações sem.
* Oculta da capa posts da categoria “Bastidores”.
* Restaura widgets na página “Painel” do painel administrativo.
* Redução e racionalização do `functions.php`.
* Redução e otimização do CSS.

= 3.12.1 - 7/10/2025 =
* Restaura “por Rodrigo Ghedin” no cabeçalho.

= 3.12 - 7/10/2025 =
* Diversifica leiautes de formatos de posts.
* Diminui um pouco o tamanho das fontes.
* Corrige padding da tag `code`.

= 3.11.1 - 2/10/2025 =
* Remove resquícios do modo escuro com JavaScript.
* Ajustes no cabeçalho.

= 3.11 - 27/9/2025 =
* Altera o modo escuro do JavaScript para CSS puro.

= 3.10.8 - 22/9/2025 =
* Simplifica cabeçalho e aumenta largura da barra de pesquisa.
* Corrige margens de posts do Órbita.
* Atualiza caixa da Célere (`.of-celere`).
* Algumas adições ao `functions.php` daqui: https://gitlab.com/edent/blog-theme/-/blob/master/includes/remove.php
* Remove formatação de comentários do ActivityPub.
* Adiciona suporte inicial ao box de promoções e descontos.

= 3.10.7 - 13/9/2025 =
* Altera bordas e posicionamento de caixas (`.ctx`, `.oferecimento`).
* Altera leiaute do título de citações (`.format-quote .p-name`).
* Altera barra principal do Órbita.
* Altera `text-wrap` de títulos para `wrap` em telas pequenas (<479px).
* Corrige margens da classe `.ctx-newsletter` em páginas (`.type-page`).
* Altera estilos das caixas (`.ctx`) e `blockquote`.
* Altera estilo de caixas de parceiros (`.oferecimento`).

= 3.10.6 - 5/9/2025 =
* Corrige preconnect de assets do Alô.
* Aumenta margem superior de títulos dentro do conteúdo (.e-content).
* Padroniza `padding` da tag article na capa e em posts.
* Acrescenta modo escuro para anúncio do EthicalAds.

= 3.10.5 - 25/8/2025 =
* Implementa anúncio do EthicalAds (somente na versão em inglês).
* Arredonda cantos da imagem destacada em telas grandes.
* Sobe botão de compartilhamento para os meta dados do topo (.entry-meta).
* Corrige o preconnect do Alô (domínio estava errado).
* Corrige posicionamento do box social (.ctx-newsletter).

= 3.10.4 - 15/8/2025 =
* Corrige página de resultados da busca.
* Aumenta validade do cookie da sessão de 28 dias para 2 anos.

= 3.10.3 - 13/8/2025 =
* Mais correções de alinhamento.

= 3.10.2 - 12/8/2025 =
* Pequenas correções de alinhamento.

= 3.10.1 - 11/8/2025 =
* Reverte capa do site (index.php) para estilo blog.
* Expande itens da barra global do topo em telas grandes.

= 3.10 - 11/8/2025 =
* Altera capa do site (index.php).
* Implementa tags compatíveis com microformato (h-entry).
* Reformula barra do topo.
* Pequenos ajustes em CSS e simplificação da estrutura.

= 3.9.1 - 9/7/2025 =
* Várias pequenas alterações.

= 3.9 - 6/6/2025 =
* Simplifica barra global.
* Limita exibição na capa de posts da tag `links-do-dia` a apenas um (mais recente).
* Restaura títulos de post types que estavam ocultos (acessibilidade).
* Altera comentários para contrair textos com +500 caracteres.
* Vários pequenos ajustes cosméticos.

= 3.8.6 - 10/5/2025 =
* Altera requisitos mínimos (WordPress 5.9, PHP 7.4).
* Remove funções que alteram queries no `functions.php`.
* Ajustes diversos no `style.css`.

= 3.8.5 - 2/5/2025 =
* Restaura logo na barra global.
* Adiciona chamadas “preconnect” para subdomínios umami. e alo. (`header.php`).
* Adiciona `aria-label` ao link no logo na barra global.
* Adiciona suporte a anúncio global (`.patrocinio-okkre2025`).
* Altera formatação dos títulos (`.entry-header`).
* Padroniza datas no changelog (`readme.txt`).

= 3.8.4 - 30/4/2025 =
* Adiciona identificador de posts patrocinados.
* Refatoramento do `template-parts/content.php` pelo Claude (IA).

= 3.8.3 - 25/4/2025 =
* Adiciona barra global.

= 3.8.2 - 16/4/2025 =
* Adiciona suporte à tag `details`.
* Altera formatação do título do site.

= 3.8.1 - 14/4/2025 =
* Altera chamada do script do Alô para segmentar leitores da versão em inglês.
* Altera (simplifica) e rebatiza para `dez_pre_http_request_block` a função `ltv_pre_http_request_block`.
* Remove resquício do `searchIcon` no `functions.php`.

= 3.8 - 7/4/2025 =
* Prepara o tema para a versão em inglês do Manual do Usuário (depende do plugin Polylang).
* Altera menus (principal e rodapé) para sistema nativo do WordPress.
* Altera ícones para padronizados do Bootstrap.
* Altera lógica para aplicar filtro invert() nos ícones em background-image.
* Altera implementação do formulário de pesquisa (acessibilidade).
* Corrige erros de acessibilidade (texto alternativo no logo, link para pular para o conteúdo).
* Remove propriedade `transition` dos formulários para mitigar defeito ao alternar aparência (clara/escura).

= 3.7.2 - 4/4/2025 =
* Correções e alterações no `style.css`.

= 3.7.1 - 24/3/2025 =
* Corrige apresentação do post type "quote".
* Reorganiza `entry-header` e botão de compartilhamento.
* Altera alguns detalhes do `style.css`.

= 3.7 - 21/3/2025 =
* Reorganiza `functions.php`.
* Reorganiza formatação de formulários.
* Reorganiza cabeçalho em telas pequenas.
* Adiciona suporte ao Pushbase.
* Adiciona formatação à tag HTML `<samp>`.
* Altera formatação de parágrafo grande em páginas especiais para afetar somente o p:first-child do primeiro elemento.
* Altera diversos detalhes do `style.css`.
* Simplifica função `dez_post_thumbnail()`.
* Remove pergunta de verificação para formulários do plugin HTML Forms (v3.6.8).

= 3.6.8 - 27/2/2025 =
* Adiciona pergunta de verificação para formulários do plugin HTML Forms.

= 3.6.7.1 - 20/2/2025 =
* Corrige tamanhos das fontes

= 3.6.7 - 20/2/2025 =
* Altera tipografia.

= 3.6.6 - 10/2/2025 =
* Corrige alinhamento das classes `.alignleft` e `.alignright` em telas pequenas (centraliza e adiciona `display: inline-block`).

= 3.6.5 - 6/2/2025 =
* Corrige menu do usuário em telas pequenas (<370px).
* Corrige caixas legadas (`.ctx-`) no modo escuro.
* Move função que adiciona classes à tag `body` para o `functions.php`.
* Exclui ícone do fogo (`icone-fogo.svg`).
* Exclui arquivos sem uso (`inc/template-functions.php` e `languages/*`).

= 3.6.4.1 - 3/2/2025 =
* Ajustes nas cores (`:root`).

= 3.6.4 - 3/2/2025 =
* Altera tipografia para melhorar legibilidade.
* Altera cores de fundo para melhorar proporção de contraste ("contrast ratio").
* Altera texto dos links de navegação da capa (`the_posts_navigation` em `index.php`).

= 3.6.3 - 30/1/2025 =
* Acrescenta link para loja no menu principal (`header.php`).
* Corrige alinhamento vertical das tags `<sub>` e `<sup>`.
* Remove destaque para novos comentários (v3.6).
* Remove algumas linhas sem uso do `style.css`.

= 3.6.2 - 29/1/2025 =
* Corrige um `if` mal feito no `template-tags/content.php` que causava um erro fatal em alguns locais da aplicação.

= 3.6.1 - 29/1/2025 =
* Corrige uso do `style.min.css` no arquivo `functions.php`.
* Corrige ícone da classe `.compartilhe` no modo escuro.

= 3.6 - 29/1/2025 =
* Acrescenta destaque para novos comentários desde a última visita (classe `os_sincelastvisit_comment_class` no `functions.php`), apenas para leitores cadastrados.
* Acrescenta atributo `display: none` à classe `.comment-awaiting-moderation`.
* Acrescenta suporte ao plugin Favorites.
* Altera menu do usuário para deixar itens mais estreitos.
* Altera exibição do box `.podcast_meta` do plugin Seriously Simple Podcasting.
* Corrige cor da class `.podcast_player` no modo escuro.
* Remove banner no `header.php` introduzido na v3.5.3.

= 3.5.3 - 18/1/2025 =
* Acrescenta banner ao `header.php` com botão para removê-lo de modo persistente usando localStorage.

= 3.5.2 - 17/1/2025 =
* Remove script "hard coded" no `header.php` para atribuir posts ao autor #1 no Mastodon em prol de plugin que estende funcionalidade a todas as pessoas cadastradas.

= 3.5.1 - 16/1/2025 =
* Corrige margem inferior da classe `.footnotes`

= 3.5 - 15/1/2025 =
* Menu de compartilhamento nos posts usando a API Web Share.

= 3.4.4 - 26/12/2024 =
* Acrescenta atribuição do fediverso manual para usuário "Rodrigo Ghedin" no `header.php`.
* Acrescenta código para remover estilo inline do Gutenberg, anúncio do plugin Seriously Simple Podcasting no admin e para estender o fechamento automático de comentários ao custo post type do Órbita no `functions.php`.
* Acrescenta ícones de plataformas sociais no rodapé (`footer.php`).
* Acrescenta formulário de inscrição da newsletter na capa e após posts (`single.php`).
* Acrescenta ícone de aparência (clara/escura) no menu principal e remove link correspondente do menu do usuário.
* Remove link da newsletter do cabeçalho.
* Reorganiza permalinks e datas dos posts no `template-parts/content.php`.
* Reorganiza o logo/título do site.
* Altera estilo da classe `.ctx`.
* Altera vários detalhes de estilo no `style.css`/`style.min.css`.

= 3.4.3 - 20/10/2024 =
* Adiciona `text-wrap: balance` a cabeçalhos `h1` e `h2`.
* Adiciona cores diferentes para caixas (`.ctx`) de patrocinadores (`.oferecimento`).
* Adiciona selo de "Destaque" para posts fixos (sticky) em `template-parts/content.php`.
* Altera cabeçalho (`header.php`).
* Altera `functions.php` para carregar jQuery apenas em páginas com comentários.
* Reformula visual da classe `.ctx`.
* Remove cores específicas do box da classe `.podcast_player`.
* Remove classe `.ctx-parceiros`.
* Remove barra fixa no topo do site.
* Remove biblioteca littleFoot.
* Remove aviso de "Comentários fechados" (`comments.php`).
* Diversas alterações pequenas no CSS.

= 3.4.2 - 17/8/2024 =
* Altera prazos de validade do login (7 dias sem "lembrar-me"; 28 dias com).
* Remove código para honrar Do Not track do Jetpack Stats (por desuso).
* Reduz de 8rem para 5rem o tamanho máximo da fonte na classe `.numeros-enormes`.
* Remoção da classe `.ctx-parcerias`.
* Mudança estética no cabeçalho.
* Alterações de textos no rodapé.

= 3.4.1 - 27/7/2024 =
* Corrige cor de fundo do `label` da classe `.ctx-parceiros`.
* Padroniza formatação dos de links de navegação (`.posts-navigation a`).
* Altera cabeçalho da página de resultados da pesquisa (`.search-results .page-header`).
* Encolhe um pouco o formulário de pesquisa no cabeçalho em telas grandes.
* Altera ordem das inserções de shortcodes (`sc`) no `index.php`.
* Altera exibição do bloco de destaques do Órbita no `index.php`.
* Deixa fonte do primeiro parágrafo em itálico nas citações do formato de post de citações (`.format-quote`).
* Acrescenta link para mesas no menu principal e nova classe `.menu-item-novo`.
* Reduz fonte do seletor em formulários para não gerar barra de rolagem horizontal em posts com comentários devido ao seletor de notificações por e-mail de novos comentários.

= 3.4 - 5/7/2024 =
* Simplifica o cabeçalho a fim de ocupar menos espaço vertical em telas pequenas.
* Remove adornos do menu principal e do ícone do menu do usuário.
* Move ícone da aparência (claro/escuro) para o menu do usuário.
* Cria classe `.numeros-enormes`.
* Reduz breaking points a um (`<529px`).
* Remove sublinhado do ícone de curtir comentários (plugin Just Likes and Dislikes).
* Limpa classes no CSS sem uso.

= 3.3.1 - 22/6/2024 =
* Corrige conflito da nova classe `.data` com o Órbita. (Altera a classe para 
`.data-home`).
* Formata classe para faixa no topo do site (`.dfad_pos_1`)

= 3.3 - 21/6/2024 =
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

= 3.2.3 - 7/6/2024 =
* Restabelece o carregamento do jQuery no front-end, bloqueando o jQuery Migrate
* Acrescenta classes no CSS para o plugin Just Like Dislike
* Pequenos ajustes/simplificação da parte de formulários no CSS
* Remove imagens sem uso do diretório `/img`

= 3.2.2.3 - 26/5/2024 =
* Reorganiza links do rodapé
* Destaca ícone do menu do usuário

= 3.2.2.2 - 11/5/2024 =
* Restaura link da política de privacidade no `footer.php`
* Corrige espaçamento de lista dentro de lista (`li ul`)
* Acrescenta `margin-bottom` em `.wp-audio-shortcode` (player de podcast)
* Aumenta um pouco a distância (`margin-top`) do cabeçalho em relação à 
borda superior da janela
* Corrige exibição de listas (`ul`, `ol`) em comentários (`.comment-content`)
* Acrescenta atributo `has:` para encurtar `line-height` da tag `small` 
dentro de parágrafos

= 3.2.2.1 - 3/5/2024 =
* Corrige tamanho do título dos podcasts na capa
* Corrige `scroll-behavior: smooth` para uso universal

= 3.2.2 - 2/5/2024 =
* Corrige coloração do `p:last-child` dos blocos `ctx-*`
* Volta a exibir podcasts como posts normais na capa

= 3.2.1 - 27/4/2024 =
* Remove abas Painel e Jetpack para usuários que não são admin
* Ajusta blocos `ctx-*` para telas pequenas
* Acrescenta bloco `ctx-parceiros`
* Acrescenta função para Jetpack Stats respeitar Do Not Track
* Acrescenta duas linhas ao `functions.php` para desativar carregamento 
do arquivo não usado `styles.min.css` com id `wp-components-css`, do Gutenberg

= 3.2 - 21/4/2024 =
* Acrescenta links para regras de convivência e do Órbita no formulário 
de comentários para usuários logados
* Acrescenta `column-gap` nos links de navegação (post anterior e próximo) 
das conversas do Órbita
* Pequenos ajustes no CSS de formulários

= 3.1 - 15/4/2024 =
* Adiciona opção de busca no header e padroniza o form de todo site
* Adiciona Mapa no menu de usuário
* Deixa código do header legível

= 3.0.2 - 13/4/2024 =
* Altera retorno de itens nos feeds dos podcasts (`functions.php`);
* Corrige estilo do link "Todas as conversas" (Órbita) na capa (`index.php`);
* Remove CSS inline do plugin ActivityPub (`functions.php`);
* Remove `parsedown.php` (sem uso).

= 3.0.1 - 7/4/2024 =
* Remove snippets de Markdown em comentáriso do `functions.php` 
devido a falha na renderização de HTML nos comentários.

= 3.0 - 2/4/2024 =
* Correção da chamada do littlefoot.js no `functions.php`
* Inclusão de Markdown nos comentários via `functions.php`
* Refatoração e simplificação do `style.css`
* Novo leiaute para o cabeçalho em telas pequenas
* Leves mudanças na página de erro (`404.php`)
* Inclusão de novos links no rodapé
* Leiaute simplificado das caixas de destaque (`ctx-*`)
* Remoção da família de fontes sem serifa
* Remove gambiarra do formato AVIF do `functions.php`

= 2.9 - 9/3/2024 =
* Adiciona classe `.link` ao link especial do post format Link
* Melhorias no menu principal em telas pequenas
* Altera função para remover todos os estilos 
adicionados pelo plugin ActivityPub
* Remove cor de fundo diferente para `.category-aplicativos`

= 2.8.1 - 9/3/2024 =
* Acrescenta suporte a post format `link`
* Aumenta densidade do leiaute
* Reverte cores dos links no modo claro
* Simplifica menu principal
* Joga para baixo destaques do Órbita na capa
* Estende cabeçalho especial para mais páginas

= 2.7 - 7/2/2024 =
* Corrige alinhamento do botão "Apoie"
* Altera fonte padrão para com serifa e adiciona Noto Serif na variável `--ff-serif`
* Altera cores dos links para padrões do HTML (`--cor-link-ori` e `--cor-link-vis` no tema claro)

= 2.6 - 3/2/2024 =
* Adiciona seletor de modo claro/escuro no menu principal
* Corrige margens dos últimos elementos (ul, ol, li, p)
* Corrige form da newsletter no rodapé em telas pequenas (@MatFantinel)
* Estende e altera margens do bloco `.doe`
* Estende bloco do podcast (`.podcast_player`)
* Transforma bloco pós-posts (`single`) em um shortcode (do plugin Shortcode); 
não havia sido implementado na 2.5
* Acrescenta meta tag no cabeçalho para bloquear robô do Bing Chat/Copilot (via 
https://searchengineland.com/bing-adds-controls-for-webmasters-to-disallow-their-content-in-bing-chat-432174)

= 2.5 - 20/1/2024 =
* Acrescenta link para gerenciar comentários no menu do usuário
* Acrescenta cor distinta no cabeçalho dos comentários vindos do fediverso/Mastodon (tema claro)
* Corrige cor da seta "voltar ao topo" no modo escuro
* Transforma bloco pós-posts (`single`) em um shortcode (do plugin Shortcode)

= 2.4 - 13/1/2024 =
* Identifica comentários vindos do fediverso/Mastodon
* Estende imagens alinhadas à direita ou esquerda em telas pequenas (`<350px`)
* Remove atributos do cabeçalho em telas pequenas (`<350px`)
* Remove itens da administração do menu do usuário
* Acrescenta link permanente no post type `quote`
* Altera leiaute da tag `blockquote`

= 2.3 - 5/1/2024 =
* Simplifica rodapé (`footer.php`)
* Acrescenta formulário de pesquisa no rodapé
* Remove item "Busca" do menu principal
* Acrescenta formulário de pesquisa nos resultados da pesquisa

= 2.2.4 - 9/12/2023 =
* Acrescenta suporte a imagens AVIF
* Acrescenta async ao JavaScript do littlefootjs

= 2.2.2 - 4/12/2023 = 
* Streamline comments meta box

= 2.2.1 - 3/12/2023 = 
* Replace verified check with a *.svg file

= 2.2 - 2/12/2023 = 
* Add comments icons

= 2.1.6 - 1/12/2023 =
* Restrict highlight image to single posts

= 2.1.5 - 30/11/2023 =
* Remove some old/unused stuff from style.css

= 2.1.4 - 30/11/2023 =
* Change comments layout to remove Gravatar

= 2.1.3 - 30/11/2023 =
* Add rel="preload" to style.min.css

= 2.1.2 - 28/11/2023 =
* Fix footer distance in mobile view (<620px)
* Add social links and newsletter form to footer
* Fix differences in distance between blocks (8rem as a standard)
* Simplify padding around some elements
* Hide more fields in user profile

= 2.1.1 - 25/11/2023 =
* Small fixes in CSS
* Remove manifest.webmanifest
* Fix Manual/Órbita header height difference

= 2.1 - 18/11/2023 = 
* theme.json and functions.php reorganized
* Social icons changed for smaller versions/files
* footer.php changed
* Many layout fixes

= 2.0 - 27/10/2023 =
* CSS refactored
* littlefoot.js updated to 4.0.1

= 1.1 - 25/8/2023 =
* Fix Dynamic/Hidden Menu

= 1.0.22 - 7/8/2023 =
* Fix Dynamic Menu

= 1.0.21 - 12/7/2023 =
* Add Dynamic Menu

= 1.0.20 - 5/7/2023 =
* Code review

= 1.0 - 12/5/2015 =
* Initial release

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

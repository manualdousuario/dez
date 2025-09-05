<?php
/**
 * Dez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dez
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '3.10.6' );
}

function dez_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'quote',
			'image',
			'link',
		)
	);
	register_nav_menus(
		array(
			'menu-principal' => esc_html__( 'Principal', 'dez' ),
			'menu-rodape' => esc_html__( 'Rodape', 'dez' ),
		)
	);
}
add_action( 'after_setup_theme', 'dez_setup' );

require get_template_directory() . '/inc/template-tags.php';

/**
 * Carrega folha de estilo principal (style.css) com rel="preload"
 */
function dez_preload_style ($preload_resources) {
	$preload_resources[] = array(
		'href' => get_stylesheet_directory_uri() . '/style.min.css?ver=' . filemtime( get_stylesheet_directory() . '/style.min.css' ),
		'as' => 'style',
		'type' => 'text/css',
		'media' => 'all',
	);
	return $preload_resources;
}
add_filter('wp_preload_resources', 'dez_preload_style');

/**
 * Adiciona estilos e scripts
 */
function dez_enqueue_assets() {
	wp_enqueue_style( 'dez-style', get_stylesheet_directory_uri() . '/style.min.css', [], filemtime( get_stylesheet_directory() . '/style.min.css' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'dez-dark-mode', get_template_directory_uri() . '/js/darkMode.min.js', array(), 1.0, array(
				'strategy'  => 'defer',
		) );
}
add_action( 'wp_enqueue_scripts', 'dez_enqueue_assets' );

/**
 * Remove estilos e scripts
 */
function dez_dequeue_assets() {
	wp_dequeue_style( 'wp-components' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'classic-theme-styles' );
	wp_dequeue_style( 'stcr-style' ); // Plugin, Subscribe to Comments Reloaded
	wp_dequeue_style( 'activitypub-followers-style' );
	wp_dequeue_style( 'activitypub-follow-me-style' ); // ActivityPub
	wp_dequeue_style( 'akismet' );
	wp_dequeue_style( 'akismet-widget-style' ); // Akismet
	wp_dequeue_style( 'wpcom-admin-bar' );
	wp_dequeue_style( 'launch-banner' );

	wp_dequeue_script( 'jquery');
	wp_dequeue_script( 'wp-embed' );
	wp_dequeue_script( 'wp-mediaelement' );

	wp_dequeue_script( 'jp-tracks' );
	wp_dequeue_script( 'jetpack-mu-wpcom-settings' );
	wp_dequeue_script( 'bilmur' ); 
	wp_deregister_script( 'adminbar-launch-button' );
	wp_deregister_script( 'jp-tracks-functions' ); // Jetpack
}
add_action( 'wp_enqueue_scripts', 'dez_dequeue_assets' );

/**
 * Remove estilos e scripts do painel administrativo
 */
function dez_dequeue_assets_dashboard() {
	wp_dequeue_style( 'noticons' );
	wp_dequeue_style( 'akismet-font-inter' );
	wp_dequeue_style( 'akismet-admin' );
	wp_dequeue_style( 'akismet' );
	wp_dequeue_style( 'help-center-style' );
	wp_dequeue_style( 'jetpack-mu-wpcom-wpcom-dashboard-widgets' );
	wp_dequeue_style( 'jp-newsletter-widget' );
	wp_dequeue_style( 'wpcom-font-smoothing-antialiased' );
	wp_dequeue_style( 'jetpack-core-color-schemes-overrides-sidebar-notice' );
	wp_dequeue_style( 'command-palette-styles' );
	wp_dequeue_style( 'wpcomsh-admin-style' );
	wp_dequeue_style( 'activitypub-reactions-style-inline' );
	wp_dequeue_style( 'activitypub-reply-style-inline' );

	wp_dequeue_script( 'jetpack-accessible-focus' );
	wp_dequeue_script( 'help-center-translations' );
	wp_dequeue_script( 'command-palette-script' );
	wp_dequeue_script( 'jetpack-mu-wpcom-wpcom-media-url-upload' );
	wp_dequeue_script( 'jp-newsletter-widget' );
	wp_dequeue_script( 'jetpack-mu-wpcom-wpcom-dashboard-widgets' );
	wp_dequeue_script( 'akismet.js' );
	wp_dequeue_script( 'akismet-admin.js' );
	wp_dequeue_script( 'views.jetpack-modules' );
	wp_dequeue_script( 'models.jetpack-modules' );
	wp_dequeue_script( 'jp-tracks' );
	wp_dequeue_script( 'jptracks' );
	wp_dequeue_script( 'jp-tracks-functions' );

	wp_dequeue_script( 'music-player' );
	wp_dequeue_script( 'help-center' );
	wp_dequeue_script( 'jquery-color' );
	wp_dequeue_script( 'wp-color-picker' );

	// wp_deregister_script( 'heartbeat' );
	wp_deregister_script( 'regenerator-runtime' );
}
add_action( 'admin_enqueue_scripts', 'dez_dequeue_assets_dashboard', 999 );

remove_action( 'admin_footer', 'wpcomsh_footer_rum_js' );


/**
 * Remove elementos visuais do painel administrativo
 */
function dez_css_styling_dashboard() {
	echo '
	<style>
#ssp-main-settings.castos-disconnected {
	width: 100%;
}
.wp-first-item > .wp-submenu li:last-child,
li#wp-admin-bar-koko-analytics,
li#wp-admin-bar-customize,
.wp-admin-bar-reader,
#wpadminbar li#wp-admin-bar-wpcom-logo,
#contextual-help-link-wrap,
#wp-admin-bar-help-center,
#ssp-sidebar,
#dashboard-widgets-wrap {
display: none !important;
}
</style>';
}
add_action( 'admin_head', 'dez_css_styling_dashboard' );


/**
 * Filtros
 */
add_filter( 'use_block_editor_for_post', '__return_false', 10 ); 
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 ); 
add_filter( 'should_load_separate_core_block_assets', '__return_true', 5 );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 ); 
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' ); // Remove Gutenberg

add_filter( 'show_admin_bar', 'is_blog_admin' ); // Remove assets da barra de admin

add_filter( 'use_widgets_block_editor', '__return_false' ); // Remove widgets de blocos

add_filter( 'user_can_richedit', '__return_false' ); // Desativa editor visual do TinyMCE

add_filter( 'pre_load_textdomain', '__return_false', -5 );
add_filter( 'pre_load_script_translations', '__return_false', -5 ); // Desabilita traduções

remove_action( 'wp_head', 'wp_resource_hints', 2 ); // Desabilita dns-prefetch no cabeçalho

add_filter( 'login_display_language_dropdown', '__return_false' );
add_filter( 'auth_cookie_expiration', function () {
	return 2 * YEAR_IN_SECONDS; // 2 years in seconds.
} );

add_filter( 'xmlrpc_enabled', '__return_false' );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_pingback_url' );
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
add_filter( 'get_site_icon_url', '__return_false' );
add_filter('wp_img_tag_add_auto_sizes', '__return_false');
add_action( 'wp_dashboard_setup', function () {
	global $wp_meta_boxes;
	$wp_meta_boxes['dashboard'] = array();
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}, 1000 );
add_action( 'wp_print_styles', function() {
	wp_styles()->add_data( 'akismet-widget-style', 'after', '' );
} ); // Limpa cabeçalho

add_filter( 'json_enabled', '__return_false' );
add_filter( 'json_jsonp_enabled', '__return_false' );
add_filter( 'rest_jsonp_enabled', '__return_false' );

remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'template_redirect', 'rest_output_link_header', 11 ); // Desativa links da API REST

add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 ); // Jetpack

add_filter( 'activitypub_site_supports_blocks', '__return_false' ); // ActivityPub

add_filter( 'ssp_feed_item_content', function ( $content ) {
	return wpautop( $content );
} ); // Acrescenta parágrafos ao Seriously Simple Podcasting.
add_filter( 'ssp_feed_number_of_posts', function() {
	return 999;
} ); // Aumenta itens no feed dos podcasts (Seriously Simple Podcasting).

add_filter( 'close_comments_for_post_types', function( $list ) {
	$list[] = 'orbita_post';
	return $list;
} ); // Estende o fechamento automático de comentários para o Órbita.

remove_action( 'wp_footer', 'wpcomsh_footer_rum_js' );


/**
 * Favicons personalizados.
 */
function dez_favicons() {	?>
	<link rel="icon" href="/favicon.ico?v=4" sizes="any">
	<link rel="icon" href="/favicon.svg?v=3">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png?v=4">
	<link rel="icon" href="/favicon-192x192.png" sizes="192x192"/>
<?php }
add_action( 'wp_head', 'dez_favicons' );


/**
 * Adiciona classe .hfeed nos posts
 */
function dez_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'dez_body_classes' );


/**
 * Remove propaganda do The SEO Framework
 */
if ( defined( 'THE_SEO_FRAMEWORK_VERSION' ) ) {
	add_action(	'get_header',	function() {
		ob_start(
			function( $o ) {
				return preg_replace( '/\n?<.*?The SEO Framework.*?>/mi', '', $o );
			}
		);
	}	);
	add_action( 'wp_head', function() {
		ob_end_flush();
	}, 999
); }


/**
 * Revisões de posts
 */
if ( ! defined( 'AUTOSAVE_INTERVAL' ) ) {
	define( 'AUTOSAVE_INTERVAL', 5 * MINUTE_IN_SECONDS );
}

add_filter( 'wp_revisions_to_keep', function( $limit ) {
	return 10;
} );


/**
 * Disable the emojis in WordPress.
 */
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Remove from TinyMCE.
	add_filter( 'tiny_mce_plugins', function ( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	} );

	// Remove from dns-prefetch.
	add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
		if ( 'dns-prefetch' === $relation_type ) {
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
			$urls          = array_diff( $urls, array( $emoji_svg_url ) );
		}

		return $urls;
	}, 10, 2 );
} );


/**
 * Impede o WordPress de gerar novos tamanhos de imagens.
 */
add_filter(	'intermediate_image_sizes',	function( $sizes ) {
	return array_diff( $sizes, array( 'medium_large' ) );
}
);

function dez_remove_large_image_sizes() {
	remove_image_size( '1536x1536' );
	remove_image_size( '2048x2048' );
}
add_action( 'init', 'dez_remove_large_image_sizes' );


/**
 * Personaliza tela de cadastro/login do WordPress.
 */
function dez_login_personalizado() { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(https://manualdousuario.net/wp-content/themes/dez/img/manual-do-usuario-logo-rodrigo-ghedin.svg);
			padding-bottom: 30px;
			margin: 0;
			width: 100%;
			background-size: 256px;
		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'dez_login_personalizado' );

function dez_login_link( $url ) {
	return 'https://manualdousuario.net/';
}
add_filter( 'login_headerurl', 'dez_login_link' );


/**
 * Altera mensagem antes do formulário de comentar.
 */
function dez_mensagem_form_comentarios( $defaults ) {
	$logincom = esc_url( wp_login_url( get_permalink() ) );
	$defaults['comment_notes_before'] = '<p class="comment-form-alert ctx">Por favor, <a href="/doc-comentarios/">leia as regras</a> e o <a href="https://manualdousuario.net/orbita/guia-de-uso/">guia de uso do Órbita</a>.</p><p class="comment-form-alert ctx"><a href="/cadastro/">Cadastre-se</a> para interagir no Órbita. Já tem conta? <a href="' . $logincom . '">Entre</a>.</p>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'dez_mensagem_form_comentarios' );

function dez_mensagem_form_comentarios_logado($args_logged_in, $commenter, $user_identity) {
	$args_logged_in = '<p class="comment-form-alert ctx">Por favor, <a href="/doc-comentarios/">leia as regras</a> e o <a href="https://manualdousuario.net/orbita/guia-de-uso/">guia de uso do Órbita</a>.</p>';
	return $args_logged_in;
}
add_filter('comment_form_logged_in', 'dez_mensagem_form_comentarios_logado', 10, 3);


/**
 * Acrescenta placeholders nos campos do formulário de comentários
 */
function dez_comentarios_placeholders( $crunchify_textfield ) {
	$crunchify_textfield['author'] = str_replace(
		'<input',
		'<input placeholder="Nome"',
		$crunchify_textfield['author']
	);
	$crunchify_textfield['email'] = str_replace(
		'<input',
		'<input placeholder="E-mail (não será exibido)"',
		$crunchify_textfield['email']
	);
	return $crunchify_textfield;
}

add_filter( 'comment_form_defaults', 'crunchify_textarea_placeholder' );  
function crunchify_textarea_placeholder( $crunchify_textarea ) {
	$crunchify_textarea['comment_field'] = str_replace(
		'<textarea',
		'<textarea placeholder="Escreva seu comentário aqui."',
		$crunchify_textarea['comment_field']
	);
	return $crunchify_textarea;
}
add_filter( 'comment_form_default_fields', 'dez_comentarios_placeholders' );


/**
 * Altera mensagem de cookies nos comentários.
 */
function dez_mensagem_cookies_comentarios( $fields ) {
	if ( ! is_admin() ) {
		$commenter         = wp_get_current_commenter();
		$consent           = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
		'<label for="wp-comment-cookies-consent">Lembrar dados</label></p>';
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'dez_mensagem_cookies_comentarios' );


/**
 * Remove campo “website” do formulário de comentários.
 */
function dez_remove_campo_website_comentarios( $fields ) {
	if ( isset( $fields['url'] ) ) {
		unset( $fields['url'] );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'dez_remove_campo_website_comentarios' );


/**
 * Scripts do Alô — https://alo.pcdomanual.com/
 */
function dez_script_alo() {
	$section = '';
	if ( pll_current_language() == 'en') {
		$section = 'English';
	}

	if ( is_page( 'notificacoes' ) ) { ?>
		<script src="https://alo.pcdomanual.com/Firebase"></script>
		<script type="module">
			import aloSDK from 'https://alo.pcdomanual.com/clientSDK';

			const aloConfig = {
				registrationMode: 'manual',
			};
			const aloClient = new aloSDK(aloConfig);

			const aloBtn = document.getElementById('subscribeBtn');
			aloBtn.addEventListener('click', async() => {
				try {
					await aloClient.subscribe();
					alert('Inscrição feita com sucesso!');
				} catch (error) {
					alert('Falha na inscrição: ' + error.message);
				}
			});

			const unsubscribeBtn = document.getElementById('unsubscribeBtn');
			unsubscribeBtn.addEventListener('click', async() => {
				try {
					await aloClient.unsubscribe();
					alert('Cancelamento feito com sucesso.');
					unsubscribeBtn.disabled = true;
				} catch (error) {
					alert('Falha no cancelamento: ' + error.message);
				}
			});			
		</script> 
	<?php } else { ?>
		<script src="https://alo.pcdomanual.com/Firebase"></script>
		<script type="module">
			import aloSDK from 'https://alo.pcdomanual.com/clientSDK';

			const aloConfig = {
				registrationMode: 'auto',
				registrationDelay: 210000,
				customSegments: {
					tag: '<?= $section; ?>'
				},
			};
			const aloClient = new aloSDK(aloConfig);
		</script>
	<?php } }
	add_action( 'wp_footer', 'dez_script_alo' );


/**
 * Scripts de rodapé em páginas específicas.
 */
function dez_scripts_rodape_especiais() {
	if ( have_comments() ) { /* Contrair/expandir threads + Diminuir sensibilidade do link “Responder” */ ?>
		<script type="text/javascript">
			const comments = document.querySelectorAll(".comment");

			comments.forEach(function(element, index) {
				const toggleButton = document.createElement("div");
				const commentMeta = element.querySelector(".comment-meta");
				const currentComment = element.querySelector(".comment-content");
				const commentAuthor = element.querySelector(".comment-author");
				const commentMetadata = element.querySelector(".comment-metadata");
				const childComments = element.querySelector("ol.children");
				const replyLink = element.querySelector(".reply");

				commentMeta.append(toggleButton);
				commentMeta.style.position = "relative";
				toggleButton.innerHTML = "➖";
				toggleButton.style.cssText =
				"position: absolute; right: .6rem; top: 50%; transform: translateY(-50%); cursor: pointer; font-family: -apple-system, sans-serif";

				toggleButton.addEventListener("click", function(event) {
					if (currentComment.style.display === "none") {
						toggleButton.innerHTML = "➖";
						currentComment.style.display = "block";
						commentMeta.style.marginBottom = "1em";
						commentAuthor.style.opacity = "1";
						commentMetadata.style.opacity = "1";
					} else {
						toggleButton.innerHTML = "➕";
						currentComment.style.display = "none";
						commentMeta.style.marginBottom = "-20px";
						commentAuthor.style.opacity = "0.4";
						commentMetadata.style.opacity = "0.4";
					}

					if (childComments) {
						if (childComments.style.display === "none") {
							childComments.style.display = "block";
						} else {
							childComments.style.display = "none";
						}
					}

					if (replyLink) {
						if (replyLink.style.display === "none") {
							replyLink.style.display = "initial";
						} else {
							replyLink.style.display = "none";
						}
					}
				});
			});			
		</script>

		<script type="text/javascript">
			window.addEventListener('load', function() {
				document.getElementById('comments').addEventListener('touchstart', function(e) {
					if (e.target.className === 'comment-reply-link') {
						e.stopPropagation();
					}
				}, true);
			});
		</script>

		<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
	var maxLength = 600; // Define o comprimento máximo
	
	// Seleciona todos os comentários
	var comments = document.querySelectorAll(".comment-content, .comment-text");
	
	comments.forEach(function(comment) {
		// Pega o texto sem HTML para contar caracteres
		var plainText = (comment.textContent || comment.innerText).trim();
		
		if (plainText.length > maxLength) {
			// Salva o HTML original
			var originalHTML = comment.innerHTML;
			
			// Cria versão truncada de forma mais simples
			var shortHTML = createTruncatedVersion(originalHTML, plainText, maxLength);
			
			// Cria a estrutura HTML
			var wrapper = document.createElement("div");
			wrapper.className = "comment-wrapper";
			
			var collapsedDiv = document.createElement("div");
			collapsedDiv.className = "collapsed-comment";
			collapsedDiv.innerHTML = shortHTML;
			
			// Adiciona o link "Expandir" no final
			addExpandLink(collapsedDiv);
			
			var fullDiv = document.createElement("div");
			fullDiv.className = "full-comment";
			fullDiv.style.display = "none";
			fullDiv.innerHTML = originalHTML;
			
			// Adiciona o link "Contrair" no final
			addContractLink(fullDiv);
			
			wrapper.appendChild(collapsedDiv);
			wrapper.appendChild(fullDiv);
			
			// Substitui o conteúdo original
			comment.innerHTML = "";
			comment.appendChild(wrapper);
		}
	});
	
	// Função para criar versão truncada preservando a estrutura
	function createTruncatedVersion(html, plainText, maxLength) {
		// Encontra a posição de corte respeitando palavras
		var cutPos = maxLength;
		var lastSpace = plainText.lastIndexOf(" ", maxLength);
		if (lastSpace !== -1 && lastSpace > maxLength * 0.8) {
			cutPos = lastSpace;
		}
		
		// Cria um elemento temporário para manipular o HTML
		var temp = document.createElement('div');
		temp.innerHTML = html;
		
		// Trunca o texto preservando as tags
		var currentLength = 0;
		var truncated = false;
		
		function truncateNode(node) {
			if (truncated) return;
			
			if (node.nodeType === 3) { // Text node
				var text = node.textContent;
				if (currentLength + text.length > cutPos) {
					var remaining = cutPos - currentLength;
					if (remaining > 0) {
						var cutText = text.substring(0, remaining);
						// Corta na última palavra
						var lastSpace = cutText.lastIndexOf(' ');
						if (lastSpace !== -1 && lastSpace > remaining * 0.8) {
							cutText = cutText.substring(0, lastSpace);
						}
						node.textContent = cutText;
					} else {
						node.textContent = '';
					}
					truncated = true;
				} else {
					currentLength += text.length;
				}
			} else if (node.nodeType === 1) { // Element node
				var children = Array.from(node.childNodes);
				for (var i = 0; i < children.length; i++) {
					truncateNode(children[i]);
					if (truncated) {
						// Remove nós seguintes se já truncamos
						for (var j = i + 1; j < children.length; j++) {
							node.removeChild(children[j]);
						}
						break;
					}
				}
			}
		}
		
		var children = Array.from(temp.childNodes);
		for (var i = 0; i < children.length; i++) {
			truncateNode(children[i]);
			if (truncated) {
				// Remove elementos seguintes se já truncamos
				for (var j = i + 1; j < children.length; j++) {
					temp.removeChild(children[j]);
				}
				break;
			}
		}
		
		return temp.innerHTML;
	}
	
	// Função para adicionar link "Expandir"
	function addExpandLink(container) {
		var expandLink = '…&nbsp;<a href="#" class="read-more">Expandir&nbsp;&raquo;</a>';
		
		// Procura pelo último elemento que contém texto
		var walker = document.createTreeWalker(
			container,
			NodeFilter.SHOW_TEXT,
			null,
			false
		);
		
		var lastTextNode = null;
		var node;
		while (node = walker.nextNode()) {
			if (node.textContent.trim()) {
				lastTextNode = node;
			}
		}
		
		if (lastTextNode && lastTextNode.parentNode) {
			// Adiciona o link no elemento pai do último nó de texto
			lastTextNode.parentNode.innerHTML += expandLink;
		} else {
			// Fallback: adiciona no final do container
			container.innerHTML += expandLink;
		}
	}
	
	// Função para adicionar link "Contrair"
	function addContractLink(container) {
		var contractLink = '&nbsp;<a href="#" class="read-less">&laquo;&nbsp;Contrair</a>';
		
		// Procura pelo último elemento que contém texto
		var walker = document.createTreeWalker(
			container,
			NodeFilter.SHOW_TEXT,
			null,
			false
		);
		
		var lastTextNode = null;
		var node;
		while (node = walker.nextNode()) {
			if (node.textContent.trim()) {
				lastTextNode = node;
			}
		}
		
		if (lastTextNode && lastTextNode.parentNode) {
			// Adiciona o link no elemento pai do último nó de texto
			lastTextNode.parentNode.innerHTML += contractLink;
		} else {
			// Fallback: adiciona no final do container
			container.innerHTML += contractLink;
		}
	}
	
	// Event delegation para os links
	document.addEventListener("click", function(e) {
		if (e.target.classList.contains("read-more")) {
			e.preventDefault();
			var wrapper = e.target.closest(".comment-wrapper");
			var collapsed = wrapper.querySelector(".collapsed-comment");
			var full = wrapper.querySelector(".full-comment");
			
			collapsed.style.display = "none";
			full.style.display = "block";
		}
		
		if (e.target.classList.contains("read-less")) {
			e.preventDefault();
			var wrapper = e.target.closest(".comment-wrapper");
			var collapsed = wrapper.querySelector(".collapsed-comment");
			var full = wrapper.querySelector(".full-comment");
			
			full.style.display = "none";
			collapsed.style.display = "block";
		}
	});
});
</script>

<?php } elseif ( is_page( '25504' ) || is_single( '32681' ) ) { /* Tabela dinâmica do diretório de newsletters */ ?>
	<script src="/wp-content/themes/dez/js/jsDelivr.js" type="text/javascript"></script>

	<script type="module">
		window.onload = () => {
			function shuffleArray(array) {
				for (var i = array.length - 1; i > 0; i--) {
					var j = Math.floor(Math.random() * (i + 1));
					var temp = array[i];
					array[i] = array[j];
					array[j] = temp;
				}
			}

			const table = document.querySelector('table');
const rows = Array.from(table.querySelectorAll("tr")).slice(1); // pula o cabeçalho
shuffleArray(rows);

for (const row of rows) {
	table.querySelector('tbody').appendChild(row);
}

const dataTable = new simpleDatatables.DataTable("table", {
	searchable: true,
	fixedHeight: false,
	columns: [ { select: [4, 5], hidden: true } ],
	perPage: 50,
	perPageSelect: [20, 50, 100],
	labels: {
		placeholder: "Pesquisar…",
		perPage: "{select} itens por página",
		noRows: "Nada encontrado",
		info: "Mostrando {start} a {end} de {rows} itens",
	}
})
} </script>
<?php }
}
add_action( 'wp_footer', 'dez_scripts_rodape_especiais' );

function dez_scripts_rodape_gerais() { ?>
	<script defer src="https://umami.manualdousuario.net/script.js" data-website-id="bd0b3698-4f84-4b35-ad28-73090b456682"></script>

	<script type="text/javascript">
		const compartilharPost = (title, url, element) => {
			if (navigator.canShare) {
				const shareData = {
					title: title,
					url: url
				}
				navigator.share(shareData)
			} else {
				navigator.clipboard.writeText(`${url}`)
				.then(() => {
					const span = element.querySelector('span');
					if (span) {
						span.textContent = "Link copiado";
					}
					setTimeout(() => {
						span.textContent = "Compartilhe";
					}, 3000);
				})
				.catch(err => {
					console.error('Erro ao copiar o link: ', err);
				});
			}
		}			
	</script>

	<script type="text/javascript">
		window.addEventListener('scroll', function() {
			var elementosParaRevelar = document.querySelectorAll('.top');
			var alturaParaRevelar = 100;

			elementosParaRevelar.forEach(function(elemento) {
				var posicaoVertical = window.scrollY || window.pageYOffset;

				if (posicaoVertical >= alturaParaRevelar) {
					elemento.classList.add('top-visivel');
				} else {
					elemento.classList.remove('top-visivel');
				}
			});
		});			
	</script>
	<noscript><style>.top{opacity:.5}.top:hover{opacity:1}</style></noscript>
<?php }
add_action( 'wp_footer', 'dez_scripts_rodape_gerais' );


/**
 * Bloqueia chamadas da HTTP API. Complementa o plugin HTTP Requests Manager
 */
add_filter( 'pre_http_request', 'dez_pre_http_request_block', 10, 3 );
function dez_pre_http_request_block( $preempt, $args, $url ) {

	$block_list = [];
	$block_list[] = 'https://public-api.wordpress.com/rest/v1.1/sites/221233611/comments';
	$block_list[] = 'https://public-api.wordpress.com/wpcom/v2/themes';
	$block_list[] = 'https://stats.wp.com/';
	$block_list[] = 'https://api.wordpress.org/core/serve-happy';
	$block_list[] = 'https://api.wordpress.org/core/browse-happy';

	foreach($block_list as $b) {
		if ( strpos( $url, $b ) !== false ) {
			return new WP_Error( 'http_request_block', 'This request is blocked by site administrator' );
		}
	}

	return $preempt;
}


/**
 * Desativa e-mail de novo usuário para admin
 */
function dez_notificacao_novo_usuario( $user_id, $notify = 'user' ) {
	if ( empty( $notify ) || 'admin' === $notify ) {
		return;
	} elseif ( 'both' === $notify ) {
		// Send new users the email but not the admin.
		$notify = 'user';
	}
	wp_send_new_user_notifications( $user_id, $notify );
}

add_action(
	'init',
	function () {
		// Disable default email notifications.
		remove_action( 'register_new_user', 'wp_send_new_user_notifications' );
		remove_action( 'edit_user_created_user', 'wp_send_new_user_notifications' );

		// Replace with custom function that only sends to user.
		add_action( 'register_new_user', 'dez_notificacao_novo_usuario' );
		add_action( 'edit_user_created_user', 'dez_notificacao_novo_usuario', 10, 2 );
	}
);


/**
 * Traduções na interface (plugin Polylang)
 */
function dez_after_setup_theme() {
    if ( function_exists( 'pll_register_string' ) ) {
        pll_register_string( 'por', 'por', 'dez', false );
        pll_register_string( 'Sobre', 'Sobre', 'dez', false );
        pll_register_string( 'AssociadoA', 'Associado à', 'dez', false );
        pll_register_string( 'Apoio', 'Apoio', 'dez', false );
    }
}
 add_action( 'after_setup_theme', 'dez_after_setup_theme' );


add_action( 'template_redirect', function() {
	ob_start( function( $buffer ) {
		return preg_replace( '#<style[^>]+id=[\'"]jetpack-global-styles-frontend-style-inline-css[\'"][^>]*>.*?</style>#s', '', $buffer );
	});
});
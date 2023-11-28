<?php
/**
 * Dez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dez
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '2.1.2' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features. Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook.
 */
function dez_setup() {
	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'dez', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Switch default core markup for search form, comment form, and comments
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
}
add_action( 'after_setup_theme', 'dez_setup' );

/**
 * Carrega scripts e folhas de estilo.
 */
function dez_scripts() {
	wp_enqueue_style( 'dez-style', get_stylesheet_directory_uri() . '/style.min.css', [], filemtime( get_stylesheet_directory() . '/style.min.css' ) );
	wp_style_add_data( 'dez-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dez_scripts' );

/**
 * Template tags personalizadas para o tema.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Enable support for Post Formats.
 */
add_theme_support(
	'post-formats',
	array(
		'aside',
		'quote',
		'image',
	)
);

/**
 * Impede o WordPress de gerar novos tamanhos de imagens.
 */
add_filter(
	'intermediate_image_sizes',
	function( $sizes ) {
		return array_diff( $sizes, array( 'medium_large' ) );
	}
);

/**
 * Remove tamanhos de imagens padrões adicionais no upload.
 */
function dez_remove_large_image_sizes() {
	remove_image_size( '1536x1536' );
	remove_image_size( '2048x2048' );
}
add_action( 'init', 'dez_remove_large_image_sizes' );

/**
 * Desativa Gutemberg.
 */
wp_dequeue_style( 'wp-block-library' );
wp_deregister_style( 'wp-block-library' );

wp_dequeue_style( 'wp-block-library-theme' );
wp_deregister_style( 'wp-block-library-theme' );

wp_dequeue_style( 'global-styles' );
wp_deregister_style( 'global-styles' );

wp_dequeue_style( 'classic-theme-styles-css' );
wp_deregister_style( 'classic-theme-styles-css' );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles' );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_filter( 'use_block_editor_for_post', '__return_false' );

add_filter( 'use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_blog_editor', '__return_false' );

/**
 * Desativa estilos e scripts de plugins.
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_dequeue_style( 'user-toolkit' );
		wp_deregister_style( 'user-toolkit' );

		wp_dequeue_style( 'ssp-block-style' );
		wp_deregister_style( 'ssp-block-style' );
		wp_dequeue_style( 'ssp-block-fonts-style' );
		wp_deregister_style( 'ssp-block-fonts-style' );
		wp_dequeue_style( 'ssp-block-gizmo-fonts-style' );
		wp_deregister_style( 'ssp-block-gizmo-fonts-style' );
		wp_dequeue_style( 'ssp-recent-episodes' );
		wp_deregister_style( 'ssp-recent-episodes' );

		wp_dequeue_style( 'stcr-style' );
		wp_deregister_style( 'stcr-style' );
	},
	20
);

/**
 * Limpeza do cabeçalho e rodapé.
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'mediaelement-css' );
remove_action( 'wp_head', 'wp_print_font_faces', 50 );

add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );

/**
 * Remove alguns scripts padrões.
 */
function dez_dequeue_scripts() {
	wp_dequeue_script( 'wp-embed' );
	wp_deregister_script( 'wp-embed' );
	wp_dequeue_script( 'wp-mediaelement' );
	wp_deregister_script( 'wp-mediaelement' );
	wp_dequeue_script( 'wp-mediaelement' );
	wp_deregister_style( 'wp-mediaelement' );
}
add_action( 'wp_enqueue_scripts', 'dez_dequeue_scripts' );

/**
 * Remove jQuery.
 */
function dez_remove_jquery() {
	wp_dequeue_script( 'jquery' );
	wp_deregister_script( 'jquery' );
}
add_filter( 'wp_enqueue_scripts', 'dez_remove_jquery', PHP_INT_MAX );

/**
 * Remove referências à API JSON do cabeçalho.
 */
function dez_remove_json_api() {
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'after_setup_theme', 'dez_remove_json_api' );

/**
 * Desativa JSON API.
 */
function dez_desativa_api_json() {
	add_filter( 'json_enabled', '__return_false' );
	add_filter( 'json_jsonp_enabled', '__return_false' );
	// add_filter( 'rest_enabled', '__return_false' );
	add_filter( 'rest_jsonp_enabled', '__return_false' );
}
add_action( 'after_setup_theme', 'dez_desativa_api_json' );

/**
 * Corrige e remove coisas do plugin Seriously Simple Podcasting.
 */
add_filter(
	'ssp_feed_item_content', // Acrescenta parágrafos ao feed.
	function ( $content ) {
		return wpautop( $content );
	}
);

global $ss_podcasting;
remove_action( 'wp_print_footer_scripts', array( $ss_podcasting, 'html5_player_conditional_scripts' ) );
remove_action( 'wp_print_footer_scripts', array( $ss_podcasting, 'html5_player_styles' ) );
remove_action( 'wp_enqueue_scripts', array( $ss_podcasting, 'load_scripts' ) );
remove_action( 'wp_footer', array( $ss_podcasting, 'ssp_override_player_styles' ) );

/**
 * Remove emojis personalizados.
 */
function dez_desativa_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	add_filter( 'tiny_mce_plugins', 'dez_desativa_wp_emojicons_tinymce' );
}
add_action( 'init', 'dez_desativa_wp_emojicons' );

function dez_desativa_wp_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove feed de comentários
 */
function dez_remove_feed_comentarios() {
	return false;
}
add_filter( 'feed_links_show_comments_feed', 'dez_remove_feed_comentarios' );

/**
 * Substitui logo do WordPress por personalizado na tela de cadastro/login.
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

/**
 * Troca o link da imagem na tela de cadastro/login.
 */
function dez_login_link( $url ) {
	return 'https://manualdousuario.net/';
}
add_filter( 'login_headerurl', 'dez_login_link' );

/**
 * Remove seletor de idioma na tela de cadastro/login.
 */
add_filter( 'login_display_language_dropdown', '__return_false' );

/**
 * Favicons personalizados.
 */
function dez_favicons() {
	?>
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/icon.svg" type="image/svg+xml">
	<meta name="theme-color" media="(prefers-color-scheme: light)" content="#fafafa">
	<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#030303">
	<?php
}
add_action( 'wp_head', 'dez_favicons' );

/**
 * Altera mensagem antes do formulário de comentar.
 */
function dez_mensagem_form_comentarios( $defaults ) {
	$logincom = esc_url( wp_login_url( get_permalink() ) );
	$defaults['comment_notes_before'] = '<div class="comment-form-alert ctx-atencao"><p>Por favor, <a href="/doc-comentarios/">leia as regras de convivência</a>. É possível formatar o comentário com HTML ou <a href="https://pt.wikipedia.org/wiki/Markdown#Exemplos_de_sintaxe">Markdown</a>.</p><p><a href="/cadastro/">Cadastre-se gratuitamente</a> para ter um perfil verificado e poder votar no <a href="/orbita/">Órbita</a>. Já tem cadastro? <a href="' . $logincom . '">Faça login</a>.</p></div>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'dez_mensagem_form_comentarios' );

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
 * Ocultar e exibir comentários.
 */
function dez_oculta_exibe_comentarios() {
	if ( have_comments() ) {
		?>
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
		<?php
	}
}
add_action( 'wp_footer', 'dez_oculta_exibe_comentarios' );

/**
 * Corrige sensibilidade do link “Responder”, nos comentários, em telas sensíveis a toques.
 */
function dez_sensibilidade_responder() {
	if ( have_comments() ) {
		?>
		<script type="text/javascript">
			window.addEventListener('load', function() {
				document.getElementById('comments').addEventListener('touchstart', function(e) {
					if( e.target.className === 'comment-reply-link' ) {
						e.stopPropagation();
					}
				}, true);
			});
		</script>
		<?php
	}
}
add_action( 'wp_footer', 'dez_sensibilidade_responder' );

/**
 * Chama o littlefoot.js.
 */
function dez_littlefoot() {
	if ( is_singular() ) {
		?>
		<script src="/wp-content/themes/dez/js/littlefoot.js" type="application/javascript"></script>
		<script type="application/javascript">
			littlefoot.littlefoot()
		</script>
		<?php
	}
}
add_action( 'wp_footer', 'dez_littlefoot' );

/**
 * Chama script do botão “voltar para cima”.
 */
function dez_botao_rolar_top() { ?>
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
<?php	}
add_action( 'wp_footer', 'dez_botao_rolar_top' );

/**
 * Chama Simple Data-Tables.
 */
function dez_datatables_init() {
	if ( is_page( '25504' ) // Newsletters brasileiras
|| is_single( '32681' ) ) { // Indicações 2022
	?>
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
<?php
}
}
add_action( 'wp_footer', 'dez_datatables_init' );

/**
 * Remove rótulos padrões em páginas de arquivo.
 */
function dez_remove_rotulos_titulos( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'dez_remove_rotulos_titulos' );

/**
 * Remove “Protegido:” de páginas e posts protegidos por senha.
 */
add_filter( 'protected_title_format', 'myprefix_private_title_format' );
function myprefix_private_title_format( $format ) {
	return '%s';
}

/**
 * Altera texto do placeholder da pesquisa.
 */
function dez_form_pesquisar( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
	<label>
	<span class="screen-reader-text" for="s">' . __( 'Pesquisar por:' ) . '</span>
	<input type="search" class="search-field" placeholder="O que você procura?" value="' . get_search_query() . '" name="s" id="s" /></label>
	<input type="submit" class="search-submit" value="' . esc_attr__( 'Pesquisar' ) . '" />
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'dez_form_pesquisar', 100 );

/**
 * Exibe custom post types nos arquivos no front-end.
 */
function dez_custom_posts_arquivos( $query ) {
	if ( ! is_admin() && ( $query->is_date || $query->is_author ) ) {
		$query->set( 'post_type', array( 'post', 'podcast' ) ); }
		remove_action( 'pre_get_posts', 'custom_post_author_archive' );
	}
	add_action( 'pre_get_posts', 'dez_custom_posts_arquivos' );

/**
 * Define quais post types aparecem na pesquisa.
 */
function dez_pesquisar_post_types( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'podcast' ) );
	}
	return $query;
}
add_filter( 'the_search_query', 'dez_pesquisar_post_types' );

/**
 * Adiciona o atributo `loading="lazy"` a imagens exibidas pelo `the_post_thumbnail()`.
 */
function dez_lazy_loading_thumbs( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	return str_replace( '<img', '<img loading="lazy"', $html );
}
add_filter( 'post_thumbnail_html', 'dez_lazy_loading_thumbs', 10, 5 );

/**
 * Remove aba “Screen options” para usuários que não são admin.
 */
function dez_remove_screen_options() {
	global $current_user;
	if ( ! current_user_can( 'administrator' ) ) {
		return false;
	} else {
		return true;
	}
}
add_filter( 'screen_options_show_screen', 'dez_remove_screen_options' );

/**
 * Remove todos os widgets do painel de administração de quem não é admin.
 */
function dez_limpeza_dashboard() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

		remove_meta_box( 'dashboard_php_nag', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );
		remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'network_dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'ssp_castos_dashboard', 'dashboard', 'normal' );
	}
}
add_action( 'wp_dashboard_setup', 'dez_limpeza_dashboard' );

/**
 * Remove campos do perfil do usuário.
 */
function dez_remove_campos_perfil( $contactmethods ) {
	unset( $contactmethods['googleplus'] );
	unset( $contactmethods['twitter'] );
	unset( $contactmethods['facebook'] );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'dez_remove_campos_perfil', 10, 1 );

add_action(
	'admin_head',
	function () {
		ob_start(
			function( $subject ) {
				$subject = preg_replace( '#<h[0-9]>' . __( 'Informação autoral' ) . '</h[0-9]>.+?/table>#s', '', $subject, 1 );
				return $subject;
			}
		);
	}
);

add_action(
	'admin_footer',
	function() {
		ob_end_flush();
	}
);

/**
 * Remove opções de cores do wp-admin.
 */
function dez_cores_admin() {
	global $_wp_admin_css_colors;
	$_wp_admin_css_colors = array();
}
add_action( 'admin_head', 'dez_cores_admin' );

/**
 * Força tema “Fresh” no dashboard.
 */
function dez_cor_padrao_admin( $color ) {
	return 'fresh';
}
add_filter( 'get_user_option_admin_color', 'dez_cor_padrao_admin' );

/**
 * Posts do Órbita em ordem cronológica inversa por padrão no dashboard.
 *
 * @param WP_Query $wp_query WP Query.
 */
function wpse_81939_post_types_admin_order( $wp_query ) {
	if ( is_admin() ) {
		$post_type = $wp_query->query['post_type'];
		if ( 'orbita_post' === $post_type ) {
			$wp_query->set( 'orderby', 'date' );
			$wp_query->set( 'order', 'DESC' );
		}
	}
}
add_filter( 'pre_get_posts', 'wpse_81939_post_types_admin_order' );

/**
 * Desativa o editor visual do Classic Editor.
 */
add_filter( 'user_can_richedit', '__return_false', 50 );

/**
 * Remove comentários do código-fonte gerados pelo plugin The SEO Framework.
 */
if ( defined( 'THE_SEO_FRAMEWORK_VERSION' ) ) {
	add_action(
		'get_header',
		function() {
			ob_start(
				function( $o ) {
					return preg_replace( '/\n?<.*?The SEO Framework.*?>/mi', '', $o );
				}
			);
		}
	);
	add_action(
		'wp_head',
		function() {
			ob_end_flush();
		},
		999
	);
}

/**
 * Adiciona suporte a Markdown (via Jetpack) ao Órbita.
 */
function dez_markdown_custom_post() {
	add_post_type_support( 'orbita_post', 'wpcom-markdown' ); 
}
add_action('init', 'dez_markdown_custom_post');

/**
 * Aumenta o prazo de validade do login para 1 mês (sem marcar o “lembrar-me”) e 1 ano (marcando).
 */
function dez_auth_cookie_expiration( $expiration, $user_id, $remember ) {
	if ( $remember ) {
		$expiration = YEAR_IN_SECONDS;
	} else {
		$expiration = MONTH_IN_SECONDS;
	}
	return $expiration;
}
add_filter('auth_cookie_expiration', 'dez_auth_cookie_expiration', 10, 3);

/**
 * Remove a área “Links” da barra lateral do painel administrativo.
 */
function dez_remove_links_menu() {
	remove_menu_page('link-manager.php');
}
add_action( 'admin_menu', 'dez_remove_links_menu' );
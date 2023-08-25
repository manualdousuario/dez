<?php
/**
 * Dez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dez
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.22' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dez_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Dez, use a find and replace
		* to change 'dez' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'dez', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dez' ),
			)
		);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

	// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'dez_setup' );

/**
 * Impede o WordPress de gerar novos tamanhos de imagens.
 */
add_filter(
	'intermediate_image_sizes',
	function( $sizes ) {
		return array_diff( $sizes, array( 'medium_large' ) );  // Medium Large (768 x 0).
	}
);

add_action( 'init', 'j0e_remove_large_image_sizes' );

/**
 * Remove large image sizes.
 */
function j0e_remove_large_image_sizes() {
	remove_image_size( '1536x1536' );             // 2 x Medium Large (1536 x 1536)
	remove_image_size( '2048x2048' );             // 2 x Large (2048 x 2048)
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dez_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dez_content_width', 640 );
}
add_action( 'after_setup_theme', 'dez_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dez_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dez' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dez' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dez_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dez_scripts() {
	wp_enqueue_style( 'dez-style', get_stylesheet_directory_uri() . '/style.min.css', array(), _S_VERSION );
	wp_style_add_data( 'dez-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dynamic-menu', get_template_directory_uri() . '/js/dynamicMenu.min.js', array(), _S_VERSION, [ 'strategy' => 'async' ], 99 );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dez_scripts' );

/**
 * Custom template tags for this theme.
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
		'link',
	)
);

/**
 * Disable Gutemberg.
 */
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_widgets_blog_editor', '__return_false' );

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'global-styles' );
		wp_dequeue_style( 'classic-theme-styles-css' );
		wp_dequeue_style( 'user-toolkit' );

		/**
		 * Disable Seriously Simple Podcasting block styles.
		 */
		wp_dequeue_style( 'ssp-block-style' );
		wp_dequeue_style( 'ssp-block-fonts-style' );
		wp_dequeue_style( 'ssp-block-gizmo-fonts-style' );
		wp_dequeue_style( 'ssp-recent-episodes' );

		/**
		 * Corrige parágrafo falho nos feeds do Seriously Simple Podcasting.
		 */
		add_filter(
			'ssp_feed_item_content',
			function ( $content ) {
				return wpautop( $content );
			}
		);

		/**
		 * Disable StCR style.
		 */
		wp_deregister_style( 'stcr-style' );
	},
	20
);

/**
 * Head & footer cleanup.
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'mediaelement-css' );

add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );

/**
 * Change default jquery.
 */
function change_default_jquery() {
	wp_dequeue_script( 'jquery' );
	wp_deregister_script( 'jquery' );
}

/**
 * Remove jetpack.css
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );

/**
 * Remove specific scripts.
 */
function wpassist_dequeue_scripts() {
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script( 'wp-mediaelement' );
	wp_deregister_style( 'wp-mediaelement' );
}
add_action( 'wp_enqueue_scripts', 'wpassist_dequeue_scripts' );

global $ss_podcasting;
remove_action( 'wp_print_footer_scripts', array( $ss_podcasting, 'html5_player_conditional_scripts' ) );
remove_action( 'wp_print_footer_scripts', array( $ss_podcasting, 'html5_player_styles' ) );
remove_action( 'wp_enqueue_scripts', array( $ss_podcasting, 'load_scripts' ) );
remove_action( 'wp_footer', array( $ss_podcasting, 'ssp_override_player_styles' ) );

/**
 * Remove JSON API references from header.
 */
function remove_json_api() {
	// remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	// remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'after_setup_theme', 'remove_json_api' );

/**
 * Disable JSON API.
 
function disable_json_api() {
	add_filter( 'json_enabled', '__return_false' );
	add_filter( 'json_jsonp_enabled', '__return_false' );
	add_filter( 'rest_enabled', '__return_false' );
	add_filter( 'rest_jsonp_enabled', '__return_false' );
}
add_action( 'after_setup_theme', 'disable_json_api' ); */

/**
 * Remove custom emojis support.
 */
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

/**
 * Disable emojicons tinymce.
 *
 * @param Plugins $plugins Plugins.
 */
function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove website field from comment form.
 */
add_filter( 'comment_form_default_fields', 'unset_url_field' );

/**
 * Unset URL field.
 *
 * @param fields $fields Fields.
 */
function unset_url_field( $fields ) {
	if ( isset( $fields['url'] ) ) {
		unset( $fields['url'] );
	}
	return $fields;
}

/**
 * Remove comments' feed.
 */
function return_false() {
	return false;
}
add_filter( 'feed_links_show_comments_feed', 'return_false' );

/**
 * Replace WordPress logo on login/signup page.
 */
function my_login_logo_one() { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(https://manualdousuario.net/wp-content/themes/dez/img/logo-manual-do-usuario-dez@2x.png);
			padding-bottom: 30px;
			margin: 0;
			width: 100%;
			background-size: 202px;
		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

/**
 * Change link in login's page image.
 */
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

/**
 * Custom favicons.
 */
function calls_better_favicon() {
	?>
	<link rel="manifest" href="/manifest.webmanifest">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/icon.svg" type="image/svg+xml">
	<meta name="theme-color" media="(prefers-color-scheme: light)" content="#fafafa">
	<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#000000">
	<?php
}

add_action( 'wp_head', 'calls_better_favicon' );

/**
 * Custom login logo URL.
 *
 * @param URL $url Logo URL.
 */
function custom_loginlogo_url( $url ) {
	return 'https://manualdousuario.net/';
}

/**
 * Remove language selector in wp-login.php
 */
add_filter( 'login_display_language_dropdown', '__return_false' );

/**
 * Fix too sensistive reply link in comments.
 */
function fix_reply_link_comments() {
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
add_action( 'wp_footer', 'fix_reply_link_comments' );

/**
 * Calls Littlefoot
 */
function calls_littlefoot() {
	if ( is_singular() ) {
		?>
		<script src="/wp-content/themes/dez/js/littlefoot.js" type="application/javascript"></script>
		<script type="application/javascript">
			littlefoot.default()
		</script>
		<?php
	}
}
add_action( 'wp_footer', 'calls_littlefoot' );

/**
 * Simple Data-Tables
 */
function datatables_init() {
	if ( is_page( '25504' ) /* Newsletters brasileiras */
				|| is_single( '32681' ) /* Indicações 2022 */ ) {
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
add_action( 'wp_footer', 'datatables_init' );

/**
 * Remove rótulos padrões em páginas de arquivo.
 */
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/**
 * Theme archive title.
 *
 * @param Title $title Title.
 */
function my_theme_archive_title( $title ) {
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

/**
 * Altera mensagem antes do formulário de comentar.
 */
add_filter( 'comment_form_defaults', 'sp_add_comment_form_before' );

/**
 * Add comment form before.
 *
 * @param Defaults $defaults Defaults.
 */
function sp_add_comment_form_before( $defaults ) {
	$defaults['comment_notes_before'] = '<p class="ctx-atencao">É possível formatar o texto do comentário com HTML ou <a href="https://pt.wikipedia.org/wiki/Markdown#Exemplos_de_sintaxe">Markdown</a>. Seu e-mail não será exposto. Antes de comentar, <a href="/doc-comentarios/">leia isto</a>.</p>';
	return $defaults;
}

/**
 * Altera mensagem de cookies nos comentários.
 *
 * @param fields $fields Fields.
 */
function comment_form_change_cookies_consent( $fields ) {
	if ( ! is_admin() ) {
		$commenter         = wp_get_current_commenter();
		$consent           = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
						'<label for="wp-comment-cookies-consent">Salvar dados para futuros comentários</label></p>';
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'comment_form_change_cookies_consent' );

/**
 * Altera texto do placeholder da pesquisa.
 *
 * @param Form $form Form.
 */
function my_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
    <label>
    <span class="screen-reader-text" for="s">' . __( 'Pesquisar por:' ) . '</span>
    <input type="search" class="search-field" placeholder="O que você procura?" value="' . get_search_query() . '" name="s" id="s" /></label>
    <input type="submit" class="search-submit" value="' . esc_attr__( 'Pesquisar' ) . '" />
    </form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

/**
 * Colapse thread in comments.
 */
function collapse_comments() {
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
add_action( 'wp_footer', 'collapse_comments' );

/**
 * Remove ícone de RSS do título do widget RSS.
 */
add_filter( 'rss_widget_feed_link', '__return_false' );

/**
 * Show custom post types in archives, but only in front-end.
 *
 * @param Query $query Query.
 */
function custom_post_date_archive( $query ) {
	if ( ! is_admin() && ( $query->is_date || $query->is_author ) ) {
		$query->set( 'post_type', array( 'post', 'podcast' ) ); }
	remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}
add_action( 'pre_get_posts', 'custom_post_date_archive' );

/**
 * Define what post types to search.
 *
 * @param Query $query Query.
 */
function search_all( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'podcast' ) );
	}
	return $query;
}
add_filter( 'the_search_query', 'search_all' );


/**
 * Add `loading="lazy"` attribute to images output by the_post_thumbnail().
 */
add_filter( 'post_thumbnail_html', 'wpdd_modify_post_thumbnail_html', 10, 5 );

/**
 * Modify post thumbnail
 *
 * @param HTML              $html HTML.
 * @param Post_ID           $post_id Post_ID.
 * @param Post_Thumbnail_ID $post_thumbnail_id Post_Thumbnail_ID.
 * @param Size              $size Size.
 * @param Attributes        $attr Attributes.
 */
function wpdd_modify_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

	return str_replace( '<img', '<img loading="lazy"', $html );

}

/**
 * Acrescenta parágrafos aos posts do Seriously Simple Podcasting (SSP)
 */
add_filter(
	'ssp_feed_item_content',
	function ( $content ) {
		return wpautop( $content );
	}
);

/**
 * Remove aba “Screen options” para usuários que não são admin.
 */
function shape_space_remove_screen_options() {
	global $current_user;
	if ( ! current_user_can( 'administrator' ) ) {
		return false;
	} else {
		return true;
	}
}
add_filter( 'screen_options_show_screen', 'shape_space_remove_screen_options' );

/**
 * Remove todos os widgets do painel de administração de quem não é admin.
 */
function shape_space_wp_dashboard_setup() {

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
add_action( 'wp_dashboard_setup', 'shape_space_wp_dashboard_setup' );

/**
 * Remove campos do perfil do usuário.
 *
 * @param Contact_Methods $contactmethods Contact Methods.
 */
function new_contactmethods( $contactmethods ) {
	unset( $contactmethods['googleplus'] );
	unset( $contactmethods['twitter'] );
	unset( $contactmethods['facebook'] );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'new_contactmethods', 10, 1 );

/**
 * Limita o tamanho dos arquivos enviados pelo Simple Local Avatars.
 */
add_filter(
	'simple_local_avatars_upload_limit',
	function() {
		return 1024 * 500; // 500 KB
	}
);

/**
 * Remove opções de cores do wp-admin.
 */
function admin_color_scheme() {
	global $_wp_admin_css_colors;
	$_wp_admin_css_colors = array();
}
add_action( 'admin_head', 'admin_color_scheme' );

/**
 * Força paleta de cores “Fresh”.
 */
add_filter( 'get_user_option_admin_color', 'my_force_user_color' );

/**
 * Force user color.
 *
 * @param Color $color Color.
 */
function my_force_user_color( $color ) {
	return 'fresh';
}

/**
 * Remove opções do perfil do usuário.
 */
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
 * Posts do Órbita em ordem cronológica inversa por padrão.
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
 * Term permalink.
 *
 * @param URL      $url URL.
 * @param Term     $term Term.
 * @param Taxonomy $taxonomy Taxonomy.
 */
function rudr_term_permalink( $url, $term, $taxonomy ) {

	$taxonomy_name = 'category';
	$taxonomy_slug = 'category';

	if ( strpos( $url, $taxonomy_slug ) === false || $taxonomy !== $taxonomy_name ) {
		return $url;
	}

	$url = str_replace( '/' . $taxonomy_slug, '', $url );

	return $url;
}


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

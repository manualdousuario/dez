<?php
/**
 * Dez functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dez
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '4.1.3' );
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
			'video',
		)
	);
}
add_action( 'after_setup_theme', 'dez_setup' );

/**
 * Carrega folha de estilo principal (style.min.css) com rel="preload"
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
	wp_dequeue_style( 'image-sizes' ); // Remove Unused Plugin code.

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

//	More formatting crap.
add_action("init", function() {
	remove_filter( "the_content", "convert_smilies", 20 );
	foreach ( array( "the_content", "the_title", "wp_title", "document_title" ) as $filter ) {
		remove_filter( $filter, "capital_P_dangit", 11 );
	}
	remove_filter( "comment_text", "capital_P_dangit", 31 );	//	No idea why this is separate
	remove_filter( "the_content",  "do_blocks", 9 );
}, 11);

/**
 * Expiração de cookies de autenticação.
 */
add_filter( 'auth_cookie_expiration', function () {
	return 2 * YEAR_IN_SECONDS; // 2 years in seconds.
} );

/**
 * Seriously Simple Podcasting.
 */
add_filter( 'ssp_feed_item_content', function ( $content ) {
	return wpautop( $content );
} ); // Acrescenta parágrafos ao Seriously Simple Podcasting.
add_filter( 'ssp_feed_number_of_posts', function() {
	return 999;
} ); // Aumenta itens no feed dos podcasts (Seriously Simple Podcasting).

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
 * Altera mensagem antes do formulário de comentar.
 */
function dez_mensagem_form_comentarios( $defaults ) {
	$logincom = esc_url( wp_login_url( get_permalink() ) );
	$defaults['comment_notes_before'] = '<p class="comment-form-alert ctx">Por favor, <a href="/doc-comentarios/">leia as regras</a> antes de comentar.</p>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'dez_mensagem_form_comentarios' );

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
				registrationDelay: 40000,
				customSegments: {
					tag: '<?= $section; ?>'
				},
			};
			const aloClient = new aloSDK(aloConfig);
		</script>
	<?php } }
	add_action( 'wp_footer', 'dez_script_alo' );


/**
 * Diminui sensibilidade do link “Responder” nos comentários.
 */
function dez_scripts_rodape_especiais() {
	if ( have_comments() ) { ?>
		<script type="text/javascript">
			window.addEventListener('load', function() {
				document.getElementById('comments').addEventListener('touchstart', function(e) {
					if (e.target.className === 'comment-reply-link') {
						e.stopPropagation();
					}
				}, true);
			});
		</script>
	<? }
}
add_action( 'wp_footer', 'dez_scripts_rodape_especiais' );

function dez_scripts_rodape_gerais() { ?>
	<script defer src="https://umami.pcdomanual.com/script.js" data-website-id="bd0b3698-4f84-4b35-ad28-73090b456682"></script>

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

/**
 * Remove prefixos dos títulos das páginas de arquivo
 */
add_filter('get_the_archive_title', function($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = get_the_author();
	} elseif (is_year()) {
		$title = get_the_date('Y');
	} elseif (is_month()) {
		$title = get_the_date('F Y');
	} elseif (is_day()) {
		$title = get_the_date();
	}
	return $title;
});

/**
 * Estende o fechamento automático de comentários para o Órbita
 */
add_filter( 'close_comments_for_post_types', function( $list ) {
	$list[] = 'orbita_post';
	return $list;
} );

/**
 * Parâmetros UTM nos feeds (feito pelo Claude)
 *
function dez_feeds_utm($permalink) {
	global $post;
	
	$utm_params = array(
		'utm_source' => 'rss',
		'utm_medium' => 'feed',
		'utm_campaign' => 'interna',
		'utm_content' => 'blog'
	);
	
	return add_query_arg($utm_params, $permalink);
}
add_filter('the_permalink_rss', 'dez_feeds_utm');

function dez_adicionar_feeds_sem_utm($content) {
	if (!is_feed()) {
		return $content;
	}
	
	global $post;
	$link_original = get_permalink($post->ID);
	
	$utm_params = array(
		'utm_source' => 'rss',
		'utm_medium' => 'feed',
		'utm_campaign' => 'interna',
		'utm_content' => 'blog'
	);
	
	$link_utm = add_query_arg($utm_params, $link_original);
	$content = str_replace($link_original, $link_utm, $content);
	
	return $content;
}
add_filter('the_content', 'dez_adicionar_feeds_sem_utm');

add_action('init', function() {
	add_feed('sem-utm', function() {
		remove_filter('the_permalink_rss', 'dez_feeds_utm');
		remove_filter('the_content', 'dez_adicionar_feeds_sem_utm');
		load_template(ABSPATH . WPINC . '/feed-rss2.php');
	});

	add_feed('en-sem-utm', function() {
		global $wp_query;
		$wp_query->set('lang', 'en');
		remove_filter('the_permalink_rss', 'dez_feeds_utm');
		remove_filter('the_content', 'dez_adicionar_feeds_sem_utm');
		load_template(ABSPATH . WPINC . '/feed-rss2.php');
	});
}); */
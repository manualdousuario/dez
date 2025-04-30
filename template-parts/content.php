<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

if (!function_exists('dez_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function dez_post_thumbnail() {
		if (is_singular() && has_post_thumbnail()) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(array(1440, 960)); ?>
			</div><!-- .post-thumbnail -->
		<?php endif;
	}
endif;

if (!function_exists('dez_display_no_results')) :
	/**
	 * Displays a message that posts cannot be found
	 */
	function dez_display_no_results() {
		?>
		<section class="no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title">Sem resultados 🤔</h1>
			</header><!-- .page-header -->

			<div class="entry-content">
				<?php if (is_search()) : ?>
					<p>O termo que você pesquisou não existe no arquivo do <strong>Manual do Usuário</strong>. Quer tentar outra vez?</p>
				<?php else : ?>
					<p>A página que você tentou acessar não existe ou foi apagada. Que tal tentar uma pesquisa?</p>
				<?php endif; ?>
				<p><?php get_search_form(); ?></p>
				<p>Ou então dê uma olhada no <a href="/arquivo/">mapa do site</a>.</p>
			</div><!-- .page-content -->
		</section><!-- .no-results -->
		<?php
	}
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		// Armazena valores comumente usados em variáveis para evitar chamadas repetidas
		$permalink = esc_url(get_permalink());
		$post_date = get_the_date();
		$post_time = get_the_time();
		
		// Exibe os títulos com estrutura condicional otimizada
		if (is_singular()) {
			the_title('<h1 class="entry-title">', '</h1>');
		} elseif (has_post_format('quote') && !is_singular()) {
			the_title('<h2 class="entry-title">', '</h2>');
		} else {
			the_title('<h2 class="entry-title"><a href="' . $permalink . '" rel="bookmark">', '</a></h2>');
		}
		?>

		<div class="entry-meta link-alt">
			<?php
			// Estrutura simplificada para metadata
			if (!is_page()) {
				echo '<span class="data-hora">' . $post_date . ', ';
				
				// Adiciona link para permalink apenas em formatos específicos e em contextos de lista
				if ((is_home() || is_archive()) && has_post_format(array('aside', 'image', 'link', 'quote'))) {
					echo '<a href="' . $permalink . '" rel="bookmark" class="link-alt">' . $post_time . '</a>';
				} else {
					echo $post_time;
				}
				echo '</span>';
			}

			// Link para comentários
			if (comments_open() || get_comments_number()) {
				comments_popup_link('0', '1', '%', 'comment-link', '');
			}

			// Dados de autoria
			if (in_category('patrocinios')) {
				echo '<span class="entry-spons0r">' . esc_html__('* Patrocinado', 'dez') . '</span>';
			} else {
				$author_id = get_the_author_meta('ID');
				echo '<span class="author-' . absint($author_id) . '">' . esc_html(get_the_author()) . '</span>';
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php dez_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if (is_search() && !has_post_format()) {
			the_excerpt();
		} else {
			the_content();
		}
		?>

		<?php if (!is_page()) : ?>
			<p class="entry-footer">
				<button class="compartilhe" onClick="compartilharPost('<?php echo esc_js(get_the_title()); ?>', '<?php echo esc_js($permalink); ?>', this);">
					<?php pll_e('Compartilhe'); ?>
				</button>
			</p>
		<?php endif; ?>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
// Exibição do shortcode de newsletter em posts individuais
$current_lang = get_bloginfo('language');
if (is_single() && shortcode_exists('sc')) {
	$shortcode_name = ($current_lang == 'pt-BR') ? 'newsletter-post' : 'newsletter-post-en';
	echo do_shortcode('[sc name="' . esc_attr($shortcode_name) . '"][/sc]');
}
?>
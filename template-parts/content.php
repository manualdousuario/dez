<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		// Verifica se temos um post válido antes de prosseguir
		if (!get_post()) {
			return;
		}
		
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
				echo '<span class="autoria author-' . absint($author_id) . '">' . esc_html(get_the_author()) . '</span>';
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
if (is_single() && shortcode_exists('sc') && get_post()) {
	$shortcode_name = ($current_lang == 'pt-BR') ? 'newsletter-post' : 'newsletter-post-en';
	echo do_shortcode('[sc name="' . esc_attr($shortcode_name) . '"][/sc]');
}
?>
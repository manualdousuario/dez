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
		// Armazena valores comumente usados em variáveis para evitar chamadas repetidas
		$permalink = esc_url(get_permalink());
		
		// Exibe os títulos com estrutura condicional otimizada
		if (is_singular()) {
			the_title('<h1 class="p-name">', '</h1>');
		} elseif (has_post_format('quote') && !is_singular()) {
			the_title('<h2 class="p-name">', '</h2>');
		} else {
			the_title('<h2 class="p-name"><a href="' . $permalink . '" rel="bookmark">', '</a></h2>');
		}
		?>

		<div class="entry-meta link-alt">
			<?php
			// Estrutura simplificada para metadata
			if ( !is_page() ) { ?>
				<time class="dt-published" datetime="<?php echo get_the_date( 'Y-m-d' ); echo '&nbsp;'; echo get_the_time( 'H:m:s' ); ?>"><?php echo get_the_date(); echo ',&nbsp;'; echo get_the_time(); ?></time>
			<?php } ?>

			<?php // Dados de autoria
			if ( in_category('patrocinios') ) {
				echo '<span class="entry-spons0r">' . esc_html__('* Patrocinado', 'dez') . '</span>';
			} else {
				$author_id = get_the_author_meta( 'ID' );
				echo '<span class="p-author h-card author-' . absint($author_id) . '">' . esc_html(get_the_author()) . '</span>';
			}

			if (!is_page()) : ?>
					<button class="compartilhe" aria-label="Compartilhe" onClick="compartilharPost('<?php echo esc_js(get_the_title()); ?>', '<?php echo esc_js($permalink); ?>', this);"></button>
			<?php endif; ?>

			<?php // Link para comentários
			if ( comments_open() || get_comments_number() ) {
				comments_popup_link('0', '1', '%', 'comment-link', '');
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php dez_post_thumbnail(); ?>

	<div class="e-content">
		<?php
		if ( is_search() && !has_post_format() ) {
			the_excerpt();
		} else {
			the_content();
		}
		?>

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
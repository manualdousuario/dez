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
		$permalink = esc_url(get_permalink());
		$link_url = get_post_meta(get_the_ID(), 'link_url', true);
		
		if (is_singular()) {
			if ($link_url) {
				the_title('<h1 class="p-name"><a href="' . esc_url($link_url) . '" rel="bookmark">', '</a>&nbsp;<span class="link-site"><img src="/wp-content/themes/dez/img/icone-link-externo.svg" width="32" height="32" alt>&nbsp;' . get_post_meta(get_the_ID(), 'link_site', true) . '</span></h1>');
			} else {
				the_title('<h1 class="p-name">', '</h1>');
			}
		} else {
			if ($link_url) {
				the_title('<h2 class="p-name"><a href="' . esc_url($link_url) . '" rel="bookmark">', '</a>&nbsp;<span class="link-site"><img src="/wp-content/themes/dez/img/icone-link-externo.svg" width="32" height="32" alt>&nbsp;' . get_post_meta(get_the_ID(), 'link_site', true) . '</span></h2>');
			} else {
				the_title('<h2 class="p-name"><a href="' . $permalink . '" rel="bookmark">', '</a></h2>');
			}
		}
		?>

		<div class="entry-meta">
			<time class="dt-published" datetime="<?php echo get_the_date( 'Y-m-d' ) . ' ' . get_the_time( 'H:m:s' ); ?>">
				<?php if ( !is_singular() ) : 
					echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
					echo get_the_date() . ', ' . get_the_time(); 
					echo '</a>';
				else :
					echo get_the_date() . ', ' . get_the_time(); 
				endif; ?>
			</time>

			<button class="compartilhe" aria-label="Compartilhe" onClick="compartilharPost('<?php echo esc_js(get_the_title()); ?>', '<?php echo esc_js( esc_url(get_permalink()) ); ?>', this);"></button>

			<?php // Link para comentários
			if ( comments_open() || get_comments_number() ) {
				comments_popup_link('0', '1', '%', 'comment-link', '');
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="e-content">
		<?php if ( get_the_author_meta('ID') != 1 ) { ?>
			<p class="p-author">por <?php echo esc_html(get_the_author()); ?></p>
		<?php } 

		the_content(); ?>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
// Exibição do shortcode de newsletter em posts individuais
$current_lang = get_bloginfo('language');
if (is_single() && /*shortcode_exists('sc') &&*/ get_post()) {
	$shortcode_name = ($current_lang == 'en-US') ? 'newsletter-post' : 'newsletter-post-en';
	echo do_shortcode('[sc name="' . esc_attr($shortcode_name) . '"][/sc]');
}
?>
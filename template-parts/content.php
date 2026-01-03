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
		
		if (is_singular()) {
			the_title('<h1 class="p-name">', '</h1>');
		} else {
			the_title('<h2 class="p-name"><a href="' . $permalink . '" rel="bookmark">', '</a></h2>');
		}
		?>

		<div class="entry-meta">
			<?php	if ( ! is_page() ) { ?>
				<time class="dt-published" datetime="<?php echo get_the_date( 'Y-m-d' ) . ' ' . get_the_time( 'H:m:s' ); ?>">
					<?php echo get_the_date() . ', ' . get_the_time(); ?>
				</time>
			<?php } 

			// Dados de autoria
			if ( in_category('patrocinios') ) {
				echo '<span class="entry-spons0r">' . esc_html__('* Patrocinado', 'dez') . '</span>';
			}

			if ( !is_page() ) : ?>
				<button class="compartilhe" aria-label="Compartilhe" onClick="compartilharPost('<?php echo esc_js(get_the_title()); ?>', '<?php echo esc_js($permalink); ?>', this);"></button>
			<?php endif; ?>

			<?php // Link para comentários
			if ( comments_open() || get_comments_number() ) {
				comments_popup_link('0', '1', '%', 'comment-link', '');
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_singular() && has_post_thumbnail() ) :
	the_post_thumbnail( 
		array(1440, 960),
		array('class' => 'post-thumbnail') );
	endif; ?>

	<div class="e-content">
		<?php if ( get_the_author_meta('ID') != 1 ) { ?>
			<p class="p-author"><?php pll_e('por'); ?> <?php echo esc_html(get_the_author()); ?></p>
		<?php }

		the_content(); ?>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
// Exibição do shortcode de newsletter em posts individuais
$current_lang = get_bloginfo( 'language' );
if ( is_single() && shortcode_exists('sc') && get_post() ) {
	$shortcode_name = ( $current_lang == 'pt-BR' ) ? 'newsletter-post' : 'newsletter-post-en';
	echo do_shortcode( '[sc name="' . esc_attr($shortcode_name) . '"][/sc]' );
} ?>
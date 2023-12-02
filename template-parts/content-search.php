<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php the_time( 'j/n/y, G\hi' ); ?>
			<?php if ( ( 'post' || 'podcast' === get_post_type() ) && ( ! in_category( array( 'post-livre', 'patrocinios' ) ) && ! has_tag( array( 'como-eu-trabalho', 'na-mochila', 'escritorio-em-casa' ) ) ) ) : ?>
				<span class="author-<?php the_author_meta('ID'); ?>">&middot; por <?php echo get_the_author_link(); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

<div class="entry-summary">
	<?php the_excerpt(); ?>
</div><!-- .entry-summary -->

<footer class="entry-footer">
	<?php echo '<div class="comments-link">';
	comments_popup_link( '<img loading="lazy" src="/wp-content/themes/dez/img/icone-speech-stroke.svg" alt="Comentar" width="16" height="16" />',
	'<img loading="lazy" src="/wp-content/themes/dez/img/icone-speech.svg" alt="Comentar" width="16" height="16" /><span>1</span>',
	'<img loading="lazy" src="/wp-content/themes/dez/img/icone-speech.svg" alt="Comentar" width="16" height="16" /><span>%</span>',
	'', '' );
	echo '</div>';
	?>
</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

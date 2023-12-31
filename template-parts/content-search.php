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
			<?php if ( comments_open() || get_comments_number() ) :
				echo '&middot;&nbsp;';
				comments_popup_link( '<span>0</span>', '<span>1</span>', '<span>%</span>', 'comment-link', '' );
			endif; ?>
			<?php if ( ( 'post' || 'podcast' === get_post_type() ) && ( ! in_category( array( 'post-livre', 'patrocinios' ) ) && ! has_tag( array( 'como-eu-trabalho', 'na-mochila', 'escritorio-em-casa' ) ) ) ) : ?>
				<span class="author-<?php the_author_meta('ID'); ?>">&middot;&nbsp;por <?php echo get_the_author(); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

<div class="entry-summary">
	<?php the_excerpt(); ?>
</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->

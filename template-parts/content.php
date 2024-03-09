<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

?>

<?php if ( is_home() ) : 
	the_date('D j\/n\/Y', '<p class="data-capa">', '</p>');
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php if ( is_single() || is_archive() ) :
				echo the_time( 'j/n/y, G\hi' );
			elseif ( has_post_format( array('aside', 'quote', 'link') ) ) : 
				echo '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark" class="aside-link">';
				echo get_the_time( 'G\hi' );
				echo '</a>';
			elseif ( is_home() ) :
				echo get_the_time( 'G\hi' ); 
			endif ?>
			<?php if ( comments_open() || get_comments_number() ) :
				echo '&middot;&nbsp;';
				comments_popup_link( '<span>0</span>', '<span>1</span>', '<span>%</span>', 'comment-link', '' );
			endif; ?>
			<?php if ( ( 'post' || 'podcast' === get_post_type() ) && ( ! in_category( array( 'post-livre', 'patrocinios' ) ) && ! has_tag( array( 'como-eu-trabalho', 'na-mochila', 'escritorio-em-casa' ) ) ) ) : ?>
				<span class="author-<?php the_author_meta('ID'); ?>">&middot; por <?php echo get_the_author(); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->

	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	elseif ( 'podcast' === get_post_type() && ! is_singular() ) : 
		the_title( '<h2 class="entry-title">Podcast: <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif; 
	?>
</header><!-- .entry-header -->

<?php if ( is_singular() ) :
	dez_post_thumbnail(); 
endif; ?>

<div class="entry-content">
	<?php if ( 'podcast' === get_post_type() && ! is_singular() ) : 

	else :
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue lendo<span class="screen-reader-text"> "%s"</span>', 'dez' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			wp_kses_post( get_the_title() )
		)
	);
	endif; ?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_single() && shortcode_exists( 'sc' ) ) : 
	echo do_shortcode('[sc name="pos-posts"][/sc]'); 
endif; ?>
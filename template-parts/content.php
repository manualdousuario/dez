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
		<div class="entry-meta link-alt">
			<?php 
			if ( is_home() && is_sticky() ) :
				echo '📌&nbsp;&middot;&nbsp;';
			echo get_the_time( 'j/n/y, G\hi' );
		elseif ( ( is_home() || is_archive() ) && has_post_format( array('aside', 'image', 'link', 'quote') ) ) :
			echo get_the_time( 'j/n/y, ' );
		echo '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark" class="link-alt">'. get_the_time( 'G\hi' ) .'</a>';
	elseif ( ! is_page() ) :
		echo get_the_time( 'j/n/y, G\hi' );
	endif ?>

	<?php if ( comments_open() || get_comments_number() ) :
	echo '&middot;&nbsp;';
	echo comments_popup_link( '<span>0</span>', '<span>1</span>', '<span>%</span>', 'comment-link link-alt', '' );
endif; ?>
<span class="author-<?php the_author_meta('ID'); ?>">&middot; por <?php echo get_the_author(); ?></span>
</div><!-- .entry-meta -->

<?php
if ( is_singular() ) :
	the_title( '<h1 class="entry-title">', '</h1>' );
elseif ( has_post_format( 'quote' ) && ! is_singular() ) : 
	the_title( '<h2 class="entry-title">', '</h2>' );
else :
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif; 
?>
</header><!-- .entry-header -->

<?php if ( is_singular() ) :
	dez_post_thumbnail(); 
endif; ?>

<div class="entry-content">
	<?php the_content(
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
	); ?>
	<?php if ( !is_page() ) : ?>
		<button class="compartilhe" onClick="compartilharPost('<?php echo esc_html( get_the_title() ); ?>', '<?php echo esc_url( get_permalink() ); ?>', this);" title="Compartilhe este post">
			<span>Compartilhe</span>
		</button>
	<?php endif; ?>

</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_single() && shortcode_exists( 'sc' ) ) : 
echo do_shortcode('[sc name="newsletter-post"][/sc]'); 
endif; ?>
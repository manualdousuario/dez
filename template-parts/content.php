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
		<?php if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		elseif ( has_post_format( 'quote' ) && ! is_singular() ) : 
			the_title( '<h2 class="entry-title">', '</h2>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif; ?>

	<div class="entry-meta link-alt">
		<?php 
		if ( is_home() && is_sticky() ) :
			echo '<span>📌</span>';
		echo '<span>'. get_the_time( 'j/n/y, G\hi' ) .'</span>';
	elseif ( ( is_home() || is_archive() ) && has_post_format( array('aside', 'image', 'link', 'quote') ) ) :
		echo '<span>'. get_the_time( 'j/n/y, ' ) .'';
		echo '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark" class="link-alt">'. get_the_time( 'G\hi' ) .'</a></span>';
	elseif ( ! is_page() ) :
		echo '<span>'. get_the_time( 'j/n/y, G\hi' ) .'</span>';
	endif ?>

	<?php if ( comments_open() || get_comments_number() ) :
		echo comments_popup_link( '<span>0</span>', '<span>1</span>', '<span>%</span>', 'comment-link', '' );
	endif; ?>

	<span class="author-<?php the_author_meta('ID'); ?>">
		<?php echo get_the_author(); ?>
	</span>
</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php dez_post_thumbnail(); ?>

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
		<p style="text-align:center;max-width:100%"><button class="compartilhe" onClick="compartilharPost('<?php echo esc_html( get_the_title() ); ?>', '<?php echo esc_url( get_permalink() ); ?>', this);" title="Compartilhe este post">
			<span>Compartilhe</span>
		</button></p>
	<?php endif; ?>

</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( is_single() && shortcode_exists( 'sc' ) ) : ?>
<?php echo do_shortcode('[sc name="newsletter-post"][/sc]'); ?>
<?php endif; ?>
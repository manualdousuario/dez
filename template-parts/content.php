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
		if ( ( is_home() || is_archive() ) && has_post_format( array('aside', 'image', 'link', 'quote') ) ) :
			echo '<span class="data-hora">'. get_the_date() .', ';
			echo '<a href="'. esc_url( get_permalink() ) .'" rel="bookmark" class="link-alt">'. get_the_time() .'</a></span>';
		elseif ( ! is_page() ) :
			echo '<span class="data-hora">'. get_the_date() .', '. get_the_time() .'</span>';
		endif ?>

	<?php if ( comments_open() || get_comments_number() ) :
		echo comments_popup_link( '0', '1', '%', 'comment-link', '' );
	endif; ?>

	<span class="author-<?php the_author_meta('ID'); ?>">
		<?php echo get_the_author(); ?>
	</span>
</div><!-- .entry-meta -->
</header><!-- .entry-header -->

<?php dez_post_thumbnail(); ?>

<div class="entry-content">
	<?php the_content(); ?>

	<?php if ( !is_page() ) : ?>
		<p class="entry-footer"><button class="compartilhe" onClick="compartilharPost('<?php echo esc_html( get_the_title() ); ?>', '<?php echo esc_url( get_permalink() ); ?>', this);">
			<?php pll_e('Compartilhe'); ?>
		</button></p>
	<?php endif; ?>

</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php $currentlang = get_bloginfo( 'language' );
if ( is_single() && shortcode_exists( 'sc' ) && $currentlang == 'pt-BR' ) :
	echo do_shortcode('[sc name="newsletter-post"][/sc]');
elseif ( is_single() && shortcode_exists( 'sc' ) && $currentlang == 'en-US' ) :
	echo do_shortcode('[sc name="newsletter-post-en"][/sc]');
endif; ?>
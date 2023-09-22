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
	<?php if ( has_post_format( 'aside' ) ) : ?>
		<div class="entry-content">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '.</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '.</h2>' );
			endif;
			?>
			<?php the_content(); ?>
		</div>
		<div class="entry-meta">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_time( 'j/n/y, G\hi' ); ?></a>
			&middot; <?php the_author_posts_link(); ?>
			<?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<div class="comments-link">';
				comments_popup_link( 'Comente', '1 comentário', '% comentários', '', '' );
				echo '</div>';
			}
			?>
		</div>
	<?php elseif ( has_post_format( 'image' ) ) : ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;
			?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<div class="entry-meta">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_time( 'j/n/y, G\hi' ); ?></a>
			&middot; <?php the_author_posts_link(); ?>
			<?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<div class="comments-link">';
				comments_popup_link( 'Comente', '1 comentário', '% comentários', '', '' );
				echo '</div>';
			}
			?>
		</div>
	<?php elseif ( has_post_format( 'quote' ) ) : ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;
			?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<div class="entry-meta">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_time( 'j/n/y, G\hi' ); ?></a>
			&middot; <?php the_author_posts_link(); ?>
			<?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<div class="comments-link">';
				comments_popup_link( 'Comente', '1 comentário', '% comentários', '', '' );
				echo '</div>';
			}
			?>
		</div>
	<?php else : ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

			<?php if ( ! is_page() ) : ?>
				<div class="entry-meta">
					<?php the_time( 'j/n/y, G\hi' ); ?>
					<?php if ( ( 'post' || 'podcast' === get_post_type() ) && ( ! in_category( array( 'post-livre', 'patrocinios' ) ) && ! has_tag( array( 'como-eu-trabalho', 'na-mochila', 'escritorio-em-casa' ) ) ) ) : ?>
					&middot; <?php the_author_posts_link(); ?>
				<?php endif; ?>
			</div><?php endif; ?><!-- .entry-meta -->

		</header><!-- .entry-header -->

		<?php dez_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
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

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dez' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<div class="comments-link">';
				comments_popup_link( 'Comente', '1 comentário', '% comentários', '', '' );
				echo '</div>';
			}
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

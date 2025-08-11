<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */
if ( !defined( 'ABSPATH' ) ) exit; /* Previne acessos diretos ao tema que disparam um erro fatal */
get_header();
?>

<main id="primary" class="site-main">

	<?php if ( is_home() ) : ?>

		<?php 	if ( have_posts() ) :

			while ( have_posts() ) :
				the_post(); ?>
				<?php the_date( '', '<div class="posts-do-dia link-alt">', '</div>' ); ?>
				<article <?php post_class(); ?>>
					<div class="h-entry-meta link-alt">
						<time class="dt-published" datetime="<?php echo get_the_date( 'Y-m-d' ); echo '&nbsp;'; echo get_the_time( 'H:m:s' ); ?>"><?php echo get_the_time(); ?></time>
						<?php
						if ( comments_open() || get_comments_number() ) {
							comments_popup_link('0', '1', '%', 'comment-link', '');
						}
						?>
					</div>

					<?php if ( get_post_format() == 'aside' ) : ?>
						<!-- Post formato Aside - conteúdo completo -->
						<div class="e-content"><?php the_content(); ?> <span><a href="<?php the_permalink(); ?>" class="u-url">#</a></span></div>

					<?php elseif ( get_post_format() == 'quote' ) : ?>
						<!-- Post formato Quote - conteúdo completo -->
						<div class="post-quote">
							<div class="e-content quote-content"><?php the_content(); ?></div>
						</div>

					<?php else : ?>
						<!-- Posts normais - apenas título -->
						<div class="e-content">
							<h3 class="p-name post-titulo">
								<a href="<?php the_permalink(); ?>" class="u-url"><?php the_title(); ?></a>&nbsp;<?php if ( is_sticky() ) : echo '<span style="opacity: .5">/&nbsp;fixo</span>'; elseif ( in_category('patrocinios') ) : echo '<span style="color: red;">/&nbsp;patrocinado</span>';	endif; ?>
							</h3>
						</div>
					<?php endif; ?>
				</article>
			<?php endwhile; 

			the_posts_navigation( array( 
				'class' => 'link-alt',
				'prev_text' => 'Antigos &raquo;',
				'next_text' => '&laquo; Recentes',
			) ); 

		endif;
		wp_reset_postdata();
		?>

		<?php 
		$currentlang = get_bloginfo( 'language' );
		if ( $currentlang == 'pt-BR' ) :
			echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
		elseif ( $currentlang == 'en-US' ) :
			echo do_shortcode( '[sc name="newsletter-post-en"][/sc]' ); 
		endif;
		?>

	<?php else : ?>

		<!-- Fallback para páginas paginadas ou outras situações -->
		<?php if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

	<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
?>
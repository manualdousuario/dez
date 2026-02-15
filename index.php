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
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Impede acesso direto
}

get_header(); ?>

<main id="primary" class="site-main">

	<?php	
	$count = 0;
	if ( have_posts() ) :

		while ( have_posts() ) :
			the_post();

			get_template_part( 'content' );


			$currentlang = get_bloginfo( 'language' );

			if ( ( ! is_paged() && $count == 0 ) && $currentlang == 'pt-BR' ) :
				echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
			elseif ( ( ! is_paged() && $count == 0 ) && $currentlang == 'en-US' ) :
				echo do_shortcode( '[sc name="newsletter-post-en"][/sc]' );
			endif;

			$count++;

		endwhile;

	$textoes_query = new WP_Query(array(
		'tag_id' => 2259,
		'posts_per_page' => 5,
		'post__not_in' => array(get_the_ID())
	));

	$aleatorios_query = new WP_Query(array(
		'tag__not_in' => array(2259, 1984, 1559),
		'category__not_in' => array(97),
		'posts_per_page' => 5,
		'orderby'        => 'rand',
		'post__not_in'   => array(get_the_ID()),
		'date_query'     => array(
			array(
				'after' => '12 months ago'
			)
		),
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'terms'    => 'post-format-quote',
				'operator' => 'NOT IN'
			)
		)
	)); ?>

	<div class="listas-posts">
		<?php if ($textoes_query->have_posts()) : ?>
			<div class="listas-posts-lista">
				<h2>Escolhas do editor</h2>
				<ul>
					<?php while ($textoes_query->have_posts()) : $textoes_query->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>?utm_campaign=interna&utm_content=textoes"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php 
			wp_reset_postdata();
		endif; ?>

		<?php if ($aleatorios_query->have_posts()) : ?>
			<div class="listas-posts-lista">
				<h2>Posts aleatórios</h2>
				<ul>
					<?php while ($aleatorios_query->have_posts()) : $aleatorios_query->the_post(); ?>
						<li><a href="<?php the_permalink(); ?>?utm_campaign=interna&utm_content=aleatorios"><?php the_title(); ?></a> <span style="font-family: var(--ff-monospace); font-size: var(--fs-0);"><?php echo get_the_date(); ?></span></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php 
			wp_reset_postdata();
		endif; ?>
	</div>
		
	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</main><!-- #main -->

<?php
get_footer();
?>
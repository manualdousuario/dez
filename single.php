<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dez
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'content' );

		$currentlang = get_bloginfo( 'language' );

		if ( $currentlang == 'pt-BR' ) :
			echo do_shortcode( '[sc name="newsletter-post"][/sc]' ); 
		elseif ( $currentlang == 'en-US' ) :
			echo do_shortcode( '[sc name="newsletter-post-en"][/sc]' );
		endif;

		if ( comments_open() || get_comments_number() ) :
			comments_template();
	endif;

	endwhile; // End of the loop.

	$textoes_query = new WP_Query(array(
		'tag_id' => 2259,
		'posts_per_page' => 5,
		'post__not_in' => array(get_the_ID())
	));

	$aleatorios_query = new WP_Query(array(
		'tag__not_in' => array(2259, 1984, 1559),
		'posts_per_page' => 5,
		'orderby'        => 'rand',
		'post__not_in'   => array(get_the_ID()),
		'date_query'     => array(
			array(
				'after' => '12 months ago'
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
						<li><a href="<?php the_permalink(); ?>?utm_campaign=interna&utm_content=aleatorios"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php 
			wp_reset_postdata();
		endif; ?>
	</div>

</main><!-- #main -->

<?php
get_footer();

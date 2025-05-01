<?php
/**
 * Template para exibir posts individuais
 *
 * Este template é usado para exibir posts individuais do blog.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main" role="main" aria-label="<?php esc_attr_e( 'Conteúdo do Post', 'dez' ); ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// Navegação entre posts
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'dez' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Próximo:', 'dez' ) . '</span> <span class="nav-title">%title</span>',
					'screen_reader_text' => esc_html__( 'Navegação entre posts', 'dez' ),
				)
			);

			// Se os comentários estiverem abertos ou houver comentários, carrega o template de comentários
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();

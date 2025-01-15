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

			get_template_part( 'template-parts/content', get_post_type() );

			global $post;
			$compare_date = strtotime( "2024-11-01" );
			$post_date    = strtotime( $post->post_date );

			if ( $compare_date < $post_date ) { 
				echo '<div class="comentario-por-email"><p>Tem algo a dizer? Mande um e-mail: <a href="mailto:ghedin@manualdousuario.net?subject=Comentário em ';
				the_title();
				echo '">ghedin@manualdousuario.net</a></p><p><small>Esta interação é parte de <a href="https://manualdousuario.net/comentarios-email-experimento/">um experimento</a>. Apenas eu leio o e-mail e respondo (se for o caso), mas nossa conversa poderá ser publicada no blog com seu primeiro nome (<a href="https://manualdousuario.net/assunto/comentarios/">exemplos</a>). Se preferir permanecer sem identificação (anônimo) ou receber o crédito com nome completo, site etc., sinalize na mensagem.</small></p></div>';
			}

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

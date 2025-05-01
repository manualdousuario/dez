<?php
/**
 * Template para exibir comentários
 *
 * Este template exibe a área da página que contém tanto os comentários atuais
 * quanto o formulário de comentários.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

/*
 * Se o post atual estiver protegido por senha e
 * o visitante ainda não tiver inserido a senha,
 * retornamos antecipadamente sem carregar os comentários.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area" aria-label="<?php esc_attr_e( 'Seção de Comentários', 'dez' ); ?>">

	<?php
	// Formulário de comentários
	comment_form(
		array(
			'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h2>',
			'title_reply'          => esc_html__( 'Deixe um comentário', 'dez' ),
			'label_submit'         => esc_html__( 'Enviar comentário', 'dez' ),
			'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Seu endereço de e-mail não será publicado.', 'dez' ) . '</p>',
		)
	);

	$comments = dez_get_cached_comments(get_the_ID());
	$comment_count = count($comments);

	if ( $comment_count > 0 ) :
		?>
		<h2 class="comments-title">
			<?php
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: título do post */
					esc_html__( '1 comentário', 'dez' )
				);
			} else {
				printf(
					/* translators: 1: número de comentários, 2: título do post */
					esc_html( _nx( '1 comentário', '%1$s comentários', $comment_count, 'comments title', 'dez' ) ),
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php
		// Navegação entre comentários
		the_comments_navigation( array(
			'prev_text' => esc_html__( 'Comentários anteriores', 'dez' ),
			'next_text' => esc_html__( 'Próximos comentários', 'dez' ),
			'screen_reader_text' => esc_html__( 'Navegação entre comentários', 'dez' ),
		) );
		?>

		<ol class="comment-list" role="list">
			<?php
			foreach ($comments as $comment) {
				$comment_obj = new WP_Comment($comment);
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
						'avatar_size' => 60,
						'format'     => 'html5',
						'type'       => 'comment',
					),
					array($comment_obj)
				);
			}
			?>
		</ol><!-- .comment-list -->

		<?php
		// Navegação entre comentários
		the_comments_navigation( array(
			'prev_text' => esc_html__( 'Comentários anteriores', 'dez' ),
			'next_text' => esc_html__( 'Próximos comentários', 'dez' ),
			'screen_reader_text' => esc_html__( 'Navegação entre comentários', 'dez' ),
		) );

	endif; // Check for have_comments().
	?>

</div><!-- #comments -->

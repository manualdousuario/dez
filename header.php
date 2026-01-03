<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dez
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> data-theme="">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noarchive">
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://umami.pcdomanual.com/" crossorigin>
	<link rel="preconnect" href="https://alo.pcdomanual.com/" crossorigin>

	<link rel="manifest" href="/wp-content/themes/dez/manifest.json">

	<?php $currentlang = get_bloginfo( 'language' );
	if ( $currentlang == 'en-US' ) : ?>
		<script async src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dez' ); ?></a>

	<header id="masthead" class="site-header">
		<!-- Logo -->
		<div class="site-branding">
			<img src="/wp-content/themes/dez/img/logo-manual-do-usuario.png" width="38" height="44" alt="">
			<div class="branding-text">
				<?php
				$title_tag = ( is_front_page() && is_home() ) ? 'h1' : 'p';
				?>
				<<?php echo esc_html( $title_tag ); ?>>
				<?php if ( $currentlang == 'en-US' ) : ?>
					<a href="https://manualdousuario.net/en/">Manual do Usuário</a>
				<?php else : ?>
					<a href="https://manualdousuario.net/">Manual do Usuário</a>
				<?php endif; ?>
				</<?php echo esc_html( $title_tag ); ?>>
				<span>
					<?php pll_e('por'); ?> Rodrigo Ghedin
				</span>
			</div>
		</div>

		<?php if ( $currentlang == 'pt-BR' ) : ?> 
			<nav role="navigation" aria-label="Menu principal">
				<ul>
					<li><a href="/apoie" class="assine">Apoie</a></li>
					<li><a href="/categoria/bastidores">Bastidores</a></li>
					<li><a href="/orbita">Órbita</a></li>
					<li><?php if ( is_user_logged_in() ) {
						echo '<a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '">Sair</a>';
					} else {
						echo '<a href="' . esc_url( wp_login_url( get_permalink() ) ) . '">Entrar</a>';
					} ?></li>
					<li><a href="/mais">Mais&nbsp;&raquo;</a></li>
				</ul>
			</nav>
		<?php endif; ?>
	</header>

	<?php if ( shortcode_exists( 'sc' ) && $currentlang == 'pt-BR' ) :
		echo do_shortcode( '[sc name="anuncio-global"][/sc]' ); 
	elseif ( $currentlang == 'en-US' ) :
		echo '<div class="adaptive-css horizontal" data-ea-publisher="manualdousuarionet" data-ea-type="image"></div>'; 
		endif; ?>
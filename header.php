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
	<link rel="preconnect" href="https://umami.manualdousuario.net/" crossorigin>
	<link rel="preconnect" href="https://alo.pcdomanual.com/" crossorigin>

	<link rel="manifest" href="/manifest.json">

	<?php $currentlang = get_bloginfo( 'language' );
		if ( $currentlang == 'en-US' ) : ?>
	<script async src="https://media.ethicalads.io/media/client/ethicalads.min.js"></script>
		<?php endif; ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dez' ); ?></a>

	<?php if ( $currentlang == 'pt-BR' ) : ?>
		<ul class="top-bar link-alt">
			<li><a href="https://manualdousuario.net/orbita/">Órbita</a></li>
			<li class="apoie"><a href="https://manualdousuario.net/apoie/"><strong>Assine</strong></a></li>
			<li><a href="https://pcdomanual.com/">PC do Manual</a></li>
			<li><a href="https://manualdousuario.net/podcast/">Podcasts</a></li>
			<li><a href="https://manualdousuario.net/loja/">Lojinha</a></li>
			<li><a href="https://manualdousuario.net/newsletters-brasileiras/">Newsletters BR</a></li>
			<li><a href="https://lerama.pcdomanual.com">Lerama</a></li>
		</ul>
	<?php endif; ?>


		<header id="masthead" class="site-header">
			<!-- Logo -->
			<div class="site-branding">
				<div class="branding-text">
					<?php
					$title_tag = ( is_front_page() && is_home() ) ? 'h1' : 'p';
					?>
					<<?php echo esc_html( $title_tag ); ?> class="site-title">
					<?php if ( $currentlang == 'en-US' ) : ?>
						<a href="https://manualdousuario.net/en/">Manual do Usuário</a>
					<?php else : ?>
						<a href="https://manualdousuario.net/">Manual do Usuário</a>
					<?php endif; ?>
					</<?php echo esc_html( $title_tag ); ?>>
				</div>
			</div>

			<?php get_search_form(); ?>

			<?php if ( $currentlang == 'pt-BR' ) : ?>
			<!-- Icon Navigation -->
			<nav class="icons-navigation main-navigation">
				<?php
				// Órbita menu configuration.
				$orbita_items = array(
					array(
						'title' => 'Comentários por e-mail',
						'url'   => '/notificacoes-email/',
					),
					array(
						'title' => 'Meus posts',
						'url'   => '/orbita/meus-posts/',
					),
					array(
						'title' => 'Meus comentários',
						'url'   => '/orbita/meus-comentarios/',
					),
				);

				$icon_nav = '';
				if( $currentlang=="pt-BR" ) {
					$icon_nav .= '<div id="secondary-menu" class="menu-item">';

					// User Navigation.
					$icon_nav .= '<ul>';
					$icon_nav .= '<li class="page_item page_item_has_children">';
					$icon_nav .= '<input type="checkbox" id="menu-toggle"/>';
					$icon_nav .= '<label class="menu-toggle-icon" for="menu-toggle"><a name="menu-usuario" alt="Menu do Usuário" title="Menu do Usuário"></a></label>';
					$icon_nav .= '<ul id="menu-toggle-list" class="children">';

					// Profile/Sign in items.
					$icon_nav .= '<li class="page_item">';
					if ( is_user_logged_in() ) {
						$icon_nav .= '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">Editar perfil</a>';
					} else {
						$icon_nav .= '<a href="' . esc_url( wp_login_url( get_permalink() ) ) . '">Entrar</a>';
					}
					$icon_nav .= '</li>';

					// Sign up/Sign out items.
					if ( is_user_logged_in() ) {
						// Órbita items.
						foreach ( $orbita_items as $orbita_item ) {
							$icon_nav .= '<li class="page_item"><a href="' . esc_url( $orbita_item['url'] ) . '">' . esc_html( $orbita_item['title'] ) . '</a></li>';
						}
						$icon_nav .= '<li class="page_item"><a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '">Sair</a>';
					} else {
						$icon_nav .= '<li class="page_item"><a href="/cadastro/">Cadastrar</a>';
					}

					$icon_nav .= '</li>';
					$icon_nav .= '</ul>';
					$icon_nav .= '</li>';
					$icon_nav .= '</ul>';
					$icon_nav .= '</div>';
				}


				echo $icon_nav;
				?>
			</nav>
			<?php endif; ?>
		</header>

	<?php if ( shortcode_exists( 'sc' ) && $currentlang == 'pt-BR' ) :
		echo do_shortcode( '[sc name="anuncio-global"][/sc]' ); 
	elseif ( $currentlang == 'en-US' ) :
		echo '<div class="adaptive-css horizontal" data-ea-publisher="manualdousuarionet" data-ea-type="image"></div>'; 
	endif; ?>
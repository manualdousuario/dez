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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Previne acessos diretos ao tema
}

get_header();

$current_lang = dez_get_current_lang();
?>
<!doctype html>
<html <?php language_attributes(); ?> data-theme="">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noarchive">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dez' ); ?></a>

	<?php if ( 'pt-BR' === $current_lang ) : ?>
		<div class="top-bar">
			<h3>
				<a href="<?php echo esc_url( 'https://manualdousuario.net/' ); ?>">
					<img src="<?php echo esc_url( 'https://manualdousuario.net/wp-content/themes/dez/img/logo-manual-top-bar.avif' ); ?>" height="38" width="33" alt="<?php esc_attr_e( 'Logo Manual do Usuário', 'dez' ); ?>">
				</a>
			</h3>
			<ul>
				<li><a href="<?php echo esc_url( 'https://manualdousuario.net/orbita/' ); ?>">Órbita</a></li>
				<li class="apoie"><a href="<?php echo esc_url( 'https://manualdousuario.net/apoie/' ); ?>">⭐️<span>Assine</span></a></li>
				<li><a href="<?php echo esc_url( 'https://pcdomanual.com/' ); ?>">PC do Manual</a></li>
				<li><a href="<?php echo esc_url( 'https://manualdousuario.net/podcast/' ); ?>">Podcasts</a></li>
				<li><a href="<?php echo esc_url( 'https://manualdousuario.net/loja/' ); ?>">Lojinha</a></li>
				<li><a href="<?php echo esc_url( 'https://manualdousuario.net/newsletters-brasileiras/' ); ?>">Diretório de newsletters</a></li>
				<li><a href="<?php echo esc_url( 'https://lerama.pcdomanual.com' ); ?>">Lerama</a></li>
			</ul>
		</div>
	<?php endif; ?>

	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<!-- Logo -->
			<div class="site-branding">
				<div class="branding-text">
					<?php
					$title_tag = ( is_front_page() && is_home() ) ? 'h1' : 'p';
					?>
					<<?php echo esc_html( $title_tag ); ?> class="site-title">
					<?php if ( 'en-US' === $current_lang ) : ?>
						<a href="<?php echo esc_url( 'https://manualdousuario.net/en/' ); ?>">Manual do Usuário</a>
					<?php else : ?>
						Manual do Usuário
					<?php endif; ?>
					</<?php echo esc_html( $title_tag ); ?>>
					<div class="site-rg">
						<?php pll_e('por'); ?> Rodrigo Ghedin
					</div>
				</div>
			</div>

			<?php get_search_form(); ?>

			<!-- Icon Navigation -->
			<nav class="icons-navigation main-navigation">
				<?php
				// Órbita menu configuration.
				$orbita_items = array(
					array(
						'title' => esc_html__( 'Comentários por e-mail', 'dez' ),
						'url'   => esc_url( '/notificacoes-email/' ),
					),
					array(
						'title' => esc_html__( 'Meus posts', 'dez' ),
						'url'   => esc_url( '/orbita/meus-posts/' ),
					),
					array(
						'title' => esc_html__( 'Meus comentários', 'dez' ),
						'url'   => esc_url( '/orbita/meus-comentarios/' ),
					),
				);

				$icon_nav = '<ul id="dark-mode-toggle">';
				$icon_nav .= '<li>';
				$icon_nav .= '<a href="#" onClick="setDezTheme(event)">' . esc_html__( 'Alternar Tema (Claro ou Escuro)', 'dez' ) . '</a>';
				$icon_nav .= '</li>';
				$icon_nav .= '</ul>';

				if ( 'pt-BR' === $current_lang ) {
					$icon_nav .= '<div id="secondary-menu" class="menu-item">';

					// User Navigation.
					$icon_nav .= '<ul>';
					$icon_nav .= '<li class="page_item page_item_has_children">';
					$icon_nav .= '<input type="checkbox" id="menu-toggle"/>';
					$icon_nav .= '<label class="menu-toggle-icon" for="menu-toggle"><a name="menu-usuario" alt="' . esc_attr__( 'Menu do Usuário', 'dez' ) . '" title="' . esc_attr__( 'Menu do Usuário', 'dez' ) . '"></a></label>';
					$icon_nav .= '<ul id="menu-toggle-list" class="children">';

					// Profile/Sign in items.
					$icon_nav .= '<li class="page_item">';
					if ( is_user_logged_in() ) {
						$icon_nav .= '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">' . esc_html__( 'Editar perfil', 'dez' ) . '</a>';
					} else {
						$icon_nav .= '<a href="' . esc_url( wp_login_url( get_permalink() ) ) . '">' . esc_html__( 'Entrar', 'dez' ) . '</a>';
					}
					$icon_nav .= '</li>';

					// Sign up/Sign out items.
					if ( is_user_logged_in() ) {
						// Órbita items.
						foreach ( $orbita_items as $orbita_item ) {
							$icon_nav .= '<li class="page_item"><a href="' . esc_url( $orbita_item['url'] ) . '">' . esc_html( $orbita_item['title'] ) . '</a></li>';
						}
						$icon_nav .= '<li class="page_item"><a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '">' . esc_html__( 'Sair', 'dez' ) . '</a>';
					} else {
						$icon_nav .= '<li class="page_item"><a href="' . esc_url( '/cadastro/' ) . '">' . esc_html__( 'Cadastrar', 'dez' ) . '</a>';
					}

					$icon_nav .= '</li>';
					$icon_nav .= '</ul>';
					$icon_nav .= '</li>';
					$icon_nav .= '</ul>';
					$icon_nav .= '</div>';
				}

				echo wp_kses_post( $icon_nav );
				?>
			</nav>
		</header>
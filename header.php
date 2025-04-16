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
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dez' ); ?></a>
		<header id="masthead" class="site-header">
			<!-- Logo -->
			<div class="site-branding">
				<img src="/wp-content/themes/dez/img/logo-manual-do-usuario.png" width="33" height="38" class="site-logo" alt>
				<div class="branding-text">
					<?php
					$title_tag = ( is_front_page() && is_home() ) ? 'h1' : 'p';
					?>
					<<?php echo esc_html( $title_tag ); ?> class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Manual do Usuário</a></<?php echo esc_html( $title_tag ); ?>>
					<div class="site-rg">
						<?php pll_e('por'); ?> Rodrigo Ghedin
					</div>
				</div>
			</div>

			<?php get_search_form(); ?>

			<nav id="site-navigation" class="main-navigation">
				<!-- Text Navigation -->
				<?php	wp_nav_menu(
					array(
						'theme_location'	=> 'menu-principal',
						'menu_id'					=> 'primary-menu',
						'container'				=> false,
						'menu_class'			=> 'nav-menu',
					)
				); ?>
			</nav>

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

				$icon_nav = '<ul id="dark-mode-toggle">';
				$icon_nav .= '<li>';
				$icon_nav .= '<a href="#" onClick="setDezTheme(event)">Alternar Tema (Claro ou Escuro)</a>';
				$icon_nav .= '</li>';
				$icon_nav .= '</ul>';

				$currentlang = get_bloginfo( 'language' );

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
		</header>
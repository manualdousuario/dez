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
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<?php echo do_shortcode( '[sc name="anuncio-global"]' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dez' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) {
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="/wp-content/themes/dez/img/manual-do-usuario-logo-rodrigo-ghedin.svg" width="256" height="82" alt="<?php bloginfo( 'name' ); ?>">
				</a></h1>
				<?php
			} elseif ( 'orbita_post' === get_post_type() || is_page( array( 33099, 33111, 33101, 33103 ) ) ) {
				?>
				<p class="site-title"><a href="/orbita/" rel="home">
					<img src="/wp-content/themes/dez/img/logo-orbita-dez.svg" width="204" height="66" alt="<?php bloginfo( 'name' ); ?>">
				</a></p>
				<?php
			} else {
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="/wp-content/themes/dez/img/manual-do-usuario-logo-rodrigo-ghedin.svg" width="256" height="82" alt="<?php bloginfo( 'name' ); ?>">
				</a></p>
				<?php
			}
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<ul id="primary-menu" class="menu nav-menu">
				<li class="menu-item b"><a href="/arquivo/">Busca</a></li>
				<?php
				if ( 'orbita_post' === get_post_type() || is_page( array( 33099, 33111, 33101, 33103 ) ) ) {
					?>
					<li class="menu-item c"><a href="/">Manual</a></li>
					<?php
				} else {
					?>
					<li class="menu-item c"><a href="/orbita/">Órbita</a></li>
					<?php
				}
				?>
				<li class="menu-item d"><a href="/apoie/" class="main-apoie">Apoie</a></li>
			</ul>
			<!-- hamburger-menu -->
			<?php
				// Custom menu configuration.
				$custom_items = array(
					array(
						'title' => 'PC do Manual ↗',
						'url'   => 'https://pcdomanual.com',
					),
					array(
						'title' => 'Podcasts',
						'url'   => '/podcast/',
					),
					array(
						'title' => 'Bastidores',
						'url'   => '/category/bastidores/',
					),
					array(
						'title' => 'Diretório de newsletters',
						'url'   => '/newsletters-brasileiras',
					),
					array(
						'title' => 'Lojinha',
						'url'   => '/lojinha',
					),
				);

				// Órbita menu configuration.
				$orbita_items = array(
					array(
						'title' => 'Meus Posts',
						'url'   => '/orbita/meus-posts/',
					),
					array(
						'title' => 'Meus Comentários',
						'url'   => '/orbita/meus-comentarios/',
					),
				);

				$menu_html  = '<div id="secondary-menu" class="menu-item">';
				$menu_html .= '<ul><li class="page_item page_item_has_children">';
 				$menu_html .=  '<input type="checkbox" id="menu-toggle"/><label class="menu-toggle-icon" for="menu-toggle"><img src="/wp-content/themes/dez/img/menu-icon.svg" alt="Menu principal" width="27" height="27" /></label>';
 				$menu_html .= '<ul id="menu-toggle-list" class="children">';

				// Profile/Sign in items.
				$menu_html .= '<li class="page_item">';
				if ( is_user_logged_in() ) {
					$menu_html .= '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">Editar perfil</a>';
				} else {
					$menu_html .= '<a href="' . esc_url( wp_login_url( get_permalink() ) ) . '">Entrar</a>';
				}
				$menu_html .= '</li>';

				// Sign up/Sign out items.
				if ( is_user_logged_in() ) {
					// Órbita items.
					foreach ( $orbita_items as $orbita_item ) {
						$menu_html .= '<li class="page_item"><a href="' . esc_url( $orbita_item['url'] ) . '">' . esc_html( $orbita_item['title'] ) . '</a></li>';
					}
					$menu_html .= '<li class="page_item"><a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '">Sair</a>';
				} else {
					$menu_html .= '<li class="page_item"><a href="/cadastro/">Cadastrar</a>';
				}
				$menu_html .= '<li class="divider"></li>';
				$menu_html .= '</li>';

				// Custom items.
				foreach ( $custom_items as $custom_item ) {
					$menu_html .= '<li class="page_item"><a href="' . esc_url( $custom_item['url'] ) . '">' . esc_html( $custom_item['title'] ) . '</a></li>';
				}

				$menu_html .= '</ul></li></ul></div>';
				echo $menu_html;
				?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
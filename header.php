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
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="/wp-content/themes/dez/img/logo-manual-do-usuario-dez.svg" width="204" height="66" alt="<?php bloginfo( 'name' ); ?>">
				</a></h1>
				<?php
			elseif ( 'orbita_post' === get_post_type() || is_page( array( 33099, 33111, 33101, 33103 ) ) ) :
				?>
				<p class="site-title"><a href="/orbita/" rel="home">
					<img src="/wp-content/themes/dez/img/logo-orbita-dez.svg" width="204" height="66" alt="<?php bloginfo( 'name' ); ?>">
				</a></p>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="/wp-content/themes/dez/img/logo-manual-do-usuario-dez.svg" width="204" height="66" alt="<?php bloginfo( 'name' ); ?>">
				</a></p>
				<?php
			endif;
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<ul id="primary-menu" class="menu nav-menu">
				<li class="menu-item a">
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>">Perfil</a> / <a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>">Sair</a>
					<?php else : ?>
						<a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>">Entrar</a> / <a href="/cadastro/">Cadastrar</a>
					<?php endif; ?>
				</li>
				<li class="menu-item b"><a href="#s"><svg class="gridicon gridicons-search" height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><title>Lupa da busca</title><path d="M21 19l-5.154-5.154C16.574 12.742 17 11.42 17 10c0-3.866-3.134-7-7-7s-7 3.134-7 7 3.134 7 7 7c1.42 0 2.742-.426 3.846-1.154L19 21l2-2zM5 10c0-2.757 2.243-5 5-5s5 2.243 5 5-2.243 5-5 5-5-2.243-5-5z"></path></g></svg></a></li>
					<?php if ( 'orbita_post' === get_post_type() || is_page( array( 33099, 33111, 33101, 33103 ) ) ) : ?>
				<li class="menu-item c"><a href="/">Manual</a></li>
					<?php else : ?>
				<li class="menu-item c"><a href="/orbita/">Órbita</a></li>
					<?php endif; ?>
				<li class="menu-item d"><a href="/apoie/" class="main-apoie">Apoie</a></li>
			</ul>
			<!-- dynamic-menu -->
			<?php
				// Menu link.
				$menu_post_id  = 20907;
				$menu_post_url = get_permalink( $menu_post_id );

				// Custom menu configuration.
				$custom_items = array(
					array(
						'title' => 'PC do Manual',
						'url'   => 'https://pcdomanual.com',
					),
					array(
						'title' => 'Guia Prático',
						'url'   => '/series/guia-pratico',
					),
					array(
						'title' => 'Tecnocracia',
						'url'   => '/series/tecnocracia',
					),
					array(
						'title' => 'Comentários',
						'url'   => '/doc-comentarios',
					),
					array(
						'title' => 'Bastidores',
						'url'   => '/category/bastidores/',
					),
					array(
						'title' => 'Newsletters BR',
						'url'   => '/newsletters-brasileiras',
					),
					array(
						'title' => 'Lojinha',
						'url'   => '/lojinha',
					),
				);

				$menu_html  = '<div id="secondary-menu" class="menu-item">';
				$menu_html .= '<ul><li class="page_item page_item_has_children"><a href="' . esc_url( $menu_post_url ) . '"></a><ul class="children">';

				foreach ( $custom_items as $custom_item ) {
					$menu_html .= '<li class="page_item"><a href="' . esc_url( $custom_item['url'] ) . '">' . esc_html( $custom_item['title'] ) . '</a></li>';
				}

				$menu_html .= '</ul></li></ul></div>';

				echo $menu_html;
				?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

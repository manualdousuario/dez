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
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<?php echo do_shortcode( '[sc name="anuncio-global"]' ); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<!-- Logo -->
		<div class="site-branding">
		<?php
			$title_tag = ( is_front_page() && is_home() ) ? 'h1' : 'p';
		?>
			<<?php echo esc_html( $title_tag ); ?> class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="/wp-content/themes/dez/img/manual-do-usuario-logo-rodrigo-ghedin.svg" width="220" height="70" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</<?php echo esc_html( $title_tag ); ?>>
		</div>

		<?php // Search Checkbox Input. Required here due to the use of CSS selectors to alter the Text Menu and Search. ?>
		<input type="checkbox" id="search-icon"/>

		<nav id="site-navigation" class="main-navigation">
			<!-- Search -->
			<div id="search-container">
				<?php 
				$form = '<form role="search" method="get" class="search-form-header" action="' . home_url( '/' ) . '" >
							<label>
								<span class="screen-reader-text" for="s">' . __( 'Pesquisar por:' ) . '</span>
								<input type="search" id="search-field" class="search-field" placeholder="O que você procura?" value="' . get_search_query() . '" name="s" id="s" autofocus />
							</label>
						</form>';

				echo $form;
				?>
			</div>

			<!-- Text Navigation -->
			<ul id="primary-menu" class="menu nav-menu link-alt">
				<li class="menu-item"><a href="/acompanhe/">Newsletter</a></li>
				<li class="menu-item"><a href="/feed/"><img src="/wp-content/themes/dez/img/icone-rss-outline.svg" alt="Feed RSS" width="26" height="26" /></a></li>
				<li class="menu-item"><a href="/sobre/">Sobre</a></li>
				<li class="menu-item"><a href="/orbita/">Órbita</a></li>
				<li class="menu-item"><a href="/apoie/"><strong>Apoie</strong></a></li>
			</ul>
		</nav>

		<!-- Icon Navigation -->
		<nav class="icons-navigation main-navigation">
			<?php
				// Manual menu configuration.
				$manual_items = array(
					array(
						'title' => 'Mapa do Manual',
						'url'   => '/arquivo/',
					),
					array(
						'title' => 'PC do Manual ↗',
						'url'   => 'https://pcdomanual.com',
					),
					array(
						'title' => 'Regras dos comentários',
						'url'   => '/doc-comentarios/',
					),
					array(
						'title' => 'Guia de uso do Órbita',
						'url'   => '/orbita/guia-de-uso/',
					),
					array(
						'title' => 'Clube de descontos',
						'url'   => '/clube-de-descontos/',
					),
				);

				// Órbita menu configuration.
				$orbita_items = array(
					array(
						'title' => 'Gerenciar notificações',
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

				// Search Label.
 				$icon_nav = '<label class="search-icon" for="search-icon"><a name="search-icon" alt="Busca" title="Busca"></a></label>';

				$icon_nav .= '<div id="secondary-menu" class="menu-item">';

				// User Navigation.
				$icon_nav .= '<ul>';
				$icon_nav .= '<li class="page_item page_item_has_children">';
 				$icon_nav .= '<input type="checkbox" id="menu-toggle"/>';
 				$icon_nav .= '<label class="menu-toggle-icon" for="menu-toggle"><a name="menu-usuario" alt="Menu do Usuário" title="Menu do Usuário"></a></label>';
 				$icon_nav .= '<ul id="menu-toggle-list" class="children link-alt">';

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
				$icon_nav .= '<li class="divider"></li>';

				$icon_nav .= '</li>';

				// Manual items.
				foreach ( $manual_items as $manual_item ) {
					$icon_nav .= '<li class="page_item"><a href="' . esc_url( $manual_item['url'] ) . '">' . esc_html( $manual_item['title'] ) . '</a></li>';
				}

				$icon_nav .= '</ul>';
				$icon_nav .= '</li>';
				$icon_nav .= '</ul>';
				$icon_nav .= '</div>';

				// Mode.
				$icon_nav .= '<a id="dark-mode-toggle" name="dark-mode-toggle" alt="Alternar Tema (Claro ou Escuro)" title="Alternar Tema (Claro ou Escuro)" onClick="setDezTheme(event)"></a>';

				echo $icon_nav;
				?>
		</nav>
	</header>
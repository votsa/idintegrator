<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Id_integrator
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'id-integrator' ); ?></a>

	<header id="masthead" class="site-header <?php if ( get_theme_mod( 'sticky_header', 0 ) ) : echo 'sticky-top'; endif; ?>">
		<div class="container">
			<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light">
				<?php if( get_theme_mod( 'header_within_container', 0 ) ) : ?><div class="container"><?php endif; ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-branding-logo">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg" alt="<?php bloginfo( 'name' ); ?>" />
					</a>

					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#nav-menu-wrap" aria-controls="nav-menu-wrap" aria-expanded="false" aria-label="Toggle navigation">
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/menu.svg" class="navbar-open-icon" />
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/close.svg" class="navbar-close-icon" />
					</button>

					<div class="nav-menu-wrap collapse navbar-collapse" id="nav-menu-wrap">
						<?php
							wp_nav_menu( array(
								'theme_location'  => 'menu-1',
								'menu_id'         => 'primary-menu',
								'container'       => 'div',
								'container_class' => 'navbar-collapse',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '__return_false',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 2,
								'walker'          => new Id_integrator_walker_nav_menu()
							) );
						?>

						<?php
							$items_wrap = '<ul id="%1$s" class="%2$s">';
							$items_wrap .= '<li class="nav-item d-none d-lg-block">';
							$items_wrap .= '<a class="search-trigger" data-toggle="modal" data-target="#searchModal"><img src="/wp-content/themes/idintegrator/assets/images/search.svg" /></a>';
							$items_wrap .= '</li>';
							$items_wrap .= '%3$s</ul>';

							wp_nav_menu( array(
								'theme_location'  => 'menu-2',
								'menu_id'         => 'secondary-menu',
								'container'       => 'div',
								'container_class' => 'navbar-collapse',
								'menu_class'      => 'navbar-nav ml-auto',
								'fallback_cb'     => '__return_false',
								'items_wrap'      => $items_wrap,
								'depth'           => 2,
								'walker'          => new Id_integrator_walker_nav_menu()
							) );
						?>
					</div>
				<?php if( get_theme_mod( 'header_within_container', 0 ) ) : ?></div><!-- /.container --><?php endif; ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

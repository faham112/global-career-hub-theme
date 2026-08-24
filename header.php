<?php
/**
 * Header
 * @package Global_Career_Hub
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'global-career-hub' ); ?></a>

	<div class="top-bar">
		<div class="container">
			<div class="top-bar-inner">
				<nav class="top-pages-nav" aria-label="<?php esc_attr_e( 'Pages Menu', 'global-career-hub' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'pages',
							'menu_id'        => 'pages-menu',
							'container'      => false,
							'fallback_cb'    => 'gch_pages_fallback_menu',
							'depth'          => 1,
						)
					);
					?>
				</nav>
				<div class="top-social">
					<a href="#" aria-label="Facebook" class="social-icon"><svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
					<a href="#" aria-label="X" class="social-icon"><svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
					<a href="#" aria-label="LinkedIn" class="social-icon"><svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
				</div>
			</div>
		</div>
	</div>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-inner">
				<div class="header-left">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Menu', 'global-career-hub' ); ?>">
						<span class="hamburger-box"><span class="hamburger-inner"></span></span>
					</button>
				</div>
				<div class="header-center site-branding">
					<?php gch_custom_logo(); ?>
				</div>
				<div class="header-right">
					<nav class="category-nav" aria-label="<?php esc_attr_e( 'Categories', 'global-career-hub' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'categories',
								'menu_id'        => 'category-menu',
								'container'      => false,
								'fallback_cb'    => 'gch_category_fallback_menu',
								'depth'          => 1,
							)
						);
						?>
					</nav>
					<button class="theme-toggle" id="theme-toggle" aria-label="<?php esc_attr_e( 'Toggle dark mode', 'global-career-hub' ); ?>">
						<svg class="icon-sun" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
						<svg class="icon-moon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
					</button>
					<button class="search-toggle" id="search-toggle" aria-label="<?php esc_attr_e( 'Search', 'global-career-hub' ); ?>">
						<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
					</button>
				</div>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'global-career-hub' ); ?>">
			<div class="container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => 'gch_fallback_menu',
					)
				);
				?>
			</div>
		</nav>

		<div class="search-overlay" id="search-overlay">
			<div class="search-overlay-inner">
				<button class="search-close" id="search-close" aria-label="<?php esc_attr_e( 'Close Search', 'global-career-hub' ); ?>">×</button>
				<form role="search" method="get" class="search-overlay-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" class="search-overlay-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'global-career-hub' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
					<button type="submit" class="search-overlay-submit">
						<svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
					</button>
				</form>
			</div>
		</div>
	</header>

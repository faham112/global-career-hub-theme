<?php
/**
 * Global Career Hub Theme Functions
 * @package Global_Career_Hub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GCH_VERSION', '1.5.0' );
define( 'GCH_GITHUB_REPO', 'faham112/global-career-hub-theme' );

require_once get_template_directory() . '/inc/github-updater.php';

function gch_theme_setup() {
	load_theme_textdomain( 'global-career-hub', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 675, true );

	register_nav_menus(
		array(
			'primary'    => esc_html__( 'Primary Menu (Mobile)', 'global-career-hub' ),
			'pages'      => esc_html__( 'Top Pages Menu', 'global-career-hub' ),
			'categories' => esc_html__( 'Header Categories', 'global-career-hub' ),
			'footer'     => esc_html__( 'Footer Menu', 'global-career-hub' ),
		)
	);

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'gch_theme_setup' );

function gch_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gch_content_width', 800 );
}
add_action( 'after_setup_theme', 'gch_content_width', 0 );

function gch_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'global-career-hub' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	for ( $i = 1; $i <= 4; $i++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( esc_html__( 'Footer %d', 'global-career-hub' ), $i ),
				'id'            => 'footer-' . $i,
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4>',
				'after_title'   => '</h4>',
			)
		);
	}
}
add_action( 'widgets_init', 'gch_widgets_init' );

function gch_scripts() {
	wp_enqueue_style(
		'gch-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'gch-style', get_stylesheet_uri(), array(), GCH_VERSION );
	wp_enqueue_script(
		'gch-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		GCH_VERSION,
		true
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gch_scripts' );

function gch_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'gch_excerpt_length' );

function gch_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'gch_excerpt_more' );

function gch_fallback_menu() {
	echo '<ul id="primary-menu" class="menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'global-career-hub' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/about' ) ) . '">' . esc_html__( 'About', 'global-career-hub' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">' . esc_html__( 'Contact', 'global-career-hub' ) . '</a></li>';
	echo '</ul>';
}

function gch_pages_fallback_menu() {
	echo '<ul id="pages-menu" class="menu">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'global-career-hub' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/about' ) ) . '">' . esc_html__( 'About', 'global-career-hub' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/contact' ) ) . '">' . esc_html__( 'Contact', 'global-career-hub' ) . '</a></li>';
	echo '</ul>';
}

function gch_category_fallback_menu() {
	$categories = get_categories( array( 'number' => 6, 'hide_empty' => true ) );
	echo '<ul id="category-menu" class="menu">';
	if ( ! empty( $categories ) ) {
		foreach ( $categories as $cat ) {
			echo '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
		}
	} else {
		echo '<li><a href="#">' . esc_html__( 'Career Tips', 'global-career-hub' ) . '</a></li>';
		echo '<li><a href="#">' . esc_html__( 'Jobs', 'global-career-hub' ) . '</a></li>';
		echo '<li><a href="#">' . esc_html__( 'Skills', 'global-career-hub' ) . '</a></li>';
	}
	echo '</ul>';
}

function gch_post_categories() {
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		echo '<span class="post-category">' . esc_html( $categories[0]->name ) . '</span>';
	}
}

function gch_custom_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		$logo = get_template_directory_uri() . '/assets/images/logo-transparent.png';
		if ( ! file_exists( get_template_directory() . '/assets/images/logo-transparent.png' ) ) {
			$logo = get_template_directory_uri() . '/assets/images/logo.png';
		}
		if ( file_exists( get_template_directory() . '/assets/images/logo-transparent.png' )
			|| file_exists( get_template_directory() . '/assets/images/logo.png' ) ) {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo" rel="home">';
			echo '<img src="' . esc_url( $logo ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" width="220" height="80">';
			echo '</a>';
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo site-title-text" rel="home">';
			echo '<strong>' . esc_html( get_bloginfo( 'name' ) ) . '</strong>';
			echo '</a>';
		}
	}
}

function gch_theme_activation() {
	update_option( 'show_on_front', 'posts' );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'gch_theme_activation' );

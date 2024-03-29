<?php
/**
 *  functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Id_integrator
 */

if ( ! function_exists( 'Id_integrator_setup' ) ) :
	function Id_integrator_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'idintegrator', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Enable Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'status', 'quote', 'link' ) );

		// Enable support for woocommerce.
		add_theme_support( 'woocommerce' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'idintegrator' ),
			'menu-2' => esc_html__( 'Secondary', 'idintegrator' ),
			'menu-3' => esc_html__( 'Primary footer', 'idintegrator' ),
			'menu-4' => esc_html__( 'Secondary footer', 'idintegrator' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'Id_integrator_custom_background_args', array(
			'default-color' => 'f8f9fa',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'Id_integrator_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Id_integrator_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'Id_integrator_content_width', 800 );
}
add_action( 'after_setup_theme', 'Id_integrator_content_width', 0 );




/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Id_integrator_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'idintegrator' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'idintegrator' ),
		'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'idintegrator' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'idintegrator' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'idintegrator' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'idintegrator' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'idintegrator' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'idintegrator' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'idintegrator' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'idintegrator' ),
		'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title h6">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'Id_integrator_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function Id_integrator_scripts() {
	wp_enqueue_style( 'open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'idintegrator-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );

	wp_enqueue_script( 'bootstrap-4-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'Id_integrator_scripts' );


/**
 * Registers an editor stylesheet for the theme.
 */
function Id_integrator_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'Id_integrator_add_editor_styles' );


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! function_exists( 'woocommerce_subcategory_thumbnail_url' ) ) {

	/**
	 * Show subcategory thumbnail url.
	 *
	 * @param mixed $category Category.
	 */
	function woocommerce_subcategory_thumbnail_url( $category ) {
		$small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_size', 'woocommerce_single' );
		$dimensions           = wc_get_image_size( $small_thumbnail_size );
		$thumbnail_id         = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

		if ( $thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
			$image        = $image[0];
			$image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size ) : false;
			$image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $small_thumbnail_size ) : false;
		} else {
			//$image        = wc_placeholder_img_src();
			$image        = false;
			$image_srcset = false;
			$image_sizes  = false;
		}

		if ( $image ) {
			// Prevent esc_url from breaking spaces in urls for image embeds.
			// Ref: https://core.trac.wordpress.org/ticket/23605.
			$image = str_replace( ' ', '%20', $image );

			return $image;
		}
	}
}

if ( ! function_exists( 'woocommerce_product_get_image_url' ) ) {

	/**
	 * Returns the main product image.
	 *
	 * @param object product.
	 * @param string $size (default: 'woocommerce_thumbnail').
	 * @param array  $attr Image attributes.
	 * @param bool   $placeholder True to return $placeholder if no image is found, or false to return an empty string.
	 * @return string
	 */
	function woocommerce_product_get_image_url($product, $size = 'woocommerce_single', $attr = array(), $placeholder = true ) {
		$image = '';
		if ( $product->get_image_id() ) {
			$image = wp_get_attachment_image_url( $product->get_image_id(), $size, false, $attr );
		} elseif ( $product->get_parent_id() ) {
			$parent_product = wc_get_product( $product->get_parent_id() );
			if ( $parent_product ) {
				$image = woocommerce_product_get_image($parent_product, $size, $attr, $placeholder );
			}
		}

		if ( ! $image && $placeholder ) {
			$image = false;
		}

		return $image;
	}
}

if ( ! function_exists( 'woocommerce_cat_get_color' ) ) {

	/**
	 * Returns color of category.
	 *
	 * @param object $cat.
	 * @param string $default (default: 'blue').
	 * @return string
	 */
	function woocommerce_cat_get_color($cat, $default = 'blue' ) {
		$product_cat_id = is_array($cat) ? $cat[0]->term_id : $cat->term_id;
		$cat_color = get_term_meta($product_cat_id, 'cat_color', true);

		if ( !$cat_color ) {
			return $default;
		}

		return $cat_color;
	}
}

<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Id_integrator
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function Id_integrator_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'Id_integrator_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function Id_integrator_woocommerce_scripts() {
	wp_enqueue_style( 'id-integrator-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'id-integrator-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'Id_integrator_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function Id_integrator_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'Id_integrator_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function Id_integrator_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'Id_integrator_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function Id_integrator_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'Id_integrator_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function Id_integrator_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'Id_integrator_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function Id_integrator_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'Id_integrator_woocommerce_related_products_args' );

if ( ! function_exists( 'Id_integrator_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function Id_integrator_woocommerce_product_columns_wrapper() {
		echo '<div class="product-wrapper">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'Id_integrator_woocommerce_product_columns_wrapper', 40 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );

if ( ! function_exists( 'Id_integrator_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function Id_integrator_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'Id_integrator_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

if ( ! function_exists( 'Id_integrator_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function Id_integrator_woocommerce_wrapper_before() {
		?>
		<div class="container">
			<main class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'Id_integrator_woocommerce_wrapper_before' );

if ( ! function_exists( 'Id_integrator_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function Id_integrator_woocommerce_wrapper_after() {
		?>
				</main><!-- #main -->
			</div>
			<!-- /.container -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'Id_integrator_woocommerce_wrapper_after' );

if ( ! function_exists( 'Id_integrator_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function Id_integrator_woocommerce_template_loop_product_title() {
		echo '<h2 class="category-product-title">' . get_the_title() . '</h2>';
	}
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'Id_integrator_woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'Id_integrator_woocommerce_template_loop_category_title' ) ) {

	/**
	 * Show the subcategory title in the product loop.
	 *
	 * @param object $category Category object.
	 */
	function Id_integrator_woocommerce_template_loop_category_title( $category ) {
		?>
		<h2 class="category-title">
			<?php
				echo esc_html( $category->name );
			?>
		</h2>
		<?php
	}
}

remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', 'Id_integrator_woocommerce_template_loop_category_title', 10 );


/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'Id_integrator_woocommerce_header_cart' ) ) {
			Id_integrator_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'Id_integrator_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function Id_integrator_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		Id_integrator_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'Id_integrator_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'Id_integrator_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function Id_integrator_woocommerce_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'id-integrator' ); ?>">
				<?php /* translators: number of items in the mini cart. */ ?>
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'id-integrator' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'Id_integrator_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function Id_integrator_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php Id_integrator_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
					$instance = array(
						'title' => '',
					);

					the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


// Add before / after for results & sort
//add_action( 'woocommerce_before_shop_loop', 'Id_integrator_woocommerce_before_sort_result', 19 );
//add_action( 'woocommerce_before_shop_loop', 'Id_integrator_woocommerce_after_sort_result', 31 );
if ( ! function_exists( 'Id_integrator_woocommerce_before_sort_result' ) ) {
	function Id_integrator_woocommerce_before_sort_result() {
		?>
		<div class="d-flex justify-content-between align-items-center mb-4">
		<?php
	}
}
if ( ! function_exists( 'Id_integrator_woocommerce_after_sort_result' ) ) {
	function Id_integrator_woocommerce_after_sort_result() {
		?>
		</div>
		<?php
	}
}

add_action( 'woocommerce_before_single_product_summary', 'Id_integrator_before_image_gallery', 19 );
if ( ! function_exists( 'Id_integrator_before_image_gallery' ) ) {
	function Id_integrator_before_image_gallery() {
		?>
		<div class="row">
		<?php
	}
}

add_action( 'woocommerce_before_single_product_summary', 'Id_integrator_before_product_summary', 21 );
if ( ! function_exists( 'Id_integrator_before_product_summary' ) ) {
	function Id_integrator_before_product_summary() {
		?>
		<div class="col-md-7">
		<?php
	}
}

add_action( 'woocommerce_after_single_product_summary', 'Id_integrator_after_product_summary', 1 );
if ( ! function_exists( 'Id_integrator_after_product_summary' ) ) {
	function Id_integrator_after_product_summary() {
		?>
			</div><!-- /.col-md-7 -->
		</div><!-- /.row -->
		<?php
	}
}

add_filter( 'woocommerce_single_product_image_gallery_classes', 'Id_integrator_add_product_gallery_class' );
if ( ! function_exists( 'Id_integrator_add_product_gallery_class' ) ) {
	function Id_integrator_add_product_gallery_class( $classes ) {
		$classes[] = 'col-md-5';
		return $classes;
	}
}

// Custom
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );

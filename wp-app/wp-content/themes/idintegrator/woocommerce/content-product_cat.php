<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div <?php wc_product_class('col-sm-4'); ?>>
	<div class="card category-product-card <?php echo woocommerce_cat_get_color($category); ?>">
		<?php
		/**
		 * woocommerce_before_subcategory hook.
		 *
		 * @hooked woocommerce_template_loop_category_link_open - 10
		 */
		do_action( 'woocommerce_before_subcategory', $category );

		/**
		 * woocommerce_before_subcategory_title hook.
		 */
		do_action( 'woocommerce_before_subcategory_title', $category );

		/**
		 * woocommerce_shop_loop_subcategory_title hook.
		 *
		 * @hooked woocommerce_template_loop_category_title - 10
		 */
		do_action( 'woocommerce_shop_loop_subcategory_title', $category );

		/**
		 * woocommerce_after_subcategory_title hook.
		 */
		do_action( 'woocommerce_after_subcategory_title', $category );

		$category_image = woocommerce_subcategory_thumbnail_url($category);
		$category_class = $category_image ? 'has-image' : 'no-image';
		?>
		<div
			class="category-product-image <?php echo $category_class; ?>"
			style="background-image:url('<?php echo $category_image; ?>')"></div>
		<?php
			/**
			 * woocommerce_after_subcategory hook.
			 *
			 * @hooked woocommerce_template_loop_category_link_close - 10
			 */
			do_action( 'woocommerce_after_subcategory', $category );
		?>
	</div>
</div>

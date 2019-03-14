<?php
/*
* Template Name: Catalog categories
*/
get_header();
	$args = array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent'   => 0
	);
	$product_cat = get_terms( $args );

	foreach ($product_cat as $parent_product_cat)
	{
	echo '
		<div class="catalog-category-row ' . woocommerce_cat_get_color($parent_product_cat) . '">
			<div class="container">
				<h1 class="catalog-category-title">
					<a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'</a>
				</h1>
				<div class="catalog-category-descr">'.$parent_product_cat->description.'</div>
	';
		$child_args = array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'parent'   => $parent_product_cat->term_id
		);
		$child_product_cats = get_terms( $child_args );

		if (count($child_product_cats)) {
			echo '<div class="row catalog-sub-category-row">';
			foreach ($child_product_cats as $child_product_cat)
			{
				$category_image = woocommerce_subcategory_thumbnail_url($child_product_cat);
				$category_class = $category_image ? 'has-image' : 'no-image';
				echo '
					<div class="col-sm-4">
						<div class="card catalog-sub-category-card ' . $category_class . '">
							<a href="'.get_term_link($child_product_cat->term_id).'">
								<span class="title">' . $child_product_cat->name . '</span>
								<div class="catalog-sub-category-image" style="background-image:url(' . $category_image . ')"></div>
							</a>
						</div>
					</div>'
				;
			}
			echo '</div> <!-- .row -->';
		}

		echo '
				</div>
			</div>
		';
	}

get_footer();

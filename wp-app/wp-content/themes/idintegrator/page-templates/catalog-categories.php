<?php
/*
* Template Name: Catalog categories
*/
get_header();

	$background_styles = ['blue', 'orange', 'green'];
	$i = 0;
	$args = array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent'   => 0
	);
	$product_cat = get_terms( $args );

	foreach ($product_cat as $parent_product_cat)
	{
	echo '
		<div class="catalog-category-row ' . $background_styles[$i] . '">
			<div class="container">
				<h2 class="catalog-category-title h2">
					<a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'</a>
				</h2>
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
				echo '
					<div class="col-sm-4">
						<div class="card catalog-sub-category-card" style="background-image:url(' . woocommerce_subcategory_thumbnail_url($child_product_cat) . ')">
							<a href="'.get_term_link($child_product_cat->term_id).'">'.$child_product_cat->name.'</a>
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
	$i++;
	}

get_footer();

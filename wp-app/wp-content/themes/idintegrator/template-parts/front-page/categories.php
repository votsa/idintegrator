<?php
$background_styles = ['blue', 'orange', 'green'];
$i = 0;
$args = array(
  'taxonomy' => 'product_cat',
  'hide_empty' => false,
  'parent'   => 0
);
$product_cat = get_terms( $args );
?>
<div class="wp-bp-services-section bg-white">
  <div class="container">
    <div class="row">
    <?php
      foreach ($product_cat as $category)
      {
        echo '
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card">
              <a href="' . get_term_link($category->term_id) . '" class="service-link">
                <div class="card-content" style="background-image:url(' . woocommerce_subcategory_thumbnail_url($category) . ')">
        ';
    ?>
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/380x220-empty.png" />
    <?php
        echo '
                  <h4 class="card-title">' . $category->name . '</h4>
                </div>
                <div class="card-body ' . $background_styles[$i] . '">' . $category->description . '</div>
              </a>
            </div>
          </div>
        ';
        $i++;
      }
    ?>
    </div>
  </div>
</div>

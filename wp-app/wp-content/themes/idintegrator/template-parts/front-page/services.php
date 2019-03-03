<?php
$featured_page_1_id = get_theme_mod( 'featured_page_1' );
$featured_page_2_id = get_theme_mod( 'featured_page_2' );
$featured_page_3_id = get_theme_mod( 'featured_page_3' );

$featured_page_1 = pll_get_post( $featured_page_1_id );
$featured_page_2 = pll_get_post( $featured_page_2_id );
$featured_page_3 = pll_get_post( $featured_page_3_id );
?>

<?php if ( ( $featured_page_1_id && $featured_page_1 && get_post_field('post_status', $featured_page_1) === 'publish' ) ||
            ( $featured_page_2_id && $featured_page_2 && get_post_field('post_status', $featured_page_2) === 'publish' ) ||
            ( $featured_page_3_id && $featured_page_3 && get_post_field('post_status', $featured_page_3) === 'publish' ) ) : ?>
  <section class="wp-bp-services-section bg-white">
    <div class="container">
      <div class="row">
        <?php if ( $featured_page_1_id && $featured_page_1 && get_post_field('post_status', $featured_page_1) === 'publish' ) : ?>
          <div class="col-md-4 mb-3 mb-md-0">
              <div class="card">
                <a href="<?php echo esc_url( get_post_permalink( $featured_page_1 ) ); ?>" class="service-link">
                  <div class="card-content" style="background-image:url(<?php echo get_the_post_thumbnail_url($featured_page_1); ?>)">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/380x220-empty.png" />
                    <h4 class="card-title"><?php echo esc_html( get_the_title($featured_page_1) ); ?></h4>
                  </div>
                  <div class="card-body blue">
                      <?php echo esc_html( Id_integrator_get_pll_short_excerpt( 20, $featured_page_1 ) ); ?>
                  </div>
                </a>
              </div>
            </div>
        <?php endif; ?>

        <?php if ( $featured_page_2_id && $featured_page_2 && get_post_field('post_status', $featured_page_2) === 'publish' ) : ?>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card">
              <a href="<?php echo esc_url( get_post_permalink( $featured_page_2 ) ); ?>" class="service-link">
                <div class="card-content" style="background-image:url(<?php echo get_the_post_thumbnail_url($featured_page_2); ?>)">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/380x220-empty.png" />
                  <h4 class="card-title"><?php echo esc_html( get_the_title($featured_page_2) ); ?></h4>
                </div>
                  <div class="card-body orange">
                    <?php echo esc_html( Id_integrator_get_pll_short_excerpt( 20, $featured_page_2 ) ); ?>
                  </div>
              </a>
            </div>
          </div>
        <?php endif; ?>

        <?php if ( $featured_page_3_id && $featured_page_3 && get_post_field('post_status', $featured_page_3) === 'publish' ) : ?>
          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card">
              <a href="<?php echo esc_url( get_post_permalink( $featured_page_3 ) ); ?>" class="service-link">
                <div class="card-content" style="background-image:url(<?php echo get_the_post_thumbnail_url($featured_page_3); ?>)">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/380x220-empty.png" />
                  <h4 class="card-title"><?php echo esc_html( get_the_title($featured_page_3) ); ?></h4>
                </div>
                  <div class="card-body green">
                    <?php echo esc_html( Id_integrator_get_pll_short_excerpt( 20, $featured_page_3 ) ); ?>
                  </div>
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
</section>
<?php endif; ?>

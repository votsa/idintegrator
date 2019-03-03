<?php

$featured_post_ids = get_theme_mod( 'featured_ids' );
$featured_count = get_theme_mod( 'featured_count', 5 );

if( $featured_post_ids && $featured_post_ids[0]!= '' ) {
	$args = array( 'post_type' => array('post'), 'post__in' => $featured_post_ids, 'showposts' => $featured_count, 'orderby' => 'post__in', 'ignore_sticky_posts' => true );
} else {
	$args = array( 'post_type' => array('post'), 'showposts' => $featured_count, 'ignore_sticky_posts' => true );
}

$featured_query = new WP_Query( $args );

?>

<?php if ( $featured_query->have_posts() ) : ?>
    <div id="wp-bp-posts-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $post_counter = 0; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <li data-target="#wp-bp-posts-slider" data-slide-to="<?php echo esc_attr( $post_counter ); ?>" class="<?php if ( $post_counter === 0 ) : echo "active"; endif; ?>"></li>
                <?php $post_counter++; ?>
            <?php endwhile; ?>
        </ol>
        <div class="carousel-inner">
            <?php $post_counter = 0; ?>
            <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
                <?php
                    $feat_image = get_template_directory_uri() . '/assets/images/default.jpg';
                    $feat_img_alt = '';
                    if( has_post_thumbnail() ) {
                        $get_feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $feat_image = $get_feat_image[0];
                        $feat_img_alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
                    }
                    if ( $feat_img_alt === '' ) {
                        $feat_img_alt = get_the_title();
                    }
                ?>
                <div class="carousel-item <?php if ( $post_counter === 0 ) : echo "active"; endif; ?>">
                    <img class="d-block w-100" src="<?php echo esc_url( $feat_image ); ?>" alt="<?php echo esc_attr( $feat_img_alt ); ?>">
                    <div class="carousel-caption d-sm-flex align-items-start">
                        <div class="container text-left">
                            <h2 class="item-title"><?php the_title(); ?></h2>
                            <p class="item-description"><?php echo esc_html( Id_integrator_get_short_excerpt( 20 ) ); ?></p>
                            <?php /*<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-sm"><?php esc_html_e( 'Continue Reading', 'id-integrator' ); ?> <small class="oi oi-chevron-right ml-1"></small></a> */ ?>
                        </div>
                    </div>
                </div>
                <?php $post_counter++; ?>
            <?php endwhile; ?>
        </div>
        <?php /*
        <a class="carousel-control-prev" href="#wp-bp-posts-slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e( 'Previous', 'id-integrator' ); ?></span>
        </a>
        <a class="carousel-control-next" href="#wp-bp-posts-slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"><?php esc_html_e( 'Next', 'id-integrator' ); ?></span>
        </a>
        */?>
    </div>
<?php endif; ?>

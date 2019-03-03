<?php

if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
}
else {
    if ( ! is_page_template() ) {
        get_header();

        if ( have_posts() ) {
          if( get_theme_mod( 'blog_display_posts_slider', '1' ) && is_home() && !is_paged() ) {
            get_template_part( 'template-parts/posts-slider' );
          }
        }

        // get_template_part( 'template-parts/front-page/cover' );
        get_template_part( 'template-parts/front-page/services' );

        ?>

        <?php if ( get_theme_mod( 'show_main_content', 1 ) ) : ?>
        <section class="wp-bp-main-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <h2 class="text-center mb-4"><?php the_title(); ?></h2>
                            <?php Id_integrator_post_thumbnail(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php
        get_footer();
    }
    else {
        include( get_page_template() );
    }
}
?>

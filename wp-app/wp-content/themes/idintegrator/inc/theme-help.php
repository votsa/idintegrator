<div class="wrap wp-bp-help-wrap">
    <h1><?php esc_html_e( ' Help', 'id-integrator' ) ?></h1>

    <div class="welcome-panel">
        <div class="welcome-panel-content">
            <h2><?php esc_html_e( 'Welcome!', 'id-integrator' ) ?>  </h2>
            <p class="about-description">
                <?php echo wp_kses_post( 'We are always here to help you. For any query or information, please visit <a href="https://bootstrap-wp.com/" target="_blank">our website.</a>', 'id-integrator' ); ?>
            </p>
            <div class="welcome-panel-column-container">
                <div class="welcome-panel-column">
                    <h3><?php esc_html_e( 'Get Started', 'id-integrator' ) ?></h3>
                    <div>
                        <a class="button button-primary button-hero" href="https://bootstrap-wp.com" target="_blank"><?php esc_html_e( 'Theme Homepage', 'id-integrator' ) ?></a>
                        <a class="button button-hero" href="https://bootstrap-wp.com/contact-us/" target="_blank"><?php esc_html_e( 'Report a problem', 'id-integrator' ) ?></a>
                    </div>

                    <div class="cp-mb-2">
                        <h3><?php esc_html_e( 'Rate Us', 'id-integrator' ) ?></h3>
                        <p>
                            <?php esc_html_e( 'If you like our theme and support, please rate us 5 star on WordPress.org.', 'id-integrator') ?>
                        </p>
                        <a class="button button-primary" href="https://wordpress.org/support/theme/id-integrator/reviews/#new-post" target="_blank"><?php esc_html_e( 'Rate us 5 star', 'id-integrator' ) ?></a>
                    </div>

                </div>
                <!-- /.welcome-panel-column -->

                <div class="welcome-panel-column welcome-panel-last" style="width: 60%;">
                    <h3><?php esc_html_e( 'How to setup your website quickly using ""?', 'id-integrator' ) ?></h3>
                    <div class="cp-mb-2">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/rwveDwrNbm0?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>

                </div>
                <!-- /.welcome-panel-column welcome-panel-last -->
            </div>
            <!-- /.welcome-panel-column-container -->
        </div>
        <!-- /.welcome-panel-content -->
    </div>
    <!-- /.welcome-panel -->

    <div class="welcome-panel">
        <div class="welcome-panel-content cp-mb-2">
            <h2><?php esc_html_e( 'Upgrade to premium version!', 'id-integrator' ) ?>  </h2>
            <p class="about-description">
                <?php echo wp_kses_post( 'Let\'s make your website better with pro version of the theme. For more details, please visit <a href="https://bootstrap-wp.com/downloads/id-integrator-pro/" target="_blank">our website.</a>', 'id-integrator' ) ?>
            </p>

            <?php
                echo wp_kses_post( __( '
                <ol>
                    <li><strong>Add slider on homepage</strong> - With the pro version of the theme, you will be able to add slider on the homepage. You can edit slides easily as per your choice.</li>
                    <li><strong>Full Width Page Header with Background</strong> - You can add that premium touch to your website with the full width page header with a background image.</li>
                    <li><strong>Premium Support</strong> - Anything related to our theme or your WordPress requirements, just reach out to us quickly using our ticketing system.</li>
                    <li><strong>More Customization Options</strong> - Pro version takes customization to the next level.</li>
                    <li><strong>Remove Footer Credit Link</strong></li>
                    <li><strong>More Typography Options</strong></li>
                    <li><strong>WooCommerce Support</strong></li>
                    <li><strong>Improved Performance</strong></li>
                    <li>and much more...</li>
                </ol>
                ', 'id-integrator') );
            ?>

            <div>
                <a class="button button-primary button-hero" href="https://bootstrap-wp.com/downloads/id-integrator-pro/" target="_blank"><?php esc_html_e( 'Know More', 'id-integrator' ) ?></a>
            </div>

        </div>
        <!-- /.welcome-panel-content -->
    </div>
    <!-- /.welcome-panel -->
</div>

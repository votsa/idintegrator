<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Id_integrator
 */

?>

<section class="no-results not-found mt-6">
	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'id-integrator' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'id-integrator' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'id-integrator' ); ?></p>
			<div class="row">
				<div class="col-sm-6">
				<?php
					get_search_form();
				?>
				</div>
			</div>
			<?php

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'id-integrator' ); ?></p>
			<div class="row">
				<div class="col-sm-6">
				<?php
					get_search_form();
				?>
				</div>
			</div>
			<?php

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

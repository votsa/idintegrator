<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Id_integrator
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

	<div class="container">
		<div id="primary" class="content-area wp-bp-404">
			<main id="main" class="site-main">

				<div class="mt-6">
					<section class="error-404 not-found">
						<header class="entry-header">
							<h1 class="entry-title h2"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'id-integrator' ); ?></h1>
						</header><!-- .page-header -->

						<div class="entry-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'id-integrator' ); ?></p>
							<div class="row">
								<div class="col-sm-6">
								<?php
									get_search_form();
								?>
								</div>
							</div>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
				<!-- /.card -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<!-- /.container -->
<?php
get_footer();

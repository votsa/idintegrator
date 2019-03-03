<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Id_integrator
 */

get_header(); ?>
	<main id="main" class="site-main">
		<?php
		if ( have_posts() ) {
			if( get_theme_mod( 'blog_display_posts_slider', '1' ) && is_home() && !is_paged() ) {
				get_template_part( 'template-parts/posts-slider' );
			}

			get_template_part( 'template-parts/front-page/services' );
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}

		get_template_part( 'template-parts/front-page/clients' );
		?>
	</main>
<?php
get_footer();

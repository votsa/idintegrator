<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Id_integrator
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

	<div class="container">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="entry-header mt-6">
				<h1 class="entry-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'id-integrator' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation( array(
				'next_text'         => esc_html__( 'Newer Posts', 'id-integrator' ),
				'prev_text'         => esc_html__( 'Older Posts', 'id-integrator' ),
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main>
	</div>
<?php
get_footer();

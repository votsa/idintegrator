<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Id_integrator
 */

?>

	</div><!-- #content -->

	<footer class="footer">
		<div class="container">
			<div class="footer-nav">
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<div class="footer-contacts">
						<?php
							$post = pll_get_post(321);
							echo get_post_field('post_content', $post);
						?>
						</div>
					</div>
					<div class="col-sm-12 col-md-3">
					<?php
						wp_nav_menu( array(
							'theme_location'  => 'menu-3',
							'menu_id'         => 'primary-menu',
							'container'       => 'div',
							'container_class' => 'footer-vertical-menu',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '__return_false',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 2,
							'walker'          => new Id_integrator_walker_nav_menu()
						) );
					?>
					</div>

					<div class="col-sm-12 col-md-5">
					<?php
						$items_wrap = '<ul id="%1$s" class="%2$s">';
						$items_wrap .= '<li class="nav-item  d-none d-lg-block">';
						$items_wrap .= '<a href="#" class="search-trigger"><img src="/wp-content/themes/idintegrator/assets/images/search.svg" /></a>';
						$items_wrap .= '</li>';
						$items_wrap .= '%3$s</ul>';

						wp_nav_menu( array(
							'theme_location'  => 'menu-4',
							'menu_id'         => 'secondary-menu',
							'container'       => 'div',
							'container_class' => 'footer-horisontal-menu',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '__return_false',
							'items_wrap'      => $items_wrap,
							'depth'           => 2,
							'walker'          => new Id_integrator_walker_nav_menu()
						) );
					?>
					</div>
				</div>
			</div>
			<section class="footer-copyright">
				<?php
					$post = pll_get_post(335);
					echo get_post_field('post_content', $post);
				?>
			</section>
		</div>
		<!-- /.container -->
	</footer><!-- footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying the account footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

?>

<footer id="colophon" class="site-footer">

	<div class="container">

		<div class="site-footer__top">

			<!-- Logo -->
			<div class="site-header__branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<h1 class="site-header__title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php endif; ?>
			</div>

			<!-- Navigation -->
			<nav class="site-footer__navigation" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'site-footer__menu',
						'container'      => false,
					)
				);
				?>
			</nav>

			<!-- Social Icons -->
			<?php get_template_part( 'template-parts/components/social-icons' ); ?>

		</div>

		<!-- Copyright -->
		<div class="site-footer__copyright"><?php print_copyright_text(); ?></div>

	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>

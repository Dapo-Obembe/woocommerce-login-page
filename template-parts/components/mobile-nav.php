<?php
/**
 * Mobile navigation template part
 *
 * This template is used for displaying the mobile navigation.
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

?>

<button class="menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'belovbp' ); ?>">
	<?php
	the_svg(
		array(
			'icon'   => 'menu',
			'class'  => 'menu-toggle__icon menu-toggle__icon--open',
			'height' => 32,
			'width'  => 32,
		)
	);
	?>
	<?php
	the_svg(
		array(
			'icon'   => 'close',
			'class'  => 'menu-toggle__icon menu-toggle__icon--close',
			'height' => 32,
			'width'  => 32,
		)
	);
	?>
</button>

<nav class="mobile-nav" hidden>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'mobile-nav__menu',
			'fallback_cb'    => false,
		)
	);
	?>
</nav>

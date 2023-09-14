<?php
/**
 * Belov Boilerplate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

/**
 * Get all the include files for the theme.
 */
function include_inc_files() {
	$files = array(
		'inc/functions/', // Custom functions that act independently of the theme templates.
		'inc/hooks/', // Load custom filters and hooks.
		'inc/post-types/', // Load custom post types.
		'inc/setup/', // Theme setup.
		'inc/shortcodes/', // Load shortcodes.
		'inc/template-tags/', // Custom template tags for this theme.
	);

	foreach ( $files as $include ) {
		$include = trailingslashit( get_template_directory() ) . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require_once $file;
			}
		} else {
			require_once $include;
		}
	}
}

include_inc_files();

/**
 * -------------------------------------------------------------------
 * NOTE TO DEVELOPERS:
 *
 * This file is intended only to define the `include_inc_files`
 * functionality that sets up the theme. We kindly ask that you do not
 * add additional functionality directly to this file.
 *
 * For adding or modifying theme functionality, please make changes in
 * the respective files within the 'inc' directory or create new ones
 * as needed. This helps to keep our theme organized and maintainable.
 *
 * Thank you for adhering to this structure.
 * -------------------------------------------------------------------
 */

<?php
/**
 * ACF functions and definitions
 *
 * Sets up the Advanced Custom Fields (ACF) plugin related functions.
 * This includes setting up options pages, defining custom fields and related features.
 *
 * @package BelovBoilerplate
 */

/**
 * Add the ACF options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

/**
 * ACF Images for the My-Account page.
 */
global $login_img, $signup_img; // Declare the variables as global.
$login_img  = get_field( 'login_image' );
$signup_img = get_field( 'signup_image' );

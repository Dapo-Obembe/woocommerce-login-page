<?php
/**
 * Enable custom mime types.
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

/**
 * Enable custom mime types.
 *
 * @param array $mimes Current allowed mime types.
 *
 * @return array Mime types.
 */
function custom_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', __NAMESPACE__ . '\custom_mime_types' );

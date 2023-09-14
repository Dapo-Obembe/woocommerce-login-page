<?php
/**
 * Shortcode to display copyright year.
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

/**
 * Create a Shortcode to display the copyright year.
 *
 * @param array $atts Optional attributes.
 *     $starting_year Optional. Define starting year to show starting year and current year e.g. 2015 - 2023.
 *     $separator Optional. Separator between starting year and current year.
 *
 * @return string Copyright year text.
 */
function copyright_year_shortcode( $atts ) {
	// Setup defaults.
	$args = shortcode_atts(
		array(
			'starting_year' => '',
			'separator'     => ' - ',
		),
		$atts
	);

	$current_year = gmdate( 'Y' );

	// Return current year if starting year is empty or greater than current year.
	if ( ! $args['starting_year'] || $args['starting_year'] > $current_year ) {
		return esc_html( $current_year );
	}

	return esc_html( $args['starting_year'] . $args['separator'] . $current_year );
}

add_shortcode( 'copyright_year', __NAMESPACE__ . '\copyright_year_shortcode' );

<?php
/**
 * Enqueue scripts and styles.
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

/**
 * Enqueue scripts and styles.
 */
function scripts() {
	// Check if manifest file exists.
	$manifest_path = get_theme_file_path( '/dist/manifest.json' );
	if ( ! file_exists( $manifest_path ) ) {
		return;
	}

	// Get manifest content.
	$manifest_content = file_get_contents( $manifest_path ); // phpcs:ignore
	$manifest         = json_decode( $manifest_content, true );

	// Theme styles.
	if ( isset( $manifest['main.css'] ) ) {
		wp_enqueue_style( 'theme-styles', get_theme_file_uri( '/dist/' . $manifest['main.css'] ), array(), null ); // phpcs:ignore
	}

	// Theme scripts.
	if ( isset( $manifest['main.js'] ) ) {
		wp_enqueue_script( 'theme-scripts', get_theme_file_uri( '/dist/' . $manifest['main.js'] ), array(), null, true ); // phpcs:ignore
	}

	// Register block scripts and styles.
	$blocks_dir = get_template_directory() . '/blocks/';
	$dist_dir   = get_template_directory_uri() . '/dist/';

	if ( is_dir( $blocks_dir ) ) {
		$blocks = glob( $blocks_dir . '*', GLOB_ONLYDIR );

		foreach ( $blocks as $block ) {
			$json_path = $block . '/block.json';

			if ( file_exists( $json_path ) ) {
				$json = json_decode( file_get_contents( $json_path ), true ); // phpcs:ignore

				if ( ! empty( $json['script'] ) ) {
					$script_name = $json['script'];
					if ( isset( $manifest[ $script_name . '.js' ] ) ) {
						// Register script with WordPress.
						wp_register_script( $script_name, $dist_dir . $manifest[ $script_name . '.js' ], array(), null, true ); // phpcs:ignore
					}
				}

				if ( ! empty( $json['style'] ) ) {
					$style_name = $json['style'];
					if ( isset( $manifest[ $style_name . '.css' ] ) ) {
						// Register style with WordPress.
						wp_register_style( $style_name, $dist_dir . $manifest[ $style_name . '.css' ], array(), null ); // phpcs:ignore
					}
				}
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\scripts' );

/**
 * Enqueue block scripts and styles for editor.
 */
function editor_scripts() {
	$manifest_path = get_theme_file_path( '/dist/manifest.json' );
	if ( ! file_exists( $manifest_path ) ) {
		return;
	}

	$manifest_content = file_get_contents( $manifest_path ); // phpcs:ignore
	$manifest         = json_decode( $manifest_content, true );

	$blocks_dir = get_template_directory() . '/blocks/';
	$dist_dir   = get_template_directory_uri() . '/dist/';

	if ( is_dir( $blocks_dir ) ) {
		$blocks = glob( $blocks_dir . '*', GLOB_ONLYDIR );

		foreach ( $blocks as $block ) {
			$json_path = $block . '/block.json';

			if ( file_exists( $json_path ) ) {
				$json = json_decode( file_get_contents( $json_path ), true ); // phpcs:ignore

				if ( ! empty( $json['script'] ) ) {
					$script_name = $json['script'];
					if ( isset( $manifest[ $script_name . '.js' ] ) ) {
						// Enqueue block script in the editor.
						wp_enqueue_script( $script_name, $dist_dir . $manifest[ $script_name . '.js' ], array(), null, true ); // phpcs:ignore
					}
				}

				if ( ! empty( $json['style'] ) ) {
					$style_name = $json['style'];
					if ( isset( $manifest[ $style_name . '.css' ] ) ) {
						// Enqueue block style in the editor.
						wp_enqueue_style( $style_name, $dist_dir . $manifest[ $style_name . '.css' ], array(), null ); // phpcs:ignore
					}
				}
			}
		}
	}
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\editor_scripts' );

<?php
/**
 * Action hooks and filters.
 *
 * A place to put hooks and filters that aren't necessarily template tags.
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

/**
 * Adding a new (custom) block category.
 *
 * @param array $block_categories Array of categories for block types.
 * @return array Modified block categories.
 */
function add_new_block_category( $block_categories ) {

	return array_merge(
		array(
			array(
				'slug'  => 'belov-blocks',
				'title' => esc_html__( 'Belov Blocks', 'belovbp' ),
				'icon'  => null,
			),
		),
		$block_categories
	);
}
add_filter( 'block_categories_all', __NAMESPACE__ . '\add_new_block_category' );


/**
 * Register blocks.
 */
function register_blocks() {
	// Get the absolute path to the blocks directory.
	$blocks_dir = get_template_directory() . '/blocks/';

	// Scan the blocks directory for sub-directories.
	$blocks = array_filter( glob( $blocks_dir . '*' ), 'is_dir' );

	// Loop over each sub-directory and register the block.
	foreach ( $blocks as $block ) {
		register_block_type( $block );
	}
}
add_action( 'init', __NAMESPACE__ . '\register_blocks' );

/**
 * Disable Gutenberg inline styles.
 */
add_filter( 'should_load_separate_core_block_assets', '__return_true' );
add_filter( 'styles_inline_size_limit', '__return_zero' );

<?php
/**
 * Block: Example.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

// Create id attribute allowing for custom "anchor" value.
$block_id = 'example-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'example';
if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

// Block data.
$block_title = get_field( 'title' );
$subtitle    = get_field( 'subtitle' );
$button      = get_field( 'button' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?>">

	<div class="example__wrapper text-page-container">

		<?php if ( $block_title ) : ?>
			<h1 class="example__title"><?php echo esc_html( $block_title ); ?></h1>
		<?php endif; ?>

		<?php if ( $subtitle ) : ?>
			<p class="example__subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
		<?php endif; ?>

		<?php
		if ( $button ) :
			$link_url    = $button['url'];
			$link_title  = $button['title'];
			$link_target = $button['target'] ? $button['target'] : '_self';
			?>
			<a class="example__button theme-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				<?php echo esc_html( $link_title ); ?>
			</a>
		<?php endif; ?>

	</div>

</section>

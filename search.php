<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package BelovBoilerplate
 */

namespace BelovDigital\BelovBoilerplate;

get_header(); ?>

<main id="main" class="site-main" role="main">

	<div class="container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'belovbp' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<?php
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content', 'search' );

			}

			print_numeric_pagination();
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</div>

</main>

<?php
get_footer();

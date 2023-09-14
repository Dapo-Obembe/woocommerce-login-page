<?php
/**
 * My Account Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 */

get_header();

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="my-account-content">

	<h2 class="my-account-heading"><?php esc_html_e( 'My Account', 'woocommerce' ); ?></h2>

	<!-- Your custom content or modifications here -->

	<?php
	if ( is_user_logged_in() ) {
		// User is logged in, show account content.
		do_action( 'woocommerce_account_content' );
	} else {
		// Display registration form.
		do_action( 'woocommerce_before_customer_login_form' );
		woocommerce_login_form();
		do_action( 'woocommerce_after_customer_login_form' );

		// Display registration form.
		do_action( 'woocommerce_before_customer_register_form' );
		woocommerce_registration_form();
		do_action( 'woocommerce_after_customer_register_form' );
	}
	?>

</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>

<?php get_footer(); ?>

<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Require the ACF function for the image variables.
require get_template_directory() . '/inc/functions/acf-functions.php';

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<?php endif; ?>

	<section class="login-section" id="login-section">
		<div class="login-section__img">
			<?php if ( $login_img ) : ?>
					<?php echo wp_get_attachment_image( $login_img, 'full' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/light-pattern.png' ); ?>" alt="default image" />
			<?php endif; ?>
		</div>
		<div class="login-section__form">
			<h2><?php esc_html_e( 'Log in', 'woocommerce' ); ?></h2>
			<form class="woocommerce-form woocommerce-form-login login" method="post">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="email"><?php esc_html_e( 'EMAIL', 'woocommerce' ); ?></label>
                              <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password"><?php esc_html_e( 'PASSWORD', 'woocommerce' ); ?></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password"  />
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<span class="form-notice">
						<p class="form-row">
							<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Keep me logged in', 'woocommerce' ); ?></span>
							</label>
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						</p>
						<p class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot password?', 'woocommerce' ); ?></a>
						</p>
					</span>
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log In Now', 'woocommerce' ); ?>"><?php esc_html_e( 'Log In Now', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>
			<span class="register-notice"><?php esc_html_e( 'Not a member yet?', 'woocommerce' ); ?> <a href="#" id="showReg"><?php esc_html_e( 'Register Now', 'woocommerce' ); ?></a></span>
		</div>
	</section><!-- .login-section ends here -->

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
	<section class="register-section" id="register-section">
		<div class="register-section__img">
			<?php if ( $signup_img ) : ?>
					<?php echo wp_get_attachment_image( $signup_img, 'full' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/light-pattern.png' ); ?>" alt="default image" />
			<?php endif; ?>
		</div>
		<div class="register-section__form">
			<h2><?php esc_html_e( 'Sign Up', 'woocommerce' ); ?></h2>
			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                   <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</p>

					<?php endif; ?>

						<div class="reg-names">
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  reg-first-name">
								<label for="first_name"><?php esc_html_e( 'First Name', 'woocommerce' ); ?></label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="first_name" id="first_name" autocomplete="text" value="<?php echo ( ! empty( $_POST['text'] ) ) ? esc_attr( wp_unslash( $_POST['text'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</p>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide  reg-first-name">
								<label for="last_name"><?php esc_html_e( 'Last Name', 'woocommerce' ); ?></label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="last_name" id="last_name" autocomplete="last_name" value="<?php echo ( ! empty( $_POST['last_name'] ) ) ? esc_attr( wp_unslash( $_POST['last_name'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</p>
						</div>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
                              <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="password" autocomplete="password" value="<?php echo ( ! empty( $_POST['password'] ) ) ? esc_attr( wp_unslash( $_POST['password'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
						</p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Create An Account', 'woocommerce' ); ?>"><?php esc_html_e( 'Create An Account', 'woocommerce' ); ?></button>
					</p>
					<p><?php esc_html_e( 'I agree to the Terms & Conditions, Privacy Policy and Cookie Notice.', 'woocommerce' ); ?></p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
			<span class="login-notice"><?php esc_html_e( 'Are you a member?', 'woocommerce' ); ?> <a href="#" id="showLogin"><?php esc_html_e( 'Login Now', 'woocommerce' ); ?></a></span>
		</div>
	</section>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

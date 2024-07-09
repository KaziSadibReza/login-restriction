<?php
/**
 * Plugin Name: Login Restriction
 * Plugin URI: https://github.com/KaziSadibReza
 * Description: No one can visit your website without logging in.
 * Version: 1.0
 * Author: Kazi Sadib Reza
 * Author URI: https://github.com/KaziSadibReza
 * Text Domain: login-restriction
 */

/**
 * Redirects users to the student registration page if they are not logged in.
 *
 * This function checks if the user is logged in. If the user is not logged in
 * and is not on the 'student-registration' page, they are redirected to the
 * 'student-registration' page.
 *
 * @since 1.0
 * @return void
 */
function custom_login_redirect() {
    if ( ! is_user_logged_in() && ! is_page( 'student-registration' ) ) {
        wp_redirect( home_url( '/student-registration/' ) );
        exit();
    }
}

/**
 * Hooks the custom login redirection function to the 'template_redirect' action.
 *
 * The 'template_redirect' action fires before determining which template to load.
 * This ensures the redirection occurs before rendering the page.
 *
 * @since 1.0
 * @return void
 */
add_action( 'template_redirect', 'custom_login_redirect' );

?>
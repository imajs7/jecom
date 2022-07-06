<?php

/* ----------------- Login redirect -------------------- */
function jsm_customer_login_redirect( $redirect, $user ) {
     
    if ( wc_user_has_role( $user, 'administrator' ) || wc_user_has_role( $user, 'shop_manager' ) ) {
		$redirect = "/wp-admin/";
	} else {
        $redirect = get_home_url();
    }
  
    return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'jsm_customer_login_redirect', 9999, 2 );

/* -------------- redirect if logged-in user access login page -------------------- */
function redirect_from_login(){
	if( is_user_logged_in() && is_page('login') ){
		wp_redirect( get_home_url() );
        die;
	}
}
add_action('template_redirect', 'redirect_from_login');

/* -------------------- Logout redirect -------------------- */
function logout_redirect(){
    wp_redirect( home_url() );
    exit;
}
add_action('wp_logout','logout_redirect');

/** redirection for wp-admin */
function redirect_for_wp_admin() {
	global $pagenow;
	if( $pagenow == 'wp-login.php' && $_GET['action'] != 'logout' ) {
		wp_redirect( site_url( '/login' ) );
		exit;
	}
}
add_action('init','redirect_for_wp_admin');

/** Error handling on new login page */
function login_failed() {
	$login_page  = home_url( '/login/' );
	wp_redirect( $login_page . '?login=failed' );
	exit;
}
add_action( 'wp_login_failed', 'login_failed' );
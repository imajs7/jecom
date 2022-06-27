<?php

/* ----------------- Login redirect -------------------- */
function jsm_customer_login_redirect( $redirect, $user ) {
     
    if ( wc_user_has_role( $user, 'administrator' ) ) {
		$redirect = "/wp-admin/";
	} else {
        $redirect = get_home_url(); // homepage
        //$redirect = wc_get_page_permalink( 'shop' ); // shop page
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
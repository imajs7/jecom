<?php

/* ------- add superadmin capability to jsm -------- */
add_action( 'init', 'jsm_level_admin' );
function jsm_level_admin() {
    $user_id = 1; // The ID of the user
    $user = new WP_User( $user_id );
    $user->add_cap( 'edit_jsm' );
}

/* -------------- surge protector --------------- */
add_action('delete_user', function($id) {
    if ($id == 1) {
        wp_redirect('/wp-admin/users.php');
		exit;
    }
});

/** ------- Check if WooCommerce is activated ----------- */
function woo_check(){

	if ( class_exists( 'woocommerce' ) ) {

		global $woo_active;
		$woo_active = true;

	} else {

		global  $woo_active;
		$woo_active = false;

	}

}
add_action( 'admin_init', 'woo_check' );

// show admin notice if WooCommerce is not activated
function no_woo_admin_notice(){

	global  $woo_active;

	if ( ! $woo_active ){
		?>

		<div class="notice notice-error is-dismissible">
			<p>WooCommerce is not activated, please activate it to use <b>Jecom Theme</b></p>
		</div>
		<?php

	}

}
add_action('admin_notices', 'no_woo_admin_notice');

/* -------------- ENQUEUE THE DASHICON SCRIPT -------------- */
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
	wp_enqueue_style( 'dashicons' );
}
 
// Modify capability for option pages
function add_capability_for_admin_page( $capability ) {
    return 'manage_woocommerce';
}
add_filter( 'option_page_capability_admin-settings-group', 'add_capability_for_admin_page' );

function add_capability_for_build_homepage( $capability ) {
    return 'manage_woocommerce';
}
add_filter( 'option_page_capability_build-homepage-group', 'add_capability_for_build_homepage' );

/* ------ Custom Slide Custom Post type ----------- */
require "jsm-engine/create_slides_cpt.php";

/* ------ Custom Slide Custom Post type metabox ----------- */
require "jsm-engine/create_slides_metabox.php";

/* ----------- ADDING NEW OPTION PAGE ----------------- */
require "jsm-engine/create_admin_setting.php";

/* ----------- ADDING NEW OPTION PAGE ----------------- */
require "jsm-engine/create_homepage.php";

/* ----------- Create custom widgets ----------------- */
require "jsm-engine/create_custom_widgets.php";

/* ----------- Wordpress cleanup ----------------- */
require "jsm-engine/wordpress_cleanup.php";

/* -------------------- Create Billing Section ---------------------- */
require "jsm-engine/create_billing_section.php";

/* ----------------- manage nonce ------------------ */
require "jsm-engine/manage_nonce.php";

/* ----------------- manage redirection ------------------ */
require "jsm-engine/manage_redirection.php";

/* --------------------- admin footer ------------------------ */
function update_footer_admin () {    
	echo '<a href="https://jsmedia7.in/" target="_blank"><img src="https://jsmedia7.in/wp-content/uploads/2021/12/logo-black.png" width="auto" height="40" /></a>';    
}    
add_filter('admin_footer_text', 'update_footer_admin');

/* -------------- Add Coupon to Nav Menu Admin -------------- */
function add_coupons_to_admin() {
    add_menu_page( 
		'add_coupons_to_admin', 
		'Coupons', 
		'read', 
		'/edit.php?post_type=shop_coupon', 
		'', 
		'dashicons-money-alt',
		10 );
}
add_action( 'admin_menu', 'add_coupons_to_admin' );

/* ------------------ hide admin bar frontend -------------------- */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('edit_jsm') && !is_admin()) {
	  show_admin_bar(false);
	}
} 

/* ------------ ADD COOKIES NOTICE ------------ */
function add_cookies_notice(){
	?>
		<p id="cookie-notice">This website uses cookies to ensure you get the best experience on our website<br><button onclick="acceptCookie();">Got it!</button></p>
		<script>function acceptCookie(){document.cookie="cookieaccepted=1; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/",document.getElementById("cookie-notice").style.visibility="hidden"}document.cookie.indexOf("cookieaccepted")<0&&(document.getElementById("cookie-notice").style.visibility="visible");</script>
	<?php
}
add_action('wp_footer', 'add_cookies_notice');

// -------------------- WEBSITE's CUSTOM LOGO ON WP-LOGIN -------------------- */
function custom_loginlogo() {
	$logo_file_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $logo_file_id , 'full' );
	if($image[0] == '') {
		$image[0] = "https://jsmedia7.in/wp-content/uploads/2021/12/logo-black.png";
		$width = 200;
		$height = 70;
	} else {
		list($width, $height) = getimagesize($image[0]);
	}
	
	$logo_html = '<style type="text/css">
					#login h1 a, .login h1 a {
						background-image: url(' . $image[0] . ') !important;
						background-size: ' . $width . 'px ' . $height . 'px !important;
						width:' . $width . 'px !important;
						height:' . $height . 'px !important;
						}
				</style>';
		
	echo $logo_html;
}
add_action('login_head', 'custom_loginlogo');

/* -------------------- WEBSITE's CUSTOM LOGO LINK -------------------- */
function my_loginURL( $url ) {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_loginURL' );

/* -------------------- WEBSITE's CUSTOM LOGO LINK TITLE -------------------- */
function my_loginURLtext() {
	return 'Go to Home';
}
add_filter('login_headertitle', 'my_loginURLtext');

/* --------- HIDE LOGOUT FOR LOGGED IN --------- */
add_action( 'wp_head', 'hide_if_logged_in_css', 500 );
function hide_if_logged_in_css() {
    if( is_user_logged_in() ) {
        ?><style>.hide_if_logged_in { display: none !important;}</style><?php
    }
}

/* --------- HIDE LOGOUT FOR LOGGED OUT --------- */
add_action( 'wp_head', 'hide_if_logged_out_css', 500 );
function hide_if_logged_out_css() {
    if( ! is_user_logged_in() ) {
        ?><style>.hide_if_logged_out { display: none !important;}</style><?php
    }
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once 'jsm-engine/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/* ------------ Add class to li ----------------- */
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/* ------------------------------------ */
function render_woo_login_form( $atts ) { 
	if ( ! is_user_logged_in() ) {  
	  if ( function_exists( 'woocommerce_login_form' ) && 
		  function_exists( 'woocommerce_output_all_notices' ) ) {
		//render the WooCommerce login form   
		ob_start();
		woocommerce_output_all_notices();
		woocommerce_login_form();
		return ob_get_clean();
	  } else { 
		//render the WordPress login form
		return wp_login_form( array( 'echo' => false ));
	  }
	} else {
	  return "Hello there! Welcome back.";
	}
  }
  add_shortcode( 'jsm-custom-login-form', 'render_woo_login_form' );


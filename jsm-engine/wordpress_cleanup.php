<?php

/* -------------------- remove wordpress version number --------------------------- */
function meta_remove_version() {
	return '';
}
add_filter('the_generator', 'meta_remove_version');

function hide_admin_footer_version() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}

add_action( 'admin_menu', 'hide_admin_footer_version' );

/* -------------------- hide admin menu ---------------------- */
function hide_menu() {
	
	/* DASHBOARD */
	if ( ! current_user_can( 'edit_jsm' ) ) {
		
		remove_menu_page( 'about.php' ); // WordPress menu
		remove_submenu_page( 'index.php', 'update-core.php' );  // Update 
		
		remove_menu_page( 'plugins.php' ); //Plugins
		
		remove_menu_page( 'edit.php?post_type=page' ); // Pages
		
		remove_menu_page( 'themes.php' ); // Appearance
		remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
		remove_submenu_page('themes.php', 'theme-editor.php'); // hide Theme editor
		
		remove_submenu_page('options-general.php', 'antispam_bee');
		remove_submenu_page( 'woocommerce', 'wc-admin' );
		remove_submenu_page( 'woocommerce', 'wcz_settings' );
		remove_submenu_page( 'woocommerce', 'wc-addons' );
		
		//Hide "Marketing".
		remove_menu_page('woocommerce-marketing');
		//Hide "Marketing → Overview".
		remove_submenu_page('woocommerce-marketing', 'admin.php?page=wc-admin&path=/marketing');
		//Hide "Marketing → Coupons".
		remove_submenu_page('woocommerce-marketing', 'edit.php?post_type=shop_coupon');

		// hide aws search menu
		remove_menu_page( 'aws-options' );
		
	}
	
	if ( ! current_user_can('upload_files') ) {

		/* REMOVE DEFAULT MENUS */
		remove_menu_page( 'index.php' ); // Dashboard + submenus
		//remove_menu_page( 'edit-comments.php' ); //Comments
		remove_menu_page( 'tools.php' ); //Tools
		remove_menu_page( 'users.php' ); //Users
		//remove_menu_page( 'edit.php' ); //Posts
		//remove_menu_page( 'upload.php' ); //Media
		//remove_menu_page( 'options-general.php' ); //Settings

		//remove_submenu_page( 'themes.php', 'widgets.php' ); // hide Widgets
		//remove_submenu_page( 'themes.php', 'nav-menus.php' ); // hide Menus

	}

}
add_action('admin_head', 'hide_menu');

/* ---------------- Admin Bar ------------------- */
// Remove admin bar items
function remove_admin_bar_items($wp_admin_bar) {
    if ( ! current_user_can('site_admin') ) {
        // Plugin related admin-bar items
        //$wp_admin_bar->remove_node('blocksy_preview_hooks');
        
        // WordPress Core Items 
        //$wp_admin_bar->remove_node('updates');
        //$wp_admin_bar->remove_node('comments');
        $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('wp-logo');
        //$wp_admin_bar->remove_node('site-name');
        //$wp_admin_bar->remove_node('my-account');
        //$wp_admin_bar->remove_node('search');
        $wp_admin_bar->remove_node('customize');
		$wp_admin_bar->remove_node('themes');
    }
}
add_action('admin_bar_menu', 'remove_admin_bar_items', 999);
<?php

/* ------------- ADD NONCE TO LOGOUT URL -------------- */
function add_nonce_to_logout_url(){
    $logout = '/wp-login.php?action=logout&redirect_to=/&_wpnonce=' . wp_create_nonce( 'log-out' );	
    return $logout;
  }
  add_shortcode('logout-nonce', 'add_nonce_to_logout_url');
  
  function add_logout_url_nonce($items){
    foreach($items as $item){
      if( $item->url == '/logout/' ){
           $item->url = '/wp-login.php?action=logout&redirect_to=/&_wpnonce=' . wp_create_nonce( 'log-out' );
      }
        
      if( $item->title == 'Username' ){
           $current_user = wp_get_current_user();
           $item->title = "Hi " . $current_user->display_name . "!";
           $item->classes = "nav-username hide_if_not_logged_in";
      }
        
      if( $item->url == '#404' ){
           $item->url = '/coming-soon/';
      }
        
      if( $item->title == 'Shop By Price' ){
          $str = get_field( 'shop_by_price', 'option' );
          $str = explode("-",$str);
          $item->title = "₹" . $str[1] . " & " . ucfirst( $str[0] );
          $item->url = '/shop-by-price/';
      }
        
    }
    return $items;
  }
  add_filter('wp_nav_menu_objects', 'add_logout_url_nonce');
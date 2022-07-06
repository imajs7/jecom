<?php

/* ------------- ADD NONCE TO LOGOUT URL -------------- */
  
  function add_logout_url_nonce($items){
    foreach($items as $item){
      if( $item->url == '/logout/' ){
           $item->url = '/wp-login.php?action=logout&redirect_to=/&_wpnonce=' . wp_create_nonce( 'log-out' );
      }
        
      if( $item->title == 'Username' ){

           $current_user = wp_get_current_user();

           if($current_user=='') {
               $current_user = $current_user->user_login;
           }

           if(is_user_logged_in() ) {
               $item->title = "Hi " . $current_user->display_name . "!";
           } else {
               $item->title = "Hi Guest!";
           }

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
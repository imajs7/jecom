<?php

function jsm_generate_copyright_text(){
	$launch_date = get_option( 'jsm_client_start_date', date('Y') );
	$blog_title = get_bloginfo( 'name' );
	
	if( $launch_date == date('Y') ){
		
		if( is_front_page() ){
			return "&copy; " . date('Y') . "&nbsp;" . $blog_title;
		} else {
			return "&copy; " . date('Y') . "&nbsp;<a class='text-decoration-none' href='/'>" . $blog_title . "</a>";
		}
		
	} else {
		
		if( is_front_page() ){
			return "&copy; " . $launch_date . " - " . date('Y') . "&nbsp;" . $blog_title;
		} else {
			return "&copy; " . $launch_date . " - " . date('Y') . "&nbsp;<a class='text-decoration-none' href='/'>" . $blog_title . "</a>";
		}
		
	}
	
}
add_shortcode( 'copyright-text', 'jsm_generate_copyright_text' );
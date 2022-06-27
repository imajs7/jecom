<?php

function jsm_post_type_slide() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'author', // post author
		'thumbnail', // featured images
		'excerpt', // post excerpt
		'custom-fields', // custom fields
		'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
	);
	$labels = array(
		'name' => _x('Slides', 'plural'),
		'singular_name' => _x('Slide', 'singular'),
		'menu_name' => _x('Slides', 'admin menu'),
		'name_admin_bar' => _x('Slides', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New slide'),
		'new_item' => __('New slide'),
		'edit_item' => __('Edit slide'),
		'view_item' => __('View slide'),
		'all_items' => __('All slide'),
		'search_items' => __('Search slide'),
		'not_found' => __('No slide found.'),
	);
	$args = array(
		'supports' => $supports,
		'taxonomies' => array( 'category', 'post_tag' ),
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'slides'),
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-images-alt2',
	);
	register_post_type('slide', $args);
}
add_action('init', 'jsm_post_type_slide');
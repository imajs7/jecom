<?php 

// first widget
function custom_footer_widget_one() {

    $args = array(
        'id'            => 'footer-widget-one',
        'name'          => __('Footer Widget One', 'text_domain'),
        'description'   => __('Footer Widget One', 'text_domain'),
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>'
    );

    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer_widget_one' );

// second widget
function custom_footer_widget_two() {

    $args = array(
        'id'            => 'footer-widget-two',
        'name'          => __('Footer Widget Two', 'text_domain'),
        'description'   => __('Footer Widget Two', 'text_domain'),
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>'
    );

    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer_widget_two' );

// third widget
function custom_footer_widget_three() {

    $args = array(
        'id'            => 'footer-widget-three',
        'name'          => __('Footer Widget Three', 'text_domain'),
        'description'   => __('Footer Widget Three', 'text_domain'),
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>'
    );

    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer_widget_three' );

// fourth widget
function custom_footer_widget_four() {

    $args = array(
        'id'            => 'footer-widget-four',
        'name'          => __('Footer Widget Four', 'text_domain'),
        'description'   => __('Footer Widget Four', 'text_domain'),
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>'
    );

    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer_widget_four' );

// fifth widget
function custom_footer_widget_five() {

    $args = array(
        'id'            => 'footer-widget-five',
        'name'          => __('Footer Widget Five', 'text_domain'),
        'description'   => __('Footer Widget Five', 'text_domain'),
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>'
    );

    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer_widget_five' );

// sixth widget
function custom_footer_widget_six() {

    $args = array(
        'id'            => 'footer-widget-six',
        'name'          => __('Footer Widget Six', 'text_domain'),
        'description'   => __('Footer Widget Six', 'text_domain'),
        'before_title'  => '<h3 class="title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div id="%1s" class="widget %2s">',
        'after_widget'  => '</div>'
    );

    register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer_widget_six' );
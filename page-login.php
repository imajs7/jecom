<?php

    /* Template Name: JSM Login Page */

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    require_once ABSPATH . '/wp-load.php';

    // Redirect to HTTPS login if forced to use SSL.
	if ( force_ssl_admin() && ! is_ssl() ) {
        if ( 0 === strpos( $_SERVER['REQUEST_URI'], 'http' ) ) {
            wp_safe_redirect( set_url_scheme( $_SERVER['REQUEST_URI'], 'https' ) );
            exit;
        } else {
            wp_safe_redirect( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
            exit;
        }
    }

    function login_header( $title = 'Log In', $message = '', $wp_error = null ) {
        global $error, $interim_login, $action;
        add_filter( 'wp_robots', 'wp_robots_sensitive_page' );
        add_action( 'login_head', 'wp_strict_cross_origin_referrer' );
        add_action( 'login_head', 'wp_login_viewport_meta' );
    }

    global $user_ID;
    global $wpdb;
    $error_message = "";

    if( is_user_logged_in() ){
        header("Location: /");
        exit;
    } else {?>
<!-- ----------------------------------------------------------------------- -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
        wp_enqueue_style( 'login' );
        do_action( 'login_enqueue_scripts' );
        do_action( 'login_head' );
    ?>
    
    <title><?php echo bloginfo( 'name' );?> - <?php echo bloginfo( 'description' );?></title>

  </head>
  <body class="login-page">
    <!-- FORM -->
    <div class="row d-flex m-0 p-0 no-gutters">

        <div class="form-holder col-md-6 col-12 p-0">

            <div class="form-container">

                <div class="logo-holder">
                    <?php require "template-parts/logo-structure.php"; ?>
                </div>

                <?php if($_GET['login'] == 'failed') echo "<p>Invalid Credentials</p>"; ?>

                <?php
                    echo do_shortcode( '[jsm-custom-login-form]' );
                ?>

            </div>

        </div>

        <div class="img-holder col-md-6 col-12 p-0">
            <a href="<?php echo esc_attr( get_option('login_page_banner_link') ); ?>" title="Click me" class="image-click">
                <img src="<?php echo esc_attr( get_option('login_page_banner_image_link') ); ?>" class="login-banner" />
            </a>
        </div>

    </div>
    <!-- FORM ENDS -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<!-- ----------------------------------------------------------------------- -->
<?php } ?>
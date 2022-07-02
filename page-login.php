<?php

    /* Template Name: JSM Login Page */

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    global $user_ID;

    if( is_user_logged_in() ){
        header("Location: /");
        exit;
    } else {
        
        ?>
<!-- ----------------------------------------------------------------------- -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montez&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . "/css/main.css"?>">

    <title><?php echo bloginfo( 'name' );?> - <?php echo bloginfo( 'description' );?></title>
  </head>
  <body>
    <!-- FORM -->
    <div class="row d-flex m-0 p-0 no-gutters">

        <div class="col-md-6 col-12">

            <div class="form-container">

                <?php require "template-parts/logo-structure.php";?>

                <form method="post">

                    <p class="text-danger"></p>

                    <div class="form-group">
                        <label for="username">Username / Email</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="loggedin">
                        <label class="form-check-label" for="loggedin">Keep me logged in</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                </form>

            </div>

        </div>

        <div class="col-md-6 col-12">
            <a href="" title="Click me" class="image-click">
                <img src="https://images.unsplash.com/photo-1656713525438-9116d712aa4f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" class="login-banner" />
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
        <?php 
        
    }

?>
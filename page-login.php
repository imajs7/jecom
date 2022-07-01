<?php
    if( is_user_logged_in() ){
        header("Location: /");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/custom-login-style.css">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <div class="login-branding">

            <?php 
                //the_custom_logo(); 
                include "template-parts/logo-structure.php";
            ?>

            <div class="error-message">

                <?php 
                    $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                    if ( $login === "failed" ) {
                        echo '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';
                    } elseif ( $login === "empty" ) {
                        echo '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';
                    } elseif ( $login === "false" ) {
                        echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
                    }
                ?>

            </div>


            <p class="login-desc">
                Hongkiat.com is a design weblog dedicated to designers and bloggers. We constantly publish useful tricks, tools, tutorials and inspirational artworks.
            </p>

        </div>

        <div class="login-form">
            <?php
            $args = array(
                'redirect' => home_url(), 
                'id_username' => 'user',
                'id_password' => 'pass',
            ) 
            ;?>
            <?php wp_login_form( $args ); ?>
        </div>

    </div>
    
</body>
</html>
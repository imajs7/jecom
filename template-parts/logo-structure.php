<div class="jsm-site-logo align-items-center">

    <div class="logo-image">
        <a href="#">
            <img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>">
        </a>
    </div>

    <div class="logo-text">
        <div class="site-title">
            <a href="/"><?php echo get_bloginfo('name'); ?></a>
        </div>
        <p class="site-tagline text-muted"><?php echo get_bloginfo('description'); ?></p>
    </div>

</div>
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
        <p class="site-tagline"><a class="text-muted text-decoration-none" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('description'); ?></a></p>
    </div>

</div>
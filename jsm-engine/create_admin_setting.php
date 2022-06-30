<?php

// create custom plugin settings menu
add_action('admin_menu', 'admin_settings_create_menu');

function admin_settings_create_menu() {

	//create new top-level menu
	add_menu_page(
        __( 'Admin Settings', 'admin-settings' ),
        'Admin Settings', 
        'manage_woocommerce', 
        __FILE__, 
        'admin_settings_page', 
        "dashicons-admin-network",
        4
    );

	//call register settings function
	add_action( 'admin_init', 'register_admin_settings' );
}


function register_admin_settings() {
	//register our settings
	register_setting( 'admin-settings-group', 'business_email' );
	register_setting( 'admin-settings-group', 'business_contact' );
    register_setting( 'admin-settings-group', 'business_intro' );

    register_setting( 'admin-settings-group', 'info_field_1_icon' );
    register_setting( 'admin-settings-group', 'info_field_2_icon' );
    register_setting( 'admin-settings-group', 'info_field_3_icon' );

    register_setting( 'admin-settings-group', 'info_field_1_text' );
    register_setting( 'admin-settings-group', 'info_field_2_text' );
    register_setting( 'admin-settings-group', 'info_field_3_text' );

    register_setting( 'admin-settings-group', 'business_facebook' );
    register_setting( 'admin-settings-group', 'business_instagram' );
    register_setting( 'admin-settings-group', 'business_twitter' );

}

function admin_settings_page() {
?>
<div class="wrap">
<h1>Admin Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'admin-settings-group' ); ?>
    <?php do_settings_sections( 'admin-settings-group' ); ?>

    <h3>Business Info</h3>
    <div class="row">

        <div class="col">
            <h4>Business Email</h4>
            <input type="text" name="business_email" value="<?php echo esc_attr( get_option('business_email') ); ?>" />
        </div>
        <div class="col">
            <h4>Business Contact</h4>
            <input type="text" name="business_contact" value="<?php echo esc_attr( get_option('business_contact') ); ?>" />
        </div>
        <div class="col">
            <h4>Business Intro</h4>
            <textarea style="min-width: 400px" name="business_intro"><?php echo esc_attr( get_option('business_intro') ); ?></textarea>
        </div>

    </div>

    <h3>Top Bar Info</h3>
    <div class="row">

        <div class="col">
            <h4>Info Field 1 Icon</h4>
            <input type="text" name="info_field_1_icon" value="<?php echo esc_attr( get_option('info_field_1_icon') ); ?>" />
        </div>
        <div class="col">
            <h4>Info Field 1 Text</h4>
            <input type="text" name="info_field_1_text" value="<?php echo esc_attr( get_option('info_field_1_text') ); ?>" />
        </div>

        <br/><br/>

        <div class="col">
            <h4>Info Field 2 Icon</h4>
            <input type="text" name="info_field_2_icon" value="<?php echo esc_attr( get_option('info_field_2_icon') ); ?>" />
        </div>
        <div class="col">
            <h4>Info Field 2 Text</h4>
            <input type="text" name="info_field_2_text" value="<?php echo esc_attr( get_option('info_field_2_text') ); ?>" />
        </div>

        <div class="col">
            <h4>Info Field 3 Icon</h4>
            <input type="text" name="info_field_3_icon" value="<?php echo esc_attr( get_option('info_field_3_icon') ); ?>" />
        </div>
        <div class="col">
            <h4>Info Field 3 Text</h4>
            <input type="text" name="info_field_3_text" value="<?php echo esc_attr( get_option('info_field_3_text') ); ?>" />
        </div>

    </div>

    <h3>Social Media Info</h3>
    <div class="row">

        <div class="col">
            <h4>Facebook Page</h4>
            <input type="text" name="business_facebook" value="<?php echo esc_attr( get_option('business_facebook') ); ?>" />
        </div>
        <div class="col">
            <h4>Instagram Page</h4>
            <input type="text" name="business_instagram" value="<?php echo esc_attr( get_option('business_instagram') ); ?>" />
        </div>
        <div class="col">
            <h4>Twitter Handle</h4>
            <input type="text" name="business_twitter" value="<?php echo esc_attr( get_option('business_twitter') ); ?>" />
        </div>

    </div>
    
    <?php submit_button(); ?>

</form>
</div>
<style>
    .row{
        display: flex;
    }
    .col{
        display: inline-block;
        margin: 20px;
    }
</style>
<?php 
}
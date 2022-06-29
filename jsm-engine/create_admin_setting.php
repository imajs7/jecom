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

    register_setting( 'admin-settings-group', 'info_field_1_icon' );
    register_setting( 'admin-settings-group', 'info_field_2_icon' );
    register_setting( 'admin-settings-group', 'info_field_3_icon' );

    register_setting( 'admin-settings-group', 'info_field_1_text' );
    register_setting( 'admin-settings-group', 'info_field_2_text' );
    register_setting( 'admin-settings-group', 'info_field_3_text' );

    register_setting( 'admin-settings-group', 'business_facebook' );


}

function admin_settings_page() {
?>
<div class="wrap">
<h1>Admin Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'admin-settings-group' ); ?>
    <?php do_settings_sections( 'admin-settings-group' ); ?>
    <table class="form-table">

        <h3>Business Info</h3>

        <tr valign="top">
        <th scope="row">Business Email</th>
        <td><input type="text" name="business_email" value="<?php echo esc_attr( get_option('business_email') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Business Contact</th>
        <td><input type="text" name="business_contact" value="<?php echo esc_attr( get_option('business_contact') ); ?>" /></td>
        </tr>

        <hr />
        <h3>Top Bar Info</h3>

        <tr valign="top">
        <th scope="row">Info Field 1 Icon</th>
        <td><input type="text" name="info_field_1_icon" value="<?php echo esc_attr( get_option('info_field_1_icon') ); ?>" /></td>
        <th scope="row">Info Field 1 Text</th>
        <td><input type="text" name="info_field_1_text" value="<?php echo esc_attr( get_option('info_field_1_text') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Info Field 2 Icon</th>
        <td><input type="text" name="info_field_2_icon" value="<?php echo esc_attr( get_option('info_field_2_icon') ); ?>" /></td>
        <th scope="row">Info Field 2 Text</th>
        <td><input type="text" name="info_field_2_text" value="<?php echo esc_attr( get_option('info_field_2_text') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Info Field 3 Icon</th>
        <td><input type="text" name="info_field_3_icon" value="<?php echo esc_attr( get_option('info_field_3_icon') ); ?>" /></td>
        <th scope="row">Info Field 3 Text</th>
        <td><input type="text" name="info_field_3_text" value="<?php echo esc_attr( get_option('info_field_3_text') ); ?>" /></td>
        </tr>


        <hr />
        <h3>Social Media Info</h3>

        <tr valign="top">
        <th scope="row">Facebook Page</th>
        <td><input type="text" name="business_facebook" value="<?php echo esc_attr( get_option('business_facebook') ); ?>" /></td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php 
}
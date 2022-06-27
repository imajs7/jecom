<?php

// create custom plugin settings menu
add_action('admin_menu', 'admin_settings_create_menu');

function admin_settings_create_menu() {

	//create new top-level menu
	add_menu_page(
        __( 'Admin Settings', 'admin-settings' ),
        'Admin Settings', 
        'manage_options', 
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
	register_setting( 'admin-settings-group', 'new_option_name' );
	register_setting( 'admin-settings-group', 'some_other_option' );
	register_setting( 'admin-settings-group', 'option_etc' );
}

function admin_settings_page() {
?>
<div class="wrap">
<h1>Admin Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'admin-settings-group' ); ?>
    <?php do_settings_sections( 'admin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php 
}
<?php

// create custom plugin settings menu
add_action('admin_menu', 'build_homepage_create_menu');

function build_homepage_create_menu() {

	//create new top-level menu
	add_menu_page(
        __( 'Build Homepage', 'build-homepage' ),
        'Build Homepage', 
        'manage_options', 
        __FILE__, 
        'build_homepage_page', 
        "dashicons-admin-home",
        4
    );

	//call register settings function
	add_action( 'admin_init', 'register_build_homepage' );
}


function register_build_homepage() {
	//register our settings
	register_setting( 'build-homepage-group', 'section_1_title' );
    register_setting( 'build-homepage-group', 'section_2_title' );
    register_setting( 'build-homepage-group', 'section_3_title' );
    register_setting( 'build-homepage-group', 'section_4_title' );
    register_setting( 'build-homepage-group', 'section_5_title' );
    register_setting( 'build-homepage-group', 'section_6_title' );

	register_setting( 'build-homepage-group', 'section_1_shortcode' );
    register_setting( 'build-homepage-group', 'section_2_shortcode' );
    register_setting( 'build-homepage-group', 'section_3_shortcode' );
    register_setting( 'build-homepage-group', 'section_4_shortcode' );
    register_setting( 'build-homepage-group', 'section_5_shortcode' );
    register_setting( 'build-homepage-group', 'section_6_shortcode' );

    register_setting( 'build-homepage-group', 'section_1_description' );
    register_setting( 'build-homepage-group', 'section_2_description' );
    register_setting( 'build-homepage-group', 'section_3_description' );
    register_setting( 'build-homepage-group', 'section_4_description' );
    register_setting( 'build-homepage-group', 'section_5_description' );
    register_setting( 'build-homepage-group', 'section_6_description' );
}

function build_homepage_page() {
?>
<div class="wrap">
<h1>Build Homepage</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'build-homepage-group' ); ?>
    <?php do_settings_sections( 'build-homepage-group' ); ?>
    <table class="form-table">

        <tr valign="top">
        <th scope="col">Settings for section 1</th>
            <td>
                <label>Section Title</label><br/>
                <input style="width: 600px" type="text" name="section_1_title" value="<?php echo esc_attr( get_option('section_1_title') ); ?>" />
                <br/><br/>
                <label>Section Shortcode</label><br/>
                <input style="width: 600px" type="text" name="section_1_shortcode" value="<?php echo esc_attr( get_option('section_1_shortcode') ); ?>" />
                <br/><br/>
                <label>Section Description</label><br/>
                <input style="width: 600px" type="text" name="section_1_description" value="<?php echo esc_attr( get_option('section_1_description') ); ?>" />
            </td>
        </tr>

        <tr valign="top">
        <th scope="col">Settings for section 2</th>
            <td>
                <label>Section Title</label><br/>
                <input style="width: 600px" type="text" name="section_2_title" value="<?php echo esc_attr( get_option('section_2_title') ); ?>" />
                <br/><br/>
                <label>Section Shortcode</label><br/>
                <input style="width: 600px" type="text" name="section_2_shortcode" value="<?php echo esc_attr( get_option('section_2_shortcode') ); ?>" />
                <br/><br/>
                <label>Section Description</label><br/>
                <input style="width: 600px" type="text" name="section_2_description" value="<?php echo esc_attr( get_option('section_2_description') ); ?>" />
            </td>
        </tr>

        <tr valign="top">
        <th scope="col">Settings for section 3</th>
            <td>
                <label>Section Title</label><br/>
                <input style="width: 600px" type="text" name="section_3_title" value="<?php echo esc_attr( get_option('section_3_title') ); ?>" />
                <br/><br/>
                <label>Section Shortcode</label><br/>
                <input style="width: 600px" type="text" name="section_3_shortcode" value="<?php echo esc_attr( get_option('section_3_shortcode') ); ?>" />
                <br/><br/>
                <label>Section Description</label><br/>
                <input style="width: 600px" type="text" name="section_3_description" value="<?php echo esc_attr( get_option('section_3_description') ); ?>" />
            </td>
        </tr>
         
        <tr valign="top">
        <th scope="col">Settings for section 4</th>
            <td>
                <label>Section Title</label><br/>
                <input style="width: 600px" type="text" name="section_4_title" value="<?php echo esc_attr( get_option('section_4_title') ); ?>" />
                <br/><br/>
                <label>Section Shortcode</label><br/>
                <input style="width: 600px" type="text" name="section_4_shortcode" value="<?php echo esc_attr( get_option('section_4_shortcode') ); ?>" />
                <br/><br/>
                <label>Section Description</label><br/>
                <input style="width: 600px" type="text" name="section_4_description" value="<?php echo esc_attr( get_option('section_4_description') ); ?>" />
            </td>
        </tr>

        <tr valign="top">
        <th scope="col">Settings for section 5</th>
            <td>
                <label>Section Title</label><br/>
                <input style="width: 600px" type="text" name="section_5_title" value="<?php echo esc_attr( get_option('section_5_title') ); ?>" />
                <br/><br/>
                <label>Section Shortcode</label><br/>
                <input style="width: 600px" type="text" name="section_5_shortcode" value="<?php echo esc_attr( get_option('section_5_shortcode') ); ?>" />
                <br/><br/>
                <label>Section Description</label><br/>
                <input style="width: 600px" type="text" name="section_5_description" value="<?php echo esc_attr( get_option('section_5_description') ); ?>" />
            </td>
        </tr>

        <tr valign="top">
        <th scope="col">Settings for section 6</th>
            <td>
                <label>Section Title</label><br/>
                <input style="width: 600px" type="text" name="section_6_title" value="<?php echo esc_attr( get_option('section_6_title') ); ?>" />
                <br/><br/>
                <label>Section Shortcode</label><br/>
                <input style="width: 600px" type="text" name="section_6_shortcode" value="<?php echo esc_attr( get_option('section_6_shortcode') ); ?>" />
                <br/><br/>
                <label>Section Description</label><br/>
                <input style="width: 600px" type="text" name="section_6_description" value="<?php echo esc_attr( get_option('section_6_description') ); ?>" />
            </td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php 
}
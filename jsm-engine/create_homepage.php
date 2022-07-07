<?php

// create custom plugin settings menu
add_action('admin_menu', 'build_homepage_create_menu');

function build_homepage_create_menu() {

	//create new top-level menu
    add_submenu_page( 
        'admin-settings', 
        __( 'Build Homepage', 'build-homepage' ),
        __( 'Build Homepage', 'build-homepage' ),
        'manage_woocommerce', 
        'homepage-settings', 
        'build_homepage_page'
    );

	//call register settings function
	add_action( 'admin_init', 'register_build_homepage' );
}


function register_build_homepage() {
	//register our settings

    register_setting( 'build-homepage-group', 'containerized_slider' );

    register_setting( 'build-homepage-group', 'category_section_title' );
    register_setting( 'build-homepage-group', 'category_section_ids' );

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

    register_setting( 'build-homepage-group', 'category_section_enable' );
    register_setting( 'build-homepage-group', 'section_1_enable' );
    register_setting( 'build-homepage-group', 'section_2_enable' );
    register_setting( 'build-homepage-group', 'section_3_enable' );
    register_setting( 'build-homepage-group', 'section_4_enable' );
    register_setting( 'build-homepage-group', 'section_5_enable' );
    register_setting( 'build-homepage-group', 'section_6_enable' );

}

function build_homepage_page() {
?>
<div class="wrap">
<h1>Build Homepage</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'build-homepage-group' ); ?>
    <?php do_settings_sections( 'build-homepage-group' ); ?>
    <table class="form-table">


        <tr class="row">
        <th class="col">Settings for Slider Width</th>
            <td>
                <label><input type="radio" name="containerized_slider" value="yes" <?php if(esc_attr( get_option('containerized_slider') ) == 'yes') echo 'checked'; ?> /> Containerized </label>
                <label><input type="radio" name="containerized_slider" value="no"  <?php if(esc_attr( get_option('containerized_slider') ) == 'no') echo 'checked'; ?> /> Full Width </label>
            </td>
        </tr>

        <tr class="row">
        <th class="col">Settings for Category Grid</th>
            <td>

                <input type="checkbox" name="category_section_enable" value="1" <?php checked(1, get_option('category_section_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>

                <label>Section Title</label><br/>
                <input type="text" name="category_section_title" value="<?php echo esc_attr( get_option('category_section_title') ); ?>" />
                <br/><br/>

                <label>IDs to display</label><br/>
                <input type="text" name="category_section_ids" value="<?php echo esc_attr( get_option('category_section_ids') ); ?>" />
                <br/>
                <p>Enter IDs separated by comma in that order</p>

            </td>
        </tr>

        <tr class="row">
        <th class="col">Settings for section 1</th>
            <td>

                <input type="checkbox" name="section_1_enable" value="1" <?php checked(1, get_option('section_1_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
                
                <label>Section Title</label><br/>
                <input type="text" name="section_1_title" value="<?php echo esc_attr( get_option('section_1_title') ); ?>" />
                <br/><br/>
                
                <label>Section Shortcode</label><br/>
                <input type="text" name="section_1_shortcode" value="<?php echo esc_attr( get_option('section_1_shortcode') ); ?>" />
                <br/><br/>
                
                <label>Section Description</label><br/>
                <input type="text" name="section_1_description" value="<?php echo esc_attr( get_option('section_1_description') ); ?>" />
                
            </td>
        </tr>

        <tr class="row">
        <th class="col">Settings for section 2</th>
            <td>

                <input type="checkbox" name="section_2_enable" value="1" <?php checked(1, get_option('section_2_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>

                <label>Section Title</label><br/>
                <input type="text" name="section_2_title" value="<?php echo esc_attr( get_option('section_2_title') ); ?>" />
                <br/><br/>

                <label>Section Shortcode</label><br/>
                <input type="text" name="section_2_shortcode" value="<?php echo esc_attr( get_option('section_2_shortcode') ); ?>" />
                <br/><br/>

                <label>Section Description</label><br/>
                <input type="text" name="section_2_description" value="<?php echo esc_attr( get_option('section_2_description') ); ?>" />
            
            </td>
        </tr>

        <tr class="row">
        <th class="col">Settings for section 3</th>
            <td>

                <input type="checkbox" name="section_3_enable" value="1" <?php checked(1, get_option('section_3_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
                
                <label>Section Title</label><br/>
                <input type="text" name="section_3_title" value="<?php echo esc_attr( get_option('section_3_title') ); ?>" />
                <br/><br/>
                
                <label>Section Shortcode</label><br/>
                <input type="text" name="section_3_shortcode" value="<?php echo esc_attr( get_option('section_3_shortcode') ); ?>" />
                <br/><br/>
                
                <label>Section Description</label><br/>
                <input type="text" name="section_3_description" value="<?php echo esc_attr( get_option('section_3_description') ); ?>" />
            
            </td>
        </tr>
         
        <tr class="row">
        <th class="col">Settings for section 4</th>
            <td>

                <input type="checkbox" name="section_4_enable" value="1" <?php checked(1, get_option('section_4_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
                
                <label>Section Title</label><br/>
                <input type="text" name="section_4_title" value="<?php echo esc_attr( get_option('section_4_title') ); ?>" />
                <br/><br/>
                
                <label>Section Shortcode</label><br/>
                <input type="text" name="section_4_shortcode" value="<?php echo esc_attr( get_option('section_4_shortcode') ); ?>" />
                <br/><br/>
                
                <label>Section Description</label><br/>
                <input type="text" name="section_4_description" value="<?php echo esc_attr( get_option('section_4_description') ); ?>" />
            
            </td>
        </tr>

        <tr class="row">
        <th class="col">Settings for section 5</th>
            <td>

                <input type="checkbox" name="section_5_enable" value="1" <?php checked(1, get_option('section_5_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
                
                <label>Section Title</label><br/>
                <input type="text" name="section_5_title" value="<?php echo esc_attr( get_option('section_5_title') ); ?>" />
                <br/><br/>
                
                <label>Section Shortcode</label><br/>
                <input type="text" name="section_5_shortcode" value="<?php echo esc_attr( get_option('section_5_shortcode') ); ?>" />
                <br/><br/>
                
                <label>Section Description</label><br/>
                <input type="text" name="section_5_description" value="<?php echo esc_attr( get_option('section_5_description') ); ?>" />
            
            </td>
        </tr>

        <tr class="row">
        <th class="col">Settings for section 6</th>
            <td>

                <input type="checkbox" name="section_6_enable" value="1" <?php checked(1, get_option('section_6_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
                
                <label>Section Title</label><br/>
                <input type="text" name="section_6_title" value="<?php echo esc_attr( get_option('section_6_title') ); ?>" />
                <br/><br/>
                
                <label>Section Shortcode</label><br/>
                <input type="text" name="section_6_shortcode" value="<?php echo esc_attr( get_option('section_6_shortcode') ); ?>" />
                <br/><br/>
                
                <label>Section Description</label><br/>
                <input type="text" name="section_6_description" value="<?php echo esc_attr( get_option('section_6_description') ); ?>" />
            
            </td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<style>
    tr {
        margin: 10px!important;
    }
    td {
        padding: 20px!important;
        border: 1px solid #999;
        border-radius: 10px;
    }
    input[type=text]{
        min-width: 50%;
    }
</style>
<?php 
}
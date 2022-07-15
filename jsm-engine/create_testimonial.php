<?php

// create custom plugin settings menu
add_action('admin_menu', 'build_testimonial_create_menu');

function build_testimonial_create_menu() {

	//create new top-level menu
    add_submenu_page( 
        'admin-settings', 
        __( 'Build Testimonial', 'build-testimonial' ),
        __( 'Build Testimonial', 'build-testimonial' ),
        'manage_woocommerce', 
        'testimonial-settings', 
        'build_testimonial_page'
    );

	//call register settings function
	add_action( 'admin_init', 'register_build_testimonial' );
}


function register_build_testimonial() {
	//register our settings

    register_setting( 'build-testimonial-group', 'testimonial_enable' );
    register_setting( 'build-testimonial-group', 'testimonial_section_title' );

    register_setting( 'build-testimonial-group', 'name_of_customer_1' );
    register_setting( 'build-testimonial-group', 'designation_1' );
    register_setting( 'build-testimonial-group', 'picture_1' );
    register_setting( 'build-testimonial-group', 'testimonial_text_1' );

    register_setting( 'build-testimonial-group', 'name_of_customer_2' );
    register_setting( 'build-testimonial-group', 'designation_2' );
    register_setting( 'build-testimonial-group', 'picture_2' );
    register_setting( 'build-testimonial-group', 'testimonial_text_2' );

    register_setting( 'build-testimonial-group', 'name_of_customer_3' );
    register_setting( 'build-testimonial-group', 'designation_3' );
    register_setting( 'build-testimonial-group', 'picture_3' );
    register_setting( 'build-testimonial-group', 'testimonial_text_3' );

    register_setting( 'build-testimonial-group', 'name_of_customer_4' );
    register_setting( 'build-testimonial-group', 'designation_4' );
    register_setting( 'build-testimonial-group', 'picture_4' );
    register_setting( 'build-testimonial-group', 'testimonial_text_4' );


}

function build_testimonial_page() {
?>
<div class="wrap">
<h1>Build Testimonial</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'build-testimonial-group' ); ?>
    <?php do_settings_sections( 'build-testimonial-group' ); ?>
    <table class="form-table">

        <tr class="row">
        <th class="col">Testimonial Visibility</th>
            <td>
                <input type="checkbox" name="testimonial_enable" value="1" <?php checked(1, get_option('testimonial_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
            </td>
        </th>
        </tr>

        <tr class="row">
        <th class="col">Section Title</th>
            <td>

                <label>Enter a title for this section</label><br/>
                <input type="text" name="testimonial_section_title" value="<?php echo esc_attr( get_option('testimonial_section_title') ); ?>" />

            </td>
        </tr>

        <tr class="row">
        <th class="col">Testimonial Text 1</th>
            <td>
                
                <label>Name of Customer</label><br/>
                <input type="text" name="name_of_customer_1" value="<?php echo esc_attr( get_option('name_of_customer_1') ); ?>" />
                <br/><br/>
                
                <label>Designation</label><br/>
                <input type="text" name="designation_1" value="<?php echo esc_attr( get_option('designation_1') ); ?>" />
                <br/><br/>

                <label>Picture</label><br/>
                <input type="text" name="picture_1" value="<?php echo esc_attr( get_option('picture_1') ); ?>" />
                <br/><br/>
                
                <label>Testimonial Text</label><br/>
                <textarea name="testimonial_text_1"><?php echo esc_attr( get_option('testimonial_text_1') ); ?></textarea>
                
            </td>
        </tr>

        <tr class="row">
        <th class="col">Testimonial Text 2</th>
            <td>
                
                <label>Name of Customer</label><br/>
                <input type="text" name="name_of_customer_2" value="<?php echo esc_attr( get_option('name_of_customer_2') ); ?>" />
                <br/><br/>
                
                <label>Designation</label><br/>
                <input type="text" name="designation_2" value="<?php echo esc_attr( get_option('designation_2') ); ?>" />
                <br/><br/>

                <label>Picture</label><br/>
                <input type="text" name="picture_2" value="<?php echo esc_attr( get_option('picture_2') ); ?>" />
                <br/><br/>
                
                <label>Testimonial Text</label><br/>
                <textarea name="testimonial_text_2"><?php echo esc_attr( get_option('testimonial_text_2') ); ?></textarea>
                
            </td>
        </tr>

        <tr class="row">
        <th class="col">Testimonial Text 3</th>
            <td>
                
                <label>Name of Customer</label><br/>
                <input type="text" name="name_of_customer_3" value="<?php echo esc_attr( get_option('name_of_customer_3') ); ?>" />
                <br/><br/>
                
                <label>Designation</label><br/>
                <input type="text" name="designation_3" value="<?php echo esc_attr( get_option('designation_3') ); ?>" />
                <br/><br/>

                <label>Picture</label><br/>
                <input type="text" name="picture_3" value="<?php echo esc_attr( get_option('picture_3') ); ?>" />
                <br/><br/>
                
                <label>Testimonial Text</label><br/>
                <textarea name="testimonial_text_3"><?php echo esc_attr( get_option('testimonial_text_3') ); ?></textarea>
                
            </td>
        </tr>

        <tr class="row">
        <th class="col">Testimonial Text 4</th>
            <td>
                
                <label>Name of Customer</label><br/>
                <input type="text" name="name_of_customer_4" value="<?php echo esc_attr( get_option('name_of_customer_4') ); ?>" />
                <br/><br/>
                
                <label>Designation</label><br/>
                <input type="text" name="designation_4" value="<?php echo esc_attr( get_option('designation_4') ); ?>" />
                <br/><br/>

                <label>Picture</label><br/>
                <input type="text" name="picture_4" value="<?php echo esc_attr( get_option('picture_4') ); ?>" />
                <br/><br/>
                
                <label>Testimonial Text</label><br/>
                <textarea name="testimonial_text_4"><?php echo esc_attr( get_option('testimonial_text_4') ); ?></textarea>
                
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
    input[type=text], textarea {
        min-width: 50%;
    }
    
</style>
<?php 
}
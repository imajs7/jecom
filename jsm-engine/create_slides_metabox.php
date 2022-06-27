<?php

/* ----------- Show slide details meta box ---------- */
function slide_details_visibility_metabox() {
    add_meta_box( 'show_slide_details', 'Show slide details?', 'display_slide_details_meta_box', 'slide', 'side' );
}
add_action( 'admin_init', 'slide_details_visibility_metabox' );

function display_slide_details_meta_box( $slide ) {
	$is_value = esc_html( get_post_meta( $slide->ID, 'show_slide_details', true ) );
	$checked;
	if ( $is_value == "yes" ) { $checked = "checked"; } 
	else if ( $is_value == "no" ) { $checked = ""; } 
	else { $checked="";}
    ?>
    <span class="title">Show details?</span>
    <span class="content">
        <label for="details_checkbox">
            <input type="checkbox" name="details_checkbox" id="details_checkbox" value="yes" <?php echo $checked; ?> />
        </label>
    </span> 
 
    <?php
}

function update_slide_details_box( $post_id ) {
    if( !current_user_can( 'edit_post' ) ) return;
    if ( 'slide' == get_post_type() ) {
        if ( isset( $_POST['details_checkbox'] ) && $_POST['details_checkbox'] != '' ) {
            update_post_meta( $post_id, 'show_slide_details', $_POST['details_checkbox'] );
        }else {
            update_post_meta( $post_id, 'show_slide_details', "no" );
        }
    }
}
add_action( 'save_post', 'update_slide_details_box' );
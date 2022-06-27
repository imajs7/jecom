<?php

/* --------- Call to action button ---------- */

function call_to_action_metabox_mutiple_fields(){
 
    add_meta_box(
            'cta-metabox-multiple-fields',
            'Call to action button',
            'add_cta_fileds',
            'slide',
            'normal'
        );
}
 
add_action('add_meta_boxes', 'call_to_action_metabox_mutiple_fields');

function add_cta_fileds(){
 
    global $post;
 
    // Get Value of Fields From Database
    $cta_section_visibility = get_post_meta( $post->ID, '_cta_section_visibility', true);
    $cta_text_field = get_post_meta( $post->ID, '_cta_text_field', true);
    $cta_actionable_link = get_post_meta( $post->ID, '_cta_actionable_link', true);
     
?>
     
<div class="row">
    <div class="label">Show call to action panel?</div>
    <div class="fields">
        <label><input type="radio" name="_cta_section_visibility" value="yes" <?php if($cta_section_visibility == 'yes') echo 'checked'; ?> /> Yes </label>
        <label><input type="radio" name="_cta_section_visibility" value="no"  <?php if($cta_section_visibility == 'no') echo 'checked'; ?> /> No </label>
    </div>
</div>

<br/><br/>

<div class="row">
    <div class="label">Button text</div>
    <div class="fields"><input type="text" name="_cta_text_field" value="<?php echo $cta_text_field; ?>" /></div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">Button actionable link</div>
    <div class="fields"><input type="text" name="_cta_actionable_link" value="<?php echo $cta_actionable_link; ?>" /></div>
</div>
 
 
<?php    
}

function save_cta_fields_metabox(){
 
    global $post;
 
    if(isset($_POST["_cta_section_visibility"])) :
    update_post_meta($post->ID, '_cta_section_visibility', $_POST["_cta_section_visibility"]);
    endif;
 
    if(isset($_POST["_cta_text_field"])) :
    update_post_meta($post->ID, '_cta_text_field', $_POST["_cta_text_field"]);
    endif;

    if(isset($_POST["_cta_actionable_link"])) :
    update_post_meta($post->ID, '_cta_actionable_link', $_POST["_cta_actionable_link"]);
    endif;
 
}
 
add_action('save_post', 'save_cta_fields_metabox');
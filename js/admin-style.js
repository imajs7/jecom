jQuery(function() {
    
    jQuery('#login_page_banner_image').on('click', function() {

        var images = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open().on('select', function(e){
            var uploadedImages = images.state().get('selection').first();
            var selectedImages = uploadedImages.toJSON();

            jQuery("#get_login_page_banner_image").attr("src", selectedImages.url);
            jQuery("#login_page_banner_image_link").attr("value", selectedImages.url);

        });

    });

});  
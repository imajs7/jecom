<?php 

wp_enqueue_media();

add_action('admin_menu', 'promo_settings_create_menu');

function promo_settings_create_menu() {

    add_submenu_page(
        'admin-settings', 
        __( 'Promo Settings', 'promo-settings' ),
        __( 'Promo Settings', 'promo-settings' ),
        'manage_woocommerce',  
        'promo-settings',
        'promo_settings_page' 
    );

    //call register settings function
    add_action( 'admin_init', 'register_promo_settings' );

}

function register_promo_settings() {
	//register our settings

    register_setting( 'promo-settings-group', 'login_page_banner_image' );
    register_setting( 'promo-settings-group', 'login_page_banner_image_link' );
    register_setting( 'promo-settings-group', 'login_page_banner_link' );

    register_setting( 'promo-settings-group', 'modal_window_enable' );
    register_setting( 'promo-settings-group', 'modal_window_title' );
    register_setting( 'promo-settings-group', 'modal_window_content' );

    register_setting( 'promo-settings-group', 'cart_page_msg_enable' );
    register_setting( 'promo-settings-group', 'cart_page_msg_text' );

    register_setting( 'promo-settings-group', 'checkout_page_msg_enable' );
    register_setting( 'promo-settings-group', 'checkout_page_msg_text' );

    register_setting( 'promo-settings-group', 'payment_msg_enable' );
    register_setting( 'promo-settings-group', 'payment_msg_text' );

}

function promo_settings_page() {
?>
<div class="wrap">
<h1>Promo Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'promo-settings-group' ); ?>
    <?php do_settings_sections( 'promo-settings-group' ); ?>

    <h3>Login Page Banner</h3>
    <div class="banner">

        <input type="hidden" class="form-control" name="login_page_banner_image_link" 
            id="login_page_banner_image_link" 
            value="<?php echo esc_attr( get_option('login_page_banner_image_link') ); ?>" />

        <img src="<?php echo esc_attr( get_option('login_page_banner_image_link') ); ?>" id="get_login_page_banner_image" width="100" height="100" />

        <h4>Select Image (preferrably square image)</h4>
        <input type="button" id="login_page_banner_image" value="Select Image" />

        <h4>Enter action link</h4>
        <input type="text" class="form-control" name="login_page_banner_link" id="login_page_banner_link" value="<?php echo esc_attr( get_option('login_page_banner_link') ); ?>" />
    </div>

    <br />
    <hr />
    <br />

    <h3>Popup Modal Window</h3>
    <div class="modal">
        <input type="checkbox" name="modal_window_enable" value="1" <?php checked(1, get_option('modal_window_enable'), true); ?> /><label>Show on frontpage</label><br/><br/>
        
        <label>Modal Window Title</label><br/>
        <input type="text" name="modal_window_title" value="<?php echo esc_attr( get_option('modal_window_title') ); ?>" />
        <br/><br/>
        
        <label>Modal Window Content</label><br/>
        <textarea style="min-width: 50%" name="modal_window_content"><?php echo esc_attr( get_option('modal_window_content') ); ?></textarea>

    </div>


    <br />
    <hr />
    <br />

    <h3>Cart Page Message</h3>
    <div class="cart-page-message">
        <input type="checkbox" name="cart_page_msg_enable" value="1" <?php checked(1, get_option('cart_page_msg_enable'), true); ?> /><label>Enable cart page message</label><br/><br/>
        
        <label>Message Text</label><br/>
        <input type="text" name="cart_page_msg_text" value="<?php echo esc_attr( get_option('cart_page_msg_text') ); ?>" />

    </div>

    <br />
    <hr />
    <br />

    <h3>Checkout Page Message</h3>
    <div class="cart-page-message">
        <input type="checkbox" name="checkout_page_msg_enable" value="1" <?php checked(1, get_option('checkout_page_msg_enable'), true); ?> /><label>Enable cart page message</label><br/><br/>
        
        <label>Message Text</label><br/>
        <input type="text" name="checkout_page_msg_text" value="<?php echo esc_attr( get_option('checkout_page_msg_text') ); ?>" />

    </div>

    <br />
    <hr />
    <br />

    <h3>Before Payment Message</h3>
    <div class="cart-page-message">
        <input type="checkbox" name="payment_msg_enable" value="1" <?php checked(1, get_option('payment_msg_enable'), true); ?> /><label>Enable cart page message</label><br/><br/>
        
        <label>Message Text</label><br/>
        <input type="text" name="payment_msg_text" value="<?php echo esc_attr( get_option('payment_msg_text') ); ?>" />

    </div>
    
    <?php submit_button(); ?>

</form>
</div>
<style>
    form {
        border: 1px solid #777;
        padding: 20px;
    }

    @media only screen and (min-width: 600px) {
        input[type=text], textarea {
            width: 50%;
        }
    }

    @media only screen and (max-width: 600px) {
        input[type=text], textarea {
            width: 100%;
        }
    }
</style>
<?php 
}
<?php
/**
 * jcom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jcom
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jcom_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on jcom, use a find and replace
		* to change 'jcom' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'jcom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.


	
	register_nav_menus(
		array(
			'primary' => 'Primary menu',
			'secondary' => 'Secondary menu'
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'jcom_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'jcom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jcom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jcom_content_width', 640 );
}
add_action( 'after_setup_theme', 'jcom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jcom_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jcom' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jcom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'jcom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jcom_scripts() {
	wp_enqueue_style( 'jcom-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'jcom-main', get_template_directory_uri() . "/css/main.css" );
	wp_enqueue_style( 'bootstrap-icons', "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" );
	
	wp_style_add_data( 'jcom-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jcom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js', array('jquery') );
	
	wp_enqueue_script( 'jcom-script', get_template_directory_uri() . '/js/jcom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jcom_scripts' );

/**
 * Enqueue login css & scripts
 */
function jsm_login_enqueue_style() {
    wp_enqueue_style( 'jcom-main-login', get_template_directory_uri() . "/css/main.css", false ); 

	wp_register_style('Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;1,300&display=swap');
	wp_enqueue_style( 'Roboto' );

	wp_register_style('Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
	wp_enqueue_style( 'Montserrat' );

	wp_register_style('Montez', 'https://fonts.googleapis.com/css2?family=Montez&display=swap');
	wp_enqueue_style( 'Montez' );
}
 
function jsm_login_enqueue_script() {
    wp_enqueue_script( 'jcom-script-login', get_template_directory_uri() . '/js/jcom.js', false );
}
 
add_action( 'login_enqueue_scripts', 'jsm_login_enqueue_style', 10 );
add_action( 'login_enqueue_scripts', 'jsm_login_enqueue_script', 1 );

/**
 * Install custom fonts.
 */
function enqueue_custom_fonts() {

	if( ! is_admin() ){
		wp_register_style('Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;1,300&display=swap');
		wp_enqueue_style( 'Roboto' );

		wp_register_style('Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
		wp_enqueue_style( 'Montserrat' );

		wp_register_style('Montez', 'https://fonts.googleapis.com/css2?family=Montez&display=swap');
		wp_enqueue_style( 'Montez' );

	}

}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

/**
 *  require jsm custom settings
 */

 require "jsm-settings.php";

 /**
 * Changes the class on the custom logo in the header.php
 */
function add_class_to_custom_logo( $html ) {
	$html = str_replace('custom-logo-link', 'navbar-brand', $html );
	return $html;
}
add_filter('get_custom_logo', 'add_class_to_custom_logo', 10);

/**
 *  Remove the category count for WooCommerce categories
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

/** 
 * Add woocomerce theme support 
 * */
function jecom_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'jecom_add_woocommerce_support' );

/**
 * removing woocommerce styles
 */

add_filter( 'woocommerce_enqueue_styles', 'remove_woocommerce_styles' );
function remove_woocommerce_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );
	//unset( $enqueue_styles['woocommerce-layout'] );
	//unset( $enqueue_styles['woocommerce-smallscreen'] );

	return $enqueue_styles;
}

/**
 * adding woocommerce styles
 */

function enqueue_woo_style() {
	
	wp_enqueue_style( 'jecom-woo-styles', get_template_directory_uri() . "/css/woocommerce/woocommerce.css" );

	if ( class_exists('woocommerce') ) {
		wp_enqueue_style( 'jecom-woo-styles' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_woo_style' );

/** -------------------- added to cart button text change --------------------- */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'bbloomer_custom_add_cart_button_single_product', 9999 );
 
function bbloomer_custom_add_cart_button_single_product( $label ) {
   if ( WC()->cart && ! WC()->cart->is_empty() ) {
      foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
         $product = $values['data'];
         if ( get_the_ID() == $product->get_id() ) {
            $label = 'Already in Cart. Add again?';
            break;
         }
      }
   }
   return $label;
}
 
// Part 2
// Loop Pages Add to Cart
 
add_filter( 'woocommerce_product_add_to_cart_text', 'bbloomer_custom_add_cart_button_loop', 9999, 2 );
 
function bbloomer_custom_add_cart_button_loop( $label, $product ) {
   if ( $product->get_type() == 'simple' && $product->is_purchasable() && $product->is_in_stock() ) {
      if ( WC()->cart && ! WC()->cart->is_empty() ) {
         foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
            if ( get_the_ID() == $_product->get_id() ) {
               $label = 'Already in Cart. Add again?';
               break;
            }
         }
      }
   }
   return $label;
}

/** --------- order again ------------ */
add_filter( 'woocommerce_my_account_my_orders_actions', 'bbloomer_order_again_action', 9999, 2 );
    
function bbloomer_order_again_action( $actions, $order ) {
    if ( $order->has_status( 'completed' ) ) {
        $actions['order-again'] = array(
            'url' => wp_nonce_url( add_query_arg( 'order_again', $order->get_id(), wc_get_cart_url() ), 'woocommerce-order_again' ),
            'name' => __( 'Order again', 'woocommerce' ),
        );
    }
    return $actions;
}

/**
 * Remove Sale Badge on single page
 */

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

/**
 * trim lengthy product title
 */
add_filter( 'the_title', 'bbloomer_shorten_woo_product_title', 9999, 2 );
function bbloomer_shorten_woo_product_title( $title, $id ) {
   if ( get_post_type( $id ) === 'product' && strlen($title) > 27 ) {
      return substr( $title, 0, 27 ) . "..."; // last number = characters
   } else {
      return $title;
   }
}

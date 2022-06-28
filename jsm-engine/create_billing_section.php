<?php

function fetch_bills_from_jsmedia7() {
	
	$client_id = get_option( 'jsm_client_id', '0' );
	$project_id = get_option( 'jsm_project_id', '0' );
	$apiTarget = "https://jsmedia7.in/wp-json/wp/v2/invoice";
	$args = array( 
		'method' => 'GET',
		'timeout' => 10
	);
	$response = wp_remote_get( $apiTarget, $args );
	
	if( !is_wp_error( $response ) && $response['response']['code'] == 200 ) {

		$invoices = json_decode( $response['body'] ); // our posts are here

		$count = 1;
		foreach( $invoices as $invoice ) {
			if ( $invoice->acf->client_name == $client_id && $invoice->acf->project_address == $project_id ) {	
				
				$pay_btn = '&emsp;<a style="text-decoration: none" target="_blank" href="' . $invoice->link . '">Pay Now</a>';

				switch ( $invoice->acf->status ) {
				  case 1:
					$invoice_status = "<span style='color: red'>Partially Paid</span>";
					$unpaid_invoice_str = $unpaid_invoice_str . '<p>' . $count . '. Invoice Number: <a href="' . $invoice->link . '" target="_blank" style="text-decoration: none">' . $invoice->title->rendered . '</a> - Dated: ' . date( "F j, Y h:m a", strtotime( $invoice->date ) ) . ' [ ' . $invoice_status . ' ]' . $pay_btn . '</p>';
					break;
				  case 2:
					$invoice_status = "<span style='color: #999999'>Fully Paid</span>";
					$paid_invoice_str = $paid_invoice_str . '<p>' . $count . '. Invoice Number: <a href="' . $invoice->link . '" target="_blank" style="text-decoration: none">' . $invoice->title->rendered . '</a> - Dated: ' . date( "F j, Y h:m a", strtotime( $invoice->date ) ) . ' [ ' . $invoice_status . ' ]</p>';
					break;
				  default:
					$invoice_status = "<span style='color: red'>Unpaid</span>";
					$unpaid_invoice_str = $unpaid_invoice_str . '<p>' . $count . '. Invoice Number: <a href="' . $invoice->link . '" target="_blank" style="text-decoration: none">' . $invoice->title->rendered . '</a> - Dated: ' . date( "F j, Y h:m a", strtotime( $invoice->date ) ) . ' [ ' . $invoice_status . ' ]' . $pay_btn . '</p>';		
				}
				$count++;
			}
		}
		
	}
	
	if( $unpaid_invoice_str != '' || $paid_invoice_str != '' ) $html = '<div class="wrap"><h3>JSMedia7 - Invoices</h3>';
	$html = $html . $unpaid_invoice_str . $paid_invoice_str;
	if ( $unpaid_invoice_str != '' || $paid_invoice_str != '' ) $html = $html . '</div>';
	return $html;
}
add_shortcode('jsm-show-bills', 'fetch_bills_from_jsmedia7');

/* ------------------------- add jsm default dashboard page -------------------------- */
// Register a custom menu page.
function jsm_register_custom_dashboard_page(){
    add_menu_page( 
        __( 'JSM Dashboard', 'textdomain' ),
        'JSMedia7',
        'upload_files',
        'jsmedia7',
        'jsm_dashboard_page_html',
        'dashicons-info',
        3
    ); 
}
add_action( 'admin_menu', 'jsm_register_custom_dashboard_page' );
 
// Display a custom menu page
function jsm_dashboard_page_html(){
    require "jsm.php";
	echo do_shortcode( '[jsm-show-bills]' );
}

/* -- Add jsm client info submenu page under jsmedia7 parent. -- */
function jsm_register_set_client_page() {
    add_submenu_page(
        'jsmedia7',
        __( 'JSMedia7 - Web Solutions | Client Settings', 'textdomain' ),
        __( 'JSM Client', 'textdomain' ),
        'edit_jsm',
        'jsmedia7-client',
        'client_page_callback'
    );
}
add_action( 'admin_menu', 'jsm_register_set_client_page' );
// Display callback for the submenu page.
function client_page_callback() { 
	
	// Draw JSMedia7 Header
    require "jsm.php";
	
	// Draw client section
	jsm_client_page_html();
	
}

add_action('admin_init', 'jsm_client_settings_init');
function jsm_client_settings_init() {
	add_settings_section(
		'jsm-client-settings', // id of the section
		'Client Settings', // title to be displayed
		null, // callback function to be called when opening section, currently empty
		'jsmedia7-client' // page on which to display the section
	);
	
	// register the setting
	register_setting(
		'jsmedia7-client', // option group for client id
		'jsm_client_id'
	);

	register_setting(
		'jsmedia7-client', // option group for project id
		'jsm_project_id'
	);
	
	register_setting(
		'jsmedia7-client', // option group for launch date
		'jsm_client_start_date'
	);

	add_settings_field(
		'jsm-client-side-settings', // id of the settings field
		'JSmedia7 Client Side Settings', // title
		'jsm_client_settings_cb', // callback function
		'jsmedia7-client', // page on which settings display
		'jsm-client-settings' // section on which to show settings
	);
}

function jsm_client_settings_cb(){
	date_default_timezone_set('ASIA/KOLKATA');
	$client_id = esc_attr( get_option( 'jsm_client_id', '0' ) );
	$project_id = esc_attr( get_option( 'jsm_project_id', getDomain( site_url() ) ) );
	$launch_date = esc_attr( get_option( 'jsm_client_start_date', date('Y') ) );

	?>

    <label for="jsm_client_id">Client ID</label>
    <input type="text" id="jsm_client_id" name="jsm_client_id" value="<?php echo $client_id; ?>"/>

    <label for="jsm_project_id">Project ID</label>
    <input type="text" id="jsm_project_id" name="jsm_project_id" value="<?php echo $project_id; ?>"/>

    <label for="jsm_client_start_date">Launch Date</label>
    <input type="text" id="jsm_client_start_date" name="jsm_client_start_date" value="<?php echo $launch_date; ?>"/>

    <?php
	
}

function jsm_client_page_html() {
	?>
	<form method="POST" action="options.php">
    <?php
    settings_fields( 'jsmedia7-client' );
    do_settings_sections( 'jsmedia7-client' );
    submit_button();
    ?>
    </form>
	<?php
}

function getDomain($url){
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        return $regs['domain'];
    }
    return FALSE;
}
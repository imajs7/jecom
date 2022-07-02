<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jcom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'jcom' ); ?></a>

	<div class="announcement-bar py-2">

		<div class="container">

			<div class="row">

				<div class="col-md-4">

					<ul class="announcement-bar__list">
						<li>
						<i class="bi bi-telephone rounded-circle"></i>
						<a href="tel:<?php echo get_option('business_contact');?>">
							<?php echo get_option('business_contact');?>
						</a>
						</li>
						<li>
						<i class="bi bi-envelope rounded-circle"></i>
						<a href="mailto:<?php echo get_option('business_email');?>">
							<?php echo get_option('business_email');?>
						</a>
						</li>
					</ul>

				</div>

				<div class="col-md-8 d-flex justify-content-end">

					<ul class="announcement-bar__list">
						<li>
							<i class="<?php echo get_option('info_field_1_icon');?> rounded-circle"></i>
							<a href="#"><?php echo get_option('info_field_1_text');?></a>
						</li>
						<li>
							<i class="<?php echo get_option('info_field_2_icon');?> rounded-circle"></i>
							<a href="#"><?php echo get_option('info_field_2_text');?></a>
						</li>
						<li>
							<i class="<?php echo get_option('info_field_3_icon');?> rounded-circle"></i>
							<a href="#"><?php echo get_option('info_field_3_text');?></a>
						</li>
					</ul>

				</div>

			</div>

		</div>

	</div>
	
	
	<header id="masthead" class="site-header">

		<div class="container py-4">

			<div class="row align-items-center">

				<div class="col-md-3">
					<?php aws_get_search_form( true ); ?>
				</div>

				<div class="col site-header__logo d-flex justify-content-center">
					<?php 
						include "template-parts/logo-structure.php";
					?>
				</div>

				<div class="col-md-3 cart d-flex justify-content-end align-items-center">
					<a href="<?php echo wc_get_cart_url(); ?>"><i class="bi bi-bag p-2"></i></a>
					<a class="text-decoration-none" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><span class="cart-count-label"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> </span> <?php echo WC()->cart->get_cart_total(); ?></a>
				</div>

			</div>


		</div>

		<nav class="navbar navbar-dark bg-primary navbar-expand-md" role="navigation">

			<div class="container">
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             =>  2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse justify-content-md-center',
					'container_id'      => 'main-navbar',
					'menu_class'        => 'nav navbar-nav',
					'add_li_class'		=> 'px-3',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>

			</div>
		</nav>

	</header>

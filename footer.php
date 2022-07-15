<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jcom
 */

?>


<div class="bg-primary text-white py-5">

	<div class="container before-footer-menu-panel">

		<div class="row d-flex">

			<div class="col-6 col-md-3">
				<?php dynamic_sidebar( 'footer-widget-one' ); ?>
			</div>

			<div class="col-6 col-md-3">
			<?php dynamic_sidebar( 'footer-widget-two' ); ?>
			</div>

			<div class="col-6 col-md-3">
			<?php dynamic_sidebar( 'footer-widget-three' ); ?>
			</div>

			<div class="col-6 col-md-3">
			<?php dynamic_sidebar( 'footer-widget-four' ); ?>
			</div>

		</div>
		
	</div>

</div>


<footer class="site-footer py-3 my-4">

  	<div class="container justify-content-center">

		<div class="d-flex justify-content-center">
			<?php 
				//the_custom_logo(); 
				include "template-parts/logo-structure.php";
			?>
		</div>

		<div class="site-intro">
			<p><?php echo get_option('business_intro');?></p>
		</div>

		<div class="social-media">

			<ul class="social-network">
				<li><a href="<?php echo "https://facebook.com/" . get_option('business_facebook');?>" title="Facebook"><i class="bi bi-facebook"></i></a></li>
				<li><a href="<?php echo "https://instagram.com/" . get_option('business_instagram');?>" title="Instagram"><i class="bi bi-instagram"></i></a></li>
				<li><a href="<?php echo "https://wa.me/" . get_option('business_whatsapp');?>" title="WhatsApp"><i class="bi bi-whatsapp"></i></a></li>
				<li><a href="<?php echo "https://twitter.com/" . get_option('business_twitter');?>" title="Twitter"><i class="bi bi-twitter"></i></a></li>
				<li><a href="<?php echo "mailto:" . get_option('business_email');?>" title="Email"><i class="bi bi-envelope"></i></a></li>
			</ul>

		</div>

	  	<?php
			wp_nav_menu(
				array(
					'theme_location' => 'secondary',
					'menu_id'        => 'secondary-menu',
					'container'		 => false,
					'menu_class'	 => 'footer-menu',
				)
			);
		?>

		<?php
			if( get_option('tertiary_menu_enable') ) {
				wp_nav_menu(
					array(
						'theme_location' => 'tertiary',
						'menu_id'        => 'tertiary-menu',
						'container'		 => false,
						'menu_class'	 => 'footer-menu',
					)
				);
			}
		?>

    	<p class="text-center text-muted font-weight-bold"><small>&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>. Powered By <a class="text-muted text-decoration-none" href="https://jsmedia7.in" target="_blank">JSMedia7</a></small></p>
	</div>
</footer>

<button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
	<i class="bi bi-arrow-up"></i>
</button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

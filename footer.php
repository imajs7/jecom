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
				<li><a href="#" class="icoFacebook" title="Facebook"><i class="bi bi-facebook"></i></a></li>
				<li><a href="#" class="icoInstagram" title="Instagram"><i class="bi bi-instagram"></i></a></li>
				<li><a href="#" class="icoWhatsapp" title="WhatsApp"><i class="bi bi-whatsapp"></i></a></li>
				<li><a href="#" class="icoTwitter" title="Twitter"><i class="bi bi-twitter"></i></a></li>
				<li><a href="#" class="icoEmail" title="Email"><i class="bi bi-envelope"></i></a></li>
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
    	<p class="text-center text-muted">&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>. Powered By <a class="text-muted text-decoration-none" href="https://jsmedia7.in" target="_blank">JSMedia7</a></p>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

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

	<div class="container site-footer">

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


<footer class="py-3 my-4">
  	<div class="container justify-content-center">

		<div class="text-center">
			<?php the_custom_logo(); ?>
		</div>

		<div class="w-50 text-center mx-auto mt-4">
			<p><?php echo get_option('business_intro');?></p>
		</div>

		<div class="social text-center">

			<ul class="social-network social-circle">
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

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

	<footer class="site-footer">

		<div class="bg-primary text-white py-5">

			<div class="container">

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

		<div class="py-4">

			<div class="container">

				<div class="row">

					<div class="col-6">
						
						<?php dynamic_sidebar( 'footer-widget-five' ); ?>
						
					</div>

					<div class="col-6">
						
						<?php dynamic_sidebar( 'footer-widget-six' ); ?>
						
					</div>

				</div>

			</div>

		</div>

		<div class="container pb-3">

			<div class="row">

				<div class="col">
					&copy; <?php echo date('Y');?> <?php bloginfo('name'); ?>
				</div>

				<div class="col text-end">
					Developed by 
					<a class="text-decoration-none" href="https://jsmedia7.in" target="_blank">JSMedia7</a>
				</div>

			</div>

		</div>

		

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

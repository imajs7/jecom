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

	<footer id="colophon" class="site-footer">

	<div class="bg-primary text-white py-5">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-2">
					<?php dynamic_sidebar( 'footer-widget-one' ); ?>
				</div>

				<div class="col-sm-12 col-md-2">
				<?php dynamic_sidebar( 'footer-widget-two' ); ?>
				</div>

				<div class="col-sm-12 col-md-2">
				<?php dynamic_sidebar( 'footer-widget-three' ); ?>
				</div>

				<div class="col-sm-12 col-md-6 ms-auto">
				<?php dynamic_sidebar( 'footer-widget-four' ); ?>
				</div>

			</div>
			
		</div>

	</div>

	<div class="container py-3">

		<div class="row d-flex align-items-center">

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

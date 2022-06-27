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

	<footer id="colophon" class="site-footer bg-dark">

		<div class="container">

			<div class="row">

				<div class="col-md-6 d-flex justify-content-center justify-content-md-start">
					<?php echo do_shortcode( ' [copyright-text] ' ); ?>
				</div>

				<div class="col-md-6 d-flex justify-content-center justify-content-md-end">
					<?php echo do_shortcode( ' [jsm-credit] ' ); ?>
				</div>

			</div>

		</div>
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jcom
 */

get_header();
query_posts(array(
	'post_type' => 'slide'
 ));
?>

	<main id="primary" class="site-main">

		<section class="container py-4">

			<!-- Carousel -->
			<div id="carouselExampleControls" class="carousel slide overflow-hidden rounded-4" data-ride="carousel">

				<div class="carousel-inner">

				<?php
					$count = 0;
					while (have_posts() AND $count < 6) : the_post(); ?>

					<div class="carousel-item <?php if($count < 1) echo 'active'; else echo ''; $count++; ?>">
						<a href="#"><?php the_post_thumbnail( 'full', array('class' => 'd-block w-100')) ?></a>

						<?php
						$visibility = esc_html( get_post_meta( $post->ID, '_cta_section_visibility', true ) );
						if($visibility == "yes") {
							$button_text = esc_html( get_post_meta( $post->ID, '_cta_text_field', true ) );
							if($button_text == "") { $button_text = "Click me"; }
							$button_link = esc_html( get_post_meta( $post->ID, '_cta_actionable_link', true ) );
							if($button_link == "") { $button_link = "#"; }
						?>
							<div class="carousel-caption d-none d-md-block text-start glassified p-4 w-50">
								<h5><?php the_title(); ?></h5>
								<p><?php the_content(); ?></p>
								<button class="btn btn-primary" onclick="window.location.href='<?php echo $button_link; ?>'"><?php echo $button_text; ?></button>
							</div>
						<?php
						}
						?>
					</div>

					<?php endwhile;
				?>
				</div>

				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					
				</a>

				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					
				</a>

			</div>

			<!-- Carousel Ends -->

		</section>

		<!-- Dynamic Section 1 -->
		<section class="container loader-section odd-section">

			<div class="row d-flex justify-content-center">
				<h3 class="text-center pt-5"><?php echo esc_attr( get_option('section_1_title') ) ?></h3>
				<p class="w-50 pb-4 text-center"><?php echo esc_attr( get_option('section_1_description') ) ?></p>
			</div>

			<?php
				echo do_shortcode( get_option('section_1_shortcode') );
			?>

		</section>

		<!-- Dynamic Section 2 -->
		<section class="loader-section even-section bg-gray">

			<div class="container">

				<div class="row d-flex justify-content-center">
					<h3 class="text-center pt-5"><?php echo esc_attr( get_option('section_2_title') ) ?></h3>
					<p class="w-50 pb-4 text-center"><?php echo esc_attr( get_option('section_2_description') ) ?></p>
				</div>

				<?php
					echo do_shortcode( get_option('section_2_shortcode') );
				?>
			
			</div>

		</section>

		<!-- Dynamic Section 3 -->
		<section class="container loader-section odd-section">

			<div class="row d-flex justify-content-center">
				<h3 class="text-center pt-5"><?php echo esc_attr( get_option('section_3_title') ) ?></h3>
				<p class="w-50 pb-4 text-center"><?php echo esc_attr( get_option('section_3_description') ) ?></p>
			</div>

			<?php
				echo do_shortcode( get_option('section_3_shortcode') );
			?>

		</section>

		<!-- Dynamic Section 4 -->
		<section class="loader-section even-section bg-gray">

			<div class="container">

				<div class="row d-flex justify-content-center">
					<h3 class="text-center pt-5"><?php echo esc_attr( get_option('section_4_title') ) ?></h3>
					<p class="w-50 pb-4 text-center"><?php echo esc_attr( get_option('section_4_description') ) ?></p>
				</div>

				<?php
					echo do_shortcode( get_option('section_4_shortcode') );
				?>
			
			</div>

		</section>

		<!-- Dynamic Section 5 -->
		<section class="container loader-section odd-section">

			<div class="row d-flex justify-content-center">
				<h3 class="text-center pt-5"><?php echo esc_attr( get_option('section_5_title') ) ?></h3>
				<p class="w-50 pb-4 text-center"><?php echo esc_attr( get_option('section_5_description') ) ?></p>
			</div>

			<?php
				echo do_shortcode( get_option('section_5_shortcode') );
			?>

		</section>

		<!-- Dynamic Section 6 -->
		<section class="loader-section even-section bg-gray">

			<div class="container">

				<div class="row d-flex justify-content-center">
					<h3 class="text-center pt-5"><?php echo esc_attr( get_option('section_6_title') ) ?></h3>
					<p class="w-50 pb-4 text-center"><?php echo esc_attr( get_option('section_6_description') ) ?></p>
				</div>

				<?php
					echo do_shortcode( get_option('section_6_shortcode') );
				?>
			
			</div>

		</section>

	</main>

<?php

get_footer();

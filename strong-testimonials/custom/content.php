<?php
/**
 * Template Name: Custom
 * Description: Penthouse Office custom template for Strong Testimonials plugin.
 */
?>
<?php do_action( 'wpmtst_before_view' ); ?>

<div class="strong-view <?php wpmtst_container_class(); ?>"<?php wpmtst_container_data(); ?>>
	<?php do_action( 'wpmtst_view_header' ); ?>

	<div class="strong-content <?php wpmtst_content_class(); ?>">
		<?php do_action( 'wpmtst_before_content' ); ?>

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="<?php wpmtst_post_class(); ?>">

				<div class="testimonial-inner">
					<?php do_action( 'wpmtst_before_testimonial' ); ?>

					<?php wpmtst_the_title( '<h3 class="testimonial-heading">', '</h3>' ); ?>

					<div class="testimonial-content col-md-8">
						<?php wpmtst_the_content(); ?>
					</div>

					<div class="testimonial-client col-md-8">
				        <?php wpmtst_the_thumbnail(); ?>
				        <div class="testimonial-client-right">
						<?php wpmtst_the_client(); ?>
						</div>
					</div>
					<div class="clear"></div>

					<?php do_action( 'wpmtst_after_testimonial' ); ?>
				</div>

			</div>
		<?php endwhile; ?>

		<?php do_action( 'wpmtst_after_content' ); ?>
	</div>

	<?php do_action( 'wpmtst_view_footer' ); ?>
</div>

<?php do_action( 'wpmtst_after_view' ); ?>

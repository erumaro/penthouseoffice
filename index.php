<?php get_header(); ?>
	<main id="primary" class="col-md-10" role="main">
		<section id="top-section" class="row">
			<?php get_template_part( 'template-parts/content-top-section', get_post_format() ); ?>
		</section>
		<section id="about" class="row">
			<?php get_template_part( 'template-parts/content-about', get_post_format() ); ?>
		</section>
		<section id="facilities" class="row">
			<?php get_template_part( 'template-parts/content-facilities', get_post_format() ); ?>
		</section>
		<section id="packages" class="row">
			<?php get_template_part( 'template-parts/content-packages', get_post_format() ); ?>
		</section>
		<section id="testimonials" class="row">
			<?php get_template_part( 'template-parts/content-testimonials', get_post_format() ); ?>
		</section>
		<section id="location" class="row">
			<?php get_template_part( 'template-parts/content-location', get_post_format() ); ?>
		</section>
		<section id="contact" class="row">
			<?php get_template_part( 'template-parts/content-contact', get_post_format() ); ?>
		</section>
	</main>
	</div>
<?php get_footer(); ?>
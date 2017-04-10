<?php get_header(); ?>
	<main class="col-md-10 container-fluid">
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
		<section id="tenants" class="row">
			<?php get_template_part( 'template-parts/content-tenants', get_post_format() ); ?>
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
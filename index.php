<?php get_header(); ?>
	<main>
		<section id="top-section">
			<?php get_template_part( 'template-parts/content-top-section', get_post_format() ); ?>
		</section>
		<section id="about">
			<?php get_template_part( 'template-parts/content-about', get_post_format() ); ?>
		</section>
		<section id="facilities">
			<?php get_template_part( 'template-parts/content-facilities', get_post_format() ); ?>
		</section>
		<section id="packages">
			<?php get_template_part( 'template-parts/content-packages', get_post_format() ); ?>
		</section>
		<section id="tenants">
			<?php get_template_part( 'template-parts/content-tenants', get_post_format() ); ?>
		</section>
		<section id="location">
			<?php get_template_part( 'template-parts/content-location', get_post_format() ); ?>
		</section>
		<section id="contact">
			<?php get_template_part( 'template-parts/content-contact', get_post_format() ); ?>
		</section>
	</main>
<?php get_footer(); ?>
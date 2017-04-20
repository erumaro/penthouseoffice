<section id="about">
	<?php
	$query_about = new WP_Query( 'pagename=om-oss' );

	if ( $query_about->have_posts() ) {
		// The Loop
		while ( $query_about->have_posts() ) {
			$query_about->the_post();
			echo '<header class="col-md-12"><h2 class="section-title">' . get_the_title() . '</h2></header>'; ?>
			<div class="col-md-10 section-content">
			<?php echo the_content(); ?>
			</div><?php
		}

		wp_reset_postdata();
	} ?>
</section>
<section id="facilities">
	<?php
	$query_facilities_1 = new WP_Query( 'pagename=facilities' );

	if ( $query_facilities_1->have_posts() ) {
		// The Loop
		while ( $query_facilities_1->have_posts() ) {
			$query_facilities_1->the_post();
			echo '<header class="col-md-12"><h2 class="section-title">' . get_the_title() . '</h2></header>'; ?>
			<div class="col-md-12 section-content">
				<?php $query_facilities_2 = new WP_Query( 'post_type=facilities&posts_per_page=6&order=ASC' ); 
				if($query_facilities_2->have_posts()){
					while($query_facilities_2->have_posts()){
						$query_facilities_2->the_post(); ?>
						<div class="col-md-6 facilities-item" <?php if(has_post_thumbnail()): ?>style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')" <?php endif; ?>>
							<h3 class="facilities-title"><?php the_title(); ?></h3>
							<div class="facilities-content"><?php the_content(); ?></div>
						</div>
					<?php }
					wp_reset_postdata();
				}
				?>
			</div><?php
		}
		
		wp_reset_postdata();
	} ?>
</section>
<section id="packages">
	<?php $query_packages_page = new WP_Query( 'pagename=paket' );
	if ( $query_packages_page->have_posts() ) {
		// The Loop
		while ( $query_packages_page->have_posts() ) {
			$query_packages_page->the_post(); ?>
	<header class="col-md-12"><h2 class="section-title"><?php the_title(); ?></h2></header>
	<div class="col-md-10 section-content">
		<?php the_content(); ?>
		<div class="row">
			<div class="col-md-3 services-title">
				<div></div>
				<div><p class="strong">Bredband / Internet</p></div>
				<div><p class="strong">Konferensrum</p></div>
				<div><p class="strong">Kök</p></div>
				<div><p class="strong">Fri uteparkering</p></div>
				<div><p class="strong">Vilorum</p></div>
				<div><p>Kontorsmöbler</p></div>
				<div><p>Postutdelning</p></div>
				<div><p>Användning av kopiator</p></div>
				<div><p>Garageplats</p></div>
				<div><p>Solarier</p></div>
				<div><p>Gym</p></div>
			</div>
		<?php $query_packages = new WP_Query( 'post_type=packages&posts_per_page=3' ); 
		if($query_packages->have_posts()){
			while($query_packages->have_posts()){
				$query_packages->the_post(); ?>
			<div class="col-md-3 content-<?php echo 'derp' ?>">
				<div><h3><?php the_title(); ?></h3></div>
				<?php the_content(); ?>
				<?php $package_values = array(
					'bredband-internet', 
					'konferensrum',
					'kok',
					'fri-uteparkering',
					'vilorum',
					'kontorsmobler',
					'postutdelning',
					'anvandning-av-kopiator',
					'garageplats',
					'solarier',
					'gym'
				);
				foreach($package_values as $package_value){
				?>
				<?php if( get_field($package_value) == 'Markerat' ){ ?>
				<div><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>
				<?php } else{ ?>
				<div><p>Tillval</p></div>
				<?php } ?>
			<?php } ?>
				<div><p><?php the_field('pris'); ?>kr</p></div>
				<div><button id="packageBtn">Intresseanmälan</button></div>
			</div>
			<?php } ?>
			<?php wp_reset_postdata();
		}
		?>
	</div>
<?php
		}

		wp_reset_postdata();
	} ?>
	</div>
</section>
<section id="testimonials" class="row">
	<?php
	$query_testimonials_1 = new WP_Query( 'pagename=rekommendationer' );

	if ( $query_testimonials_1->have_posts() ) {
		// The Loop
		while ( $query_testimonials_1->have_posts() ) {
			$query_testimonials_1->the_post();
			echo '<header class="col-md-12"><h2 class="section-title">' . get_the_title() . '</h2></header>'; ?>
			<div class="col-md-12 section-content">
				<?php the_content(); ?>
				<div>
				<?php $query_testimonials_2 = new WP_Query( 'post_type=testimonials' ); 
				if($query_testimonials_2->have_posts()){
					while($query_testimonials_2->have_posts()){
						$query_testimonials_2->the_post(); ?>
						<blockquote>
							<?php the_field('citat'); ?>
							<footer><cite><?php the_field('forfattare') ?>, <?php the_field('foretag') ?></cite></footer>
						</blockquote>
					<?php }
					wp_reset_postdata();
				}
				?>
				</div>
			</div><?php
		}
		
		wp_reset_postdata();
	} ?>
</section>
<section id="location" class="row">

</section>
<section id="contact" class="row">

</section>
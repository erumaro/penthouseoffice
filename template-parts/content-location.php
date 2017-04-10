<?php
$query5 = new WP_Query( 'pagename=plats' );

if ( $query5->have_posts() ) {
	// The Loop
	while ( $query5->have_posts() ) {
		$query5->the_post();
		echo '<header class="col-md-12"><h2 class="section-title">' . get_the_title() . '</h2></header>'; ?>
		<div class="col-md-10 section-content">
		<?php echo the_content(); ?>
		</div><?php
	}
	
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset with 
	 * wp_reset_query(). We just need to set the post data back up with
	 * wp_reset_postdata().
	 */
	wp_reset_postdata();
}
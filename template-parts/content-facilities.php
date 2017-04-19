<header class="col-md-12"><h2 class="section-title">Faciliteter</h2></header>
<div class="col-md-10 section-content">
<?php 
$args2 = array(
		'post_type' => array( 'facilities' ),
);
$query_facilities = new WP_Query( $args2 );
if( $query_facilities->have_posts() ){
    // The Loop
    while ( $query_facilities->have_posts() ){ 
	$query_facilities->the_post();
	?>
	<h3><?php the_title(); ?></h3>
    <?php }
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset with 
	 * wp_reset_query(). We just need to set the post data back up with
	 * wp_reset_postdata().
	 */
	wp_reset_postdata();
} ?>
</div>
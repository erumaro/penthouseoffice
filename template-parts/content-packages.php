<header class="col-md-12"><h2 class="section-title">Packages</h2></header>
<div class="col-md-10 section-content">
<?php $args3 = array('post_type' => 'Packages');
$query3 = new WP_Query( $args3 );
if( $query3->have_posts() ){
    // The Loop
    while ( $query3->the_post() ){ ?>
        <article id="item-<?php the_ID(); ?>">
			<?php echo '<header class="col-md-12"><h2 class="section-title">' . get_the_title() . '</h2></header>'; ?>
            <div class="entry-content">
                <?php the_field(); ?>
            </div>
        </article>
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
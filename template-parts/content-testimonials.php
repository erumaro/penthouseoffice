<header class="col-md-12"><h2 class="section-title">Rekommendation</h2></header>
<div class="col-md-10 section-content">
<?php $query4 = new WP_Query( 'post_type=testimonials' );
if( $query4->have_posts() ){
    // The Loop
    while ( $query4->the_post() ){ ?>
        <article id="item-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            if ( has_post_thumbnail()) : the_post_thumbnail('large');
            else : echo '<div class="dummy-image"><i class="fa fa-picture-o" aria-hidden="true"></i></div>';
            endif;
            ?>
            <header class="entry-header">
                <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
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
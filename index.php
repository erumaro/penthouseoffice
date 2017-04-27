<?php get_header(); ?>
            <main id="primary" class="col-md-10" role="main">
            <?php if( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content-front', get_post_format() ); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            </main>
        </div>
<?php get_footer(); ?>
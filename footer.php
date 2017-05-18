        <footer class="site-footer row">
			<div class="col-md-12 col-lg-12">
            <p class="pull-left">Copyright © 2017 PhS.se. Alla rättigheter förbehållna.</p>
			<div class="pull-right">
				<a class="back-to-top" href="#top-content">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/icon-top.png" alt="Överst på sidan" />
				</a>
				<div class="share">
					<a class="share share-toggle" href="#">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/share.png" alt="Dela sidan" />
					</a>
					<ul class="share-links">
						<li>
							<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(home_url('/')); ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/facebook.png" alt="Facebook" width="24" height="24">
							</a>
						</li>
						<li>
							<a href="http://twitter.com/share?url=<?php echo esc_url(home_url('/')); ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/twitter.png" alt="Twitter" width="24" height="24">
							</a>
						</li>
						<li>
							<a href="https://plus.google.com/share?url=<?php echo esc_url(home_url('/')); ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/google.png" alt="Google+" width="24" height="24">
							</a>
						</li>
						<li>
							<a href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url(home_url('/')); ?>" target="_blank">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/images/linkedin.png" alt="LinkedIn" width="24" height="24">
							</a>
						</li>
					</ul>
				</div>
			</div>
			</div>
        </footer>
	<?php wp_footer(); ?>
</body>
</html>
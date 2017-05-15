<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
            <aside id="secondary">
				<nav id="primary-navigation" class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm col-md-2">
				  <div class="navmenu-brand hidden-xs hidden-sm">
					<?php
						penthouseoffice_the_custom_logo();
						if (is_front_page() && is_home()): ?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
						<?php endif;
						$description = get_bloginfo( 'description', 'display' );
						if ($description || is_customize_preview()): ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif;
					?>
					</div>
                    <?php wp_nav_menu(array('theme_location' => 'primary', 
											'menu_id' => 'primary-menu',
											'menu_class' => 'nav navmenu-nav',
											'container' => false)); ?>
				</nav>
				<div class="navbar navbar-default navbar-fixed-top visible-sm visible-xs col-md-12">
				  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#primary-navigation" data-canvas="body">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<p class="site-title"><a class="navmenu-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				</div>
            </aside>
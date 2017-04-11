<?php
// Register Theme Features
if ( ! function_exists( 'penthouseoffice_setup' ) ) :
function penthouseoffice_setup()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'quote' ) );

	// Add theme support for Featured Images
	//add_theme_support( 'post-thumbnails', array( 'post', 'facilities' ) );
    add_theme_support( 'post-thumbnails', array( 'post' ) );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	));
  
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'eruma-yon' ),
	) );
    
    show_admin_bar(false);
}
endif;
add_action( 'after_setup_theme', 'penthouseoffice_setup' );

if(!function_exists('penthouseoffice_the_custom_logo')):
function penthouseoffice_the_custom_logo(){
	if (function_exists('the_custom_logo')){
		the_custom_logo();
	}
}
endif;

function penthouseoffice_scripts() {
    // Fonts
    wp_enqueue_style('roboto-font', 'http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic');

    // CSS
    wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css');
    wp_enqueue_style('penthouseoffice-style', get_stylesheet_uri());

    // JavaScript
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', '', '', true);
    wp_enqueue_script('penthouseoffice-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);

    /* Creates a global js var that can be used to call url dynamically.
    For example: 
    Old static way of getting url: 
    var image = "http://moderntkontorshotell.se/wp-content/themes/modernkontorshotell/images/map-pointer.png";
    New way: 
    var image = directory_uri.stylesheet_directory_uri+"/images/map-pointer.png";
    */
    $wnm_custom = array('stylesheet_directory_uri' => get_stylesheet_directory_uri());
    wp_localize_script('penthouseoffice-custom', 'directory_uri', $wnm_custom);
}
add_action('wp_enqueue_scripts', 'penthouseoffice_scripts');

// Custom post types for Penthouse Office: Facilities/Faciliteter & Omdöme/Testimonial

// Register Testimonial Post Type
function testimonial_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'penthouseoffice' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'penthouseoffice' ),
		'menu_name'             => __( 'Testimonials', 'penthouseoffice' ),
		'name_admin_bar'        => __( 'Testimonial', 'penthouseoffice' ),
		'archives'              => __( 'Item Archives', 'penthouseoffice' ),
		'attributes'            => __( 'Item Attributes', 'penthouseoffice' ),
		'parent_item_colon'     => __( 'Parent Item:', 'penthouseoffice' ),
		'all_items'             => __( 'All Items', 'penthouseoffice' ),
		'add_new_item'          => __( 'Add New Item', 'penthouseoffice' ),
		'add_new'               => __( 'Add New', 'penthouseoffice' ),
		'new_item'              => __( 'New Item', 'penthouseoffice' ),
		'edit_item'             => __( 'Edit Item', 'penthouseoffice' ),
		'update_item'           => __( 'Update Item', 'penthouseoffice' ),
		'view_item'             => __( 'View Item', 'penthouseoffice' ),
		'view_items'            => __( 'View Items', 'penthouseoffice' ),
		'search_items'          => __( 'Search Item', 'penthouseoffice' ),
		'not_found'             => __( 'Not found', 'penthouseoffice' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'penthouseoffice' ),
		'featured_image'        => __( 'Featured Image', 'penthouseoffice' ),
		'set_featured_image'    => __( 'Set featured image', 'penthouseoffice' ),
		'remove_featured_image' => __( 'Remove featured image', 'penthouseoffice' ),
		'use_featured_image'    => __( 'Use as featured image', 'penthouseoffice' ),
		'insert_into_item'      => __( 'Insert into item', 'penthouseoffice' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'penthouseoffice' ),
		'items_list'            => __( 'Items list', 'penthouseoffice' ),
		'items_list_navigation' => __( 'Items list navigation', 'penthouseoffice' ),
		'filter_items_list'     => __( 'Filter items list', 'penthouseoffice' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'penthouseoffice' ),
		'description'           => __( 'Testimonial information page.', 'penthouseoffice' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'testimonial_post_type', 0 );

// Register Custom Post Type
function facilities_post_type() {

	$labels = array(
		'name'                  => _x( 'Facilities', 'Post Type General Name', 'penthouseoffice' ),
		'singular_name'         => _x( 'Facility', 'Post Type Singular Name', 'penthouseoffice' ),
		'menu_name'             => __( 'Facilities', 'penthouseoffice' ),
		'name_admin_bar'        => __( 'Facility', 'penthouseoffice' ),
		'archives'              => __( 'Item Archives', 'penthouseoffice' ),
		'attributes'            => __( 'Item Attributes', 'penthouseoffice' ),
		'parent_item_colon'     => __( 'Parent Item:', 'penthouseoffice' ),
		'all_items'             => __( 'All Items', 'penthouseoffice' ),
		'add_new_item'          => __( 'Add New Item', 'penthouseoffice' ),
		'add_new'               => __( 'Add New', 'penthouseoffice' ),
		'new_item'              => __( 'New Item', 'penthouseoffice' ),
		'edit_item'             => __( 'Edit Item', 'penthouseoffice' ),
		'update_item'           => __( 'Update Item', 'penthouseoffice' ),
		'view_item'             => __( 'View Item', 'penthouseoffice' ),
		'view_items'            => __( 'View Items', 'penthouseoffice' ),
		'search_items'          => __( 'Search Item', 'penthouseoffice' ),
		'not_found'             => __( 'Not found', 'penthouseoffice' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'penthouseoffice' ),
		'featured_image'        => __( 'Featured Image', 'penthouseoffice' ),
		'set_featured_image'    => __( 'Set featured image', 'penthouseoffice' ),
		'remove_featured_image' => __( 'Remove featured image', 'penthouseoffice' ),
		'use_featured_image'    => __( 'Use as featured image', 'penthouseoffice' ),
		'insert_into_item'      => __( 'Insert into item', 'penthouseoffice' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'penthouseoffice' ),
		'items_list'            => __( 'Items list', 'penthouseoffice' ),
		'items_list_navigation' => __( 'Items list navigation', 'penthouseoffice' ),
		'filter_items_list'     => __( 'Filter items list', 'penthouseoffice' ),
	);
	$args = array(
		'label'                 => __( 'Facility', 'penthouseoffice' ),
		'description'           => __( 'Our selection of facilities on site', 'penthouseoffice' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'facilities', $args );

}
add_action( 'init', 'facilities_post_type', 0 );
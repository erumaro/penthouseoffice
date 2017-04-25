<?php
// Register Theme Features
if ( ! function_exists( 'penthouseoffice_setup' ) ) :
function penthouseoffice_setup()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'quote' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'post', 'facilities', 'page' ) );
    //add_theme_support( 'post-thumbnails', array( 'post' ) );

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
	wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '', true);
    wp_enqueue_script('penthouseoffice-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true);

    /* Creates a global js var that can be used to call url dynamically.
    For example: 
    Old static way of getting url: 
    var image = "http://moderntkontorshotell.se/wp-content/themes/modernkontorshotell/images/map-pointer.png";
    New way: 
    var image = directory_uri.stylesheet_directory_uri+"/images/map-pointer.png";
    */
    $wnm_custom = array( 'iconURL' => get_field('google_map_marker_icon', 78) );
    wp_localize_script('penthouseoffice-custom', 'wpglobals', $wnm_custom);
}
add_action('wp_enqueue_scripts', 'penthouseoffice_scripts');

// Custom post types for Penthouse Office: Facilities/Faciliteter & Omdöme/Testimonial

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

// Register Custom Post Type
function packages_post_type() {

	$labels = array(
		'name'                  => _x( 'Packages', 'Post Type General Name', 'penthouseoffice' ),
		'singular_name'         => _x( 'Package', 'Post Type Singular Name', 'penthouseoffice' ),
		'menu_name'             => __( 'Packages', 'penthouseoffice' ),
		'name_admin_bar'        => __( 'Package', 'penthouseoffice' ),
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
		'label'                 => __( 'Package', 'penthouseoffice' ),
		'description'           => __( 'The packages available for phS customers', 'penthouseoffice' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes', ),
		'taxonomies'            => array( 'Price Types' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'packages', $args );

}
add_action( 'init', 'packages_post_type', 0 );

// Register Custom Taxonomy
function price_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Price Types', 'Taxonomy General Name', 'penthouseoffice' ),
		'singular_name'              => _x( 'Price Type', 'Taxonomy Singular Name', 'penthouseoffice' ),
		'menu_name'                  => __( 'Price Type', 'penthouseoffice' ),
		'all_items'                  => __( 'All Items', 'penthouseoffice' ),
		'parent_item'                => __( 'Parent Item', 'penthouseoffice' ),
		'parent_item_colon'          => __( 'Parent Item:', 'penthouseoffice' ),
		'new_item_name'              => __( 'New Item Name', 'penthouseoffice' ),
		'add_new_item'               => __( 'Add New Item', 'penthouseoffice' ),
		'edit_item'                  => __( 'Edit Item', 'penthouseoffice' ),
		'update_item'                => __( 'Update Item', 'penthouseoffice' ),
		'view_item'                  => __( 'View Item', 'penthouseoffice' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'penthouseoffice' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'penthouseoffice' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'penthouseoffice' ),
		'popular_items'              => __( 'Popular Items', 'penthouseoffice' ),
		'search_items'               => __( 'Search Items', 'penthouseoffice' ),
		'not_found'                  => __( 'Not Found', 'penthouseoffice' ),
		'no_terms'                   => __( 'No items', 'penthouseoffice' ),
		'items_list'                 => __( 'Items list', 'penthouseoffice' ),
		'items_list_navigation'      => __( 'Items list navigation', 'penthouseoffice' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'pricetype', array( 'packages' ), $args );

}
add_action( 'init', 'price_taxonomy', 0 );

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDxVfG6KlNRw9v30e8JGzckyno21BvgVV4';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
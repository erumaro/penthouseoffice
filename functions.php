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
  
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'eruma-yon' ),
	) );
}
endif;
add_action( 'after_setup_theme', 'penthouseoffice_setup' );

function penthouseoffice_scripts() {
    // Fonts
    wp_enqueue_style('roboto-font', 'http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic');

    // CSS
    wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css');
    wp_enqueue_style('penthouseoffice-style', get_stylesheet_uri());

    // JavaScript
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/javascript/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', '', '', true);
    wp_enqueue_script('penthouseoffice-custom', get_template_directory_uri() . '/javascript/custom.js', '', '', true);

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
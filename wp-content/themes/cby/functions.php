<?php

//add dynamic menu
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'primary_menu' => 'Primary Menu' ,
			'secondary_menu' => 'Secondary Menu' ,
			'footer_menu' => 'Footer Menu' ,
		)
	);
}

//Step 3 :  Add this function to functions.php file to apply .mdl-navigation__link to each a element

function add_menuclass($ulclass) {
return preg_replace('/<a/', '<a class="nav-link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');


//Add support for featured images
add_theme_support( 'post-thumbnails' );


// Excerpt Length
function custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Register our sidebars and widgetized areas. //
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar 1',
		'id'            => 'sidebar1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer2',
		'before_widget' => '<p class="footer-paragraph">',
		'after_widget'  => '</p>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Disclamer',
		'id'            => 'disclamer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Enqueue HEADER scripts and styles.
 */
 function header_scripts() {
	 // WP Core Stylesheet.
	 wp_enqueue_style( 'wpcore_style-css', get_theme_file_uri( 'style.css', array(), '1.0'  ) );
	 // bootstrap Stylesheets.
	 wp_enqueue_style( 'bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css' );
	 // wp_enqueue_style( 'bootstrap_theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css' );
	 // Swiper Carousel Plugin
	 // wp_enqueue_style( 'swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.min.css' );
	 // WP Theme CSS
	 wp_enqueue_style( 'custom-css', get_theme_file_uri( 'custom.css', array(), '1.0'  ) );
}
add_action( 'wp_enqueue_scripts', 'header_scripts' );

/**
 * Enqueue FOOTER scripts
 */
function footer_scripts() {
	//deregister default WP JQuery
	// wp_deregister_script('jquery');
	// JQuery JS
	wp_enqueue_script( 'javascript-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
	// JQuery UI JS
	wp_enqueue_script( 'javascript-js', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
	// bootstrap JS
	wp_enqueue_script( 'bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.js');
	// Swiper JS
	wp_enqueue_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/js/swiper.min.js');
	// Font Awesome
	// wp_enqueue_script( 'fa-js', 'https://use.fontawesome.com/1b797d079d.js');
	// Font Awesome
	wp_enqueue_script( 'animatecss-js', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');
	// Font Awesome
	wp_enqueue_script( 'fonts-js', 'https://fonts.googleapis.com/css?family=Lato:300,400,700');
}
add_action( 'get_footer', 'footer_scripts' );

/**
* ACF Options
*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
* Gravity Forms
*/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


?>

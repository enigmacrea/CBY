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

//Add support for featured images
add_theme_support( 'post-thumbnails' );


// Excerpt Length
function custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Register CPT's
// Register Custom Post Type
function custom_post_type_1() {

	$labels = array(
		'name'                  => _x( 'Custom Posts', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Custom Post', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Custom Posts', 'text_domain' ),
		'name_admin_bar'        => __( 'Custom Post', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => false,
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'custom_post', $args );

}

//Initiate Custom Post Types
add_action( 'init', 'custom_post_type_1', 0 );

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

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Enqueue HEADER scripts and styles.
 */
 function header_scripts() {
	 // WP Core Stylesheet.
	 wp_enqueue_style( 'wpcore_style-css', get_theme_file_uri( 'style.css', array(), '1.0'  ) );
	 // bootstrap Stylesheets.
	 wp_enqueue_style( 'bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css' );
	 // wp_enqueue_style( 'bootstrap_theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css' );
	 // Swiper Carousel Plugin
	 wp_enqueue_style( 'swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.min.css' );
	 // WP Theme Sass.
	 wp_enqueue_style( 'custom-css', get_theme_file_uri( '/css/style.min.css', array(), '1.0'  ) );
}
add_action( 'wp_enqueue_scripts', 'header_scripts' );

/**
 * Enqueue FOOTER scripts
 */
function footer_scripts() {
	//deregister default WP JQuery
	wp_deregister_script('jquery');
	// JQuery JS
	wp_enqueue_script( 'javascript-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
	// JQuery UI JS
	wp_enqueue_script( 'javascript-js', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
	// bootstrap JS
	wp_enqueue_script( 'bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.js');
	// Swiper JS
	wp_enqueue_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/js/swiper.min.js');
	// Font Awesome
	wp_enqueue_script( 'fa-js', 'https://use.fontawesome.com/1b797d079d.js');
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

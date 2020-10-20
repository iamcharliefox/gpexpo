<?php


// THEME SUPPORT
function gpx_theme_support(){
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support( 'custom-logo', array(
        'height'      => 85,
        'width'       => 175,
        'flex-height' => true,
    ) );
}
add_action('after_setup_theme','gpx_theme_support');

// define menus and locations
function gpx_menus(){
    $locations = array(
        'primary' => "Top Navigation",
        'footer' => "Footer Navigation"
    );
    register_nav_menus($locations);
}
add_action('init','gpx_menus');

add_image_size( 'Featured Advertiser Banner', 300, 150 );


// register and enqueue styles
function gpx_register_styles(){
    $version = wp_get_theme()->get( 'Version');
    wp_enqueue_style('gpx-tabsx', get_template_directory_uri() . "/assets/css/tabs.css", array(), $version, 'all');
    wp_enqueue_style('gpx', get_template_directory_uri() . "/style.css", array('slick-theme'), $version, 'all');
    wp_enqueue_style('slick', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css", array(), '1.8.1', 'all');
    wp_enqueue_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css", array(), '5.15.1', 'all');
    wp_enqueue_style('slick-theme', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css", array('slick'), '1.8.1', 'all');
}
add_action( 'wp_enqueue_scripts', 'gpx_register_styles');

// register and enqueue scripts
function gpx_register_scripts() {
    wp_enqueue_script('gpx-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);    
    wp_enqueue_script('gpx-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('gpx-jquery'), '1.8.1', true);
     wp_enqueue_script('gpx-tabs', get_template_directory_uri() . '/assets/js/tabs.js',array('gpx-jquery'),'1.0', true);
    wp_enqueue_script('gpx-custom', get_template_directory_uri() . '/assets/js/scripts.js',array('gpx-jquery'),'1.0', true);
}   
add_action( 'wp_enqueue_scripts', 'gpx_register_scripts' );



// EVENT post type
function create_posttype_event() {
 
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'hierarchical' => true,
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'event'),
            'show_in_rest' => true,
            'supports'      => array( 'title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-calendar-alt',
 
        )
    );
}
add_action( 'init', 'create_posttype_event' );

// TESTIMONIAL post type
function create_posttype_testimony() {
 
    register_post_type( 'testimony',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimony'),
            'show_in_rest' => true,
            'supports'      => array( 'title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-businessperson',
        )
    );
}
add_action( 'init', 'create_posttype_testimony' );


// TYPE taxonomy for testimonials
add_action( 'init', 'create_type_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function create_type_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Type' ),
  ); 	
 
  register_taxonomy('types',array('testimony'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}


// TRAINING post type
function create_posttype_training() {
 
    register_post_type( 'training',
        array(
            'labels' => array(
                'name' => __( 'Training' ),
                'singular_name' => __( 'Training' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'training'),
            'show_in_rest' => true,
            'supports'      => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon' => 'dashicons-welcome-learn-more',
        )
    );
}
add_action( 'init', 'create_posttype_training' );



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'options-acf',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Help',
		'menu_title'	=> 'Help',
		'menu_slug' 	=> 'options-help',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));    
}

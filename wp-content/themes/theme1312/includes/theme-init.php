<?php

add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):

function my_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 150, true ); // Normal post thumbnails
		add_image_size( 'post-thumbnail-xl', 692, 300, true ); // Portfolio Extra Large Thumbnail
		add_image_size( 'slider-post-thumbnail', 940, 596, true ); // Slider Thumbnail
		add_image_size( 'portfolio-post-thumbnail', 290, 150, true ); // Portfolio Thumbnail
		add_image_size( 'portfolio-post-thumbnail-small', 200, 120, true ); // Portfolio Small Thumbnail
		add_image_size( 'portfolio-post-thumbnail-large', 440, 240, true ); // Portfolio Large Thumbnail
		add_image_size( 'portfolio-post-thumbnail-xl', 600, 300, true ); // Portfolio Extra Large Thumbnail
		add_image_size( 'small-post-thumbnail', 100, 100, true ); // Small Thumbnail
		add_image_size( 'testi-thumbnail', 120, 120, true ); // Testimonial Thumbnail
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu',
	  		  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}
}
endif;


/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
                array( 
				'label' => __('Slides'), 
				'singular_label' => __('Slide', 'theme1312'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array(
					'slug' => 'slide-view',
					'with_front' => FALSE,
				),
				'query_var' => "slide", // This goes to the WP_Query schema
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_slides.png',
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_slider');



/* Portfolio */
function my_post_type_portfolio() {
	register_post_type( 'portfolio',
                array( 
				'label' => __('Portfolio'), 
				'singular_label' => __('Porfolio Item', 'theme1312'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite' => array(
					'slug' => 'portfolio-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						'comments')
					) 
				);
	register_taxonomy('portfoliocat', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_portfolio');



/* Testimonial */
function my_post_type_testi() {
	register_post_type( 'testi',
                array( 
				'label' => __('Testimonial'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'testimonial-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'thumbnail',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_testi');



/* Mini slogans */
function my_post_type_slogan() {
	register_post_type( 'slogan',
                array( 
				'label' => __('Slogans'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'slogan-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_slogan');



/* FAQs */
function phi_post_type_faq() {
	register_post_type('faq', 
				array(
				'label' => __('FAQs posts'),
				'singular_label' => __('FAQ'),
				'public' => false,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "faq"), // Permalinks
				'query_var' => "faq", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor' ,'excerpt'/*,'custom-fields'*/),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));

	register_taxonomy("faq_categories", 
				array("faq"), 
				array("hierarchical" => true, 
						"label" => "FAQ Categories", 
						"singular_label" => "FAQ Category",
						"rewrite" => true,
						"show_ui" => true,
						"public" => false));
}
add_action('init', 'phi_post_type_faq');


/* Clients */
function my_post_type_clients() {
	register_post_type( 'clients',
                array( 
				'label' => __('Clients'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'clients-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'thumbnail',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_clients');

/* Services */
function my_post_type_services() {
	register_post_type( 'services',
                array( 
				'label' => __('Services'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'services-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'thumbnail',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_services');


/* Our Team */
function my_post_type_team() {
	register_post_type( 'team',
                array( 
				'label' => __('Our Team'), 
				'singular_label' => __('Person', 'theme1312'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'team-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
						'excerpt',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_team');



?>
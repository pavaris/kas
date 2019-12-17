<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package theme-name
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */





function theme_name_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'theme_name_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function theme_name_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'theme_name_pingback_header' );


include get_template_directory() . '/components/post-block.php';



function add_posttype() {
	$thisName = 'Video';
	$labels = array(
		'name' => _x($thisName . 's', 'post type general name'),
		'singular_name' => _x($thisName, 'post type singular name'),
		'add_new' => _x('Add New', $thisName),
		'add_new_item' => __('Add New ' . $thisName),
		'edit_item' => __('Edit ' . $thisName),
		'new_item' => __('New ' . $thisName),
		'view_item' => __('View ' . $thisName),
		'search_items' => __('Search ' . $thisName),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => '',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => TRUE,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'has_archive' => true,
		'taxonomies' => array('category'),
		'menu_icon' => 'dashicons-format-video',
		'show_in_rest' => true,

		);

	register_post_type( 'video' , $args );

	$thisName = 'Pocast';
	$labels = array(
		'name' => _x($thisName . 's', 'post type general name'),
		'singular_name' => _x($thisName, 'post type singular name'),
		'add_new' => _x('Add New', $thisName),
		'add_new_item' => __('Add New ' . $thisName),
		'edit_item' => __('Edit ' . $thisName),
		'new_item' => __('New ' . $thisName),
		'view_item' => __('View ' . $thisName),
		'search_items' => __('Search ' . $thisName),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => '',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => TRUE,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'has_archive' => true,
		'taxonomies' => array('category'),
		'menu_icon' => 'dashicons-admin-users',
		'show_in_rest' => true,

		);

	register_post_type( 'podcast' , $args );



	$thisName = 'Event';
	$labels = array(
		'name' => _x($thisName . 's', 'post type general name'),
		'singular_name' => _x($thisName, 'post type singular name'),
		'add_new' => _x('Add New', $thisName),
		'add_new_item' => __('Add New ' . $thisName),
		'edit_item' => __('Edit ' . $thisName),
		'new_item' => __('New ' . $thisName),
		'view_item' => __('View ' . $thisName),
		'search_items' => __('Search ' . $thisName),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => '',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => TRUE,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'has_archive' => true,
		'taxonomies' => array('category'),
		'menu_icon' => 'dashicons-calendar-alt',
		'show_in_rest' => true,
		);

	register_post_type( 'event' , $args );

	flush_rewrite_rules();

}
add_action('init', 'add_posttype');




function create_topics_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Podcast Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Podcast Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Podcast Type' ),
    'all_items' => __( 'All Podcast Types' ),
    'parent_item' => __( 'Parent Podcast Type' ),
    'parent_item_colon' => __( 'Parent Podcast Type:' ),
    'edit_item' => __( 'Edit Podcast Type' ),
    'update_item' => __( 'Update Podcast Type' ),
    'add_new_item' => __( 'Add New Podcast Type' ),
    'new_item_name' => __( 'New Podcast Type' ),
    'menu_name' => __( 'Podcast Types' ),
  );

// Now register the taxonomy

  register_taxonomy('Podcast',array('podcast'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'podcast-type' ),
  ));


  $labels = array(
    'name' => _x( 'Video Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Video Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Video Type' ),
    'all_items' => __( 'All Video Types' ),
    'parent_item' => __( 'Parent Video Type' ),
    'parent_item_colon' => __( 'Parent Podcast Type:' ),
    'edit_item' => __( 'Edit Video Type' ),
    'update_item' => __( 'Update Video Type' ),
    'add_new_item' => __( 'Add New Video Type' ),
    'new_item_name' => __( 'New Video Type' ),
    'menu_name' => __( 'Video Types' ),
  );

// Now register the taxonomy

  register_taxonomy('Video',array('video'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'video-type' ),
  ));

  $labels = array(
    'name' => _x( 'Event Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Event Type' ),
    'all_items' => __( 'All Event Event' ),
    'parent_item' => __( 'Parent Event Type' ),
    'parent_item_colon' => __( 'Parent Event Type:' ),
    'edit_item' => __( 'Edit Event Type' ),
    'update_item' => __( 'Update Event Type' ),
    'add_new_item' => __( 'Add New Event Type' ),
    'new_item_name' => __( 'New Event Type' ),
    'menu_name' => __( 'Event Types' ),
  );

// Now register the taxonomy

  register_taxonomy('Event',array('event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'event-type' ),
  ));

}
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

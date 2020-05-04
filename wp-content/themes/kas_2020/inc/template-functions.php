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
		'taxonomies' => array('category', 'post_tag'),
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
		'taxonomies' => array('category', 'post_tag'),
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
		'taxonomies' => array('category', 'post_tag'),
		'menu_icon' => 'dashicons-calendar-alt',
		'show_in_rest' => true,
		);

	register_post_type( 'event' , $args );


	$thisName = 'Written';
	$labels = array(
		'name' => _x($thisName, 'post type general name'),
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
		'taxonomies' => array('category', 'post_tag'),
		'menu_icon' => 'dashicons-media-text',
		'show_in_rest' => true,
		);

	register_post_type( 'written' , $args );


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

  register_taxonomy('podcast_type',array('podcast'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'podcasts' ),
		'show_in_rest' => true,
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

  register_taxonomy('video_type',array('video'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => true,
    'query_var' => true,
		'show_in_rest' => true,
		'public' => true
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

  register_taxonomy('event_type',array('event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'events' ),
		'show_in_rest'               => true,
  ));

}
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );


// adding ACF options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}



add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		// content box block
		acf_register_block(
			array(
				'name'				=> 'post-feed',
				'title'				=> __('KAS Post Feed'),
				'description'		=> __('A post feed'),
				'category'			=> 'widgets',
				'icon'				=> 'screenoptions',
				'keywords'			=> array( 'kas', 'post', 'feed'),
				'mode' => 'edit',
				'render_template' => 'custom-blocks/post-feed.php',
				'supports' => array(
					'align' => array('full'),
					),
				)
			);

			acf_register_block(
			array(
				'name'				=> 'section-title',
				'title'				=> __('Section Title'),
				'description'		=> __('Section Title'),
				'category'			=> 'widgets',
				'icon'				=> 'editor-bold',
				'keywords'			=> array( 'kas', 'section', 'title'),
				'mode' => 'edit',
				'render_template' => 'custom-blocks/section-title.php',
				'supports' => array(
					'align' => array('full'),
					),
				)
			);

	}
}


function threeUp($feedPosts, $sectionTitle){
	if($feedPosts->have_posts()){ ?>
		<!-- 3 up post block -->
		<div class="post-feed-block">
			<div class="post-feed-title">
				<div class="content-margins">
					<h4><?php echo $sectionTitle; ?></h4>
				</div>
			</div>
			<div class="post-feed-block-inner">
				<div class="post-feed-left">
					<?php $thisblock = array_shift($feedPosts->posts); ?>
					<?php postBlock($thisblock->ID); ?>
				</div>
				<div class="post-feed-right">
					<?php foreach($feedPosts->posts as $key=>$thispost){
						postBlock($thispost->ID);
					} ?>
				</div>
			</div>
		</div>

	<?php
	}
}

function twoUp($events){ ?>
	<!-- 2 up post block -->
	<div class="post-feed-block-2">
		<div class="post-feed-title">
			<div class="content-margins">
				<h4>Events</h4>
			</div>
		</div>
		<div class="post-feed-block-inner">
			<?php foreach($events as $key=>$thispost){
				postBlock($thispost->ID);
			} ?>
		</div>
	</div>
<?php }


add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
/**
 * Remove archive labels.
 *
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}



function podcast_article($postID){
	ob_start();

	if(get_the_terms($postID, 'Podcast')){
		$tax = get_the_terms($postID, 'Podcast');
	}else{
		$tax = null;
	}



	?>
	

		<a href="<?php echo get_the_permalink($postID); ?>">
				<div class="post-feed-image">
					<?php echo get_the_post_thumbnail($postID); ?>
				</div>
				<div class="post-feed-info">
					<div class="post-category">
						Episode #
					</div>
					<?php echo get_the_title($postID); ?>
				</div>
			</a>



	<?php

	echo ob_get_clean();
}


    function customize_customtaxonomy_archive_display ( $query ) {
        if (($query->is_main_query()) && (is_tax('podcast_type')))
        	$query->set( 'posts_per_page', '9' );
    }

     add_action( 'pre_get_posts', 'customize_customtaxonomy_archive_display' );




		 function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination-navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-arrow">%s</li>' . "\n", get_previous_posts_link('<span class="page-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"><path fill="#FFF" fill-rule="evenodd" d="M1.484.6l6 6-6 6-1.416-1.416L4.676 6.6.068 2.016z"/></svg></span>') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="page-arrow">%s</li>' . "\n", get_next_posts_link('<svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"><path fill="#FFF" fill-rule="evenodd" d="M1.484.6l6 6-6 6-1.416-1.416L4.676 6.6.068 2.016z"/></svg>') );
 
    echo '</ul></div>' . "\n";
 
}
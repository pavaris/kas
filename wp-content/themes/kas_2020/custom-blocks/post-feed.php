<?php
  $feed_type = get_field('feed_type');


  if($feed_type == 'Taxonomy'){
    // get taxonomy field, run query for latest posts in taxonomy.
    $tax_obj = get_field('taxonomy')[0];
    $args = ['posts_per_page' => 3,
      'tax_query' => array(
          array(
              'taxonomy' => $tax_obj->taxonomy,
              'field'    => 'slug',
              'terms'    => $tax_obj->slug,
          ),
      ),
    ];
    $feedPosts = new WP_Query($args);
    $sectionTitle = $tax_obj->name;
    threeUp($feedPosts, $sectionTitle);
  }
  if($feed_type == 'Latest Posts'){
    // get latest posts
    $args = ['posts_per_page' => 3];
    $feedPosts = new WP_Query($args);
    $sectionTitle = 'Latest Posts';
    threeUp($feedPosts, $sectionTitle);
  }

  if($feed_type == 'Events'){
    $events = get_field('events');
    twoUp($events);
  }

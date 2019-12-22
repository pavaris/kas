<?php
  $feed_type = get_field('feed_type');

 ?>
 <?php
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
  }else{
    // get latest posts
    $args = ['posts_per_page' => 3];
    $feedPosts = new WP_Query($args);
    $sectionTitle = 'Latest Posts';
  }

  ?>

<?php if($feedPosts->have_posts()){ ?>
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

<?php } ?>

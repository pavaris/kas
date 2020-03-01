<?php
function postBlock($id){
  ob_start();
  $postType = get_post_type($id);

  ?>
  <article class="post-block">
    <a href="<?php echo get_the_permalink($id); ?>">

      <div class="post-block-image">
        <div class="post-type-cont">
          <?php echo $postType; ?>
        </div>
        <?php echo get_the_post_thumbnail($id); ?>
      </div>
      <h4><?php echo get_the_title($id); ?></h4>
      <div class="post-block-desc">
        <?php echo get_field('short_description', $id); ?>
      </div>
    </a>
  </article>

  <?php
  echo ob_get_clean();
}

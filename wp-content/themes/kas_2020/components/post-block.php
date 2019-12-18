<?php
function postBlock($id){
  ob_start();
  ?>
  <article class="post-block">
    <div class="post-block-image">
      <?php the_post_thumbnail(); ?>
    </div>
    <div class="post-block-desc">
      <!-- <p>something or other;</p> -->
    </div>
  </article>

  <?php
  echo ob_get_clean();
}



function postBlockFeed($posts){
  ob_start();
  ?>
  <?php foreach($posts as $post){
    postBlock($post->ID);
  } ?>
  <?php
  echo ob_get_clean();
}

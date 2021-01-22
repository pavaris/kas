<nav class='social-nav'>
  <ul>
    <?php if(get_field('facebook', 'options')){ ?>
      <li class="fb">
        <a href="<?php echo get_field('facebook', 'options'); ?>" target='_blank'>
          <?php include get_template_directory() . '/img/facebook.svg'; ?>
        </a>
      </li>
    <?php } ?>
    <?php if(get_field('twitter', 'options')){ ?>
      <li class="twitter">
        <a href="<?php echo get_field('twitter', 'options'); ?>" target='_blank'>
          <?php include get_template_directory() . '/img/twitter.svg'; ?>
        </a>
      </li>
    <?php } ?>
    <?php if(get_field('instagram', 'options')){ ?>
      <li class='ig'>
        <a href="<?php echo get_field('instagram', 'options'); ?>" target='_blank'>
          <?php include get_template_directory() . '/img/instagram.svg'; ?>
        </a>
      </li>
    <?php } ?>
    
    <?php if(get_field('youtube', 'options')){ ?>
      <li class='youtube'>
        <a href="<?php echo get_field('youtube', 'options'); ?>" target='_blank'>
          <?php include get_template_directory() . '/img/youtube2.svg'; ?>
        </a>
      </li>
    <?php } ?>
  </ul>
</nav>

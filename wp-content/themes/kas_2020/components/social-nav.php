<nav class='social-nav'>
  <ul>
    <?php if(get_field('facebook', 'options')){ ?>
      <li>
        <a href="<?php echo get_field('facebook', 'options'); ?>" target='_blank'>Facebook</a>
      </li>
    <?php } ?>
    <?php if(get_field('twitter', 'options')){ ?>
      <li>
        <a href="<?php echo get_field('twitter', 'options'); ?>" target='_blank'>Twitter</a>
      </li>
    <?php } ?>
    <?php if(get_field('instagram', 'options')){ ?>
      <li>
        <a href="<?php echo get_field('instagram', 'options'); ?>" target='_blank'>IG</a>
      </li>
    <?php } ?>
    <?php if(get_field('youtube', 'options')){ ?>
      <li>
        <a href="<?php echo get_field('youtube', 'options'); ?>" target='_blank'>youtube</a>
      </li>
    <?php } ?>
  </ul>
</nav>

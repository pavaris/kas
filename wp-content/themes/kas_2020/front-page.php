<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-name
 */

get_header();
?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">


 				<div id="content">
           
           					<?php
           					while ( have_posts() ) :
           						the_post();
           					?>
           						<section id="page-header">
                        <?php $slides = get_field('featured_post'); ?>
                          <div class="header-slides">
                            <?php foreach($slides as $slide){ ?>
                              <div class="header-slide">
                                <div class="header-slide-img">
                                  <?php echo get_the_post_thumbnail($slide->ID); ?>
                                </div>
                                <div class="header-slide-info">
                                  <div class="content-margins">
                                    <div class="header-slide-inner">
                                      <h3><?php echo get_the_title($slide->ID); ?></h3>
                                      <?php echo get_field('short_description', $slide->ID); ?>
                                      <div class="header-slide-cta">
                                        <a href="<?php echo get_the_permalink($slide->ID); ?>" class='button'>
                                          <?php the_field('cta', $slide->ID); ?>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                       </section>
                      <?php
                        $args = ['post_type' => 'post', 'posts_per_page' => 3];
                        $latestPosts = new WP_Query($args);
                      ?>
                      <section class="homepage-content">
          
                      <?php $videoFeed = get_field('video_feed'); 
                      if($videoFeed){
                      ?>
                        <section class="home-latest-videos">
                          <div class="content-margins">
                            <h3>Watch Our Latest Video</h3>
                            <div class="home-latest-videos-feed">
                            
                              <iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id', $videoFeed[0]->ID); ?>?controls=0" frameborder="0"  class="superembed-force"></iframe>




                                <a id="play-video" href="#">
                                  <?php echo get_the_post_thumbnail($videoFeed[0]->ID); ?>
                                </a>
                              
                            </div>
                          </div>
                        </section>
                      <?php } ?>
          <?php wp_reset_query(); ?>
          
                      <section class="home-mission">
                        <h3>Our Mission</h3>
                        <h5>To capture, createm preserve and share the stoires of the Korean American experience</h5>
                        <a href="" class="button">Learn More</a>
                      </section>
                      
                      <?php $podcasts = get_field('podcasts'); 
                        if($podcasts){ ?>
                          <section class="home-podcasts">
                            <div class="content-margins">
                              <h3>Listen</h3>
                              <p>KAS Podcast Series</p>
                            </div>
                            <div class="home-podcasts-cont">
                              <div class='content-margins'>
                                <div class="home-podcast-feed">
                                  <?php foreach($podcasts as $podcast){ ?> 
                                    <a href="<?php echo get_the_permalink($podcast->ID); ?>">
                                      <div class="home-podcast-image">
                                        <?php echo get_the_post_thumbnail($podcast->ID); ?>
                                      </div>
                                      <h4>
                                        <?php 
                                          $tax = get_the_terms($podcast->ID, 'podcast_type'); 
                                          if($tax){
                                            echo $tax[0]->name . '<br>';
                                          }
                                        ?>
                                        <?php echo $podcast->post_title; ?>
                                      </h4>
                                    </a>
                                  <?php } ?>
                                  <a style='width: 30px;'></a>
                                </div>
                              </div>
                            </div>
                          </section>
                        <?php } ?>
          
          
                      <?php 
                        $writtenArgs = array('post_type' => 'written', 'posts_per_page' => 6 ); 
                        $writtenQuery = new WP_Query($writtenArgs);
          
                        if($writtenQuery->have_posts()){
                      ?>
                        <section class="home-latest-stories">
                          <div class="content-margins">
                            <h3>Latest Stories</h3>
                            <div class="posts-feed">
                              <?php foreach($writtenQuery->posts as $post){ ?>
                                
                                <a href="<?php echo get_the_permalink($post->ID); ?>">
                                  <div class="post-feed-image">
                                    <?php echo get_the_post_thumbnail($post->ID); ?>
                                  </div>
                                  <div class="post-feed-info">
                                    <div class="post-category">
                                      Article
                                    </div>
                                    <?php echo get_the_title($post->ID); ?>
                                  </div>
                                </a>
                              <?php } ?>
                            </div>
                          </div>
                        </section>
                      <?php } ?>
          <?php wp_reset_query(); ?>
          
                  <section class="newsletter-container">
                    <div class="content-margins">
                      <h3>Stay Connected</h3>
                      <p>Subscribe to our newsletter</p>
                      <form action="">
                        <input type="email">
                        <input type="submit" value="Submit">
                      </form>
                    </div>
                  </section>
              
                  
                  <?php $projects = get_field('projects'); ?>
                  <?php if($projects){ ?>
                  <section class="home-projects">
                    <div class="content-margins">
                      <h3>Our Projects</h3>
                      <div class="home-projects-feed">
                        <?php foreach($projects as $project){ ?> 
                          <a href="<?php echo get_term_link($project->term_id); ?>">
                            <?php if(get_field('image', 'term_' . $project->term_id)){ ?>
                              <div class="home-projects-image">
                                <?php echo wp_get_attachment_image(get_field('image', 'term_' . $project->term_id)["ID"], 'medium');  ?>
                              </div>
                            <?php } ?>
                            <h5><?php echo $project->name; ?></h5>
                          </a>
                        <?php } ?>
                      </div>
                        <a href="" class="button">All Projects</a>
          
                    </div>
                  </section>
                  <?php } ?>
          
          
                  <?php $events = get_field('events'); ?>
                  <?php if($events){ ?>
                    <section class="home-events">
                      <div class="content-margins">
                        <h3>Events</h3>
                        <div class="home-events-feed">
                          <?php foreach($events as $event){ ?>
                            <a href="<?php echo get_the_permalink($event->ID); ?>">
                              <div class="home-events-image">
                                <?php echo get_the_post_thumbnail($event->ID); ?>
                              </div>
                              <div class="home-events-desc">
                                <h5><?php echo $event->post_title; ?></h5>
                                <?php echo get_field('short_description', $event->ID); ?>
                              </div>
                            </a>
                          <?php } ?>
                        </div>
                      </div>
                    </section>
                  <?php } ?>
                      </section>
          
           					<?php
           					endwhile; // End of the loop.
           					?>
           				
         </div>

 		</main><!-- #main -->
 	</div><!-- #primary -->

<?php
get_footer();

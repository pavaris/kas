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



           
           					<?php
           					while ( have_posts() ) :
           						the_post();
           					?>
           						<section>
                        <?php $slides = get_field('featured_post'); ?>
                        <!-- <?php print_r($slides); ?> -->
                          <div class="header-slides">
                            <?php foreach($slides as $slide){ ?>
                            
                              <a href="<?php echo get_the_permalink($slide['post'][0]->ID); ?>">
                                <div class="header-slide">
                                  <div class="header-slide-img">
                                    <?php echo get_the_post_thumbnail($slide['post'][0]->ID); ?>
                                  </div>
                                  <?php if(!$slide['hide_title']){ ?>
                                    <div class="header-slide-info">
                                      <div class="content-margins wide flex">
                                        <div class="header-slide-inner">
                                          <h3><?php echo get_the_title($slide['post'][0]->ID); ?></h3>
                                          <?php echo get_field('short_description', $slide['post'][0]->ID); ?>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </div>
                              </a>
                            <?php } ?>
                          </div>
                       </section>
                      

                      <?php if(get_field('our_mission')){ ?> 
                        <section class="home-mission">
                          <?php echo get_field('our_mission'); ?>
                          <a href="<?php echo get_home_url(); ?>/about/" class="button filled">Learn More</a>
                        </section>
                      <?php } ?>
                      
                      
                      <section class="homepage-content">
                        <?php $legacy =  get_page_by_path( 'legacy-project' ); ?>
                        <?php 
                            $legacyPosts = get_posts(array('numberposts' => 6, 'post_type' => 'video',   'tax_query' => array(
                              array(
                                  'taxonomy' => 'video_type',
                                  'field'    => 'slug',
                                  'terms'    => 'legacy-project'
                              )
                              ))); ?>
                        <section class="home-legacy-project">
                          <a href="<?php echo get_the_permalink( $legacy ); ?>">
                              <div class="header-slide">
                                <div class="header-slide-img">
                                  <?php echo wp_get_attachment_image(get_field('poster_image', $legacyPosts[0]->ID)["ID"], 'large'); ?>
                                </div>
                                
                                  <div class="header-slide-info">
                                    <div class="content-margins wide flex">
                                      <div class="header-slide-inner">
                                        <h3>Legacy Project</h3>
                                        <p><?php echo get_field('short_description', $legacy); ?></p>
                                      </div>
                                    </div>
                                  </div>
                                
                              </div>
                            </a>
                        
                            <div class="home-legacy-feed ">
                              <div class="content-margins wide">
                                <div class="legacy-arrow legacy-arrow-left">
                                  <button>
                                    <img src="<?php echo get_template_directory_uri(  ); ?>/img/chevron.svg" alt="arrow">
                                  </button>
                                </div>
                                <div class="home-legacy-feed-inner">
                                  <?php foreach($legacyPosts as $legacyPost){ ?> 
                                    <a href="<?php echo get_the_permalink($legacyPost->ID); ?>">
                                      <div class="home-podcast-image">
                                        <?php echo get_the_post_thumbnail($legacyPost->ID); ?>
                                      </div>
                                      <h4>
                                        <?php echo $legacyPost->post_title; ?>
                                      </h4>
                                      <?php echo get_field('short_description',$legacyPost->ID) ?></p>
                                    </a>
                                  <?php } ?>
                                </div>
                                <div class="legacy-arrow legacy-arrow-right">
                                  <button class="">
                                    <img src="<?php echo get_template_directory_uri(  ); ?>/img/chevron.svg" alt="arrow">
                                  </button>
                                </div>
                              </div>
                            </div>
                        </section>
          
                      
          
                    <?php $feed = get_field('feed'); ?>
                    <?php if($feed){ ?> 
                      <section class="home-feed">
                        
                        <?php foreach($feed as $post){ ?> 
                          <a href="<?php echo $post['link']['url']; ?>" class="home-feed-post">
                            <div class="home-feed-post-img">
                              <?php echo wp_get_attachment_image($post['image']['ID'], 'large'); ?>
                            </div>
                            <div class="home-feed-post-info">
                              <div class="home-feed-post-info-inner">
                                <h4><?php echo $post['title']; ?></h4>
                                <p><?php echo $post['description']; ?></p>
                              </div>
                            </div>
                          </a>
                        <?php } ?>
                      </section>
                    <?php } ?>
                      
                                    
                  
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
                        <div class="center ">
                          <a href="<?php echo get_home_url(); ?>/explore" class="button filled">All Projects</a>
                        </div>
                      </div>
                    </section>
                    <?php } ?>
          

                  <section class="newsletter-container">
                    <div class="content-margins">
                      <h3>Stay Connected</h3>
                      <p>Subscribe to our newsletter</p>
                      <?php echo do_shortcode('[contact-form-7 id="11424" title="Newsletter"]'); ?>
                    </div>
                  </section>
          
                      </section>
          
           					<?php
           					endwhile; // End of the loop.
           					?>
           				


 		</main><!-- #main -->
 	</div><!-- #primary -->

<?php
get_footer();

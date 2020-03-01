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


 				<article class="">
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
                          <h3><?php echo get_the_title($slide->ID); ?></h3>
                          <div class="header-slide-cta">
                            CTA
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
              <div class="content-margins">
                <?php the_content(); ?>
              </div>
            </section>

 					<?php
 					endwhile; // End of the loop.
 					?>
 				</article>

 		</main><!-- #main -->
 	</div><!-- #primary -->

<?php
get_footer();

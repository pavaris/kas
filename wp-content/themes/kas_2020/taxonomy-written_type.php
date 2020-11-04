<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-name
 */

get_header();
?>
<?php $obj = get_queried_object(); ?>
<?php $loop = 0; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main top-padding">

				
				<?php
				if ( have_posts() ) :

				?>
	
					<div class="content-margins">

					<section class="latest-articles">
						
						<h3 class="center section-title">Latest from <br><?php echo $obj->name; ?></h3>

					</section>
				<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						if($loop == 0){
							?> 
							<section class="lead-article">
								<a href="<?php the_permalink(); ?>">
									<div class="lead-article-img">
										<?php echo get_the_post_thumbnail(); ?>
									</div>
									<div class="lead-article-content">
										<h3 class='section-title'><?php the_title(); ?></h3>
										<div class="short-desc">
											<?php echo get_field('short_description'); ?>
										</div>
									</div>
								</a>
							</section>
						</div>

							<section class="all-articles footer-margin-padding">
								<div class="content-margins wide">
								<h3 class="section-title">All <?php echo $obj->name; ?></h3>
								<div class="posts-feed">

							<?php 

						}else{
									/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
							?> 
									
									<?php postStruct($post->ID); ?>

							<?php 
						}
					$loop++;
					endwhile;
				endif;
				?>
				</div>

				<div class="center">
					<button id='see-more' class='filled' type='written' offset='10' term="<?php echo $obj->slug; ?>">More</button>
				</div>
				
				</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

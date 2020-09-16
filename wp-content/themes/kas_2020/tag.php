<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-name
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main top-padding">
	
				
						<div class="content-margins">
							
								<h1 class="archive-title" style='margin-bottom: 80px;'>Tag: <?php the_archive_title(); ?></h1>
						</div>

						<div class="content-margins search narrow">
							
									<div class="search-results-cont">
										<section class="results-container">
								<?php
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();
				
										/**
										 * Run the loop for the search to output the results.
										 * If you want to overload this in a child theme then include a file
										 * called content-search.php and that will be used instead.
										 */
										?> 
										<a href="<?php the_permalink(); ?>">
											
											<div class="search-result-img">
												<?php the_post_thumbnail(); ?>
											</div>	
											
											
											<div class="search-result-desc">
												<h5>
													<?php the_title(); ?>
												</h5>
												<?php echo get_field('short_description'); ?>
											</div>
										</a>
										<?php 
				
									endwhile;
		
								?> 
							</section>
									</div>
						</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package theme-name
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">


			<div class="page-header-container">
				<h1 class="archive-title">Search</h1>
				<div class="page-header-image">
					
				</div>
			</div>

			<div class="content-margins">
				<div class="search-input">
					<?php get_search_form(); ?>
				</div>
				<section class="search-results-cont">
					<?php if ( have_posts() ) : ?>
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
								<?php if(has_post_thumbnail()){ ?>
								<div class="search-result-img">
									<?php the_post_thumbnail(); ?>
								</div>	
								<?php } ?>
								
								<div class="search-result-desc">
									<h5>
										<?php the_title(); ?>
									</h5>
									<?php echo get_field('short_description'); ?>
								</div>
							</a>
							<?php 
	
						endwhile;
	
						the_posts_navigation();
	
					else :
	
						get_template_part( 'template-parts/content', 'none' );
	
					endif;
				?>
				</section>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();

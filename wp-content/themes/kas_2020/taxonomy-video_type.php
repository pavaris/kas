<?php
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>
					<?php $term = get_queried_object(); ?>
					<header id="page-header">
						<div class="page-header-container">
									<?php
										the_archive_title( '<h1 class="archive-title">', '</h1>' );
									?>
							<div class="page-header-image">
													<?php
										$image = get_field('banner_image', $term);
										?>
									
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
	
							</div>
						</div>
					</header><!-- .page-header -->
					<div class="content-margins">

					<section class="taxonomy-description">
						<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
					</section>


					<?php if(get_field('podcast_embed')){ ?>
						<div class="latest-podcast-episode">
							<h3 class="section-title">
								Latest Episode
							</h3>
							<div class="latest-podcast-embed">
								<?php echo get_field('podcast_embed'); ?>
							</div>
						</div>
					<?php } ?>

									</div>


					<section class="podcast-feed">
						<div class="content-margins">
							<h3 class="section-title"><?php echo get_the_archive_title(); ?> Episodes</h3>
	
	
								<div class="posts-feed">
									<?php
									while ( have_posts() ) :
										the_post();
	
										/*
										 * Include the Post-Type-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
										 */
	
										 podcast_article(get_the_ID());
	
										 ?>
	
									<?php endwhile;
									 ?>
								</div>
												<div class="center <?php echo $hosts ? '': 'bottom-padding';?>">
							<button id='see-more' class='filled' type='podcast' offset='9' term="<?php echo $term->slug; ?>">More</button>
						</div>

						</div>

					</section>


					<?php
				endif;
				?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

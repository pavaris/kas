<?php
get_header();
?>
<?php $term = get_queried_object(); ?>
<?php $hosts = get_field('hosts', $term); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>
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
					<div class="content-margins narrow">

					<section class="taxonomy-description">
						<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

<?php if($term->slug == 'not-your-average'){ ?> 
	<?php $podcast = get_term_link(get_term_by('slug', 'not-your-average-podcast', 'podcast_type')); ?>
	<?php if($podcast){ ?>
	<div class="center">
		<a href="<?php echo $podcast; ?>" class="button filled">Not Your Average Podcast</a>
	</div>
	<?php } ?>
<?php } ?>

					</section>
									</div>



<?php if($term->slug == 'not-your-average'){ ?> 
	<?php $firstPost = $wp_query->posts[0]; ?>
		<section class="nya-video">
			<div class="content-margins">
				<h5>NYA Latest Published Video</h5>
<div class="video-single-embed video-play-wrapper">
									<iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id', $firstPost->ID); ?>" data-src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0"  class="superembed-force"></iframe>
									<a href="" id="play-video">
										<?php $image = get_field('poster_image', $firstPost->ID); ?>
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
									</a>
								</div>
											</div>

		</section>

<?php } ?>



			



					<section class="podcast-feed footer-margin-padding">
						<div class="content-margins">
							<h3 class="section-title">Previous <?php echo get_the_archive_title(); ?> Events</h3>
	
	
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
							<div class="center">
								<button id='see-more' class='filled' type='video' offset='6' term="<?php echo $term->slug; ?>">More</button>
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

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
							<?php if(!get_field('hide_title', $term)){ ?>
								<div class="page-header-inner"><?php the_archive_title( '<h1 class="archive-title">', '</h1>' );?></div>
							<?php } ?>
							<div class="page-header-image">
													<?php
										$image = get_field('banner_image', $term);
										?>
									
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
	
							</div>
						</div>
					</header><!-- .page-header -->
					<div class="content-margins narrow">
<?php if(get_the_archive_description()
){ ?> 
			<section class="taxonomy-description">
						<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>


					</section>
<?php } ?>
		
									</div>





					<section class="podcast-feed footer-margin-padding">
						<div class="content-margins wide">
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
	
										 postStruct(get_the_ID());
	
										 ?>
	
									<?php endwhile;
									 ?>
								</div>
							<div class="center">
								<button id='see-more' class='filled' type='event' offset='9' term="<?php echo $term->slug; ?>">More</button>
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

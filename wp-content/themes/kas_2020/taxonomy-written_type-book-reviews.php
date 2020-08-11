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
		<main id="main" class="site-main">

				
				<?php
				if ( have_posts() ) :

				?>
					<header id="page-header">
						<div class="page-header-container">
							<h1 class="archive-title"><?php echo $obj->name; ?></h1>
							<div class="page-header-image">
								<?php
										$image = get_field('image', $obj);
										?>
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
							</div>
						</div>
					</header><!-- .page-header -->

					<div class="content-margins">

						<section class="latest-articles">
							
							<h3 class="center section-title">Featured Book</h3>

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
										<?php if(get_field('author_name')){ ?>
											<p>by <?php echo get_field('author_name'); ?></p>
										<?php } ?>
										<?php echo get_field('short_description', get_the_ID()); ?>
										<div class='button filled'>Read Review</div>
									</div>
									
									
									
								</a>
							</section>
						</div>

							<section class="all-articles">
								<div class='content-margins'>
								<h3 class="section-title"><?php echo $obj->name; ?></h3>
								<div class="posts-feed">

							<?php 

						}else{
									/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
							?> 
								<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
									<div class="post-feed-image">
										<?php echo get_the_post_thumbnail(get_the_ID()); ?>
									</div>
									<div class="post-feed-info">
											<div class="post-category">
												Review
											</div>
										<h6>
											<?php echo get_the_title(get_the_ID()); ?>
										</h6>
										<?php echo get_field('short_description', get_the_ID()); ?>

									</div>
								</a>

							<?php 
						}
					$loop++;
					endwhile;
				endif;
				?>
				</div>
				<?php wpbeginner_numeric_posts_nav(); ?>
			</div>
				</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

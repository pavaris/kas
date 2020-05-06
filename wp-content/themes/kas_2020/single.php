<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme-name
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="page-header-container">
				<h2>Articles</h2>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
			</div>
			<div class="content-margins">
				<article class="">
					<?php
					while ( have_posts() ) :
						the_post();
					?>
						<section class="article-header">
							<h1 class='section-title'><?php the_title(); ?></h1>
							
						</section>
						<section class='page-content'>
							<?php the_content(); ?>
						</section>

						<section class="single-meta-cont">
							<div class="single-meta">
									<?php echo get_field('author_name') ? 'By ' . get_field('author_name') . ' | ' : ''; ?>
									Posted on <?php the_date('m/d/j'); ?>
							</div>
							<?php if(get_the_tags(get_the_ID())){ ?>
							<div class="single-tags">
								<?php foreach(get_the_tags(get_the_ID()) as $tag){
									?> 
									<a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
									<?php 
								} ?>
							</div>
							<?php } ?>
						</section>

						<?php if(get_field('author_name')){
							?> 
							<section class="single-author">
								<?php if(get_field('author_image')){ ?>
									<div class="author-img">
											<?php echo wp_get_attachment_image(get_field('author_image')['ID'], 'medium'); ?>
									</div>
								<?php } ?>
								<div class="author-desc">
									<?php echo get_field('author_description') ?>
									<?php if(get_field('author_social')){
										?> 
										<div class="author-social">
											<?php foreach(get_field('author_social') as $social){ ?> 
												<a class="author-social-link" href="<?php echo $social['link']; ?>">
													<?php echo wp_get_attachment_image($social['icon']['ID'], 'medium'); ?>
												</a>
											<?php } ?>
										</div>
										<?php 
									} ?>
								</div>
							</section>
							<?php 
						} ?>


					<?php
					endwhile; // End of the loop.
					?>
				</article>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

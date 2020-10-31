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
<?php $terms = get_the_terms(get_the_ID(), 'written_type'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main top-padding">

			<div class="content-margins narrow">
				<article class="">
					<?php
					while ( have_posts() ) :
						the_post();
					?>
						<section class="article-header">
							<h1 class='section-title'><?php the_title(); ?></h1>
						</section>


						<section class="single-meta-cont">
							<div class="single-meta">
									<p>
										
									</p>

<?php
$author = get_field('author_name');
if($author) {
	if($terms){
	if($terms[0]->slug == 'book-reviews'){ ?> 
		<p>Review by <?php echo $author; ?></p>
		<?php 
	}else{ ?> 
		<p>By: <?php echo $author; ?></p>
	<?php	
	}
	 }
}
?>

									<p><?php the_date('F j, Y'); ?></p>
									
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


						<?php if($terms[0]->slug == 'book-reviews'){ ?>
							<div class="book-review-content">
								
								<section class='page-content'>
								<?php the_content(); ?>
							</section>
							</div>
						<?php }else{ ?> 
							<section class='page-content'>
								<?php the_content(); ?>
							</section>	
						<?php } ?>
						

						

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

						<div class="single-social-share">
							<div class="single-share-container">
								<h4>SHARE</h4>
								<div class="single-socials">
								<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target='_blank'>
									<?php include get_template_directory() . '/img/twitter.svg'; ?>
								</a>
								<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target='_blank'>
									<?php include get_template_directory() . '/img/facebook.svg'; ?>
								</a>
								</div>
							</div>
							<div class="single-signup-container">
									<h4>STAY CONNECTED</h4>
									<?php echo do_shortcode('[contact-form-7 id="11424" title="Newsletter"]'); ?>
							</div>
						
						</div>

					<?php
					endwhile; // End of the loop.
					?>
				</article>
			</div>
						<?php
					if($terms){ 
						$args = array('post_type' => 'written', 'posts_per_page' => 3, 
						'tax_query' => array(
							array(
								'taxonomy' => 'written_type',
								'field' => 'term_id',
								'terms' => $terms[0]->term_id,
							)
						)); 
						$related = new WP_Query($args);
						if($related->have_posts()){
						?>
							<section class="all-articles">
								<div class="content-margins">
									<h3 class="section-title">Related</h3>
									
									<div class="posts-feed">
										<?php foreach($related->posts as $post){ ?>
										<a href="<?php echo get_the_permalink($post->ID); ?>">
											<div class="post-feed-image">
												<?php echo get_the_post_thumbnail($post->ID); ?>
											</div>
											<div class="post-feed-info">
													<div class="post-category">
														<?php echo $terms[0]->slug == 'book-reviews' ? 'Review' : 'Written';?>
													</div>
												<h5>
													<?php echo get_the_title($post->ID); ?>
												</h5>
												<div class="short-desc">
													<?php echo get_field('short_description'); ?>
												</div>

											</div>
										</a>
										<?php } ?>
									</div>
								</div>
								<div class="center">
								<a href="<?php echo get_category_link($terms[0]->term_id); ?>" class='button filled'>MORE</a>
							</div>
							</section>
							
						<?php } ?>
					<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

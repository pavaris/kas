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
		<main id="main" class="site-main">
			<div id="page-header">
				<div class="page-header-container">
						<?php if($terms){ ?>
						<a href="<?php echo get_term_link($terms[0]); ?>"><h2><?php echo $terms[0]->name; ?></h2></a>
						<?php } ?>
					<div class="page-header-image">
						<?php 
							if($terms){
								$image = get_field('image', $terms[0]);
										
								if($image){
									echo wp_get_attachment_image($image['ID'], 'large');
								}else{
									echo '<div class="blue-bg"></div>';
								}
							}else{
								echo get_the_post_thumbnail();
							}
						?>
						
					</div>
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
						<?php if($terms[0]->slug == 'book-reviews'){ ?>
							<div class="book-review-content">
								<div class="book-image">
									<?php echo get_the_post_thumbnail(); ?>
								</div>
								<section class='page-content'>
								<?php the_content(); ?>
							</section>
							</div>
						<?php }else{ ?> 
							<section class='page-content'>
								<?php the_content(); ?>
							</section>	
						<?php } ?>
						

						<section class="single-meta-cont">
							<div class="single-meta">
									<?php echo get_field('author_name') ? 'By ' . get_field('author_name') . ' | ' : ''; ?>
									Posted on <?php the_date('m/d/Y'); ?>
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
						<?php
					if($terms){ 
						$args = array('post_type' => 'written', 'posts_per_page' => 6, 
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
												<?php echo get_the_title($post->ID); ?>
																						<?php echo get_field('short_description'); ?>

											</div>
										</a>
										<?php } ?>
									</div>
								</div>
							</section>
						<?php } ?>
					<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

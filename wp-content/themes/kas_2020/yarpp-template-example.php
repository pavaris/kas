<?php 
/*
YARPP Template: Simple
Author: YARPP Team
Description: A simple example YARPP template.
*/
?>



<section class="all-articles footer-margin-padding">
	<div class="content-margins wide">
		<h3 class="section-title">Related</h3>
		
		<div class="posts-feed">
			<?php while (have_posts()) : the_post(); ?>
			<a href="<?php echo get_the_permalink(); ?>">
				<div class="post-feed-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
				<div class="post-feed-info">
						<!-- <div class="post-category">
							<?php// echo $terms[0]->slug == 'book-reviews' ? 'Review' : 'Written';?>
						</div> -->
					<h5>
						<?php echo get_the_title(); ?>
					</h5>
					<?php if(get_field('short_description')){ ?>
					<div class="short-desc">
						<?php echo get_field('short_description'); ?>
					</div>
					<?php } ?>
				</div>
			</a>
			<?php endwhile; ?>
		</div>
	</div>
	<div class="center" style='margin-top: 30px'>
	<button class="button filled">MORE</button>
	</div>
</section>
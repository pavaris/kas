<?php  //Template Name: Legacy Project ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $aboutPage = get_page_by_title('Legacy Project'); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">
		 <div class="page-header-container">
				<h2>Legacy Project</h2>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail($aboutPage->ID); ?>
				</div>
			 </div>
		<div class="legacy-page-nav-cont">
			<div class="content-margins">
				<div class="legacy-page-nav">
					<?php  
						$args = array(
							'post_type'      => 'page',
							'posts_per_page' => -1,
							'post_parent'    => $aboutPage->ID,
							'order'          => 'ASC',
						);
						$children = new WP_Query($args);
					?>
	
	
	
					<?php foreach($children->posts as $key=>$page){ ?>
					
						<a href="<?php echo get_the_permalink($page->ID); ?>" class="<?php  echo get_the_ID() == $page->ID ? 'active' : ''; ?>"><?php echo $page->post_title; ?></a>					
						
					<?php } ?>
				</div>
				<?php wp_reset_postdata(); ?>
		 
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</div>
		
		</div>

			<?php if(get_the_ID() == $children->posts[0]->ID){ ?>
						<div class="page-video-container footer-margin-padding">
							<div class="content-margins">
								<div class="video-single-embed video-play-wrapper">
									<iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0"  class="superembed-force"></iframe>
									<a href="" id="play-video">
										<?php $image = get_field('poster_image', $aboutPage->ID); ?>
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
									</a>
								</div>
							</div>
						</div>
			<?php } ?>

		
				 
		</main>
	</div>

	<?php get_footer(); ?>
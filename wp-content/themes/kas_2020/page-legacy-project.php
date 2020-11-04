<?php  //Template Name: Legacy Project ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $aboutPage = get_page_by_title('Legacy Project'); ?>

 	<div id="primary" class="content-area <?php echo $post->post_name == 'all-videos' ? 'legacy-video-feed-page' : ''; ?>">
 		<main id="main" class="site-main">
		 <div class="page-header-container">
				<h2>Legacy Project</h2>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail($aboutPage->ID); ?>
				</div>
			</div>
		<div class="legacy-page-nav-cont">
			<div class="content-margins narrow">
				<div class="legacy-page-nav" id='subpage-nav'>
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
					
						<a href="<?php echo get_the_permalink($page->ID); ?>#subpage-nav" class="<?php  echo get_the_ID() == $page->ID ? 'active' : ''; ?>"><?php echo $page->post_title; ?></a>					
						
					<?php } ?>
				</div>
				<?php wp_reset_postdata(); ?>
		 
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

<?php if($post->post_name == 'all-videos'){ ?>

				<div class="posts-feed-cont footer-margin-padding">
					<div class="filters content-margins">
						<select name="communities" id="communities">
							<option value="" default>COMMUNITIES</option>
						</select>
						<select name="generation" id="generation">
							<option value="" default>Generation</option>
						</select>
						<select name="language" id="language">
							<option value="" default>Language</option>
						</select>
					</div>
					<div class="posts-feed content-margins wide">
						<?php 
							$args = array(
								'post_type' => 'video',
								'posts_per_page' => 6,
								'tax_query' => array(
									array(
											'taxonomy' => 'video_type',
											'field'    => 'slug',
											'terms'    => 'legacy-project',
									)
								)); 
								$vids = new WP_Query($args);
	
						?>
						<?php 
							if($vids->have_posts()){
								foreach($vids->posts as $post){
									postStruct($post->ID, 'Legacy Project');
								} 
							}
						?>
					</div>
					<div class="filtered-feed content-margins wide">
						<div class="filtered-post-feed">
							<?php 
									$args = array(
									'post_type' => 'video',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
												'taxonomy' => 'video_type',
												'field'    => 'slug',
												'terms'    => 'legacy-project',
										)
									)); 
									$allVids = new WP_Query($args);
								if($vids->have_posts()){
									foreach($vids->posts as $post){
										legStruct($post->ID, 'Legacy Project');
									} 
								}
							?>
						</div>
						<div class="no-posts">
							<h4 class="center">There are no vidoes with for this combination of filters.</h4>
						</div>
					</div>
					<div class="center " id="see-more-container">
						<button id='see-more' class='filled' type='video' offset='6' term="legacy-project">More</button>
					</div>
				</div>

<?php } ?>

	
			<?php if(get_the_ID() == $children->posts[0]->ID){ ?>
						<div class="page-video-container footer-margin-padding">
							<div class="content-margins narrow">
								<h2 class='center'>About Legacy Project</h2>
								<div class="video-single-embed video-play-wrapper">
									<iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" data-src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0"  class="superembed-force"></iframe>
									<a href="" id="play-video">
										<?php $image = get_field('poster_image'); ?>
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
									</a>
								</div>
							</div>
						</div>
			<?php } ?>

		
				 
		</main>
	</div>

	<?php get_footer(); ?>
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
<?php $terms = get_the_terms(get_the_ID(), 'video_type'); ?>

<?php if($terms[0]->slug == 'roar-story-slam'){
	include "roar-single-template.php";
	return;
} ?>

<?php $thisID = get_the_ID(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			
				<article class="video-content">
					<div class="content-margins wide">
						<?php
						while ( have_posts() ) :
							the_post();
						?>
							<section class="article-header">
								<h2 class='section-title'>
									<?php if($terms){
										echo $terms[0]->name;
									}else{
										the_title();
									} ?>
								</h2>
								
							</section>
							
							<section class="video-playlist-container">
								<div class="video-single-embed video-play-wrapper">
									<iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" data-src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0"  class="superembed-force"></iframe>
									<a href="" id="play-video">
										<?php $image = get_field('poster_image'); ?>
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
									</a>
								</div>

								<?php $args = array('post_type' => 'video', 'posts_per_page' => -1, 		'tax_query' => array(
										array(
											'taxonomy' => 'video_type',
											'field' => 'term_id',
											'terms' => $terms[0]->term_id,
										))
										);
								?>
								<?php $videos = new WP_Query($args); ?>
								<?php if($videos->have_posts()){ ?>
									<div class="video-playlist">
										<div class="video-playlist-inner">
											<h4><?php echo $terms[0]->name; ?> Playlist</h4>
										<div class="actual-playlist">
											<?php foreach($videos->posts as $key=>$video){ ?>
												<a href="<?php echo get_the_permalink($video->ID); ?>" class="<?php echo $video->ID == $thisID ? 'active' : ''; ?>" key="<?php echo $key; ?>">
													<div class="video-img-cont">
											
	
		<?php $poster_image = get_field('poster_image', $video->ID); ?>
											<?php echo wp_get_attachment_image($poster_image['ID'], 'large'); ?>
	
													</div>
													<div class="video-info-cont">
														<h5>
															<?php echo get_the_title($video->ID); ?>
														</h5>
														<div class="short-desc">
															<?php echo get_field('short_description', $video->ID); ?>
														</div>
														</div>
												</a>
											<?php } ?>
										</div>
										</div>
									</div>
								<?php } ?>
							</section>
								
							<section class='page-content <?php echo $videos->have_posts() ? 'playlist-padding' : ''; ?>'>
								<h1><?php the_title(); ?></h1>
								<?php the_content(); ?>


									<?php if(get_the_tags(get_the_ID())){ ?>
									<div class="single-tags">
										<?php foreach(get_the_tags(get_the_ID()) as $tag){
											?> 
											<a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
											<?php 
										} ?>
									</div>
									<?php } ?>

									<?php $podcastPost = get_field('associated_podcast') ?>
									<?php if($podcastPost){
										
										 ?> 
										 	<div class="podcast-in-video center">
												 <p>This episode of not your average is also available as a podcast</p>
												 <?php echo $podcastPost; ?>
											 </div>
										 <?php 
									} ?>


							</section>	
						
						
	
			
	
						<?php
						endwhile; // End of the loop.
						?>
					</div>
				</article>

					<section class="more-podcasts-feed">
					<div class="content-margins wide">
						<h3 class="section-title"><?php echo $terms[0]->name; ?></h3>
						<div class="posts-feed">
							<?php 
							
							foreach($videos->posts as $index=>$postsss){
								postStruct($postsss->ID, $terms[0]->name);
								if($index == 2){break;}
							}
	?>
					
						</div>
						<div class="button-cnt">
							<?php $link = get_term_link($terms[0], 'video_type'); ?>
							<?php if($terms[0]->slug == 'legacy-project'){
								$page = get_page_by_path( 'legacy-project/all-videos' );
								$link = get_the_permalink( $page );
							} ?>		
							<a href="<?php echo $link; ?>" class="button filled wide">More</a>
						</div>
					</div>
				</section>


		</main><!-- #main -->
	</div><!-- #primary -->



	<script>
		var key = parseInt(jQuery('.actual-playlist a.active').attr('key'));
		var last = parseInt(jQuery('.actual-playlist a:last-child').attr('key'));

		var nth = parseInt(jQuery('.actual-playlist a.active').attr('key')) + 11;
		jQuery('.video-playlist-inner a:nth-child(n + ' + nth   +')').hide();
		jQuery('.video-playlist-inner a:nth-last-child(n + ' + (last - key + 2)   +')').hide();
		// jQuery('.video-playlist-inner a:nth-last-child(n + ' + key   +')').remove();
		

	</script>


<?php
get_footer();

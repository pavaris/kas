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
<?php $terms = get_the_terms(get_the_ID(), 'event_type'); ?>

<?php $thisID = get_the_ID(); ?>
<?php $videos = get_field('videos'); ?>
<?php $photos = get_field('photos'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main roar-single-template">
		
			
				<article class="video-content <?php echo $terms ? "" : 'footer-padding-gone'; ?>">
					<div class="content-margins">
						<?php
						while ( have_posts() ) :
							the_post();
						?>
							<section class="article-header">
								<h2 class='section-title'>
									<?php the_title(); ?>
								</h2>
								
							</section>
						<?php if($videos){ ?>
							<section class="video-playlist-container">
								<div class="video-single-embed video-play-wrapper">
									<iframe src="https://www.youtube.com/embed/<?php echo $videos[0]['youtube_video_id']; ?>" data-src="https://www.youtube.com/embed/<?php echo $videos[0]['youtube_video_id']; ?>"  frameborder="0"  class="superembed-force"></iframe>
									<a href="" id="play-video">
										<img src="<?php echo wp_get_attachment_image_src($videos[0]['poster_image']['ID'], 'large')[0] ?>" alt="video poster">
									</a>
								</div>

								
								
									<div class="video-playlist">
										<div class="video-playlist-inner">
											<h4><?php the_title(); ?> Playlist</h4>
										<?php foreach($videos as $index => $video){ ?>
											<a href="#" class="<?php echo $index == 0 ? 'active' : ''; ?>" vidID='<?php echo $video['youtube_video_id'] ?>' poster="<?php echo wp_get_attachment_image_src($video['poster_image']['ID'], 'large')[0] ?>">
											
												<div class="video-img-cont">
													<?php echo wp_get_attachment_image($video['poster_image']['ID'], 'medium'); ?>
												</div>
												<h5>
													<?php echo $video['performer']; ?>
												</h5>
												<p><?php echo $video['title']; ?></p>
											</a>
										<?php } ?>
										</div>
									</div>
							</section>
								
							<section class='page-content <?php echo $videos ? 'playlist-padding' : ''; ?>'>
								<h1><?php echo $videos[0]['title']; ?></h1>
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

									

							</section>	
						
						
						<?php }else{
							?> 
							
											
							<section class='page-content '>
								
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

									

							</section>	
							
							
							<?php 
						} ?>

			
	
						<?php
						endwhile; // End of the loop.
						?>
					</div>
				</article>

<?php if($videos){ ?>
				<section class="storytellers">
					<div class="content-margins">
					
					<?php if(get_field('performer_section_label', 'term_' . $terms[0]->term_id)){ ?>
						<h3><?php echo get_field('performer_section_label', 'term_' . $terms[0]->term_id) ?></h3>						
					<?php }else{
						?> 
						<h3>Performers</h3>
						<?php 
					} ?>

						<div class="storyteller-cont">
							<?php foreach($videos as $video){
							?> 
							<div class="storyteller">
								<div class="storyteller-image">
									<?php echo wp_get_attachment_image($video['poster_image']['ID'], 'medium'); ?>
								</div>
								<div class="storyteller-info">
									<h5>
										<?php echo $video['performer']; ?>
									</h5>
									<p><?php echo $video['bio']; ?></p>
								</div>
							</div>
							<?php 
						} ?>
						</div>
					</div>
				</section>

					<?php } ?>
				<?php if($photos){ ?> 
					<section class="photo-gallery-grid">
						<div class="content-margins">
													<h3>Photos</h3>

							<div class="photo-gallery-inner">
								<?php foreach($photos as $photo){ ?>
									<a href="#" class="blocks-gallery-item">
										<?php echo wp_get_attachment_image($photo['ID'], 'large'); ?>
									</a>
								<?php } ?>
							</div>
						</div>
					</section>
				<?php } ?>

<?php if($terms){ ?>
<?php 	
$args = array(
			'post_type' => 'event',
			'posts_per_page' => 3,
			'tax_query' => array(
				array(
						'taxonomy' => 'event_type',
						'field'    => 'slug',
						'terms'    => $terms[0]->slug,
				)
			)); 
			$vids = new WP_Query($args);
	if($vids->have_posts()){
?>
					<section class="more-podcasts-feed roar-single-feed">
					<div class="content-margins wide">
						<h3 class="section-title"><?php echo $terms[0]->name; ?>s</h3>
						<div class="posts-feed">
							<?php 
							
			


							foreach($vids->posts as $index=>$postsss){
								postStruct($postsss->ID);
							}
	?>
					
						</div>
						<div class="button-cnt">
							<?php $link = get_term_link($terms[0], 'video_type'); ?>
							<?php if($terms[0]->slug == 'legacy-project'){
								$page = get_page_by_path( 'legacy-project/all-videos' );
								$link = get_the_permalink( $page );
							} ?>		
							
								<div class="center">
									<button id='see-more' class='filled' type='event' offset='3' term="<?php echo $terms[0]->slug; ?>" show='3'>More</button>
								</div>
						</div>
					</div>
				</section>
<?php } ?>
<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

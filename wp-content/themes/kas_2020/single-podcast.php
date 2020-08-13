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

<?php $terms = get_the_terms(get_the_ID(), 'podcast_type'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main top-padding">
			
		

				<article class="podcast-content">
					<?php
					while ( have_posts() ) :
						the_post();
					?>
						<section class="article-header">
							<div class="content-margins wide">
								<h1 class='section-title'><?php echo $terms[0]->name . ': '; ?><?php the_title(); ?></h1>
								<h5><?php echo get_the_date('F jS, Y'); ?></h5>
									<?php if(get_the_tags(get_the_ID())){ ?>
										<div class="single-tags">
											<?php foreach(get_the_tags(get_the_ID()) as $tag){
												?> 
												<a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
												<?php 
											} ?>
										</div>
								<?php } ?>

								<?php if(!get_field('hide_image')){ ?>
									<?php echo get_the_post_thumbnail(); ?>
								<?php } ?>
							</div>
						</section>
						<section class="podcast-embed-cont">
							<div class="content-margins">
								<div class="latest-podcast-embed">
									<?php echo get_field('podcast_embed'); ?>
								</div>
							</div>
						</section>
						<section class='post-content'>  
							<div class="content-margins">
								<?php the_content(); ?>
							</div>
						</section>
						
						<?php $video = get_field('associated_video_id'); ?>
<?php if($video){ ?>
						<div class="video-in-podcast center">
							<div class="content-margins">
								<p>This episode of not your average is also available as a podcast</p>
								<iframe src="https://www.youtube.com/embed/<?php echo $video; ?>" frameborder="0"  class="superembed-force"></iframe>
							</div>
						</div>

<?php } ?>

						<div class="content-margins">
										<?php if($terms){ 
						if($terms[0]->slug == 'krb-podcast'){
							?> 
							<section class="podcast-author">
								<p>
									Posted by: <?php echo get_the_author_meta('user_firstname') . ' ' . get_the_author_meta('user_lastname'); ?> | Released <?php echo get_the_date('m/d/Y'); ?>
								</p>
							</section>
							<?php 
						}
					} ?>
						</div>
									
					<?php
					endwhile; // End of the loop.
					?>
					<?php if(get_field('credits')){ ?>
						<section class="credits">
							<h4 class='section-title'>Credits</h4>
							<div class="credit-content">
								<?php echo get_field('credits'); ?>
							</div>
						</section>
					<?php } ?>
					<?php $listenOn = get_field('listen_on'); ?>
					<?php if($listenOn){ ?>
						<section class="podcast-listen-on">
								<h3 class="section-title">Listen on</h3>
								<div class="podcast-platform-links">
									<?php if($listenOn['apple_podcast']){ ?>
										<a href="<?php echo $listenOn['apple_podcast']; ?>" class="platform-link apple-podcast" target="_blank">
											<?php include get_template_directory( ) . '/img/apple.svg'; ?>
											<p>Apple Podcast</p>
										</a>
									<?php } ?>
									<?php if($listenOn['spotify']){ ?>
										<a href="<?php echo $listenOn['spotify']; ?>" class="platform-link spotify-podcast" target="_blank">
											<?php include get_template_directory( ) . '/img/spotify.svg'; ?>
											<p>Spotify</p>
										</a>
									<?php } ?>
									<?php if($listenOn['anchor']){ ?>
										<a href="<?php echo $listenOn['anchor']; ?>" class="platform-link anchor-podcast" target="_blank">
											<?php include get_template_directory( ) . '/img/anchor.svg'; ?>
											<p>Anchor</p>
										</a>
									<?php } ?>
									<?php if($listenOn['youtube']){ ?>
										<a href="<?php echo $listenOn['youtube']; ?>" class="platform-link youtube-podcast" target="_blank">
											<?php include get_template_directory( ) . '/img/youtube.svg'; ?>
											<p>Youtube</p>
										</a>
									<?php } ?>
								</div>
						</section>
					<?php } ?>
				</article>
			<?php if($terms){ ?>
				<section class="more-podcasts-feed">
					<div class="content-margins wide">
						<h3 class="section-title"><?php echo $terms[0]->name; ?> Episodes</h3>
						<div class="posts-feed">
							<?php 
							$args = ['post_type' => 'podcast', 'posts_per_page' => 3, "post__not_in" => array(get_the_ID()), 'tax_query' => array(	array(
								'taxonomy'         => 'podcast_type',
								'terms'            => $terms[0]->slug,
								'field'            => 'slug',
							),)]; 
							$morePodcasts = new WP_Query($args);
							foreach($morePodcasts->posts as $postsss){
								podcast_article($postsss->ID);
							}
	?>
					
						</div>
						<div class="button-cnt">
							<a href="<?php echo get_term_link($terms[0], 'podcast_type'); ?>" class="button filled wide">More</a>
						</div>
					</div>
				</section>
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

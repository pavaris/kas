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
		<main id="main" class="site-main">
			
		

			<div class="content-margins">
				<article class="">
					<?php
					while ( have_posts() ) :
						the_post();
					?>
						<section class="article-header">
							<h1 class='section-title'><?php the_title(); ?></h1>
						</section>
						<section class="podcast-embed-cont">
							<div class="latest-podcast-embed">
								<?php echo get_field('podcast_embed'); ?>
							</div>
						</section>
						<section class='post-content'>  
							<?php the_content(); ?>
						</section>
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
			</div>
			<?php if($terms){ ?>
				<section class="more-podcasts-feed">
					<div class="content-margins">
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
							<a href="<?php echo get_term_link($terms[0], 'podcast_type'); ?>" class="button">More</a>
						</div>
					</div>
				</section>
			<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

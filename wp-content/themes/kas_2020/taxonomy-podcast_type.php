<?php
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>
					<?php $term = get_queried_object(); ?>
					<header id="page-header">
						<div class="page-header-container">
									<?php
										the_archive_title( '<h1 class="archive-title">', '</h1>' );
									?>
							<div class="page-header-image">
													<?php
										$image = get_field('image', $term);
										?>
									
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
	
							</div>
						</div>
					</header><!-- .page-header -->
					<div class="content-margins">

					<section class="taxonomy-description">
						<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
					</section>


					<?php if(get_field('podcast_embed')){ ?>
						<div class="latest-podcast-episode">
							<h3 class="section-title">
								Latest Episode
							</h3>
							<div class="latest-podcast-embed">
								<?php echo get_field('podcast_embed'); ?>
							</div>
						</div>
					<?php } ?>

					

					<?php $listenOn = get_field('listen_on', $term); ?>
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


					<?php
						$hosts = get_field('hosts', $term);
						if($hosts){ ?>
							<section class="podcast-hosts">
								<div class="content-margins">
									
									<h3 class="section-title">Host<?php echo count($hosts) > 1 ? 's' : ""; ?></h3>
									<div class="team-members">
										<?php foreach($hosts as $host){
											?>
											<div class="team-member">
												<div class="team-member-images">
													<img src="<?php echo $host['image']['sizes']['medium']; ?>" alt="<?php echo $host['image']['alt']; ?>">
												</div>
												<div class="team-member-name">
													<?php echo $host['name']; ?>
												</div>
												<div class="team-member-social">

													<?php foreach($host['social'] as $social){ ?>
														<a href="<?php echo $social['link']['url']; ?>" target="_blank">
															<?php if($social['icon']){ ?>
																<?php echo wp_get_attachment_image($social['icon']['ID'], 'medium'); ?>
															<?php }else{ echo $social['link']['title']; } ?>
														</a>
													<?php } ?>
												</div>
												<div class="team-member-info">
													<?php echo $host['description']; ?>
												</div>
										</div>
									<?php } ?>
								</div>
							</section>
					<?php } ?>

					<section class="podcast-feed">
						<h3 class="section-title"><?php echo get_the_archive_title(); ?> Episodes</h3>

						<div class="content-margins">
							<div class="posts-feed">
								<?php
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */

									 podcast_article(get_the_ID());

									 ?>

								<?php endwhile;
								 ?>
							</div>
						</div>
					</section>


					<?php
				endif;
				?>

			<?php wpbeginner_numeric_posts_nav(); ?>

				</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

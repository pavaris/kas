<?php
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>
					<?php $term = get_queried_object(); ?>
					<header id="page-header">

              <div class="header-slides">

                <div class="header-slide">
                  <div class="header-slide-img">
										<?php
											$image = get_field('cover_image', $term);
										 ?>
										 <img src="<?php print_r($image['sizes']['large']); ?>" alt="">
                  </div>
                  <div class="header-slide-info">
                    <div class="content-margins">
											<?php
											the_archive_title( '<h1 class="archive-title">', '</h1>' );
											?>

                    </div>
                  </div>
                </div>

              </div>

					</header><!-- .page-header -->
					<section class="taxonomy-description">
						<div class="full-width-title">
							<h4>About</h4>
						</div>
						<?php the_archive_description( '<div class="archive-description content-margins">', '</div>' ); ?>
					</section>

					<?php $listenOn = get_field('listen_on', $term); ?>
					<?php if($listenOn){ ?>
						<section class="podcast-listen-on">
							<div class="content-margins">
								<h3>Listen on</h3>
								<div class="podcast-platform-links">
									<?php foreach($listenOn as $link){ ?>
										<a href="<?php echo $link['link']; ?>" target="_blank">
											<img src="<?php echo $link['icon']['url']; ?>" alt="<?php echo $link['icon']['alt']; ?>">
										</a>
									<?php } ?>
								</div>
							</div>
						</section>
					<?php } ?>

					<section class="podcast-feed">
						<div class="full-width-title">
							<h4>Latest Episodes</h4>
						</div>
						<div class="content-margins">
							<div class="podcast-feed-posts">
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
						$hosts = get_field('hosts', $term);
						if($hosts){ ?>
							<div class="podcast-hosts">
								<div class="content-margins">
									<h5>Host<?php echo count($hosts) > 1 ? 's' : ""; ?></h5>
									<div class="podcast-hosts-cont">
										<?php foreach($hosts as $host){
											?>
											<div class="podcast-host">
												<div class="podcast-host-img">
													<img src="<?php echo $host['image']['sizes']['medium']; ?>" alt="<?php echo $host['image']['alt']; ?>">
												</div>
												<div class="podcast-host-desc">
													<?php echo $host['description']; ?>
												</div>
											</div>
											<?php
										} ?>
									</div>
								</div>
							</div>
					<?php } ?>
					<?php
				endif;
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

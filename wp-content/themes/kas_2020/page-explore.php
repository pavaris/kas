<?php  //Template Name: Explore ?>

<?php get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main top-padding">

		<?php $explore = get_field('projects'); ?>
		<section class="home-projects">
			<div class="explore-feed">
				<div class="content-margins wide">
						<section class="article-header">
							<h1 class='section-title'><?php the_title(); ?></h1>
						</section>

					<div class="explore-repeater home-projects-feed">
						<?php if($explore){ 
							foreach($explore as $explorePost){
								?>
								<a href="<?php echo $explorePost['link']; ?>">
									<div class="home-projects-image">
										<?php echo wp_get_attachment_image($explorePost['image']['id'], 'large'); ?>
									</div>
									<h5><?php echo $explorePost['title']; ?></h5>
									<p><?php echo $explorePost['description']; ?></p>
								</a>
								<?php 
							}
						 } ?>
					</div>
				</div>
			</div>
		</section>

		</main>
	</div>

	<?php get_footer(); ?>




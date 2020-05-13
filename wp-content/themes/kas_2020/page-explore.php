<?php  //Template Name: Explore ?>

<?php get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">
			<div class="page-header-container">
				<h2>Explore</h2>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
			</div>

		<?php $explore = get_field('projects'); ?>
		<section class="home-projects">
			<div class="explore-feed">
				<div class="content-margins">
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



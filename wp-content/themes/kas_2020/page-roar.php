<?php  //Template Name: Roar Story Slam ?>

<?php get_header(); ?>

 	<div id="primary" class="content-area page-donate">
 		<main id="main" class="site-main">
		<?php
 					while ( have_posts() ) :
 						the_post();
 					?>
			<div class="page-header-container">
				<div class="page-header-inner">
					<h1 class="archive-title">Roar Story Slam</h1>
				</div>
				<div class="page-header-image">
					<?php echo get_mobile_desktop_image(get_the_ID()); ?>
				</div>
			</div>


			<section class='page-content'>
					<div class="content-margins narrow">
						<?php the_content(); ?>
					</div>
			</section>


			<?php $feeds = get_field('feed'); ?>
			<?php if($feeds){ ?> 
				<section class="home-feed">
					<?php 
						foreach($feeds as $feed){
								?> 
								<div class="home-feed-post">
									<a class="home-feed-post-img" href="<?php echo $feed['link']['url']; ?>" target="<?php echo $feed['link']['target']?>">
										<?php echo wp_get_attachment_image($feed['image']['ID'], 'large'); ?>
									</a>
									<a class="home-feed-post-info" href="<?php echo $feed['link']['url']; ?>" target="<?php echo $feed['link']['target']?>">
										<div class="home-feed-post-info-inner">
											<?php echo $feed['content']; ?>
										</div>
									</a>
									
								</div>
								
								<?php 
							}
					?> 
				</section>
				<?php } 
			?>
			
<?php $donorsTitle = get_field('donors_title'); ?>
<?php $donorsTable = get_field('donors'); ?>
			<?php if($donorsTitle){
				?> 
				<section class="donors">
					<div class="content-margins wide">
						<h4><?php echo $donorsTitle ?></h4>
						<div class="donors-table">
							<?php foreach($donorsTable['body'] as $column){
								?> 
								<div class="donor-row">
									<?php foreach($column as $row){
										?> 
										<div class="donor-column">
											<?php echo $row['c']; ?>
										</div>
										<?php
								} ?>
								</div>
								<?php 
							} ?>
						</div>
					</div>
				</section>
				
				<?php 
			} ?>


<?php 
	$args = array(
								'post_type' => 'event',
								'posts_per_page' => 6,
								'tax_query' => array(
									array(
											'taxonomy' => 'event_type',
											'field'    => 'slug',
											'terms'    => 'roar-story-slam',
									)
								)); 
								$vids = new WP_Query($args); ?>
			
			<section class="all-articles">
						<div class="content-margins wide">
							<h3 class='section-title'>Roar Story Slams</h3>
							<div class=" posts-feed">
								<?php foreach($vids->posts as $post){
									postStruct($post->ID);
								} ?>
							</div>
						</div>
<div class="center">
							<button id='see-more' class='filled' type='event' offset='6' term="roar-story-slam">More</button>
						</div>
					</section>

						

			<?php endwhile; // End of the loop. ?>
		</main>
	</div>

	<?php get_footer(); ?>




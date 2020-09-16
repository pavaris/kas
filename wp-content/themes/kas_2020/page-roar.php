<?php  //Template Name: Roar Story Slam ?>

<?php get_header(); ?>

 	<div id="primary" class="content-area page-donate">
 		<main id="main" class="site-main">
		<?php
 					while ( have_posts() ) :
 						the_post();
 					?>
			<div class="page-header-container">
				<h1 class="archive-title">Roar Story Slam</h1>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail(); ?>
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
									<div class="home-feed-post-img">
										<?php echo wp_get_attachment_image($feed['image']['ID'], 'large'); ?>
									</div>
									<div class="home-feed-post-info">
										<div class="home-feed-post-info-inner">
											<?php echo $feed['content']; ?>
										</div>
									</div>
									<?php if($feed['link']){
										?>
										<a href="<?php echo $feed['link']['url']; ?>" target="<?php echo $feed['link']['target']?>">
										</a>
										<?php
									} ?>
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
						<div class="content-margins ">
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




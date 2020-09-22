<?php  //Template Name: Gala ?>

<?php get_header(); ?>

 	<div id="primary" class="content-area page-donate">
 		<main id="main" class="site-main">
		<?php
 					while ( have_posts() ) :
 						the_post();
 					?>
			<div class="page-header-container">
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
			</div>


			<section class='page-content' <?php echo get_field('color') ? 'style="background-color:' . get_field('color') . '"' : '' ; ?>>
					<div class="content-margins narrow">
						<?php the_content(); ?>
					</div>
			</section>


		

<?php 
	$args = array(
			'post_type' => 'event',
			'posts_per_page' => 6,
			'tax_query' => array(
				array(
						'taxonomy' => 'event_type',
						'field'    => 'slug',
						'terms'    => 'gala',
				)
			)); 
			$vids = new WP_Query($args); ?>

			<?php if($vids->have_posts()){ ?>
					<section class="all-articles">
						<div class="content-margins narrow">
							<h3 class='section-title'>Previous Galas</h3>
							<div class=" posts-feed">
								<?php foreach($vids->posts as $post){
									postStruct($post->ID);
								} ?>
							</div>
						</div>
							<div class="center">
					<button id='see-more' class='filled' type='event' term="gala">More</button>
				</div>
					</section>
			<?php } ?>

			
			<?php endwhile; // End of the loop. ?>
		</main>
	</div>

	<?php get_footer(); ?>



				
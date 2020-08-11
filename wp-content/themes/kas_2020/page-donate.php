<?php get_header(); ?>

 	<div id="primary" class="content-area page-donate">
 		<main id="main" class="site-main">
		<?php
 					while ( have_posts() ) :
 						the_post();
 					?>
			<div class="page-header-container">
				<h1 class="archive-title">Support Us</h1>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
			</div>


			<section class='page-content'>
					<div class="content-margins">
						<?php the_content(); ?>
					</div>
			</section>
			
			<?php $image = get_field('image'); ?>
			<?php $text = get_field('text'); ?>
			<?php if($image){
?> 
<div class="donate-footer-image">
	<?php echo wp_get_attachment_image($image['id'], 'large'); ?>	
	<h5><?php echo $text; ?></h5>
</div>
<?php 
			} ?>
			
			<?php endwhile; // End of the loop. ?>
		</main>
	</div>

	<?php get_footer(); ?>




<?php get_header(); ?>

 	<div id="primary" class="content-area">
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
 			

		<?php
 					endwhile; // End of the loop.
 					?>
		</main>
	</div>

	<?php get_footer(); ?>




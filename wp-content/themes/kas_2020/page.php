<?php get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">
		<?php
 					while ( have_posts() ) :
 						the_post();
 					?>
			<div class="page-header-container">
				<div class="page-header-inner">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
			</div>

	
 						<section>
							 <?php the_title(); ?>
 						</section>
 			

		<?php
 					endwhile; // End of the loop.
 					?>
		</main>
	</div>

	<?php get_footer(); ?>




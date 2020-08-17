<?php  //Template Name: Happy Cleaners ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $aboutPage = get_page_by_path('happy-cleaners'); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">
		 <div class="page-header-container">
				<!-- <h2>Happy Cleaners</h2> -->
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail($aboutPage->ID); ?>
				</div>
			 </div>
		<div class="legacy-page-nav-cont">
			<div class="content-margins">
				<div class="legacy-page-nav">
					<?php  
						$args = array(
							'post_type'      => 'page',
							'posts_per_page' => -1,
							'post_parent'    => $aboutPage->ID,
							'order'          => 'ASC',
						);
						$children = new WP_Query($args);
					?>
	
			
					<a href="<?php echo get_the_permalink($aboutPage->ID); ?>" class="<?php echo $aboutPage->ID == $post->ID ? 'active' : ''; ?>">Home</a>			
	
					<?php foreach($children->posts as $key=>$page){ ?>
					
						<a href="<?php echo get_the_permalink($page->ID); ?>" class="<?php  echo get_the_ID() == $page->ID ? 'active' : ''; ?>"><?php echo $page->post_title; ?></a>					
						
					<?php } ?>
				</div>
			</div>
					</div>



			 <?php wp_reset_postdata(); ?>
		 <div class="content-margins">
			<div class="page-content">

					<?php the_content(); ?>
		 	</div>
		 </div>

				 <div class="bottom-padding"></div>
				 
		</main>
	</div>

	<?php get_footer(); ?>
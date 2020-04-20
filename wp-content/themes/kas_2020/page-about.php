<?php  //Template Name: About ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $aboutPage = get_page_by_title('About us'); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main">
		 <div class="page-header-container">
				<h2>About Us</h2>
				<div class="page-header-image">
					<?php echo get_the_post_thumbnail($aboutPage->ID); ?>
				</div>
			 </div>
		<div class="about-page-nav-cont">
				<div class="about-page-nav">
				<?php  
					$args = array(
						'post_type'      => 'page',
						'posts_per_page' => -1,
						'post_parent'    => $aboutPage->ID,
						'order'          => 'ASC',
					);
					$children = new WP_Query($args);
				?>
				<?php foreach($children->posts as $key=>$page){ ?>
				
					<a href="<?php echo get_the_permalink($page->ID); ?>" class="<?php  echo get_the_ID() == $page->ID ? 'active' : ''; ?>"><?php echo $page->post_title; ?></a>					
					
				<?php } ?>
			</div>
		</div>
			 <?php wp_reset_postdata(); ?>
		 <div class="content-margins">
			<div class="page-content">
					<h1 style="text-align: center"><?php the_title(); ?></h1>
					<?php the_content(); ?>
		 	</div>
		 </div>
			<?php if($post->ID == $children->posts[0]->ID){ ?>
				<div id="about-page-content">
					<div class="content-margins">
						<h2>About koreanamericanstory.org</h2>
						
						<?php echo get_the_content(null, null, $aboutPage->ID); ?>
					</div>
				</div>
			 <?php }else{
				 ?> 
				 <div class="bottom-padding"></div>
				 <?php 
			 } ?>
		</main>
	</div>

	<?php get_footer(); ?>
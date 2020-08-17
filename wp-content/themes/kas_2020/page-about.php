<?php  //Template Name: About ?>

<?php get_header(); ?>
<?php global $post; ?>
<?php $aboutPage = get_page_by_path('about'); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main top-padding">

			
			<div class="content-margins page-nav-container">
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
					<?php foreach($children->posts as $key=>$page){ ?>
					
						<a href="<?php echo get_the_permalink($page->ID); ?>" class="<?php  echo get_the_ID() == $page->ID ? 'active' : ''; ?>"><?php echo $page->post_title; ?></a>					
						
					<?php } ?>
				</div>
			</div>
			
			 <?php wp_reset_postdata(); ?>
		 <div class="content-margins">
			<div class="page-content">
					<h1 class="section-title center"><?php the_title(); ?></h1>


<?php if(get_field('members')){ ?>
	<div class="team-members">
		<?php foreach(get_field('members') as $member){ ?> 
				<div class="team-member">
					<div class="team-member-images">
						<?php echo wp_get_attachment_image($member['image']['ID'], 'medium', false, 'class=image-now'); ?>
						<?php if($member['childhood_image'] != ''){ ?> 
							<?php echo wp_get_attachment_image($member['childhood_image']['ID'], 'medium', false, 'class=image-child'); ?>
						<?php }else{ echo wp_get_attachment_image($member['image']['ID'], 'medium', false, 'class=image-child'); } ?>
						
					</div>
					<div class="team-member-name"><?php echo $member['name']; ?></div>
					<div class="team-member-info">
						<?php echo $member['info']; ?>
					</div>
				</div>
		<?php }	?>
	</div>
<?php } ?>

<?php if(get_field('board_members')){
	?> 
	<div class="board-members">
		<?php foreach(get_field('board_members') as $member){ ?> 
			<div class="board-member">
				<div class="board-member-images">
					<?php echo wp_get_attachment_image($member['image']['ID'], 'medium', false, 'class=image-now'); ?>
					<?php if($member['childhood_image'] != ''){ ?> 
						<?php echo wp_get_attachment_image($member['childhood_image']['ID'], 'medium', false, 'class=image-child'); ?>
					<?php }else{ echo wp_get_attachment_image($member['image']['ID'], 'medium', false, 'class=image-child'); } ?>
					<h3 class="board-member-name">
						<span><?php echo $member['name']; ?></span>
					</h3>
				</div>
				<div class="board-member-info">
					<h4><?php echo $member['title']; ?></h4>
					<?php echo $member['info']; ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php
} ?>

					<?php the_content(); ?>
		 	</div>
		 </div>
			<?php if($post->ID == $children->posts[0]->ID){ ?>
				<div id="about-page-video">
					<div class="content-margins">
						<h2>About koreanamericanstory.org</h2>
						<div class="video-single-embed video-play-wrapper">
									<iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0"  class="superembed-force"></iframe>
									<a href="" id="play-video">
										<?php $image = get_field('poster_image'); ?>
										<?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
									</a>
								</div>
					</div>
				</div>
				<div  class='about-page-content bottom-padding'>
					<div class="content-margins">
						<?php echo get_field('content', $post->ID ); ?>
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
<?php 
/*
Template Name: Blog Template 1
*/ 
?>
<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=' . $post_number );
$sidebar = get_post_meta($id, "qode_show-sidebar", true); 
if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_infographer['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_infographer['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_infographer['title_image'];
}

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_infographer['title_height'];
}

if(get_post_meta($id, "qode_page-title-color", true) != ""){
 $title_color = get_post_meta($id, "qode_page-title-color", true);
}else{
	$title_color = "";
}

if(get_post_meta($id, "qode_page-background-color", true) != ""){
	$background_color = get_post_meta($id, "qode_page-background-color", true);
}else if($qode_options_infographer['blog_background_color'] != ""){
	$background_color = $qode_options_infographer['blog_background_color'];
}else{
	$background_color = "";
}

$title_in_grid = false;
if(isset($qode_options_infographer['title_in_grid'])){
if ($qode_options_infographer['title_in_grid'] == "yes") $title_in_grid = true;
}

?>
			
	<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
	<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'background-image:url('.$title_image.'); height:'.$title_height.'px;'; }?> <?php if($background_color != "") { echo "background-color:". $background_color .";";} ?>">
				<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>
					<?php if($title_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
					<?php } ?>
					<div class="title_text" >
						<h1 <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?> ><?php echo get_the_title($id); ?></h1>
						<?php if(get_post_meta($id, "qode_page-subtitle", true)) { ?><span <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?> ><?php echo get_post_meta($id, "qode_page-subtitle", true) ?></span><?php } ?>
					</div>
					<?php if($title_in_grid){ ?>
						</div>
					</div>
					<?php } ?>
				<?php } ?>
	</div>
	<?php }else{ ?>
		<div class="no_title_gap" style="<?php if($background_color != "") { echo "background-color:". $background_color .";";} ?> <?php if(($sidebar == "default")||($sidebar == "")) { echo "height:0px;";} ?>">&nbsp;</div>
	<?php } ?>
	
	<?php if($qode_options_infographer['show_back_button'] == "yes") { ?>
		<a id='back_to_top' href='#'>
			<span class='back_to_top_inner'>
				<span>&nbsp;</span>
			</span>
		</a>
	<?php } ?>
	
	<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			if(get_post_meta($id, "qode_show-page-title", true)) {
			?>
				<div style="margin-top:-65px;">
			<?php
			}
				echo do_shortcode($revslider);
			
			if(get_post_meta($id, "qode_show-page-title", true)) {
			?>
				</div>
			<?php
			}
		}
		?>
	<div class="container" <?php if($background_color != "") { echo "style='background-color:". $background_color ."'";} ?>>
		<div class="container_inner clearfix">
			<?php if(($sidebar == "default")||($sidebar == "")) : ?>
			<div class="blog_holder clearfix">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<section class="content_section">
						<div class="post<?php if ( !has_post_thumbnail() ) { echo " no-image"; } ?>">
								<div class="post_info">
									<div class="inner">
										<div class="post_date">
											<span class="day"><?php the_time('d'); ?></span>
											<span class="month"><?php the_time('M Y'); ?></span>
										</div>
										<div class="post_author_category">
											<div class="author"><?php _e('Posted by','qode'); ?> <span><?php the_author(); ?></span></div>
											<div class="category"><?php _e('Category','qode'); ?> <span><?php the_category(', '); ?></span></div>
										</div>
									</div>
								</div>
								<?php if ( has_post_thumbnail() ) { ?>
								<div class="post_image">
									<div class="inner">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail('blog-type-1'); ?>
										</a>
									</div>
								</div>
								<?php } ?>
								<div class="post_text">
									<div class="inner">
										<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
										<?php the_excerpt(); ?>
										<a class="read_more" href="<?php the_permalink(); ?>"><?php _e('Read More','qode'); ?></a>
									</div>
								</div>
							</div>
						</section>
					<?php endwhile; ?>
					
					<?php else: //If no posts are present ?>
						<div class="entry">                        
								<p><?php _e('No posts were found.', 'qode'); ?></p>    
						</div>
					<?php endif; ?>
					
				
				<?php if($qode_options_infographer['pagination'] != "0") : ?>
				<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> clearfix">
					<div class="column1">
						<div class="column_inner">
							<div class="blog_holder blog_inline blog_sidebar clearfix">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<article>
										<div class="post<?php if ( !has_post_thumbnail() ) { echo " no-image"; } ?>">
												<div class="post_info">
													<div class="inner">
														<div class="post_date">
															<span class="day"><?php the_time('d'); ?></span>
															<span class="month"><?php the_time('M Y'); ?></span>
														</div>
														<div class="post_author_category">
															<div class="author"><?php _e('Posted by','qode'); ?> <span><?php the_author(); ?></span></div>
															<div class="category"><?php _e('Category','qode'); ?> <span><?php the_category(', '); ?></span></div>
														</div>
													</div>
												</div>
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="post_image">
													<div class="inner">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-1'); ?>
														</a>
													</div>
												</div>
												<?php } ?>
												<div class="post_text">
													<div class="inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<?php the_excerpt(); ?>
														<a class="read_more" href="<?php the_permalink(); ?>"><?php _e('Read More','qode'); ?></a>
													</div>
												</div>
											</div>
										</article>
									<?php endwhile; ?>
									
									<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
									<?php endif; ?>
									
								
								<?php if($qode_options_infographer['pagination'] != "0") : ?>
								<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
								<?php endif; ?>
								<?php wp_reset_query(); ?>
							</div>
						</div>
					</div>
					<div class="column2">
						<?php get_sidebar(); ?>	
					</div>
				</div>
			<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> clearfix">
					<div class="column1">
						<?php get_sidebar(); ?>	
					</div>
					<div class="column2">
						<div class="column_inner">
							<div class="blog_holder blog_inline blog_sidebar clearfix">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<article>
										<div class="post<?php if ( !has_post_thumbnail() ) { echo " no-image"; } ?>">
												<div class="post_info">
													<div class="inner">
														<div class="post_date">
															<span class="day"><?php the_time('d'); ?></span>
															<span class="month"><?php the_time('M Y'); ?></span>
														</div>
														<div class="post_author_category">
															<div class="author"><?php _e('Posted by','qode'); ?> <span><?php the_author(); ?></span></div>
															<div class="category"><?php _e('Category','qode'); ?> <span><?php the_category(', '); ?></span></div>
														</div>
													</div>
												</div>
												<?php if ( has_post_thumbnail() ) { ?>
												<div class="post_image">
													<div class="inner">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<?php the_post_thumbnail('blog-type-1'); ?>
														</a>
													</div>
												</div>
												<?php } ?>
												<div class="post_text">
													<div class="inner">
														<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
														<?php the_excerpt(); ?>
														<a class="read_more" href="<?php the_permalink(); ?>"><?php _e('Read More','qode'); ?></a>
													</div>
												</div>
											</div>
										</article>
									<?php endwhile; ?>
									
									<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
									<?php endif; ?>
									
								
								<?php if($qode_options_infographer['pagination'] != "0") : ?>
								<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
								<?php endif; ?>
								<?php wp_reset_query(); ?>
							</div>
						</div>
					</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
<?php 
$options = get_option( 'iKAS_theme_settings' );

global $wp_query;

$id = $wp_query->get_queried_object_id();

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

}else{

	$background_color = "";

}



$title_in_grid = false;

if(isset($qode_options_infographer['title_in_grid'])){

	if ($qode_options_infographer['title_in_grid'] == "yes") $title_in_grid = true;

}



if(!empty($qode_options_infographer['twitter_via'])) {

	$twitter_via = " via " . $qode_options_infographer['twitter_via'];

} else {

	$twitter_via = 	"";

}



?>

	<?php get_header(); ?>

		<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>

			<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'background-image:url('.$title_image.'); height:'.$title_height.'px;'; }?> <?php if($background_color != "") { echo "background-color:". $background_color .";";} ?>">

				<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>

				

				<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>

					<?php if($title_in_grid){ ?>

					<div class="container">

						<div class="container_inner clearfix">

					<?php } ?>

					<div class="title_text" >

						<h1 <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?> ><?php the_title(); ?></h1>

						<?php if(get_post_meta($id, "qode_page-subtitle", true)) { ?><span <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?> ><?php echo get_post_meta($id, "qode_page-subtitle", true) ?></span><?php } ?>

					</div>

					<?php if($title_in_grid){ ?>

						</div>

					</div>

					<?php } ?>

				<?php } ?>

			</div>

		<?php }else{ ?>

			<div class="no_title_gap" <?php if($background_color != "") { echo "style='background-color:". $background_color ."'";} ?>>&nbsp;</div>

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

				<?php if (have_posts()) : 

						while (have_posts()) : the_post(); ?>

						<?php if(is_home() || is_front_page()):?>
<?php /*
<h2>Featured Categories</h2>
&nbsp;

[three_col_col1]

[frontpage_news widget="6473" name="Legacy Project Latest" url="http://koreanamericanstory.org/legacy-video/"]

[/three_col_col1]
[three_col_col2]

[frontpage_news widget="6475" name="Not Your Average" link="http://koreanamericanstory.org/portfolio-category/not-your-average/"]

[/three_col_col2]
[three_col_col3]

[frontpage_news widget="6477" name="Latest Video"]

[/three_col_col3]

&nbsp;

[three_col_col1]
[frontpage_news widget="6479" name="My Korean American Story"]

[/three_col_col1]
[three_col_col2][frontpage_news widget="6481" name="Heart &amp; Seoul"]

[/three_col_col2]
[three_col_col3]

[frontpage_news widget="7454" name="Podcasts" url="http://koreanamericanstory.org/category/podcasts/"]
<a style="padding-right: 25px;" href="http://koreanamericanstory.org/podcasts/">
<h3 style="margin-top: 0px; margin-right: 25px; font-size: 23px;">PODCASTS</h3></a>

[/three_col_col3]

&nbsp;
*/ ?>
							<section class='content_section no' style='background-color:#F1F1F1;'>
								<h2>Featured Categories</h2>
								<p>&nbsp;</p>

								<div class="three_columns clearfix">

									<div class="column1">
										<div class="column_inner">
										<?php 
											$featured_cat1 = $options['featured_cat1'];
											$featured_cat_link1 = $options['featured_cat_link1'];
											$term = get_term( $featured_cat1, 'portfolio_category' );
											//echo $term->description;
											$posts_array = get_posts(
															array(
																'posts_per_page' => 1,
																'post_type' => 'portfolio_page',
																'tax_query' => array(
																			array(
																				'taxonomy' => 'portfolio_category',
																				'field' => 'term_id',
																				'terms' => $featured_cat1,
																			)
																)
															)
											);
											// print_r($posts_array);
											foreach($posts_array as $post){
												$pid = $post->ID;
												$featured_img = get_the_post_thumbnail_url( $pid, 'full' );
												$post_meta = get_post_meta($pid);
												//print_r($post_meta['qode_portfolio_images']);
												$data = unserialize($post_meta['qode_portfolio_images'][0]); 
												//print_r($data);

												foreach($data as $custom): 
													$video_type = $custom['portfoliovideotype']; 
													$video_id = $custom['portfoliovideoid']; 
												endforeach; 
												?>
												<div class="hover ehover13">
													<img class="img-responsive" src="<?php echo $featured_img;?>" alt="<?php echo get_cat_name( $featured_cat1 ); ?> : <?php echo get_the_title($pid);?>">
													<a class="popup-vimeo icon-links" href="http://vimeo.com/<?php echo $video_id;?>" >
													<div class="overlay">
														<h2><?php echo get_the_title($pid);?></h2>
														<div class="icon icon-music-play-button"></div>
														<button class="info nullbutton" data-toggle="modal" data-target="#modal12">Play Video </button>
													</div>
													</a>			
												</div>
											<?php
											}
											?>
											<h3 class="cat-link-title"><a href="<?php echo $featured_cat_link1; ?>"><?php echo $term->description?><span class="read-more">see more</span></a></h3>
										</div>
									</div>

									<div class="column2">
										<div class="column_inner">
										<?php 
											$featured_cat2 = $options['featured_cat2'];
											$featured_cat_link2 = $options['featured_cat_link2'];
											$term = get_term( $featured_cat2, 'portfolio_category' );
											//echo $term->description;
											$posts_array = get_posts(
															array(
																'posts_per_page' => 1,
																'post_type' => 'portfolio_page',
																'tax_query' => array(
																			array(
																				'taxonomy' => 'portfolio_category',
																				'field' => 'term_id',
																				'terms' => $featured_cat2,
																			)
																)
															)
											);
											// print_r($posts_array);
											foreach($posts_array as $post){
												$pid = $post->ID;
												$featured_img = get_the_post_thumbnail_url( $pid, 'full' );
												$post_meta = get_post_meta($pid);
												//print_r($post_meta['qode_portfolio_images']);
												$data = unserialize($post_meta['qode_portfolio_images'][0]); 
												//print_r($data);

												foreach($data as $custom): 
													$video_type = $custom['portfoliovideotype']; 
													$video_id = $custom['portfoliovideoid']; 
												endforeach; 
												?>
												<div class="hover ehover13">
													<img class="img-responsive" src="<?php echo $featured_img;?>" alt="<?php echo get_cat_name( $featured_cat2 ); ?> : <?php echo get_the_title($pid);?>">
													<a class="popup-vimeo icon-links" href="http://vimeo.com/<?php echo $video_id;?>" >
													<div class="overlay">
														<h2><?php echo get_the_title($pid);?></h2>
														<div class="icon icon-music-play-button"></div>
														<button class="info nullbutton" data-toggle="modal" data-target="#modal12">Play Video </button>
													</div>
													</a>			
												</div>
											<?php
											}
											?>
											<h3 class="cat-link-title"><a href="<?php echo $featured_cat_link2; ?>"><?php echo $term->description?><span class="read-more">see more</span></a></h3> 
										</div>
									</div>

									<div class="column3">
										<div class="column_inner">
										<?php 
											$featured_cat3 = $options['featured_cat3'];
											$featured_cat_link3 = $options['featured_cat_link3'];
//											$term = get_term( $featured_cat2, 'portfolio_category' );
											//echo $term->description;
											$posts_array = get_posts(
															array(
																'posts_per_page' => 1,
																'post_type' => 'post',
																'cat' => $featured_cat3
															)
											);
											// print_r($posts_array);
											foreach($posts_array as $post){
												$pid = $post->ID;
												$featured_img = get_the_post_thumbnail_url( $pid, 'full' );
//												$post_meta = get_post_meta($pid);
//												print_r($post_meta['viemo']);
												$custom = get_post_custom($pid); 
												$vimeo =  isset($custom["vimeo"][0]) ? $custom["vimeo"][0] : '';
												$youtube =  isset($custom["youtube"][0]) ? $custom["youtube"][0] : '';

												$cat_permalink = $featured_cat_link4!=""?$featured_cat_link3:get_category_link( $featured_cat3 );

										?>
												<div class="hover ehover13">
													<img class="img-responsive" src="<?php echo $featured_img;?>" alt="<?php echo get_cat_name( $featured_cat3 ); ?> : <?php echo get_the_title($pid);?>">
													<a class="popup-vimeo icon-links" href="<?php echo $vimeo;?>" >
													<div class="overlay">
														<h2><?php echo get_the_title($pid);?></h2>
														<div class="icon icon-music-play-button"></div>
														<button class="info nullbutton" data-toggle="modal" data-target="#modal12">Play Video </button>
													</div>
													</a>			
												</div>
										<?php
											}
										?>
											<h3 class="cat-link-title"><a href="<?php echo $cat_permalink; ?>"><?php echo get_cat_name( $featured_cat3 ); ?><span class="read-more">see more</span></a></h3>
											
										</div>
									</div>
								</div>

								<p>&nbsp;</p>

								<div class="three_columns clearfix">

								<?php for($col_num=1; $col_num < 3; $col_num++){?>
									<div class="column<?php echo $col_num;?>">
										<div class="column_inner">

										<?php 
											$cat_num = $col_num + 3;
											$featured_cat4 = $options['featured_cat'.$cat_num];
											$featured_cat_link4 = $options['featured_cat_link'.$cat_num];
//											$term = get_term( $featured_cat2, 'portfolio_category' );
											$posts_array = get_posts(
															array(
																'posts_per_page' => 1,
																'post_type' => 'post',
																'cat' => $featured_cat4
															)
											);
											// print_r($posts_array);
											foreach($posts_array as $post){
												$pid = $post->ID;
												$featured_img = get_the_post_thumbnail_url( $pid, 'full' );
//												$post_meta = get_post_meta($pid);
//												print_r($post_meta['viemo']);
												$custom = get_post_custom($pid); 
												$vimeo =  isset($custom["vimeo"][0]) ? $custom["vimeo"][0] : '';
												$youtube =  isset($custom["youtube"][0]) ? $custom["youtube"][0] : '';
												
												$cat_permalink = $featured_cat_link4!=""?$featured_cat_link4:get_category_link( $featured_cat4 );

										?>
												<div class="hover ehover13">
													<img class="img-responsive" src="<?php echo $featured_img;?>" alt="<?php echo get_cat_name( $featured_cat2 ); ?> : <?php echo get_the_title($pid);?>">
													<a href="<?php echo get_permalink($pid);?>" >
													<div class="overlay">
														<h2><?php echo get_the_title($pid);?></h2>
														<div class="icon icon-basic-link"></div>
														<button class="info nullbutton" data-toggle="modal" data-target="#modal12">Read This Story </button>
													</div>
													</a>			
												</div>
										<?php
											}
										?>
											<h3 class="cat-link-title"><a href="<?php echo $cat_permalink; ?>"><?php echo get_cat_name( $featured_cat4 ); ?><span class="read-more">see more</span></a></h3>

										</div>
									</div>

								<?php } ?>
									<div class="column3">
										<div class="column_inner">

										<?php 
											$featured_cat6 = $options['featured_cat6'];
											$featured_cat_link6 = $options['featured_cat_link6'];
//											$term = get_term( $featured_cat2, 'portfolio_category' );
											$posts_array = get_posts(
															array(
																'posts_per_page' => 1,
																'post_type' => 'post',
																'cat' => $featured_cat6
															)
											);
											// print_r($posts_array);
											foreach($posts_array as $post){
												$pid = $post->ID;
												$featured_img = get_the_post_thumbnail_url( $pid, 'full' );
//												$post_meta = get_post_meta($pid);
//												print_r($post_meta['viemo']);
												$custom = get_post_custom($pid); 
												$vimeo =  isset($custom["vimeo"][0]) ? $custom["vimeo"][0] : '';
												$youtube =  isset($custom["youtube"][0]) ? $custom["youtube"][0] : '';
												
												$cat_permalink = $featured_cat_link6!=""?$featured_cat_link6:get_category_link( $featured_cat6 );

										?>
												<div class="hover ehover13">
													<img class="img-responsive" src="<?php echo $featured_img;?>" alt="<?php echo get_cat_name( $featured_cat6 ); ?> : <?php echo get_the_title($pid);?>">
													<a href="<?php echo get_permalink($pid);?>" >
													<div class="overlay">
														<h2><?php echo get_the_title($pid);?></h2>
														<div class="icon icon-basic-link"></div>
														<button class="info nullbutton" data-toggle="modal" data-target="#modal12">Listen to This Story </button>
													</div>
													</a>			
												</div>
										<?php
											}
										?>
											<h3 class="cat-link-title"><a href="<?php echo $cat_permalink; ?>"><?php echo get_cat_name( $featured_cat6 ); ?><span class="read-more">Listen to Podcast</span></a></h3>

										</div>
									</div>

								</div>

							</section>

						
						<?php endif; ?>
						<?php the_content(); ?>	

							<?php if($qode_options_infographer['enable_social_share'] == "yes") { 

												$post_type = get_post_type();

												if(isset($qode_options_infographer["post_types_names_$post_type"])) {

													if($qode_options_infographer["post_types_names_$post_type"] == $post_type) {

											?>

												<div class="social-share">

													<ul>

														<?php if($qode_options_infographer['enable_facebook_share'] == "yes") { ?>

															<li>

																<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo get_the_title(); ?>&amp;p[summary]=<?php echo htmlspecialchars(get_the_excerpt()); ?>&amp;p[url]=<?php echo urlencode(get_permalink()); ?>&amp;&p[images][0]=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>', 'sharer', 'toolbar=0,status=0,width=620,height=280');" href="javascript: void(0)">

																	<?php if(!empty($qode_options_infographer['facebook_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['facebook_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_facebook_like.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Share','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

														<?php if($qode_options_infographer['enable_twitter_share'] == "yes") { ?>

															<li>

																<?php  ?>

																<a href="#" onclick="popUp=window.open('http://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via); ?>&count=horiztonal', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" target="_blank" rel="nofollow">

																	<?php if(!empty($qode_options_infographer['twitter_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['twitter_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_tweet.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Tweet','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

														<?php if($qode_options_infographer['enable_google_plus'] == "yes") { ?>

															<li>

																<a href="#" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false">

																	<?php if(!empty($qode_options_infographer['google_plus_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['google_plus_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_g_plus.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Share','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

													</ul>

												</div>

										<?php } }  }?>						

						<?php endwhile; ?>

					<?php endif; ?>

			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>		

				

				<?php if($sidebar == "1") : ?>	

					<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">

						<div class="column1">

				<?php elseif($sidebar == "2") : ?>	

					<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">

						<div class="column1">

				<?php endif; ?>

						<?php if (have_posts()) : 

							while (have_posts()) : the_post(); ?>

							<div class="column_inner">

							

							<?php the_content(); ?>

								<?php if($qode_options_infographer['enable_social_share'] == "yes") { 

												$post_type = get_post_type();

												if(isset($qode_options_infographer["post_types_names_$post_type"])) {

													if($qode_options_infographer["post_types_names_$post_type"] == $post_type) {

											?>

												<div class="social-share">

													<ul>

														<?php if($qode_options_infographer['enable_facebook_share'] == "yes") { ?>

															<li>

																<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo get_the_title(); ?>&amp;p[summary]=<?php echo htmlspecialchars(get_the_excerpt()); ?>&amp;p[url]=<?php echo urlencode(get_permalink()); ?>&amp;&p[images][0]=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>', 'sharer', 'toolbar=0,status=0,width=620,height=280');" href="javascript: void(0)">

																	<?php if(!empty($qode_options_infographer['facebook_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['facebook_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_facebook_like.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Share','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

														<?php if($qode_options_infographer['enable_twitter_share'] == "yes") { ?>

															<li>

																<?php  ?>

																<a href="#" onclick="popUp=window.open('http://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via); ?>&count=horiztonal', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" target="_blank" rel="nofollow">

																	<?php if(!empty($qode_options_infographer['twitter_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['twitter_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_tweet.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Tweet','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

														<?php if($qode_options_infographer['enable_google_plus'] == "yes") { ?>

															<li>

																<a href="#" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false">

																	<?php if(!empty($qode_options_infographer['google_plus_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['google_plus_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_g_plus.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Share','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

													</ul>

												</div>

										<?php } }  }?>

							</div>

					<?php endwhile; ?>

					<?php endif; ?>

				

								

						</div>

						<div class="column2"><?php get_sidebar();?></div>

					</div>

				<?php elseif($sidebar == "3" || $sidebar == "4"): ?>

					<?php if($sidebar == "3") : ?>	

						<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">

							<div class="column1"><?php get_sidebar();?></div>

							<div class="column2">

					<?php elseif($sidebar == "4") : ?>	

						<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">

							<div class="column1"><?php get_sidebar();?></div>

							<div class="column2">

					<?php endif; ?>

							<?php if (have_posts()) : 

								while (have_posts()) : the_post(); ?>

								<div class="column_inner">

								<?php the_content(); ?>

								<?php if($qode_options_infographer['enable_social_share'] == "yes") { 

												$post_type = get_post_type();

												if(isset($qode_options_infographer["post_types_names_$post_type"])) {

													if($qode_options_infographer["post_types_names_$post_type"] == $post_type) {

											?>

												<div class="social-share">

													<ul>

														<?php if($qode_options_infographer['enable_facebook_share'] == "yes") { ?>

															<li>

																<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo get_the_title(); ?>&amp;p[summary]=<?php echo htmlspecialchars(get_the_excerpt()); ?>&amp;p[url]=<?php echo urlencode(get_permalink()); ?>&amp;&p[images][0]=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>', 'sharer', 'toolbar=0,status=0,width=620,height=280');" href="javascript: void(0)">

																	<?php if(!empty($qode_options_infographer['facebook_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['facebook_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_facebook_like.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Share','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

														<?php if($qode_options_infographer['enable_twitter_share'] == "yes") { ?>

															<li>

																<?php  ?>

																<a href="#" onclick="popUp=window.open('http://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via); ?>&count=horiztonal', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;" target="_blank" rel="nofollow">

																	<?php if(!empty($qode_options_infographer['twitter_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['twitter_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_tweet.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Tweet','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

														<?php if($qode_options_infographer['enable_google_plus'] == "yes") { ?>

															<li>

																<a href="#" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false">

																	<?php if(!empty($qode_options_infographer['google_plus_icon'])) { ?>

																		<img src="<?php echo $qode_options_infographer['google_plus_icon']; ?>" />

																	<?php } else { ?>

																		<img src="<?php echo get_template_directory_uri(); ?>/css/img/icon_g_plus.png" title="" alt="" />

																	<?php } ?>

																	<span><?php _e('Share','qode'); ?></span>

																</a>

															</li>

														<?php } ?>

													</ul>

												</div>

										<?php } }  }?>

								</div>

						<?php endwhile; ?>

						<?php endif; ?>

					

									

							</div>

							

						</div>

				<?php endif; ?>

		</div>

	</div>

	<?php get_footer(); ?>			
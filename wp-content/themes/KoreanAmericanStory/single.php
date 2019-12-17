<?php $sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);  ?>

<?php

$blog_hide_comments = "";

if (isset($qode_options_infographer['blog_hide_comments'])) 

	$blog_hide_comments = $qode_options_infographer['blog_hide_comments'];

	

if(get_post_meta(get_the_ID(), "qode_responsive-title-image", true) != ""){

 $responsive_title_image = get_post_meta(get_the_ID(), "qode_responsive-title-image", true);

}else{

	$responsive_title_image = $qode_options_infographer['responsive_title_image'];

}



if(get_post_meta(get_the_ID(), "qode_fixed-title-image", true) != ""){

 $fixed_title_image = get_post_meta(get_the_ID(), "qode_fixed-title-image", true);

}else{

	$fixed_title_image = $qode_options_infographer['fixed_title_image'];

}



if(get_post_meta(get_the_ID(), "qode_title-image", true) != ""){

 $title_image = get_post_meta(get_the_ID(), "qode_title-image", true);

}else{

	$title_image = $qode_options_infographer['title_image'];

}



if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){

 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);

}else{

	$title_height = $qode_options_infographer['title_height'];

}



if(get_post_meta(get_the_ID(), "qode_page-title-color", true) != ""){

 $title_color = get_post_meta(get_the_ID(), "qode_page-title-color", true);

}else{

	$title_color = "";

}



if(get_post_meta(get_the_ID(), "qode_page-background-color", true) != ""){

	$background_color = get_post_meta(get_the_ID(), "qode_page-background-color", true);

}else if($qode_options_infographer['blog_background_color'] != ""){

	$background_color = $qode_options_infographer['blog_background_color'];

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

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

				<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title", true)) { ?>

					<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'background-image:url('.$title_image.'); height:'.$title_height.'px;'; }?> <?php if($background_color != "") { echo "background-color:". $background_color .";";} ?>">

						<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>

						

						<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title-text", true)) { ?>

							<?php if($title_in_grid){ ?>

							<div class="container">

								<div class="container_inner clearfix">

							<?php } ?>

							<div class="title_text" >



								<?php if(get_post_meta(get_the_ID(), "qode_page-subtitle", true)) { ?><span <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?> ><?php echo get_post_meta(get_the_ID(), "qode_page-subtitle", true) ?></span><?php } ?>

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

				$revslider = get_post_meta(get_the_ID(), "qode_revolution-slider", true);

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

						<div class="blog_single_holder">	

							<article>

								<div class="post">

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

											<?php if($blog_hide_comments != "yes"){ ?>

											

											<?php } ?>

											<?php if(isset($qode_options_infographer['back_to_previous']) &&($qode_options_infographer['back_to_previous'] == "yes")) { ?>

												<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>

									      <a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>" class="back_to_previous"><?php _e('Back','qode'); ?></a>

												<?php } ?>

											<?php } ?>

										</div>

									</div>

									<div class="post_content">

										

											<?php 

												if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {

													if ( has_post_thumbnail()) { ?>

														<div class="post_image">		

														<?php the_post_thumbnail('full'); ?>

														</div>

												<?php }

												}

												?>

											

																		

										<div class="post_text">

											<h2><?php the_title(); ?></h2>

											<?php the_content(); ?>

											<?php wp_link_pages(); ?>

											<?php if( has_tag()) { ?>

												<p class="single-tags"><?php the_tags(__('TAGS > ','qode')); ?></p>

											<?php } ?>

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

									</div>

									

								</div>

							</article>

						</div>

						

						<?php

							if($blog_hide_comments != "yes"){

								comments_template('', true); 

							}else{

								echo "<br/><br/>";

							}

						?> 

						

					<?php elseif($sidebar == "1" || $sidebar == "2"): ?>

						<?php if($sidebar == "1") : ?>	

							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">

							<div class="column1">

						<?php elseif($sidebar == "2") : ?>	

							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">

								<div class="column1">

						<?php endif; ?>

					

									<div class="column_inner">

										<div class="blog_single_holder">	

											<article>

												<div class="post">

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

															<?php if($blog_hide_comments != "yes"){ ?>

																
															<?php } ?>

															<?php if($qode_options_infographer['back_to_previous'] == "yes") { ?>

															<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>

												      <a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>" class="back_to_previous"><?php _e('Back','qode'); ?></a>

															<?php } ?>

															<?php } ?>

														</div>

													</div>

													<div class="post_content">

														



															

														<div class="post_text" style="margin-left:20px">

															<h2><?php the_title(); ?></h2>

															<?php the_content(); ?>

															<?php wp_link_pages(); ?>

															<?php if( has_tag()) { ?>

																<p class="single-tags"><?php the_tags(__('TAGS > ','qode')); ?></p>

															<?php } ?>

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

													</div>

												</div>

											</article>

										</div>

										

										<?php

											if($blog_hide_comments != "yes"){

												comments_template('', true); 

											}else{

												echo "<br/><br/>";

											}

										?> 

									</div>

								</div>	

								<div class="column2"> 

									<?php get_sidebar(); ?>

								</div>

							</div>

						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>

							<?php if($sidebar == "3") : ?>	

								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">

								<div class="column1"> 

									<?php get_sidebar(); ?>

								</div>

								<div class="column2">

							<?php elseif($sidebar == "4") : ?>	

								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">

									<div class="column1"> 

										<?php get_sidebar(); ?>

									</div>

									<div class="column2">

							<?php endif; ?>

							

										<div class="column_inner">

											<div class="blog_single_holder">	

												<article>

													<div class="post">

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

																<?php if($blog_hide_comments != "yes"){ ?>

																	

																<?php } ?>

																<?php if($qode_options_infographer['back_to_previous'] == "yes") { ?>

																<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>

													      <a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>" class="back_to_previous"><?php _e('Back','qode'); ?></a>

																<?php } ?>

																<?php } ?>

															</div>

														</div>

														<div class="post_content">

															

															<?php 

																if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {

																	if ( has_post_thumbnail()) { ?>

																		<div class="post_image">		

																		<?php the_post_thumbnail('full'); ?>

																		</div>

																<?php }

																}

																?>

																

																

														

															<div class="post_text">

																<h2><?php the_title(); ?></h2>

																<?php the_content(); ?>

																<?php wp_link_pages(); ?>

																<?php if( has_tag()) { ?>

																	<p class="single-tags"><?php the_tags(__('TAGS > ','qode')); ?></p>

																<?php } ?>

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

														</div>

													</div>

												</article>

											</div>

											

											<?php

												if($blog_hide_comments != "yes"){

													comments_template('', true); 

												}else{

													echo "<br/><br/>";

												}

											?> 

										</div>

									</div>	

									

								</div>

						<?php endif; ?>

				</div>

			</div>						

<?php endwhile; ?>

<?php endif; ?>	





<?php get_footer(); ?>	
<?php

$porftolio_single_template = get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);



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

}else if($qode_options_infographer['portfolio_background_color'] != ""){

	$background_color = $qode_options_infographer['portfolio_background_color'];

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

								<h1 <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?> ><?php the_title(); ?></h1>

								<span <?php if($title_color != ""){ echo 'style="color:'. $title_color .' !important;"'; } ?>>

								 <?php _e('Category: ','qode'); ?>

								 <?php

									$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');

									$counter = 0;

									$all = count($terms);

									foreach($terms as $term) {

										$counter++;

										if($counter < $all){ $after = ', ';}

										else{ $after = ''; }

										echo $term->name.$after;

									}

									?>

								 </span>

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

			<div class="container" style="<?php if($background_color != "") { echo "background-color:". $background_color.";";} ?> overflow:visible;">

				<div class="container_inner clearfix">

					<div class="portfolio_navigation_holder">

						<div class="portfolio_navigation">

							<div class="portfolio_prev"><?php previous_post_link('%link', __('PREVIOUS','qode')); ?></div>

							<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>

								<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>

							<?php } ?>

							<div class="portfolio_next"><?php next_post_link('%link', __('NEXT','qode')); ?></div>

						</div>

					</div>

				</div>

			</div>

			

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

				<div class="portfolio_single">

				<?php

				if($porftolio_single_template == '') :

				?>

					<?php switch ($qode_options_infographer['portfolio_style']) {

					case 1: ?>

					<div class="two_columns_75_25 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="portfolio_images">

								<?php

								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

								if ($portfolio_images){

									usort($portfolio_images, "comparePortfolioImages");

									foreach($portfolio_images as $portfolio_image){	

									?>

										

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>

												

												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

												

												<?php }else{ ?>

													

													<?php

													$portfoliovideotype = "";

													if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

													switch ($portfoliovideotype){

														case "youtube": ?>

																<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" frameborder="0" wmode="Opaque" allowfullscreen></iframe>

														<?php	break;

														case "vimeo": ?>

																<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

													<?php break;	

													} ?>

													

												<?php } ?>

										

									<?php						

									}

								}

								?>

								</div>

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_detail portfolio_single_follow">

								<?php

								$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

								if ($portfolios){

									usort($portfolios, "comparePortfolioOptions");

									foreach($portfolios as $portfolio){	

									?>

										<div class="info">

										<?php if($portfolio['optionLabel'] != ""): ?>

										<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

										<?php endif; ?>

										<p>

											<?php if($portfolio['optionUrl'] != ""): ?>

												<a href="<?php echo $portfolio['optionUrl']; ?>">

												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												</a>

											<?php else:?>

												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

											<?php endif; ?>

										</p>

										</div>

									<?php						

									}

								}

								?>

								<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

								<?php endif; ?>

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>

					

					<?php	break;

					case 2: ?>

					<div class="two_columns_66_33 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="flexslider">

									<ul class="slides">

										<?php

										$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

										if ($portfolio_images){

											usort($portfolio_images, "comparePortfolioImages");

											foreach($portfolio_images as $portfolio_image){	

											?>

												<?php if($portfolio_image['portfolioimg'] != ""){ ?>

												<li class="slide">

														<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

												</li>

												<?php }else{ ?>

													

													<?php

													$portfoliovideotype = "";

													if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

													switch ($portfoliovideotype){

														case "youtube": ?>

															<li class="slide">

																<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

															</li>

														<?php	break;

														case "vimeo": ?>

															<li class="slide">

																<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

															</li>

															

													<?php break;	

													} ?>

													

												<?php } ?>

											<?php						

											}

										}

										?>

									</ul>

								</div>

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_detail">

									<?php

									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

									if ($portfolios){

										usort($portfolios, "comparePortfolioOptions");

										foreach($portfolios as $portfolio){	

										

										?>

											<div class="info">

											<?php if($portfolio['optionLabel'] != ""): ?>

											<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

											<?php endif; ?>

											<p>

												<?php if($portfolio['optionUrl'] != ""): ?>

													<a href="<?php echo $portfolio['optionUrl']; ?>">

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

													</a>

												<?php else:?>

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												<?php endif; ?>

											</p>

											</div>

										<?php						

										}

									}

									?>

									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

									<?php endif; ?>

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>

					

					<?php	break;

					case 3: ?>

					<div class="flexslider">

						<ul class="slides">

							<?php

							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

							if ($portfolio_images){

								foreach($portfolio_images as $portfolio_image){

								usort($portfolio_images, "comparePortfolioImages");

								?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>

									<li class="slide">

											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

									</li>

									<?php }else{ ?>

										

										<?php

										$portfoliovideotype = "";

										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

										switch ($portfoliovideotype){

											case "youtube": ?>

												<li class="slide">

													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

												</li>

											<?php	break;

											case "vimeo": ?>

												<li class="slide">

													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

												</li>

												

										<?php break;	

										} ?>

										

									<?php } ?>

								<?php						

								}

							}

							?>

						</ul>

					</div>

					<div class="two_columns_33_66 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="portfolio_detail portfolio_single_follow">

									<?php

									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

									if ($portfolios){

										usort($portfolios, "comparePortfolioOptions");

										foreach($portfolios as $portfolio){	

										?>

											<div class="info">

											<?php if($portfolio['optionLabel'] != ""): ?>

											<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

											<?php endif; ?>

											<p>

												<?php if($portfolio['optionUrl'] != ""): ?>

													<a href="<?php echo $portfolio['optionUrl']; ?>">

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

													</a>

												<?php else:?>

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												<?php endif; ?>

											</p>

											</div>

										<?php						

										}

									}

									?>

									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

									<?php endif; ?>

								</div>

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_single_text_holder">

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>

					

					<?php	break;

					case 4: ?>

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

						

					<?php	break;

					case 5: ?>

						<div class="portfolio_images">

							<?php

							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

							if ($portfolio_images){

								usort($portfolio_images, "comparePortfolioImages");

								foreach($portfolio_images as $portfolio_image){	

								?>

									

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>

										<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

									<?php }else{ ?>

										

										<?php

										$portfoliovideotype = "";

										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

										switch ($portfoliovideotype){

											case "youtube": ?>

												

													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

												

											<?php	break;

											case "vimeo": ?>

												

													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

												

												

										<?php break;	

										} ?>

										

									<?php } ?>

									

								<?php						

								}

							}

							?>

							</div>

							<div class="two_columns_33_66 clearfix portfolio_container">

								<div class="column1">

									<div class="column_inner">

										<div class="portfolio_detail portfolio_single_follow">

											<?php

											$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

											if ($portfolios){

												usort($portfolios, "comparePortfolioOptions");

												foreach($portfolios as $portfolio){	

												?>

													<div class="info">

													<?php if($portfolio['optionLabel'] != ""): ?>

													<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

													<?php endif; ?>

													<p>

														<?php if($portfolio['optionUrl'] != ""): ?>

															<a href="<?php echo $portfolio['optionUrl']; ?>">

															<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

															</a>

														<?php else:?>

															<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

														<?php endif; ?>

													</p>

													</div>

												<?php						

												}

											}

											?>

											<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

											<div class="info">

												<h4><?php _e('Date','qode'); ?></h4>

												<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

											</div>

											<?php endif; ?>

										</div>

									</div>

								</div>

								<div class="column2">

									<div class="column_inner">

										<div class="portfolio_single_text_holder">

											<h4><?php echo _e('About','qode'); ?></h4>

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

									</div>

								</div>

							</div>

					<?php	break;

					}			

					?>

				<?php elseif($porftolio_single_template == "1"): ?>

					<div class="two_columns_75_25 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="portfolio_images">

								<?php

								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

								if ($portfolio_images){

									usort($portfolio_images, "comparePortfolioImages");

									foreach($portfolio_images as $portfolio_image){	

									?>

										

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>

											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

										<?php }else{ ?>

											

											<?php

											$portfoliovideotype = "";

											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

											switch ($portfoliovideotype){

												case "youtube": ?>

													

														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

													

												<?php	break;

												case "vimeo": ?>

													

														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

													

													

											<?php break;	

											} ?>

											

										<?php } ?>

										

									<?php						

									}

								}

								?>

								</div>

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_detail portfolio_single_follow">

								<?php

								$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

								if ($portfolios){

									usort($portfolios, "comparePortfolioOptions");

									foreach($portfolios as $portfolio){	

									?>

										<div class="info">

										<?php if($portfolio['optionLabel'] != ""): ?>

										<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

										<?php endif; ?>

										<p>

											<?php if($portfolio['optionUrl'] != ""): ?>

												<a href="<?php echo $portfolio['optionUrl']; ?>">

												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												</a>

											<?php else:?>

												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

											<?php endif; ?>

										</p>

										</div>

									<?php						

									}

								}

								?>

								<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

								<?php endif; ?>

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>

					

				<?php elseif($porftolio_single_template == "2"): ?>

					

					<div class="two_columns_66_33 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="flexslider">

									<ul class="slides">

										<?php

										$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

										if ($portfolio_images){

											usort($portfolio_images, "comparePortfolioImages");

											foreach($portfolio_images as $portfolio_image){	

											?>

												<?php if($portfolio_image['portfolioimg'] != ""){ ?>

												<li class="slide">

														<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

												</li>

												<?php }else{ ?>

													

													<?php

													$portfoliovideotype = "";

													if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

													switch ($portfoliovideotype){

														case "youtube": ?>

															<li class="slide">

																<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

															</li>

														<?php	break;

														case "vimeo": ?>

															<li class="slide">

																<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

															</li>

															

													<?php break;	

													} ?>

													

												<?php } ?>

											<?php						

											}

										}

										?>

									</ul>

								</div>

								

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_detail">

									<?php

									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

									if ($portfolios){

										usort($portfolios, "comparePortfolioOptions");

										foreach($portfolios as $portfolio){	

										?>

											<div class="info">

											<?php if($portfolio['optionLabel'] != ""): ?>

											<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

											<?php endif; ?>

											<p>

												<?php if($portfolio['optionUrl'] != ""): ?>

													<a href="<?php echo $portfolio['optionUrl']; ?>">

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

													</a>

												<?php else:?>

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												<?php endif; ?>

											</p>

											</div>

										<?php						

										}

									}

									?>

									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4 class="label"><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

									<?php endif; ?>

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>

					

				<?php elseif($porftolio_single_template == "3"): ?>

					

					<div class="flexslider">

						<ul class="slides">

							<?php

							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

							if ($portfolio_images){

								usort($portfolio_images, "comparePortfolioImages");

								foreach($portfolio_images as $portfolio_image){	

								?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>

									<li class="slide">

											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

									</li>

									<?php }else{ ?>

										

										<?php

										$portfoliovideotype = "";

										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

										switch ($portfoliovideotype){

											case "youtube": ?>

												<li class="slide">

													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

												</li>

											<?php	break;

											case "vimeo": ?>

												<li class="slide">

													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

												</li>

												

										<?php break;	

										} ?>

										

									<?php } ?>

								<?php						

								}

							}

							?>

						</ul>

					</div>

					<div class="two_columns_33_66 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="portfolio_detail">

									<?php

									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

									if ($portfolios){

										usort($portfolios, "comparePortfolioOptions");

										foreach($portfolios as $portfolio){	

										?>

											<div class="info">

											<?php if($portfolio['optionLabel'] != ""): ?>

											<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

											<?php endif; ?>

											<p>

												<?php if($portfolio['optionUrl'] != ""): ?>

													<a href="<?php echo $portfolio['optionUrl']; ?>">

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

													</a>

												<?php else:?>

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												<?php endif; ?>

											</p>

											</div>

										<?php						

										}

									}

									?>

									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

									<?php endif; ?>

								</div>

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_single_text_holder">

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>



				<?php elseif($porftolio_single_template == "4"): ?>

					

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

					

				<?php elseif($porftolio_single_template == "5"): ?>

					

					<div class="portfolio_images">

					<?php

					$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);

					if ($portfolio_images){

						usort($portfolio_images, "comparePortfolioImages");

						foreach($portfolio_images as $portfolio_image){	

						?>

							

							<?php if($portfolio_image['portfolioimg'] != ""){ ?>

								<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />

							<?php }else{ ?>

								

								<?php

								$portfoliovideotype = "";

								if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];

								switch ($portfoliovideotype){

									case "youtube": ?>

										

											<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>

										

									<?php	break;

									case "vimeo": ?>

										

											<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>

										

										

								<?php break;	

								} ?>

								

							<?php } ?>

							

						<?php						

						}

					}

					?>

					</div>

					<div class="two_columns_33_66 clearfix portfolio_container">

						<div class="column1">

							<div class="column_inner">

								<div class="portfolio_detail">

									<?php

									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);

									if ($portfolios){

										usort($portfolios, "comparePortfolioOptions");

										foreach($portfolios as $portfolio){	

										?>

											<div class="info">

											<?php if($portfolio['optionLabel'] != ""): ?>

											<h4><?php echo stripslashes($portfolio['optionLabel']); ?></h4>

											<?php endif; ?>

											<p>

												<?php if($portfolio['optionUrl'] != ""): ?>

													<a href="<?php echo $portfolio['optionUrl']; ?>">

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

													</a>

												<?php else:?>

													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>

												<?php endif; ?>

											</p>

											</div>

										<?php						

										}

									}

									?>

									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>

									<div class="info">

										<h4><?php _e('Date','qode'); ?></h4>

										<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>

									</div>

									<?php endif; ?>

								</div>

							</div>

						</div>

						<div class="column2">

							<div class="column_inner">

								<div class="portfolio_single_text_holder">

									<h4><?php echo _e('About','qode'); ?></h4>

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

							</div>

						</div>

					</div>

					

				<?php endif; ?>

			<?php endwhile; ?>

		<?php endif; ?>	
        
            <div class="relatedposts">  
    <h3></h3>  
    <?php  
        $orig_post = $post;  
        global $post;  
        $tags = wp_get_post_tags($post->ID);  
          
        if ($tags) {  
        $tag_ids = array();  
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
        $args=array(  
        'tag__in' => $tag_ids,  
        'post__not_in' => array($post->ID),  
        'posts_per_page'=>3, // Number of related posts to display.  
        'caller_get_posts'=>1  
        );  
          
        $my_query = new wp_query( $args );  
      
        while( $my_query->have_posts() ) {  
        $my_query->the_post();  
        ?>  
          
        <div class="relatedthumb">  
            <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(array(150,100)); ?><br />  
            <?php the_title(); ?>  
            </a>  
        </div>  
          
        <? }  
        }  
        $post = $orig_post;  
        wp_reset_query();  
        ?>  
    	</div>  

		</div>

	</div>

</div>

<?php get_footer(); ?>	
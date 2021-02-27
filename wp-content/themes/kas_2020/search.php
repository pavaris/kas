<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package theme-name
 */

get_header();

global $wp_query;

?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main top-padding">

			<div class="content-margins ">
			<?php if ( have_posts() ) : ?>
				<?php 
					$typeArr = ['event' => 0, 'podcast' => 0, 'written' => 0, 'video' => 0, 'page' => 0, 'post' => 0];
					foreach($wp_query->posts as $post){
						$typeArr[get_post_type($post)]++;
					}
				?>

				
				<div class="center">
					<h1>Results for <em><?php echo get_search_query(); ?></em></h1>
				</div>
				<div class="search-results-container">
					<section class="search-filter">
						<h3>Filters</h3>

						<div class="filter-container">
							<a href="#" type='all' class='active'>All</a>
							<?php foreach($typeArr as $key=>$type){ 
								if($key !== 'page' && $key !== 'post' && $type > 0){
								?>
								<a href="#" type="<?php echo $key; ?>"><?php echo $key; ?> <span><?php echo $type; ?></span></a>
							<?php }
									} ?>
						</div>
						
					</section>
					<section class="search-results-cont">
						<div class="search-input">
							<div class="search-input-bar">
								<div class="mobile filter-dropdown">
									<div class="filter-container">
									<h3>Filters</h3>
									<a href="#" type='all' class='active'>All</a>
									<?php foreach($typeArr as $key=>$type){ 
										if($key !== 'page' && $key !== 'post' && $type > 0){
										?>
										<a href="#" type="<?php echo $key; ?>"><?php echo $key; ?> <span><?php echo $type; ?></span></a>
									<?php }
											} ?>
								</div>
								</div>
								<button class="mobile filter">
									<img src="<?php echo get_template_directory_uri(); ?>/img/filter.svg" alt="Filter">
								</button>
								<form role="search" method="get" class="search-form" action="<?php echo get_home_url( ); ?>">
									<label>
										<span class="screen-reader-text">Search for</span>
										<input type="search" class="search-field" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s">
									</label>
									<button type='submit'>
										<?php include get_template_directory() . '/img/search.svg'; ?>
									</button>
								</form>
							</div>
							<p>Wow! <?php echo $wp_query->found_posts; ?> Results for <em><?php echo get_search_query(); ?></em> found</p>
						</div>
						<section class="results-container">
							<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
			
									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									?> 
									<a href="<?php the_permalink(); ?>">
										
										<div class="search-result-img">
											<?php the_post_thumbnail(); ?>
										</div>	
										
										
										<div class="search-result-desc">
											<h5>
												<?php the_title(); ?>
											</h5>
											<p class="result-category">
												<?php $type = get_post_type(get_the_ID()); ?>
												 <?php if($type != 'page') { ?>
													<?php if(!is_wp_error(get_the_terms(get_the_ID(), $type . "_type"))){ ?>
													<?php echo get_the_terms(get_the_ID(), $type . "_type")[0]->name; ?> | <span><?php echo $type; ?></span>
													<?php } ?>
													<?php } ?>
											</p>
											<div class="short-desc">
												<?php echo get_field('short_description'); ?>
											</div>
										</div>
									</a>
									<?php 
			
								endwhile;
	
							?> 
						</section>
						
						</section>
					</div>

				
	<?php 					
					else :
						?> 
						<div class="center">
							<h1>No results for <em><?php echo get_search_query(); ?></em></h1>
							<div class="no-results">
								<div class="search-input">
									<form role="search" method="get" class="search-form" action="<?php echo get_home_url( ); ?>">
										<label>
											<span class="screen-reader-text">Search for:</span>
											<input type="search" class="search-field" placeholder="Search again" value="" name="s">
										</label>
										<input type="submit" class="search-submit button filled" value="Search">
									</form>
								</div>
							</div>
						</div>
						

						
						
						<?php 
					endif;
				?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

	<script>

		fetch(
			`<?php echo get_home_url(); ?>/wp-json/search/<?php echo rawurlencode(get_search_query()); ?>/`
		)
			.then((response) => response.json())
			.then((data) => {
				window.kas_searchResults = JSON.parse(data);
			});

				jQuery('.filter-container a').click(function(e){
					e.preventDefault();
					jQuery('html, body').animate({
						scrollTop: 0
					}, 500);
					jQuery('.filter-dropdown').slideUp();
					var $this = jQuery(this);
					$this.parent().find('a').removeClass('active');
					$this.addClass('active');
					var type = jQuery(this).attr('type');
					if(type !== 'all'){
						var filteredArr = window.kas_searchResults.posts.filter(function(e){ return e.type == type});
						console.log(filteredArr);
						jQuery('.results-container').html('');
						
						filteredArr.forEach(function(e){
							var elem = `
							<a href="${e.url}">
							<div class="search-result-img">
							<img src="${e.image}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" />
							</div>
							<div class="search-result-desc">
							<h5>${e.title}</h5>${e.tax_string !== '' ? "<p class='result-category'>" + e.tax_string + "</p>" : ''}
							<div class="short-desc">
							${e.desc !== null ? e.desc : ''}</div>
							</div>
							</a>
							`;
							jQuery('.results-container').append(elem);
						});
					}else{
						jQuery('.results-container').html('');
						window.kas_searchResults.posts.forEach(function(e){
							var elem = `
							<a href="${e.url}">
							<div class="search-result-img">
							<img src="${e.image}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" />
							</div>
							<div class="search-result-desc">
							<h5>${e.title}</h5>${e.tax_string !== '' ? "<p class='result-category'>" + e.tax_string + "</p>" : ''}
							<div class="short-desc">
							${e.desc !== null ? e.desc : ''}</div>
							</div>
							</a>
							`;
							jQuery('.results-container').append(elem);
						});
					}
					



				})		

		
	</script>
<?php

get_footer();

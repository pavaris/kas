<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-name
 */

get_header();
$thisType = get_queried_object(  );
$terms = get_terms( array(
    'taxonomy' => $thisType->name . '_type',
) );
$exclude = [];

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header archive-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header><!-- .page-header -->

<div class="written-feeds">
	
				<?php 
					$args = array(
							'post_type' => $thisType->name, 
							'posts_per_page' => 3,
							); 
					$recent = new WP_Query($args);			
				?>
	
				<?php if($recent->have_posts()){ ?>
					<section class="written-feed">
						<div class="content-margins wide">
							<h5>Recent</h5>
							<div class="written-feed-posts posts-feed">
								<?php foreach($recent->posts as $post){
												$label = '';
									$postTerm = get_the_terms($post, $thisType->name. '_type');
									if($postTerm){
										$label = $postTerm[0]->name;
									}
									postStruct($post->ID, $label);
									array_push($exclude, $post->ID);
								} ?>
							</div>
						</div>
					</section>
				<?php } ?>

				<?php wp_reset_postdata(); ?>



				<?php foreach($terms as $term){ ?> 
					<?php 
						$posts = get_posts(array('numberposts' => 3, 'post_type' => $thisType->name, 
						'exclude' => $exclude,
						'tax_query' => array(
							array(
									'taxonomy' => $thisType->name . '_type',
									'field'    => 'slug',
									'terms'    => $term->slug,
							)
							))); 
						?> 
					<section class="written-feed">
						<div class="content-margins wide">
							<h5><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></h5>
							<div class="written-feed-posts posts-feed">
								<?php foreach($posts as $post){
									postStruct($post->ID);
								} ?>
							</div>
						</div>
					</section>


				<?php } ?>


</div>


					
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

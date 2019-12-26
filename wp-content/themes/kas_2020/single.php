<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme-name
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="content-margins">
				<article class="">
					<?php
					while ( have_posts() ) :
						the_post();
					?>
						<section class="article-header">
							<?php $tags = get_the_tags(get_the_ID()); ?>
							<?php if($tags){
								?>
								<div class="article-tag">
									<?php echo $tags[0]->name; ?>
								</div>
								<?php
							} ?>
							<h1><?php the_title(); ?></h1>
							<h4><?php the_date('F m, Y'); ?></h4>
						</section>
						<section>
							<?php the_content(); ?>
						</section>
					<?php
					endwhile; // End of the loop.
					?>
				</article>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();

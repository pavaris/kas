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
	foreach ($posts->posts as $key => $value) {
		?>

		<?php
	}
 ?>

<?php
get_footer();



?>



<?php

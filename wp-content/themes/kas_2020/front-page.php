<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
 						<section id="page-header">

             </section>
<?php
  $args = ['post_type' => 'post', 'posts_per_page' => 3];
  $latestPosts = new WP_Query($args);
?>
             <section class="posts-feed">
               <?php postBlockFeed($latestPosts->posts); ?>
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

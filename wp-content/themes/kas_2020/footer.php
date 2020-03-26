<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
			<div class="site-info">
				<div class="content-margins wide">
					<div class="footer-col-left">
						<?php echo get_custom_logo(); ?>
						<div class="footer-social">
							<?php include get_template_directory() . '/components/social-nav.php'; ?>
						</div>	
						<div class="footer-mobile-donate">
							<a href="<?php echo get_home_url(); ?>/about/support-us" class='donate-button'>Donate</a>
						</div>
					</div>
					
					<div class="footer-menu">
						<?php wp_nav_menu(['menu' => 'Header Menu']); ?>
					</div>
					
					<div class="footer-donate">
						<a href="<?php echo get_home_url(); ?>/about/support-us" class='donate-button'>Donate</a>
					</div>
				</div>
			</div><!-- .site-info -->
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

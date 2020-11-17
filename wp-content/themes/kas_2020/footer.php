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
<div id="guest-popup">
	<div class="guest-close">×</div>
	<div class="content-margins narrow">
		<div class="flex">
			<div class="guestpop-name"></div><span>|</span>
			<div class="guestpop-type">

			</div>
		</div>
		<div class="guest-description"></div>
	</div>
</div>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
			<div class="site-info">
				<div class="content-margins wide">
					<div class="footer-col-left">
						<a href="<?php echo home_url(); ?>" class='custom-logo-link'><img src="<?php echo get_template_directory_uri( ) ?>/img/logo.jpg" alt="Korean American Story"></a>
						<div class="footer-social">
							<?php include get_template_directory() . '/components/social-nav.php'; ?>
						</div>	
						<div class="footer-donate">
							<a href="<?php echo get_home_url(); ?>/donate" class='button'>Donate</a>
						</div>
					</div>
					
					<div class="footer-menu">
						<?php wp_nav_menu(['menu' => 'Header Menu']); ?>
					</div>
					
					
				</div>
			</div><!-- .site-info -->
			
	</footer><!-- #colophon -->
</div><!-- #page -->
	<script src="<?php echo get_template_directory_uri() . '/js/superembed.min.js' ?>"></script>

<?php wp_footer(); ?>

</body>
</html>

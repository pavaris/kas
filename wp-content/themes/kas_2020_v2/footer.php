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
		<div class="content-margins">
			<div class="site-info">
				<?php echo get_custom_logo(); ?>
				<div class="footer-address">
					<?php echo get_field('address', 'options'); ?>
				</div>
				<div class="footer-menu">
					<?php wp_nav_menu(['menu' => 'Footer Menu']); ?>
				</div>
				<div class="footer-social">
					<?php include get_template_directory() . '/components/social-nav.php'; ?>
				</div>
			</div><!-- .site-info --></div>

		<div class="footer-copyright">
			<?php echo get_field('copyright', 'options'); ?>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

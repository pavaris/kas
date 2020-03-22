<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/eay4akt.css"> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theme-name' ); ?></a>

	<header id="masthead" class="site-header">

			<div class="site-branding">
				<?php echo get_custom_logo(); ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<div class="site-nav-top">
					<div class="nav-search">
						<?php get_search_form();?>
					</div>
					<div class="nav-social">
						<?php include get_template_directory() . '/components/social-nav.php'; ?>
					</div>
				</div>	
				<div class="site-nav-bottom">
					<div class="nav-links">
						<?php wp_nav_menu(['menu' => 'Header Menu']); ?>
						<a href="<?php echo get_home_url(); ?>/about/support-us" class='donate-button'>Donate</a>
					</div>
				</div>
				
				
			</nav><!-- #site-navigation -->


	</header><!-- #masthead -->

	<div id="content" class="site-content">

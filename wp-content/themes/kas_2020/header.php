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
	<script src="<?php echo get_template_directory_uri() . '/js/superembed.min.js' ?>"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theme-name' ); ?></a>

	<header id="masthead" class="site-header">

			<nav id="site-navigation" class="main-navigation">
				<div class="main-nav-inner">
					<div class="site-branding">
						<?php echo get_custom_logo(); ?>
					</div><!-- .site-branding -->
					
							<?php wp_nav_menu(['menu' => 'Header Menu']); ?>
					
					<div class="donate-search">
						<a href="<?php echo get_home_url(); ?>/donate" class='donate-button button'>Donate</a>
						
						<button class="search-toggle">
							<img src="<?php echo get_template_directory_uri(); ?>/img/search.svg" alt="search">
						</button>
					</div>
				</div>
			
			</nav><!-- #site-navigation -->



			<div class="nav-search">
				<div class="nav-search-close">
					<button>×</button>
				</div>
				<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
				<label>
					<span class="screen-reader-text">Search</span>
					<input type="search" class="search-field" placeholder="type here" value="" name="s">
				</label>
				<input type="submit" class="search-submit" value="Search">
			</form>
			</div>



			<nav id="mobile-nav">
				<div id="mobile-header">
					<a href="<?php echo site_url(); ?>" class="mobile-home"><span>KoreanAmerican</span>story.org</a>
					<button id="mobile-ham">
						<?php include get_template_directory() . '/img/hamburger.svg'; ?>
					</button>
				</div>	
				<div id="mobile-nav-links">
					<?php wp_nav_menu(['menu' => 'Header Menu']); ?>
					<a href="<?php echo get_home_url(); ?>/about/support-us" class='donate-button'>Donate</a>
					<?php include get_template_directory() . '/components/social-nav.php'; ?>

				</div>
			</nav>


	</header><!-- #masthead -->

	<div id="content" class="site-content">

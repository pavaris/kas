<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<?php 

global $qode_options_infographer;

global $wp_query;

$disable_qode_seo = "";

$seo_title = "";

if (isset($qode_options_infographer['disable_qode_seo'])) $disable_qode_seo = $qode_options_infographer['disable_qode_seo'];

if ($disable_qode_seo != "yes") {

	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);

	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);

	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);

}

?>



<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<?php

	$responsiveness = "yes";

	if (isset($qode_options_infographer['responsiveness'])) $responsiveness = $qode_options_infographer['responsiveness'];

	if($responsiveness != "no"):

	?>

	<meta name=viewport content="width=device-width,initial-scale=1">

	<?php 

	endif;

	?>

	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?>  <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?>  <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>

	<?php if ($disable_qode_seo != "yes") { ?>

	<?php if($seo_description) { ?>

	<meta name="description" content="<?php echo $seo_description; ?>">

	<?php } else if($qode_options_infographer['meta_description']){ ?>

	<meta name="description" content="<?php echo $qode_options_infographer['meta_description'] ?>">

	<?php } ?>

	<?php if($seo_keywords) { ?>

	<meta name="keywords" content="<?php echo $seo_keywords; ?>">

	<?php } else if($qode_options_infographer['meta_keywords']){ ?>

	<meta name="keywords" content="<?php echo $qode_options_infographer['meta_keywords'] ?>">

	<?php } ?>

	<?php } ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_infographer['favicon_image']; ?>">

	<?php wp_head(); ?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1390586354582143');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1390586354582143&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71281251-1', 'auto');
  ga('send', 'pageview');

</script>	
<meta name="google-site-verification" content="shy5y0yaAr_uZr_8aHuNo_wRd7_b32ezfXMGpALxS-4" />
</head>



<body <?php body_class(); ?>>

	<?php include_once("analyticstracking.php") ?>

	<!-- Google Analytics start -->

	<?php if (isset($qode_options_infographer['google_analytics_code'])){

				if($qode_options_infographer['google_analytics_code'] != "") { 

	?>

		<script>

			var _gaq = _gaq || [];

			_gaq.push(['_setAccount', '<?php echo $qode_options_infographer['google_analytics_code']; ?>']);

			_gaq.push(['_trackPageview']);



			(function() {

				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

			})();

		</script>
        


	<?php }

		}

	?>

	<!-- Google Analytics end -->



<?php

	$header_in_grid = false;

	if ($qode_options_infographer['header_in_grid'] == "yes") $header_in_grid = true;

	

	$header_hide = false;

	if ($qode_options_infographer['header_hide'] == "yes") $header_hide = true;

	

	$menu_position = "left";

	if ($qode_options_infographer['menu_position'] == "right") $menu_position = "right";

	

	

	if($qode_options_infographer['menu_lineheight'] != ""){

		$line_height = $qode_options_infographer['menu_lineheight'];

	}else{

		$line_height = 80;

	}

?>

<div class="wrapper">

<?php if(!$header_hide){ ?>

<header <?php if(isset($qode_options_infographer['header_fixed']) && $qode_options_infographer['header_fixed'] == "no"){ echo "class='no_fixed'"; } ?>>

	<div class="header_outer">

		<?php if($header_in_grid){ ?>

			<div class="container">

				<div class="container_inner clearfix">

		<?php } ?>

				<div class="header_inner clearfix">

					<div class="logo" style="height:<?php echo $line_height?>px;"><a href="<?php echo home_url(); ?>/"><img src="<?php echo $qode_options_infographer['logo_image']; ?>" alt="Logo"/></a></div>

					

						<nav class="main_menu drop_down <?php echo $menu_position; ?>">

						<?php

								wp_nav_menu( array( 'theme_location' => 'top-navigation' , 

																		'container'  => '', 

																		'container_class' => '', 

																		'menu_class' => 'clearfix', 

																		'menu_id' => '',

																		'fallback_cb' => 'top_navigation_fallback',

																		'walker' => new qode_type1_walker_nav_menu()

							 ));

						?>

						

						</nav>

						

						<div class='selectnav_button'><span>&nbsp;</span></div>

						

						<?php	

						$display_header_widget = $qode_options_infographer['header_widget_area'];

						if($display_header_widget == "yes"){ ?> 

							<div class="header_right_widget" style="float:right;">

								<?php dynamic_sidebar('header_right'); ?>
                                
    
							</div>
     


						<?php } ?>

						

					



					<nav class="selectnav"></nav>

					

				</div>

			

			

		<?php if($header_in_grid){ ?>

				</div>

			</div>

		<?php } ?>

		

		

	</div>

</header>

<?php } ?>

	<div class="content">

		<?php 

global $wp_query;

$id = $wp_query->get_queried_object_id();

$animation = get_post_meta($id, "qode_show-animation", true);

if (!empty($_SESSION['qode_animation']) && $animation == "")

	$animation = $_SESSION['qode_animation'];



?>

			<?php if($qode_options_infographer['page_transitions'] == "1" || $qode_options_infographer['page_transitions'] == "2" || $qode_options_infographer['page_transitions'] == "3" || $qode_options_infographer['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>

				<div class="meta">				

					<?php if($seo_title){ ?>

						<div class="seo_title"><?php bloginfo('name'); ?>  <?php echo $seo_title; ?></div>

					<?php } else{ ?>

						<div class="seo_title"><?php bloginfo('name'); ?>  <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>

					<?php } ?>

					<?php if($seo_description){ ?>

						<div class="seo_description"><?php echo $seo_description; ?></div>

					<?php } else if($qode_options_infographer['meta_description']){?>

						<div class="seo_description"><?php echo $qode_options_infographer['meta_description']; ?></div>

					<?php } ?>

					<?php if($seo_keywords){ ?>

						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>

					<?php }else if($qode_options_infographer['meta_keywords']){?>

						<div class="seo_keywords"><?php echo $qode_options_infographer['meta_keywords']; ?></div>

					<?php }?>

					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>

					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>

				</div>

			<?php } ?>

			<div class="content_inner <?php echo $animation;?> ">

				

			
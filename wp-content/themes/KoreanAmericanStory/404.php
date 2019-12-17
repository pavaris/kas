<?php 
global $qode_options_infographer; 

global $wp_query;
$id = $wp_query->get_queried_object_id();

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_infographer['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_infographer['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_infographer['title_image'];
}

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_infographer['title_height'];
}

if(get_post_meta($id, "qode_page-title-color", true) != ""){
 $title_color = get_post_meta($id, "qode_page-title-color", true);
}

$title_in_grid = false;
if(isset($qode_options_infographer['title_in_grid'])){
if ($qode_options_infographer['title_in_grid'] == "yes") $title_in_grid = true;
}

?>	

<?php get_header(); ?>
			<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
				<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				
				
					<?php if($title_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
					<?php } ?>
					<div class="title_text" >
						<h1><?php if($qode_options_infographer['404_title'] != ""){ echo $qode_options_infographer['404_title'];} else{  _e('404', 'qode'); } ?></h1>
						<span><?php if($qode_options_infographer['404_subtitle'] != ""){ echo $qode_options_infographer['404_subtitle'];} else{_e('Something went wrong', 'qode');} ?></span>
					</div>
					<?php if($title_in_grid){ ?>
						</div>
					</div>
					<?php } ?>
				
			</div>
			<div class="container">
				<div class="container_inner clearfix">
					<div class="page_not_found">
						<h2><?php if($qode_options_infographer['404_text'] != ""): echo $qode_options_infographer['404_text']; else: ?> <?php _e('Page not found', 'qode'); ?> <?php endif;?></h2>
						<p><a href="<?php echo home_url(); ?>/"><?php if($qode_options_infographer['404_backlabel'] != ""): echo $qode_options_infographer['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	
<?php
/* Meta boxes */

function idesign_add_metabox_settings(){
	add_meta_box("idesign_post_meta", "Custom Post Meta", "post_display_options", "post", "normal", "high");
}
add_action("admin_init", "idesign_add_metabox_settings");


function page_display_options($callback_args) {
	global $post;

	$thumbs = array();
	$custom = get_post_custom($post->ID);
	
	$custom_title1 =  isset($custom["custom_title1"][0]) ? $custom["custom_title1"][0] : '';
	$custom_title2 =  isset($custom["custom_title2"][0]) ? $custom["custom_title2"][0] : '';
	$subline =  isset($custom["subline"][0]) ? $custom["subline"][0] : '';
	$pf_catid =  isset($custom["pf_catid"][0]) ? $custom["pf_catid"][0] : '';
	$icon_name =  isset($custom["icon_name"][0]) ? $custom["icon_name"][0] : '';
	$custom_link =  isset($custom["custom_link"][0]) ? $custom["custom_link"][0] : '';
	$featured_image = isset($custom["featured_image"][0]) ? $custom["featured_image"][0] : '';
	?>	

	<p style="margin-bottom: 22px;">
		<label for="custom_title1">Custom Line 1:</label><br/>
		<input name="custom_title1" id="custom_title1" type="text" value="<?php echo esc_attr($custom_title1); ?>" size="90" />
		<br /><small>(Custom Title Line 1 for About Items)</small>
	</p>
<!--
	<p style="margin-bottom: 22px;">
		<label for="custom_title2">Custom Line 2:</label><br/>
		<input name="custom_title2" id="custom_title2" type="text" value="<?php echo esc_attr($custom_title2); ?>" size="90" />
		<br /><small>(Custom Title Line 2 for About Items)</small>
	</p>
-->
	<p style="margin-bottom: 22px;">
		<label for="subline">Subline: </label><br/>
		<textarea id="subline" name="subline" style="width: 90%"><?php echo esc_textarea($subline); ?></textarea><br/>
		<small>(used under title)</small>
	</p>
	
	<p style="margin-bottom: 22px;">
		<label for="icon_name">Icon Name:</label><br/>
		<input name="icon_name" id="icon_name" type="text" value="<?php echo esc_attr($icon_name); ?>" size="90" />
		<br /><small>(find it on font-awesome list)</small>
	</p>

	<p style="margin-bottom: 22px;">
		<label for="pf_catid">Post Category ID:</label><br/>
		<input name="pf_catid" id="pf_catid" type="text" value="<?php echo esc_attr($pf_catid); ?>" size="90" />
		<br /><small>(If this contains portfolio, type in the category id)</small>
	</p>

	<?php
}

function post_display_options($callback_args) {
	global $post;

	$thumbs = array();
	$custom = get_post_custom($post->ID);
	
	$description = isset($custom["description"][0]) ? $custom["description"][0] : '';
	$custom_date   = isset($custom["custom_date"][0]) ? $custom["custom_date"][0] : '';
	$vimeo     = isset($custom["vimeo"][0]) ? $custom["vimeo"][0] : '';
	$youtube     = isset($custom["youtube"][0]) ? $custom["youtube"][0] : '';
	?>	

	<p style="margin-bottom: 22px;">
		<label for="custom_date">Custom Date</label><br/>
		<input name="custom_date" id="custom_date" type="text" value="<?php echo esc_attr($custom_date); ?>" size="90%" />
		<br /><small>(Custom date will be displayed ex. 18 November 2014, 11:50 AM)</small>
	</p>
	
	<p style="margin-bottom: 22px;">
		<label for="vimeo">Vimeo Link: </label><br/>
		<input id="vimeo" type="text" size="90%" name="vimeo" value="<?php echo esc_attr($vimeo); ?>" />
		<small>(enter an Vimeo URL )</small>
	</p>
	
	<p style="margin-bottom: 22px;">
		<label for="youtube">YouTube Link: </label><br/>
		<input id="youtube" type="text" size="90%" name="youtube" value="<?php echo esc_attr($youtube); ?>" />
		<small>(enter an YouTube URL )</small>
	</p>
	
	<?php
}



function post_save_details($post_id){
	global $pagenow;
	if ( 'post.php' != $pagenow ) return $post_id;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;

	if (isset($_POST["custom_date"])) update_post_meta($post_id, "custom_date", esc_attr($_POST["custom_date"]));
	if (isset($_POST["vimeo"])) update_post_meta($post_id, "vimeo", esc_attr($_POST["vimeo"]));
	if (isset($_POST["youtube"])) update_post_meta($post_id, "youtube", esc_attr($_POST["youtube"]));

}
add_action('save_post', 'post_save_details');

function page_save_details($post_id){
	global $pagenow;
	if ( 'post.php' != $pagenow ) return $post_id;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;

	if (isset($_POST["text_align"])) update_post_meta($post_id, "text_align", stripslashes($_POST["text_align"]));
	if (isset($_POST["custom_title1"])) update_post_meta($post_id, "custom_title1", stripslashes($_POST["custom_title1"]));
	if (isset($_POST["custom_title2"])) update_post_meta($post_id, "custom_title2", stripslashes($_POST["custom_title2"]));
	if (isset($_POST["subline"])) update_post_meta($post_id, "subline", stripslashes($_POST["subline"]));
	if (isset($_POST["pf_catid"])) update_post_meta($post_id, "pf_catid", stripslashes($_POST["pf_catid"]));
	if (isset($_POST["icon_name"])) update_post_meta($post_id, "icon_name", stripslashes($_POST["icon_name"]));
	if (isset($_POST["custom_link"])) update_post_meta($post_id, "custom_link", stripslashes($_POST["custom_link"]));
	if (isset($_POST["featured_image"])) update_post_meta($post_id, "featured_image", esc_attr($_POST["featured_image"]));
}
add_action('save_post', 'page_save_details');


function idesign_upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_directory').'/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
	 
function idesign_upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'idesign_upload_scripts');
add_action('admin_print_styles', 'idesign_upload_styles');

?>
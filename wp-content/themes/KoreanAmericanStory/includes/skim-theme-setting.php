<?php
/**
 * @package WordPress
 * @subpackage iKAS Theme
 */


/*-----------------------------------------------------------------------------------*/
/* REGISTER Admin */
/*-----------------------------------------------------------------------------------*/
function iKAS_theme_settings_init(){
	register_setting( 'iKAS_theme_settings', 'iKAS_theme_settings' );
}


// add js for admin
function iKAS_theme_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
//add css for admin
function iKAS_style() {
	wp_enqueue_style('thickbox');
}
function iKAS_echo_scripts()
{
?>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {

// Media Uploader
window.formfield = '';

jQuery('.upload_image_button').live('click', function() {
	window.formfield = jQuery('.upload_field',jQuery(this).parent());
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	return false;
});

window.original_send_to_editor = window.send_to_editor;
window.send_to_editor = function(html) {
	if (window.formfield) {
		imgurl = jQuery('img',html).attr('src');
		window.formfield.val(imgurl);
		tb_remove();
	}
	else {
		window.original_send_to_editor(html);
	}
	window.formfield = '';
	window.imagefield = false;
}

});
//]]> 
</script>
<?php
}

if (isset($_GET['page']) && $_GET['page'] == '-settings') {
	add_action('admin_print_scripts', 'iKAS_theme_scripts'); 
	add_action('admin_print_styles', 'iKAS_style');
	add_action('admin_head', 'iKAS_echo_scripts');
}


function iKAS_add_settings_page() {
add_theme_page( __( 'Theme Settings', 'iKAS' ), __( 'Theme Settings', 'iKAS' ), 'manage_options', '-settings', 'iKAS_theme_settings_page');
}

add_action( 'admin_init', 'iKAS_theme_settings_init' );
add_action( 'admin_menu', 'iKAS_add_settings_page' );

function iKAS_theme_settings_page() {
	
global $slider_effects;
?>


<?php 
/*-----------------------------------------------------------------------------------*/
/* START Admin */
/*-----------------------------------------------------------------------------------*/
?>

<div class="wrap">

<?php
// If the form has just been submitted, this shows the notification
if ( $_GET['settings-updated'] ) { ?>
<div id="message" class="updated fade -message"><p><?php _e('Options Saved','iKAS'); ?></p></div>
<?php } ?>

<div id="icon-options-general" class="icon32"></div>
<h2><?php _e( ' Theme Settings', 'iKAS' ) ?></h2>

<form method="post" action="options.php">

<?php settings_fields( 'iKAS_theme_settings' ); ?>
<?php $options = get_option( 'iKAS_theme_settings' ); ?>

<table class="form-table">  

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 1 Custom Post Category ID', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat1]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat1]" value="<?php esc_attr_e( $options['featured_cat1'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat1]"><?php _e( 'Enter Featured Section Custom Post Category ID.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 1 Custom Link', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat_link1]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat_link1]" value="<?php esc_attr_e( $options['featured_cat_link1'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat_link1]"><?php _e( 'Enter Featured Section Custom Post Custom Link.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 2 Custom Post Category ID', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat2]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat2]" value="<?php esc_attr_e( $options['featured_cat2'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat2]"><?php _e( 'Enter Featured Custom Post Section Category ID.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 2 Custom Link', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat_link2]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat_link2]" value="<?php esc_attr_e( $options['featured_cat_link2'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat_link2]"><?php _e( 'Enter Featured Section Custom Post Custom Link.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 3 Category ID', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat3]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat3]" value="<?php esc_attr_e( $options['featured_cat3'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat3]"><?php _e( 'Enter Featured Section Category ID.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 3 Custom Link', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat_link3]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat_link3]" value="<?php esc_attr_e( $options['featured_cat_link3'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat_link3]"><?php _e( 'Enter Featured Section Custom Link.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 4 Category ID', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat4]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat4]" value="<?php esc_attr_e( $options['featured_cat4'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat4]"><?php _e( 'Enter Featured Section Category ID.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 4 Custom Link', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat_link4]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat_link4]" value="<?php esc_attr_e( $options['featured_cat_link4'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat_link4]"><?php _e( 'Enter Featured Section Custom Link.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 5 Category ID', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat5]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat5]" value="<?php esc_attr_e( $options['featured_cat5'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat5]"><?php _e( 'Enter Featured Section Category ID.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 5 Custom Link', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat_link5]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat_link5]" value="<?php esc_attr_e( $options['featured_cat_link5'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat_link5]"><?php _e( 'Enter Featured Section Custom Link.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 6 Category ID', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat6]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat6]" value="<?php esc_attr_e( $options['featured_cat6'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat6]"><?php _e( 'Enter Featured Section Category ID.','iKAS'); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Home Featured Section 6 Custom Link', 'iKAS' ); ?></th>
<td>
<input id="iKAS_theme_settings[featured_cat_link6]" class="regular-text" type="text" size="36" name="iKAS_theme_settings[featured_cat_link6]" value="<?php esc_attr_e( $options['featured_cat_link6'] ); ?>" />
<br />
<label class="description featuredcatdescription" for="iKAS_theme_settings[featured_cat_link6]"><?php _e( 'Enter Featured Section Custom Link.','iKAS'); ?></label>
</td>
</tr>

</table>
<p class="submit-changes">
<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'iKAS' ); ?>" />
</p>
</form>
</div><!-- END wrap -->

<?php
}
//sanitize and validate
function iKAS_options_validate( $input ) {
	global $select_options, $radio_options;
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

?>
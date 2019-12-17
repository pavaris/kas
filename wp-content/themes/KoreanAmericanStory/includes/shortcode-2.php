<?php

if (!function_exists('register_button')) {
function register_button( $buttons ) {
   array_push( $buttons, "|", "qode_shortcodes" );
   return $buttons;
}
}

if (!function_exists('add_plugin')) {
function add_plugin( $plugin_array ) {
   $plugin_array['qode_shortcodes'] = get_template_directory_uri() . '/includes/qode_shortcodes.js';
   return $plugin_array;
}
}

if (!function_exists('qode_shortcodes_button')) {
function qode_shortcodes_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }

}
}

add_action('init', 'qode_shortcodes_button');


if (!function_exists('no_wpautop')) {
function no_wpautop($content) 
{ 
        $content = do_shortcode( shortcode_unautop($content) ); 
        $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
        return $content;
}
}
if (!function_exists('num_shortcodes')) {
function num_shortcodes($content) 
{ 
        $columns = substr_count( $content, '[pricing_cell' );
		return $columns;
}
}

/* Three columns wrap shortcode */

if (!function_exists('three_col_col1')) {
function three_col_col1($atts, $content = null) {
    return '<div class="three_columns clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('three_col_col1', 'three_col_col1');

if (!function_exists('three_col_col2')) {
function three_col_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('three_col_col2', 'three_col_col2');

if (!function_exists('three_col_col3')) {
function three_col_col3($atts, $content = null) {
    return '<div class="column3"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('three_col_col3', 'three_col_col3');

/* Four columns wrap shortcode */

if (!function_exists('four_col_col1')) {
function four_col_col1($atts, $content = null) {
    return '<div class="four_columns clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('four_col_col1', 'four_col_col1');

if (!function_exists('four_col_col2')) {
function four_col_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('four_col_col2', 'four_col_col2');

if (!function_exists('four_col_col3')) {
function four_col_col3($atts, $content = null) {
    return '<div class="column3"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('four_col_col3', 'four_col_col3');

if (!function_exists('four_col_col4')) {
function four_col_col4($atts, $content = null) {
    return '<div class="column4"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('four_col_col4', 'four_col_col4');

/* Two columns wrap shortcode */

if (!function_exists('two_col_50_50_col1')) {
function two_col_50_50_col1($atts, $content = null) {
    return '<div class="two_columns_50_50 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_50_50_col1', 'two_col_50_50_col1');

if (!function_exists('two_col_50_50_col2')) {
function two_col_50_50_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_50_50_col2', 'two_col_50_50_col2');

/* Two columns 66_33 wrap shortcode */

if (!function_exists('two_col_66_33_col1')) {
function two_col_66_33_col1($atts, $content = null) {
    return '<div class="two_columns_66_33 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_66_33_col1', 'two_col_66_33_col1');

if (!function_exists('two_col_66_33_col2')) {
function two_col_66_33_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_66_33_col2', 'two_col_66_33_col2');

/* Two columns 33_66 wrap shortcode */

if (!function_exists('two_col_33_66_col1')) {
function two_col_33_66_col1($atts, $content = null) {
    return '<div class="two_columns_33_66 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_33_66_col1', 'two_col_33_66_col1');

if (!function_exists('two_col_33_66_col2')) {
function two_col_33_66_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_33_66_col2', 'two_col_33_66_col2');

/* Two columns 75_25 wrap shortcode */

if (!function_exists('two_col_75_25_col1')) {
function two_col_75_25_col1($atts, $content = null) {
    return '<div class="two_columns_75_25 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_75_25_col1', 'two_col_75_25_col1');

if (!function_exists('two_col_75_25_col2')) {
function two_col_75_25_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_75_25_col2', 'two_col_75_25_col2');

/* Two columns 25_75 wrap shortcode */

if (!function_exists('two_col_25_75_col1')) {
function two_col_25_75_col1($atts, $content = null) {
    return '<div class="two_columns_25_75 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_25_75_col1', 'two_col_25_75_col1');

if (!function_exists('two_col_25_75_col2')) {
function two_col_25_75_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_25_75_col2', 'two_col_25_75_col2');


/* Dropcaps shortcode */

if (!function_exists('dropcaps')) {
function dropcaps($atts, $content = null) {
	extract(shortcode_atts(array("style" => "", "background_color" => "", "underline_height" => "", "underline_color" => ""), $atts));
	if($style == "underline"){
		return "<span class='dropcap $style' style='background-color: $background_color; border-bottom-color: $underline_color; border-bottom-width: ".$underline_height."px;'>" . no_wpautop($content)  . "</span>";
	} else {
		return "<span class='dropcap' style='background-color: $background_color;'>" . no_wpautop($content)  . "</span>";
	}
}
}
add_shortcode('dropcaps', 'dropcaps');

/* Typography shortcode */

if (!function_exists('typography')) {
function typography($atts, $content = null) {
	extract(shortcode_atts(array("position" => "", "big_font_size" => "", "big_color" => "", "small_color" => "" ,"big_text" => "TYPOGRAPHY", "small_top_text" => "AMAZING", "small_bottom_text" => "SHORTCODE"), $atts));
	if($big_font_size == ""){
		$big_font_size = 100;
	}

	if($position != "top"){
		$sl_font_size = $big_font_size*2/5;
		$sl_top_text_margin = $big_font_size/5;
		$bl_new_font_size = $big_font_size + 7;
		return "<div class='typography $position clearfix'><span class='big_letter' style='color: $big_color; font-size: ".$bl_new_font_size."px; line-height: ".$big_font_size."px;'>".$big_text."</span><span class='small_letter_holder'><span class='small_letter_top' style='color: $small_color; font-size: ".$sl_font_size."px; line-height: ".$sl_font_size."px; margin: 0px 0px ".$sl_top_text_margin."px 0px;'>".$small_top_text."</span><span class='small_letter_bottom' style='color: $small_color; font-size: ".$sl_font_size."px; line-height: ".$sl_font_size."px;'>".$small_bottom_text."</span></span></div>";
	} else {
		$sl_font_size = $big_font_size*2/5;
		return "<div class='typography $position clearfix'><span class='big_letter' style='color: $big_color; font-size: ".$big_font_size."px; line-height: ".$big_font_size."px;'>".$big_text."</span><span class='small_letter_holder'><span class='small_letter_top' style='color: $small_color; font-size: ".$sl_font_size."px; line-height: ".$sl_font_size."px;'>".$small_top_text."</span><span class='small_letter_bottom' style='color: $small_color; font-size: ".$sl_font_size."px; line-height: ".$sl_font_size."px;'>".$small_bottom_text."</span></span></div>";
	}
	
}
}
add_shortcode('typography', 'typography');

/* Image with text shortcode */

if (!function_exists('image_with_text')) {
function image_with_text($atts, $content = null) {
	extract(shortcode_atts(array("image_link" => "", "image_align" => "left"), $atts));
	$html = "";
	$html .= "<div class='image_with_text_holder ".$image_align."'>";
	if($image_link != ""){
		$html .= "<img src='$image_link' />";
	} 
	$html .= no_wpautop($content)."</div>";
	return $html;
}
}
add_shortcode('image_with_text', 'image_with_text');

/* Blockquote shortcode */

if (!function_exists('blockquote')) {
function blockquote($atts, $content = null) {
	$html = ""; 
  extract(shortcode_atts(array("width" => ""), $atts));
	$html .= "<blockquote"; 
	if($width > 0){
		$html .= " style=width:$width%;";
	}
	$html .= ">" . no_wpautop($content) . "</blockquote>";
  return $html;
}
}
add_shortcode('blockquote', 'blockquote');

/* Message shortcode */

if (!function_exists('message')) {
function message($atts, $content = null) {
	global $qode_options_infographer;
  $html = ""; 
	extract(shortcode_atts(array("background_color"=>""), $atts));
	$html .= "<div class='message_holder'><div class='message";
	$html .= "' style='";
	if($background_color != ""){
		$html .= 'background-color: '.$background_color.'; ';
	}
	
	$html .= "'><a href='#' class='close'></a>" .no_wpautop($content) . "</div><div class='message_arrow'";
	if($background_color != ""){
		$html .= " style='border-color: $background_color transparent transparent transparent;'></div></div>";
	} else {
		$html .= "></div></div>";
	}
	
	return $html;
}
}
add_shortcode('message', 'message');

/* Accordion shortcode */

if (!function_exists('accordion')) {
function accordion($atts, $content = null) {
	extract(shortcode_atts(array("accordion_type" => ""), $atts));
	return "<div class='accordion_holder $accordion_type'>" . no_wpautop($content) . "</div>";
}
}
add_shortcode('accordion', 'accordion');

/* Accordion item shortcode */

if (!function_exists('accordion_item')) {
function accordion_item($atts, $content = null) {

	extract(shortcode_atts(array("caption" => "", "title_color" => "", "background_color"  => "", "arrow_style" => ""), $atts));
	return "<div class='accordion_item ".$arrow_style."'><h4 style='background-color: ".$background_color."; color: ".$title_color.";'><span class='control-pm'></span>".$caption."</h4><div class='accordion_content' style='background-color: ".$background_color.";'><div class='accordion_content_inner'>" . no_wpautop($content) . "</div></div></div>";
}
}
add_shortcode('accordion_item', 'accordion_item');

/* Unordered List shortcode */

if (!function_exists('unordered_list')) {
function unordered_list($atts, $content = null) {
    extract(shortcode_atts(array("animation" => ""), $atts));
    return "<div class='unordered_list_holder $animation'>" . no_wpautop($content) . "</div>";
}
}
add_shortcode('unordered_list', 'unordered_list');

/* Unordered List item shortcode */

if (!function_exists('unordered_list_item')) {
function unordered_list_item($atts, $content = null) {
    extract(shortcode_atts(array("style" => "", "title" => "", "number" => "", "number_color" => "", "icon" => "", "icon_color" => ""), $atts));
    $html = "";
    if($style == "element_number" && $number != ""){
    	$html = "<div class='list_item_holder'><div class='$style'><span style='color: $number_color;'>" . $number . "</span></div><div class='list_text_holder'><h4>". $title ."</h4>". no_wpautop($content) ."</div></div>";
    } else if($style == "element_icon" && $icon != "") {
    	$html = "<div class='list_item_holder'><div class='icon retina $icon_color $icon'></div><div class='list_text_holder'><h4>". $title ."</h4>". no_wpautop($content) ."</div></div>";
    } else {
    	$html = "<div class='list_item_holder no_image_or_number'><div class='list_text_holder'><h4>". $title ."</h4>". no_wpautop($content) ."</div></div>";
    }

    return $html;
}
}
add_shortcode('unordered_list_item', 'unordered_list_item');

/* Ordered List shortcode */

if (!function_exists('ordered_list')) {
function ordered_list($atts, $content = null) {
    $html =  "<div class=ordered>" . $content . "</div>";  
    return $html;
}
}
add_shortcode('ordered_list', 'ordered_list');

/* Elements Animation shortcode */

if (!function_exists('elements_animation')) {
function elements_animation($atts, $content = null) {
	extract(shortcode_atts(array("animation_type" => "", "delay" => ""), $atts));
	return "<div class='$animation_type' data-delay='".$delay."'><div>" . no_wpautop($content) . "</div></div>";
}
}
add_shortcode('elements_animation', 'elements_animation');

/* Buttons shortcode */

if (!function_exists('button')) {
function button($atts, $content = null) {
	global $qode_options_infographer;
	$html = "";
	extract(shortcode_atts(array("size" => "", "color"=> "", "background_color"=>"", "font_size"=>"", "line_height"=>"", "font_style"=>"", "font_weight"=>"", "text"=> "Button", "link"=> "http://qodeinteractive.com/", "target"=> "_self"), $atts));
    $html .=  '<a href="'.$link.'" target="'.$target.'" class="button '.$size.'" style="';
		if($color != ""){
			$html .= 'color: '.$color.'; ';
		}
		if($background_color != ""){
			$html .= 'background-color: '.$background_color.'; ';
		}
		if($font_size != ""){
			$html .= 'font-size: '.$font_size.'px; ';
		}
		if($line_height != ""){
			$html .= 'line-height: '.$line_height.'px; ';
		}
		if($font_style != ""){
			$html .= 'font-style: '.$font_style.'; ';
		}
		if($font_weight != ""){
			$html .= 'font-weight: '.$font_weight.'; ';
		}
		$html .= '">' . $text . '</a>';  
    return $html;
}
}
add_shortcode('button', 'button');

/* Tabs shortcode */

if (!function_exists('tabs')) {
function tabs( $atts, $content = null ) {
  $html = ""; 
	extract(shortcode_atts(array(
    ), $atts));
	$html .= '<div class="tabs_holder clearfix"><div class="tabs '.(isset($atts['type'])?$atts['type']:'').'">';
	$html .= '<ul class="tabs-nav">';
	$key = array_search((isset($atts['type'])?$atts['type']:''),$atts);
		if($key!==false){
			unset($atts[$key]);
	}
	foreach ($atts as $key => $tab) {
		$html .= '<li><a href="#' . $key . '">' . $tab . '</a><div class="arrow"></div></li>';
	}
	$html .= '</ul>';
	$html .= '<div class="tabs-container">';
	$html .= no_wpautop($content) .'</div></div></div>';
	return $html;
}
}
add_shortcode('tabs', 'tabs');

/* Tab shortcode */

if (!function_exists('tab')) {
function tab( $atts, $content = null ) {
  $html = ""; 
	extract(shortcode_atts(array(
    ), $atts));
	$html .= '<div id="tab' . $atts['id'] . '" class="tab-content">' . no_wpautop($content) .'</div>';
	return $html;
}
}
add_shortcode('tab', 'tab');

/* Icons shortcode */

if (!function_exists('icon')) {
function icon($atts, $content = null) {
    extract(shortcode_atts(array("type" => "", "icon" => ""), $atts));
    $html = "";  
	$html .=  '<div class="icon retina '.$type.' '.$icon.'"></div>';

    return $html;
}
}
add_shortcode('icon', 'icon');

/* Icon in circle shortcode */

if (!function_exists('icon_in_circle')) {
function icon_in_circle($atts, $content = null) {
    extract(shortcode_atts(array("type" => "", "icon" => "", "circle_color" => "", "position" => ""), $atts));
    $html = "";  
	$html .=  '<div class="icon_in_circle_holder"><div class="icon_holder '.$position.'" style="border-color: '.$circle_color.';"><div class="icon_small"><div class="icon retina '.$type.' '.$icon.'"></div></div></div>'. no_wpautop($content) .'</div>';

    return $html;
}
}
add_shortcode('icon_in_circle', 'icon_in_circle');

/* Flip icon shortcode */

if (!function_exists('flip_icon')) {
function flip_icon($atts, $content = null) {
    extract(shortcode_atts(array("position" => "","type" => "", "icon" => "", "front_color" => "", "back_color" => "", "flip_on_appear" => "", "link" => "", "target" => ""), $atts));
    $html = "";  
	$html .=  '<div class="flip_icon_holder '.$flip_on_appear.' '.$position.' clearfix"><a href="'.$link.'" target="'.$target.'"><div class="flip_icon front" style="background-color: '.$front_color.';"><div class="icon retina '.$type.' '.$icon.'"></div></div><div class="flip_icon back" style="background-color: '.$back_color.';"><div class="flip_icon_text"><div class="flip_icon_text_inner">'.no_wpautop($content).'</div></div></div></a></div>';

    return $html;
}
}
add_shortcode('flip_icon', 'flip_icon');

/* Flip image shortcode */

if (!function_exists('flip_image')) {
function flip_image($atts, $content = null) {
    extract(shortcode_atts(array("animate" => "", "flip_on_appear" => "", "delay" =>"", "front_image_link" => "", "back_image_link" => "", "background_color" => "", "back_text" => "", "link" => "", "target" => ""), $atts));
    $html = "";  

    if($front_image_link != "" && $back_image_link != ""){
    	$html .=  '<div class="flip_image_holder '.$animate.' '.$flip_on_appear.'" data-delay="'.$delay.'"><a href="'.$link.'" target="'.$target.'"><div class="flip_image front"><img src="'.$front_image_link.'" alt="'.getImageAltFromURL($front_image_link).'" /></div><div class="flip_image back"><div class="flip_image_text"><div class="flip_image_text_inner"><img src="'.$back_image_link.'" alt="'.getImageAltFromURL($back_image_link).'" /></div></div></div></a></div>';
    } else {
    	$html .=  '<div class="flip_image_holder '.$animate.' '.$flip_on_appear.'" data-delay="'.$delay.'"><a href="'.$link.'" target="'.$target.'"><div class="flip_image front"><img src="'.$front_image_link.'" alt="'.getImageAltFromURL($front_image_link).'" /></div><div class="flip_image back" style="background-color: '.$background_color.';"><div class="flip_image_text"><div class="flip_image_text_inner"><h4>'.$back_text.'</h4></div></div></div></a></div>';
    }
	
    return $html;
}
}
add_shortcode('flip_image', 'flip_image');

/* Custom font size shortcode */

if (!function_exists('custom_font_size')) {
function custom_font_size($atts, $content = null) {
    extract(shortcode_atts(array("content" => "", "font_size" => "100", "line_height" => "100", "font_family" => "Oswald"), $atts));
    return '<span style="font-size: '.$font_size.'px; line-height: '.$line_height.'px; font-family: '.$font_family.',sans-serif;">'.$content.'</span>';  
}
}
add_shortcode('custom_font_size', 'custom_font_size');

/* Pie Chart shortcode */

if (!function_exists('pie_chart')) {
function pie_chart($atts, $content = null) {
	extract(shortcode_atts(array("type" => "", "delay" => "", "title" => "", "percent"=> "100", "percentage_color" => "", "active_color" => "", "noactive_color" => ""), $atts));
    $html =  "<div class='pie_chart_holder ".$type."'><div class='percentage' data-percent='".$percent."' data-delay='".$delay."' data-active='".$active_color."' data-noactive='".$noactive_color."' style='color: ".$percentage_color.";'><span class='tocounter' data-delay='".$delay."'>".$percent."</span>%</div>";

    if(empty($title) && (empty($content) || $content == null || $content == "")){
    	$html .= "</div>"; 
    } else {
    	$html .= "<div class='pie_chart_text'><h4>".$title."</h4>" . no_wpautop($content) . "</div></div>";
    } 

    return $html;
}
}
add_shortcode('pie_chart', 'pie_chart');

/* Progress bars horizontal shortcode */

if (!function_exists('progress_bars')) {
function progress_bars($atts, $content = null) {
	extract(shortcode_atts(array("type" => ""), $atts));
    $html =  "<div class='progress_bars $type'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('progress_bars', 'progress_bars');

/* Progress bar horizontal shortcode */

if (!function_exists('progress_bar')) {
function progress_bar($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "percent"=> "100", "color" => "", "background_color" => "", "noactive_background_color" => "", "top_gradient" => "", "bottom_gradient" => ""), $atts));
	if($background_color != ""){
		$html =  "<div class='progress_bar'><span class='progress_title'><h4 style='color: ".$color.";'>$title</h4></span><span class='progress_number' style='color: ".$color.";'><span>".$percent."</span>%</span> <div class='progress_content_outer' style='background-color: ".$noactive_background_color.";'><div data-percentage='$percent' class='progress_content' style='background: ".$background_color.";'></div></div></div>"; 
	} else {
		$html =  "<div class='progress_bar'><span class='progress_title'><h4 style='color: ".$color.";'>$title</h4></span><span class='progress_number' style='color: ".$color.";'><span>".$percent."</span>%</span> <div class='progress_content_outer' style='background-color: ".$noactive_background_color.";'><div data-percentage='$percent' class='progress_content' style='background: ".$top_gradient."; background: -moz-linear-gradient(left,  $bottom_gradient 9%, ".$top_gradient." 100%); background: -webkit-gradient(linear, left top, right top, color-stop(9%,".$bottom_gradient."), color-stop(100%,".$top_gradient.")); background: -webkit-linear-gradient(left,  ".$bottom_gradient." 9%,".$top_gradient." 100%); background: -o-linear-gradient(left,  ".$bottom_gradient." 9%,".$top_gradient." 100%); background: -ms-linear-gradient(left,  ".$bottom_gradient." 9%,".$top_gradient." 100%); background: linear-gradient(to right,  ".$bottom_gradient." 9%,".$top_gradient." 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=".$bottom_gradient.", endColorstr=".$top_gradient.",GradientType=1 ); '></div></div></div>"; 
	}

    return $html;
}
}
add_shortcode('progress_bar', 'progress_bar');

/* Progress bars vertical shortcode */

if (!function_exists('progress_bars_vertical')) {
function progress_bars_vertical($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<div class='progress_bars_vertical_holder vertical'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('progress_bars_vertical', 'progress_bars_vertical');

/* Progress bar vertical shortcode */

if (!function_exists('progress_bar_vertical')) {
function progress_bar_vertical($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "percent" => "100", "background_color" => "",  "percentage_color" => "", "text_color" => "", "text_size" => ""), $atts));
    $html =  "<div class='progress_bars_vertical background_color'><div class='progress_content_outer'><div data-percentage='$percent' class='progress_content' style='background-color: $background_color;'></div></div><span class='progress_number' style='color: ".$percentage_color."; font-size: ".$text_size."px;'><span>$percent</span>%</span><span class='progress_title' style='color: ".$text_color."; font-size: ".$text_size."px;'>$title</span><span class='progress_text' style='font-size: ".$text_size."px;'>" . no_wpautop($content) . "</span></div>"; 

    return $html;
}
}
add_shortcode('progress_bar_vertical', 'progress_bar_vertical');

/* Progress bars pattern shortcode */

if (!function_exists('progress_bars_pattern')) {
function progress_bars_pattern($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<div class='progress_bars_vertical_holder pattern'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('progress_bars_pattern', 'progress_bars_pattern');

/* Progress bar pattern shortcode */

if (!function_exists('progress_bar_pattern')) {
function progress_bar_pattern($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "percent" => "100", "border_width" => "", "border_color" => "",  "percentage_color" => "", "text_color" => ""), $atts));
    $html =  "<div class='progress_bars_vertical pattern'><div class='progress_content_outer'><div data-percentage='$percent' class='progress_content' style='border-top-width: ".$border_width."px; border-top-color: $border_color;'></div></div><span class='progress_number' style='color: ".$percentage_color.";'><span>$percent</span>%</span><span class='progress_title' style='color: ".$text_color.";'>$title</span><span class='progress_text'>" . no_wpautop($content) . "</span></div>"; 

    return $html;
}
}
add_shortcode('progress_bar_pattern', 'progress_bar_pattern');

/* Progress bars icon shortcode */

if (!function_exists('progress_bar_icon')) {
function progress_bar_icon($atts, $content = null) {
	extract(shortcode_atts(array("noactive" => "", "active" => "", "icons_number" => "", "active_number" => "", "icon" => ""), $atts));
    $html =  "<div class='progress_bars_with_image_holder'><div class='progress_bars_with_image'><div class='progress_bars_with_image_content retina ".$icon." clearfix' data-number='".$active_number."'>";
	$i = 0;
	while ($i < $icons_number) {
		$html .= "<div class='bar'><div class='bar_noactive ".$noactive."'>&nbsp;</div><div class='bar_active ".$active."'>&nbsp;</div></div>";

		$i++;
	}

    $html .= "</div></div></div>";

    return $html;
}
}
add_shortcode('progress_bar_icon', 'progress_bar_icon');

/* Pricing table shortcode */

if (!function_exists('pricing_table')) {
function pricing_table($atts, $content = null) {
  $html = ""; 
	extract(shortcode_atts(array("type" => ""), $atts));
    	$html .=  "<div class='price_tables $type clearfix'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('pricing_table', 'pricing_table');

/* Pricing table column shortcode */

if (!function_exists('pricing_column')) {
function pricing_column($atts, $content = null) {
  $html = ""; 
	extract(shortcode_atts(array("title" => '', "price" => "0", "price_currency" => "$", "price_period" => "mo", "link" => "", "button_text" => "Best Buy", "active"=>"" , "active_text"=>"Most Popular"), $atts));
	$html .=  "<div class='price_table'>";
	if($active == "yes"){
		$html .= "<div class='active_best_price'><p>".$active_text."</p></div>";
	}
	$html .=  "<div class='price_table_inner'><ul><li class='price_cell'><div class='price_in_table'><sup class='value'>".$price_currency."</sup><span class='price'>".$price."</span>
	<sub class='mark'>/".$price_period."</sub></div></li><li class='cell table_title'><h4>$title</h4></li>" . no_wpautop($content) . "<li class='puchase_cell'><a class='button' href='$link'>$button_text</a></li></ul></div></div>";
	
    return $html;
}
}
add_shortcode('pricing_column', 'pricing_column');

/* Pricing table cell shortcode */

if (!function_exists('pricing_cell')) {
function pricing_cell($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<li class='cell'>" . no_wpautop($content) . "</li>"; 
	return $html;
}
}
add_shortcode('pricing_cell', 'pricing_cell');

/* Table shortcode */

if (!function_exists('table')) {
function table($atts, $content = null) {
  $html = ""; 
	extract(shortcode_atts(array(), $atts));
    $html .=  "<table class='standard_table'><tbody>" . no_wpautop($content) . "</tbody></table>";  
    return $html;
}
}
add_shortcode('table', 'table');

/* Table row shortcode */

if (!function_exists('table_row')) {
function table_row($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<tr>" . no_wpautop($content) . "</tr>";  
    return $html;
}
}
add_shortcode('table_row', 'table_row');

/* Table head cell shortcode */

if (!function_exists('table_cell_head')) {
function table_cell_head($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<th><h4>" . no_wpautop($content) . "</h4></th>";  
    return $html;
}
}
add_shortcode('table_cell_head', 'table_cell_head');

/* Table body cell shortcode */

if (!function_exists('table_cell_body')) {
function table_cell_body($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<td>" . no_wpautop($content) . "</td>";  
    return $html;
}
}
add_shortcode('table_cell_body', 'table_cell_body');

/* Testimonial shortcode */

if (!function_exists('testimonial')) {
function testimonial($atts, $content = null) {
	extract(shortcode_atts(array("background_color" => "", "name_color" => "", "name" => "", "image_link" => ""), $atts));
  	$html = ""; 	
		$html .=  "<div class='testimonials_holder'>";
		if($image_link == ""): $html .= "<div class='testimonials_text_holder no_image' style='background-color: ".$background_color.";'><div class='testimonial_text_inner'><h4 style='color: ".$name_color.";'>".$name."</h4>" .no_wpautop($content). "</div></div>"; endif;
		if($image_link !==""): $html .= "<img src='$image_link'><div class='testimonials_text_holder' style='background-color: ".$background_color.";'><div class='testimonial_text_inner'><h4 style='color: ".$name_color.";'>".$name."</h4>" .no_wpautop($content). "</div><div class='testimonial_arrow'";
		if($background_color != ""){
			$html .= " style='border-color: transparent ".$background_color." transparent transparent;'";
		}	
		$html .= "></div></div>"; endif;
		$html .= "</div>";
										
    	return $html;
}
}
add_shortcode('testimonial', 'testimonial');

/* Highlights shortcode */

if (!function_exists('highlight')) {
function highlight($atts, $content = null) {
	$html =  "<span class='highlight'>" . $content . "</span>";  
    return $html;
}
}
add_shortcode('highlight', 'highlight');

/* Action shortcode */

if (!function_exists('action')) {
function action($atts, $content = null) {
	extract(shortcode_atts(array("background_color" => ""), $atts));
	$html =  "<div class='call_to_action' style='background-color: ".$background_color."'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('action', 'action');

/* Portfolio shortcode */

if (!function_exists('portfolio_list')) {
function portfolio_list($atts, $content = null) {
	global $wp_query;
	$html = "";
	extract(shortcode_atts(array("type" => "1", "columns" => "3", "order_by" => "menu_order" , "order" => "ASC" , "number"=>"-1", "filter"=>'no', "lightbox"=>'yes', "category"=>"", "selected_projects"=>""), $atts));
	
	if($filter == "yes"){
		$html .= "<div class='filter_outer'><div class='filter_holder'>
						<ul>
						<li class='label'><span data-label='View by Type'>". __('View by Type','qode') ."</span>
						<div class='arrow'></div>
						</li>
						<li class='filter' data-filter='all'><span>". __('All','qode') ."</span></li>";
				if ($category == "") {
					$args = array(
						'parent'  => 0
					);
					$portfolio_categories = get_terms( 'portfolio_category',$args);
				} else {
					$top_category = get_term_by('slug',$category,'portfolio_category');
					$term_id = '';
					if (isset($top_category->term_id)) $term_id = $top_category->term_id;
					$args = array(
						'parent'  => $term_id
					);
					$portfolio_categories = get_terms( 'portfolio_category',$args);
				}
				foreach($portfolio_categories as $portfolio_category) {
					$html .=	"<li class='filter' data-filter='$portfolio_category->slug'><span>$portfolio_category->name</span>";
					$args = array(
						'child_of' => $portfolio_category->term_id
					);
					// $portfolio_categories2 = get_terms( 'portfolio_category',$args);
					
					// if(count($portfolio_categories2) > 0){
						// $html .= '<ul>';
						// foreach($portfolio_categories2 as $portfolio_category2) {
							// $html .=	"<li class='filter' data-filter='.$portfolio_category2->slug'><span>$portfolio_category2->name</span></li>";
						// }
						// $html .= '</ul>';
					// }
					
					$html .= '</li>';
				}
		$html .= "</ul></div></div>";
	}
	
	
	
	$html .= "<div class='projects_holder_outer'><div class='projects_holder projects_type$type v$columns'>\n";
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	if ($category == "") {
		$args = array(
			'post_type'=> 'portfolio_page',
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'paged' => $paged
		);
	} else {
		$args = array(
			'post_type'=> 'portfolio_page',
			'portfolio_category' => $category,
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'paged' => $paged
		);
	}
	$project_ids = null;
	if ($selected_projects != "") {
		$project_ids = explode(",",$selected_projects);
		$args['post__in'] = $project_ids;
	}
	query_posts( $args );
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
	$html .= "<article class='mix ";
	foreach($terms as $term) {
		$html .= "$term->slug ";
	}

    $title = get_the_title();
    $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); //original size  
    $large_image = $featured_image_array[0];
    $slug_list_ = "pretty_photo_gallery";

	$html .="'>";
	$html .= "<div class='image'>";
	if($type == 2) {
		$html .= "<div class='hover'>";
			$html .= "<div class='hover_inner'>";
				$html .= "<a href='". get_permalink() ."' class='hover_inner_link'>";
					$html .= "<div class='hover_inner_link_text_holder'>";
						$html .= '<p>';
							$k=1;
							foreach($terms as $term) {
								$html .= "$term->name";
								if(count($terms) != $k){
									$html .= ' ';
								}
							$k++;
							}
						$html .= '</p>';
					$html .= '</div>';
				$html .= '</a>';
			if($lightbox == "yes"){
				$html .= "<a class='preview' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[".$slug_list_."]'></a></div></div>";
			} else {
			$html .= "</div>";
		$html .= "</div>";

		}
		
	}

	$html .= "<a href='". get_permalink() ."'>".get_the_post_thumbnail()."</a></div>";
	
	if($type == 2) {

		$html .= "<h4>" . get_the_title() . "</h4>";
	}
	
	if($type != 2) {
		$html .= "<div class='hover'>";
				
		
		$html .= "<div class='hover_inner'>";
		$html .= "<a href='". get_permalink() ."' class='hover_inner_link'>";
		$html .= "<div class='hover_inner_link_text_holder'>";
		$html .= "<h4 class='portfolio_title'>" . get_the_title() . "</h4>";
		$html .= '<p>';
			$k=1;
			foreach($terms as $term) {
				$html .= "$term->name";
				if(count($terms) != $k){
					$html .= ' ';
				}
			$k++;
			}
		$html .= '</p></div></a>';
		
		if($lightbox == "yes"){
			$html .= "<a class='preview' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[".$slug_list_."]'></a></div></div>";
		} else {
			$html .= "</div></div>";
		}
	}
	$html .= "</article>\n";
						
	endwhile; 
	
	$i = 1;
	while ($i <= $columns) {
		$i++;
		$html .= '<div class="filler"></div>';
	}
	
	else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','qode'); ?></p>
	<?php endif; 	
	$html .= "\n</div>";

	$html .= "</div>";
	wp_reset_query();
    return $html;
}
}
add_shortcode('portfolio_list', 'portfolio_list');

/* Paralax shortcode */

if (!function_exists('parallax')) {
function parallax($atts, $content = null) {
	$html = "";
	$html .= "<section class='parallax'>";
	$html .= no_wpautop($content);
	$html .= "</section>";
	return $html;
}
}
add_shortcode('parallax', 'parallax');

if (!function_exists('parallax_section')) {
function parallax_section($atts, $content = null) {
	extract(shortcode_atts(array("id" => "", "height"=>"300", "title" => "..."), $atts));
	$parallaxes = get_post_meta(get_the_ID(), "qode_parallaxes", true);
	$html = "";
	
	foreach($parallaxes as $parallax) 
	{	
		if($parallax['imageid'] == $id) 
			{
			$html .= '<section id="'.$parallax['imageid'].'" style="background-image:url('. $parallax['parimg'] .'); background-color:'. $parallax['parcolor'] .';" data-height="' . $height . '" data-title="' . $title . '">';
			$html .= '<div class="parallax_content">';
			$html .= no_wpautop($content);
			$html .= '</div>';
			$html .= '</section>';
		}			
	}
	
	return $html;
}
}
add_shortcode('parallax_section', 'parallax_section');

/* Separator shortcode */

if (!function_exists('separator')) {
function separator($atts, $content = null) {
    extract(shortcode_atts(array("type" => "", "normal_full_width" => "" ,"pattern_full_width" => "", "color" => "", "thickness" => "", "up" => "","down" => ""), $atts));
		$html =  '<div style="';
		if($up != ""){
		$html .= "margin-top:". $up ."px;";
		}
		if($down != ""){
		$html .= "margin-bottom:". $down ."px;"; 
		}
		if($color != ""){
		$html .= "background-color: ". $color .";";
		}
		if($thickness != ""){
		$html .= "height:". $thickness ."px;";
		}
		$html .= '" class="separator '.$type.' '.$pattern_full_width.' '.$normal_full_width.'"></div>';  
		
    return $html;
}
}
add_shortcode('separator', 'separator');


/* Social Icons shortcode */

if (!function_exists('social_icons')) {
function social_icons($atts, $content = null) {
    extract(shortcode_atts(array("style" => ""), $atts));
    $html = ""; 
    $html .=  "       <ul class='social_menu retina $style'>";  
    $social_icons_array = explode(",", $content);
    for ($i = 0 ; $i < count($social_icons_array) ; $i = $i + 2)
    {
		$html .=  "<li class='" . trim($social_icons_array[$i]) . "'><a href='" . trim($social_icons_array[$i + 1]) . "' target='_blank'><span class='inner'>" . trim($social_icons_array[$i]) . "</span></a></li>";   
    }
     $html .=  "           </ul>";


    return $html;
}
}
add_shortcode('social_icons', 'social_icons');


/* Pie chart 2 shortcode */

if (!function_exists('pie_chart2')) {
function pie_chart2($atts, $content = null) {
		extract(shortcode_atts(array("width" => "280", "height" => "280", "color" => ""), $atts));
    $id = mt_rand(1000, 9999);
    $html = "
					<div class='pie_graf_holder'>
						<div class='pie_graf'>
							<canvas id='pie".$id."' height='".$height."' width='".$width."'></canvas>
						</div>
						<div class='pie_graf_legend'>
							<ul>";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1)
    {
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
			$html .=  "
								<li>
									<div class='color_holder' style='background-color: " . trim($pie_chart_el[1]) . ";'></div>
									<p style='color: ".$color.";'>" . trim($pie_chart_el[2]) . "</p>
								</li>";   
    }
     $html .=  "
							</ul>
						</div>
					</div>
					<script>
						var pie".$id." = [";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1)
    {
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
    	if ($i > 0) $html .= ",";
			$html .=  "
							{
								value: " . trim($pie_chart_el[0]) . ",
								color:'" . trim($pie_chart_el[1]) . "'
							}";   
    }
     $html .=  "
						];
						var \$j = jQuery.noConflict();
						\$j(document).ready(function() {
							if(\$j('.touch .no_delay').length){
								new Chart(document.getElementById('pie".$id."').getContext('2d')).Pie(pie".$id.",{segmentStrokeColor : 'transparent',});
							}else{
								\$j('#pie".$id."').appear(function() {
									new Chart(document.getElementById('pie".$id."').getContext('2d')).Pie(pie".$id.",{segmentStrokeColor : 'transparent',});
								},{accX: 0, accY: -200});
							}
						});
					</script>";


    return $html;
}
}
add_shortcode('pie_chart2', 'pie_chart2');


/* Pie chart 3 shortcode */

if (!function_exists('pie_chart3')) {
function pie_chart3($atts, $content = null) {
    extract(shortcode_atts(array("width" => "280", "height" => "280", "color" => ""), $atts));
    $id = mt_rand(1000, 9999);
    $html = "
						<div class='pie_graf_holder'>
						<div class='pie_graf'>
							<canvas id='pie".$id."' height='".$height."' width='".$width."'></canvas>
						</div>
						<div class='pie_graf_legend'>
							<ul>";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1)
    {
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
			$html .=  "
								<li>
									<div class='color_holder' style='background-color: " . trim($pie_chart_el[1]) . ";'></div>
									<p style='color: ".$color.";'>" . trim($pie_chart_el[2]) . "</p>
								</li>";   
    }
     $html .=  "
							</ul>
						</div>
					</div>
					<script>
						var pie".$id." = [";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1)
    {
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
    	if ($i > 0) $html .= ",";
			$html .=  "
							{
								value: " . trim($pie_chart_el[0]) . ",
								color:'" . trim($pie_chart_el[1]) . "'
							}";   
    }
     $html .=  "
						];
						var \$j = jQuery.noConflict();
						\$j(document).ready(function() {
							if(\$j('.touch .no_delay').length){
								new Chart(document.getElementById('pie".$id."').getContext('2d')).Doughnut(pie".$id.",{segmentStrokeColor : 'transparent',});
							}else{
								\$j('#pie".$id."').appear(function() {
									new Chart(document.getElementById('pie".$id."').getContext('2d')).Doughnut(pie".$id.",{segmentStrokeColor : 'transparent',});
								},{accX: 0, accY: -200});
							}							
						});
					</script>";


    return $html;
}
}
add_shortcode('pie_chart3', 'pie_chart3');

/* Line graph shortcode */

if (!function_exists('line_graph')) {
function line_graph($atts, $content = null) {
	global $qode_options_infographer;
	extract(shortcode_atts(array("type" => "rounded", "custom_color" => "", "labels" => "", "width" => "900", "height" => "350", "scale_steps" => "6", "scale_step_width" => "20"), $atts));
	$id = mt_rand(1000, 9999);
	if($type == "rounded"){
		$bezierCurve = "true";
	}else{
		$bezierCurve = "false";
	}
	
	$id = mt_rand(1000, 9999);
	$html = "
					<div class='line_graf_holder'>
					<div class='line_graf'>
						<canvas id='lineGraph".$id."' height='".$height."' width='".$width."'></canvas>
					</div>
					<div class='line_graf_legend'>
						<ul>";
	$line_graph_array = explode(";", $content);
	for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1)
	{
		$line_graph_el = explode(",", $line_graph_array[$i]);
		$html .=  "
							<li>
								<div class='color_holder' style='background-color: " . trim($line_graph_el[0]) . ";'></div>
								<p style='color: ".$custom_color.";'>" . trim($line_graph_el[1]) . "</p>
							</li>";   
	}
	 $html .=  "
						</ul>
					</div>
				</div>
				<script>
					var lineGraph".$id." = {
					labels : [";
	$line_graph_labels_array = explode(",", $labels);
	for ($i = 0 ; $i < count($line_graph_labels_array) ; $i = $i + 1){
		if ($i > 0) $html .= ",";
		$html .=  '"'.$line_graph_labels_array[$i].'"';
		
	}
	 $html .= "],";
	 $html .=			"datasets : [";
	$line_graph_array = explode(";", $content);
	for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1)
	{
		$line_graph_el = explode(",", $line_graph_array[$i]);
		if ($i > 0) $html .= ",";
		$values = "";
		for ($j = 2 ; $j < count($line_graph_el) ; $j = $j + 1)
		{
			if ($j > 2) $values .= ",";
			$values .= $line_graph_el[$j];
		}
		$color = hex2rgb(trim($line_graph_el[0]));
		$html .=  "
						{
							fillColor: 'rgba(".$color[0].",".$color[1].",".$color[2].",0.7)',
							data:[" . $values . "]
						}";   
	}
	if(!empty($qode_options_infographer['text_fontsize'])){
		$text_fontsize = $qode_options_infographer['text_fontsize'];
	}else{
		$text_fontsize = 13;
	}
	if(!empty($qode_options_infographer['text_color']) && $custom_color == ""){
		$text_color = $qode_options_infographer['text_color'];
	} else if(empty($qode_options_infographer['text_color']) && $custom_color != ""){
		$text_color = $custom_color;
	} else if(!empty($qode_options_infographer['text_color']) && $custom_color != ""){
		$text_color = $custom_color;
	}else{
		$text_color = '#4F4F4F';
	}
	 $html .=  "
					]};
					var \$j = jQuery.noConflict();
					\$j(document).ready(function() {
						if(\$j('.touch .no_delay').length){
							new Chart(document.getElementById('lineGraph".$id."').getContext('2d')).Line(lineGraph".$id.",{scaleOverride : true,
							scaleStepWidth : ".$scale_step_width.",
							scaleSteps : ".$scale_steps.",
							bezierCurve : ".$bezierCurve.",
							pointDot : false,
							scaleLineColor: '#000000',
							scaleFontColor : '".$text_color."',
							scaleFontSize : ".$text_fontsize.",
							scaleGridLineColor : '#e1e1e1',
							datasetStroke : false,
							datasetStrokeWidth : 0,
							animationSteps : 120,});
						}else{
							\$j('#lineGraph".$id."').appear(function() {
								new Chart(document.getElementById('lineGraph".$id."').getContext('2d')).Line(lineGraph".$id.",{scaleOverride : true,
								scaleStepWidth : ".$scale_step_width.",
								scaleSteps : ".$scale_steps.",
								bezierCurve : ".$bezierCurve.",
								pointDot : false,
								scaleLineColor: '#000000',
								scaleFontColor : '".$text_color."',
								scaleFontSize : ".$text_fontsize.",
								scaleGridLineColor : '#e1e1e1',
								datasetStroke : false,
								datasetStrokeWidth : 0,
								animationSteps : 120,});
							},{accX: 0, accY: -200});
						}						
					});
				</script>";


	return $html;
}
}
add_shortcode('line_graph', 'line_graph');

/* Services shortcode */

if (!function_exists('service')) {
function service($atts, $content = null) {
    $html = ""; 
	extract(shortcode_atts(array("type"=>"", "position" => "", "background_color" => "" ,"text" => "", "link" => "", "target" => "", "icon_color" => "", "icon" => "", "animation_in" => "", "hover" => "", "delay" => "") , $atts));	
	$html .= '<div class="fade_in_circle_holder" data-delay="'.$delay.'">';
	if ($type == "text"){
		if($link != ""){
			$html .= '<a href="'.$link.'" target="'.$target.'"><div class="fade_in_circle '.$position.'" style="background-color: '.$background_color.';"><div class="fade_in_content '.$animation_in.' '.$hover.'"><h4>'.$text.'</h4></div></div></a>';
		} else{
			$html .= '<div class="fade_in_circle '.$position.'" style="background-color: '.$background_color.';"><div class="fade_in_content '.$animation_in.' '.$hover.'"><h4>'.$text.'</h4></div></div>';
		}
	} else {
		if($link != ""){
			$html .= '<a href="'.$link.'" target="'.$target.'"><div class="fade_in_circle '.$position.'" style="background-color: '.$background_color.';"><div class="fade_in_content '.$animation_in.' '.$hover.'"><div class="icon retina '.$icon_color.' '.$icon.'"></div></div></div></a>';
		} else{
			$html .= '<div class="fade_in_circle '.$position.'" style="background-color: '.$background_color.';"><div class="fade_in_content '.$animation_in.' '.$hover.'"><div class="icon retina '.$icon_color.' '.$icon.'"></div></div></div>';
		}
	}
		
	$html .= '</div>';
	
	return $html;
}
}
add_shortcode('service', 'service');


/* Video shortcode */

if (!function_exists('video')) {
function video($atts, $content = null) {
    $html = ""; 
	extract(shortcode_atts(array("type"=>"youtube", "id"=>"", "height"=>"") , $atts));	
	$html .= "<div class='video_holder'>"; 
	if($type == 'youtube'){
		$html .= '<iframe title="YouTube video player" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>';
	}elseif($type == 'vimeo'){
		$html .= '<iframe src="http://player.vimeo.com/video/' . $id . '" height="' . $height . '" frameborder="0"></iframe>';
	}
	$html .= "</div>"; 
	return $html;
}
}
add_shortcode('video', 'video');

/* Latest post shortcode */

if (!function_exists('latest_post')) {
function latest_post($atts, $content = null) {
	global $qode_options_infographer;
  	$html = ""; 
		extract(shortcode_atts(array("type" => "", "post_number" => "", "category" => "", "text_length" => ""), $atts));
		
		$q = new WP_Query( 
		   array( 'orderby' => 'date', 'posts_per_page' => $post_number, 'category_name' => $category) 
		);		

		if($type == "" || $type == "large"){
			$html .= "<div class='latest_post_section clearfix'>";

			while($q->have_posts()) : $q->the_post();
			
				$html .= '<div class="latest_post_holder ';
				if($post_number == 2){
					$html .= 'two';
				} else if($post_number == 3){
					$html .= 'three';
				} else if($post_number == 4){
					$html .= 'four';
				} 

				if($text_length > 0){
					$html .= '"><div class="latest_post_content"><a href="'. get_permalink() .'">' . get_the_post_thumbnail(get_the_id(),'latest_posts') . '</a><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>' . '<p>' . substr(get_the_excerpt(), 0, intval($text_length)) . '...</p></div></div>';
				} else {
					$html .= '"><div class="latest_post_desc"><div class="latest_post_date">'. get_post_time('d') .'<p>'. get_post_time('M Y') .'</p></div><p>Posted by <strong>'.get_the_author().'</strong></p><p>Category <strong>'.get_the_category_list(', ').'</strong></p></div><div class="latest_post_content"><a href="'. get_permalink() .'">' . get_the_post_thumbnail(get_the_id(),'latest_posts') . '</a><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4></div></div>';
				}
			
			endwhile;

			wp_reset_query();

			$html .= "</div>";
		} else {
			$html .= "<div class='latest_post_small_holder clearfix'>";

			while($q->have_posts()) : $q->the_post();
			
				$html .= '<div class="latest_post_small';

				if($text_length > 0){
					$html .= '"><div class="date_holder"><span class="day">'. get_post_time('d') .'</span><span class="month">'. get_post_time('M') .'</span></div><div class="content_holder"><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>' . '<p>' . substr(get_the_excerpt(), 0, intval($text_length)) . '...</p></div></div>';
				} else {
					$html .= '"><div class="date_holder"><span class="day">'. get_post_time('d') .'</span><span class="month">'. get_post_time('M') .'</span></div><div class="content_holder"><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4></div></div>';
				}
			
			endwhile;

			wp_reset_query();

			$html .= "</div>";	
		}

	return $html;	
}
}
add_shortcode('latest_post', 'latest_post');

/* Counter shortcode */

if (!function_exists('counter')) {
function counter($atts, $content = null) {
		extract(shortcode_atts(array("type" => "", "position" => "", "delay" => "", "digit" => "", "font_size" => "", "font_color" => ""), $atts));
    $html = "";  
		$html .=  '<div class="counter_holder '.$position.'"';
		if($font_size || $font_color){
			$html .= 'style="color:'.$font_color.'; font-size:'.$font_size.'px;"';
		}
		$html .= '><span class="counter '.$type.'" data-delay="'.$delay.'"';
		if($font_size || $font_color){
			$html .= 'style="height:'.$font_size.'px; line-height:'.$font_size.'px;"';
		}
		$html .= '>'.$digit.'</span>'.no_wpautop($content).'</div>';

    return $html;
}
}
add_shortcode('counter', 'counter');

/* Section shortcode */

if (!function_exists('section')) {
function section($atts, $content = null) {
	extract(shortcode_atts(array("color" => "", "title"=> "", "id"=>"", "full_width" => "", "show_in_menu"=>"", "top_bottom_padding"=>""), $atts));
	$html = "";
	$html .= "<section class='content_section ".$full_width;
	if($show_in_menu == "yes" || $show_in_menu == ""){
	 $html .= " in_menu";
	}
	$html .= "' ";
	if($title != ""){
		$html .= "data-title='".$title."' ";
	}
	if($id != ""){
		$html .= "id='".$id."' ";
	}
	$html .= "style='";
	if($color != ""){
		$html .= "background-color:".$color.";";
	}
	if($top_bottom_padding != ""){
		$html .= " padding-top:".$top_bottom_padding."px; padding-bottom:".$top_bottom_padding."px";
	}
	$html .= "'>";
	$html .= no_wpautop($content);
	$html .= "</section>";
	return $html;
}
}
add_shortcode('section', 'section');

/* Section menu */

if (!function_exists('section_menu')) {
function section_menu($atts, $content = null) {
	global $qode_options_infographer;
	
	extract(shortcode_atts(array("background_color" => ""), $atts));
	
	ob_start();
  
	$html = "";
	$html .= "<nav class='content_menu' style='background-color: ".$background_color.";'>";
	if($qode_options_infographer['header_hide'] == "yes"){
		$html .= '<div class="logo"><a href="'.home_url().'/"><img src="'. $qode_options_infographer['logo_image'] .'" alt="Logo"/></a></div>';
	}
	$html .= "<div class='back_outer'><div class='back'><a href='#'>&nbsp;</a></div></div><div class='nav_select_menu clearfix'><div class='nav_select_button'></div></div></nav>";
	return $html;
	ob_end_clean();
}
}
add_shortcode('section_menu', 'section_menu');
<?php

$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));

if ( file_exists( $root.'/wp-load.php' ) ) {

    require_once( $root.'/wp-load.php' );

} elseif ( file_exists( $root.'/wp-config.php' ) ) {

    require_once( $root.'/wp-config.php' );

}

header('Content-type: text/javascript');



?>



<?php



if($qode_options_infographer['second_color'] != ""){

	$trackColor = $qode_options_infographer['second_color'];

}else{

	$trackColor = "#f4f4f4";

}



if($qode_options_infographer['first_color'] != ""){

	$barColor = $qode_options_infographer['first_color'];

}else{

	$barColor = '#009CFF';

}



?>



<?php

if($qode_options_infographer['menu_lineheight'] != ""){

	$line_height = $qode_options_infographer['menu_lineheight'];

}else{

	$line_height = 80;

}



if($qode_options_infographer['content_menu_lineheight'] != ""){

	$content_line_height = $qode_options_infographer['content_menu_lineheight'];

}else{

	$content_line_height = 50;

}

?>

var line_height = <?php echo $line_height; ?>;

var logo_height; // it's value is calculated in window load function

var contentTop = <?php echo $line_height; ?>;

var content_line_height = <?php echo $content_line_height; ?>;



function headerSize(scroll){

	"use strict";



	if((line_height - scroll) > 50){	

		$j('header .logo').css({'top': (line_height - scroll)/2});

		$j('header .header_inner nav.main_menu > ul > li > a').css({'line-height': line_height - scroll +'px'});

		$j('header .logo').css({'height': line_height - scroll +'px'});

		$j('header .header_inner .header_right_widget').css({'line-height': line_height - scroll+'px'});

		$j('header .header_inner .drop_down .second').css({'top': line_height - scroll+'px'});

		$j('header .header_inner .drop_down2 .second').css({'top': line_height - scroll+'px'});

		

	}else if((line_height - scroll) <= 50){

		$j('header .logo').css({'top': 50/2});

		$j('header').addClass('move_menu');

		$j('header .header_inner nav.main_menu > ul > li > a').css({'line-height': '50px'});

		$j('header .logo').css({'height': '50px'});

		$j('header .header_inner .header_right_widget').css({'line-height': '50px'});

		$j('header .header_inner .drop_down .second').css({'top': '50px'});

		$j('header .header_inner .drop_down2 .second').css({'top': '50px'});

		

	}else if(scroll === 0){

		$j('header .logo').stop().animate({'top': line_height/2+'px'},100);

		$j('header .header_inner nav.main_menu > ul > li > a').css({'line-height': line_height+'px'});

		$j('header .logo').css({'height': line_height+'px'});

		$j('header .header_inner .header_right_widget').css({'line-height': line_height+'px'});

		$j('header .header_inner .drop_down .second').css({'top': line_height+'px'});

		$j('header .header_inner .drop_down2 .second').css({'top': line_height+'px'});

		$j('header').removeClass('move_menu');

		

	}

	

	if((line_height - scroll < logo_height) && (line_height - scroll) > 50 && logo_height > 45){

		$j('header .logo a').height(line_height - scroll - 5);

	}else if((line_height - scroll < logo_height) && (line_height - scroll) < 50 && logo_height > 45){

		$j('header .logo a').height(50 - 5);

	}else if(scroll === 0 && logo_height > 45){

		$j('header .logo a').height(logo_height);

	}

	

}



function setLogoHeightOnLoad(){

	"use strict";

	

	//logo in header

	$j('header .logo').css('top', line_height/2);

	

	if(line_height - logo_height >= 10){

		$j('header .logo a').height(logo_height);

	}else if(line_height - logo_height < 10){

		$j('header .logo a').height(line_height - 5);

	}

	$j('header .logo a').css('visibility','visible');

	

	//logo in content menu

	$j('.content_menu .logo').css('top', content_line_height/2);

	

	if(content_line_height - logo_height >= 10){

		$j('.content_menu .logo a').height(logo_height);

	}else if(content_line_height - logo_height < 10){

		$j('.content_menu .logo a').height(content_line_height - 5);

	}

	$j('.content_menu .logo a').css('visibility','visible');

	

	$j('.logo img').css('height','100%');

}



function ajaxSubmitCommentForm(){

	"use strict";



	var options = { 

		success: function(){

			$j("#commentform textarea").val("");

			$j("#commentform .success p").text("<?php _e('Comment has been sent!','qode'); ?>");

		}

	}; 

	

	$j('#commentform').submit(function() {

		$j(this).find('input[type="submit"]').next('.success').remove();

		$j(this).find('input[type="submit"]').after('<div class="success"><p></p></div>');

		$j(this).ajaxSubmit(options); 

		return false; 

	}); 

}



<?php

if($qode_options_infographer['enable_google_map'] != ""){

?>



var geocoder;

var map;



function initialize() {

	"use strict";



	geocoder = new google.maps.Geocoder();

	var latlng = new google.maps.LatLng(-34.397, 150.644);

	var myOptions = {

		zoom: 12,

		center: latlng,

		zoomControl: true,

		zoomControlOptions: {

			style: google.maps.ZoomControlStyle.SMALL,

			position: google.maps.ControlPosition.RIGHT_CENTER

		},

		scaleControl: false,

			scaleControlOptions: {

			position: google.maps.ControlPosition.LEFT_CENTER

		},

		streetViewControl: false,

			streetViewControlOptions: {

			position: google.maps.ControlPosition.LEFT_CENTER

		},

		panControl: false,

		panControlOptions: {

			position: google.maps.ControlPosition.LEFT_CENTER

		},

		mapTypeControl: false,

		mapTypeControlOptions: {

			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'pink_parks'],

			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,

			position: google.maps.ControlPosition.LEFT_CENTER

		},

		mapTypeId: google.maps.MapTypeId.ROADMAP

	};

	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

}



function codeAddress(data) {

	"use strict";



	var contentString = '<div id="content">'+

	'<div id="siteNotice">'+

	'</div>'+

	'<div id="bodyContent">'+

	'<p>'+data+'</p>'+

	'</div>'+

	'</div>';

	var infowindow = new google.maps.InfoWindow({

		content: contentString

	});

	geocoder.geocode( { 'address': data}, function(results, status) {

		if (status === google.maps.GeocoderStatus.OK) {

			map.setCenter(results[0].geometry.location);

			var marker = new google.maps.Marker({

				map: map, 

				position: results[0].geometry.location,

				<?php if(isset($qode_options_infographer['google_maps_pin_image'])){ ?>

				icon:  '<?php echo $qode_options_infographer['google_maps_pin_image']; ?>',

				<?php } ?>

				title: data['store_title']

			});

			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open(map,marker);

			});

			//infowindow.open(map,marker);

		}

	});

}



var $j = jQuery.noConflict();



$j(document).ready(function() {

	"use strict";



	showContactMap();

	

	<?php

	$has_ajax = false;

	

	$qode_animation = "";

	if (isset($_SESSION['qode_animation']))

		$qode_animation = $_SESSION['qode_animation'];

		

	if (($qode_options_infographer['page_transitions'] != "0") && (empty($qode_animation) || ($qode_animation != "no")))

		$has_ajax = true;

	elseif (!empty($qode_animation) && ($qode_animation != "no"))

		$has_ajax = true;

		

	if ($has_ajax) :

	?>

		balanceNavArrows();

	<?php endif; ?>

	

});

<?php

}

?>



function showContactMap() {

	"use strict";



	if($j("#map_canvas").length > 0){

		initialize();

		codeAddress('<?php if(isset($qode_options_infographer['google_maps_address'])) { echo $qode_options_infographer['google_maps_address']; } ?>');

	}

}





var no_ajax_pages = [];

var root = '<?php echo home_url(); ?>/';

<?php if($qode_options_infographer['parallax_speed'] != ''){ ?>

var parallax_speed = <?php echo $qode_options_infographer['parallax_speed']; ?>;

<?php }else{ ?>

var parallax_speed = 1;

<?php } ?>



<?php if($qode_options_infographer['header_hide'] == 'no' && $qode_options_infographer['header_fixed'] == 'yes'){ ?>

	var header_height = 50;

<?php }else{ ?>

	var header_height = 0;

<?php } ?>





<?php 

$pages = get_pages(); 

foreach ($pages as $page) {

	if(get_post_meta($page->ID, "qode_show-animation", true) == "no_animation") :

?>

		no_ajax_pages.push('<?php echo get_permalink($page->ID) ?>');

<?php

	endif;

}

if (isset($qode_options_infographer['internal_no_ajax_links'])) {

	foreach (explode(',', $qode_options_infographer['internal_no_ajax_links']) as $no_ajax_link) {

?>

		no_ajax_pages.push('<?php echo trim($no_ajax_link); ?>');

<?php

	}

}

?>
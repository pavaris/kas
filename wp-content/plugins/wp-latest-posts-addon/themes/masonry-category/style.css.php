<?php header("Content-type: text/css"); ?>
/*
Theme Name: Masonry Category theme
*/

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts .masonry-category a {
    border: 0px;
}

/* Global */
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts {
	width:auto !important;
}



#wpcufpn_widget_<?php echo $_GET['id']; ?>  .wpcufpn_thumb, #wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_default {
	width:100% !important;
	height:auto !important;
	position:relative;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?>  .img_cropper {
	position:relative;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper img  {
	transition:all 0.2s linear;	
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li:hover .img_cropper img {
  -webkit-transform:scale(1.10); /* Safari and Chrome */
    -moz-transform:scale(1.10); /* Firefox */
    -ms-transform:scale(1.10); /* IE 9 */
    -o-transform:scale(1.10); /* Opera */
     transform:scale(1.10);
}




#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.aside:before {
	content: '\f123';
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.audio:before {
	content: '\f127';
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.chat:before {
	content: '\f125';
}
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.gallery:before {
	content: '\f161';
}
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.image:before {
	content: '\f128';
}
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.link:before {
	content: '\f103';
}
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.quote:before {
	content: '\f122';
}
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.status:before {
	content: '\f130';
}
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper.video:before {
	content: '\f126';
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li:hover .img_cropper:before,
#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li:hover .img_cropper:after {
opacity:1;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li:hover .img_cropper:before {
	 -webkit-transform:scale(1); /* Safari and Chrome */
    -moz-transform:scale(1); /* Firefox */
    -ms-transform:scale(1); /* IE 9 */
    -o-transform:scale(1); /* Opera */
     transform:scale(1);
}





#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper:before {
	content: '\f109';
	font: 400 20px/1 dashicons;
	 -webkit-transform:scale(1.5); /* Safari and Chrome */
    -moz-transform:scale(1.5); /* Firefox */
    -ms-transform:scale(1.5); /* IE 9 */
    -o-transform:scale(1.5); /* Opera */
     transform:scale(1.5);
	speak: none;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	transition: all 0.2s linear;
	position: absolute;
	color:#fff;
	width: 50px;
	font-size: 36px;
	line-height: 50px;
	text-align: center;
	height: 50px;
	opacity: 0;
	border-radius:5px;
	display: inline-block;
	z-index: 10;
	top: 50%;
	margin-top: -25px;
	margin-left: -25px;
	left: 50%;
	background: center center no-repeat <?php echo $_GET['colorfull']; ?>;	

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li .img_cropper:after {
	content: " ";	
	transition:all 0.2s linear;
	position:absolute;
	-webkit-box-shadow:inset 0 0 10px 2px rgba(0,0,0,0.4);
	box-shadow:inset 0 0 10px 2px rgba(0,0,0,0.4);
	width:100%;
	height:100%;
	opacity:0;
	display:inline-block;
	z-index: 1;
	top:0;
	left:0;
	bottom:0;
	right:0;
	background:rgba(0,0,0,0.5);		
}



#wpcufpn_widget_<?php echo $_GET['id']; ?>  .title span{
	margin: 10px auto 0px;
	width: 100%;
	text-align: center;
	color: #585858;
	font-weight: lighter;
	font-size: 1.1em;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .date {
color: #999;
font-size: 0.75em;
margin-left: 20px;
text-decoration: none !important;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .masonry-category .wpcu-front-box.bottom .category {
	text-transform: uppercase;
	display: block;
	text-align: center;
	font-weight: 500;
	color: #999;
	letter-spacing: 2px;
	font-size: 0.8em;
	margin-bottom: 7px;		
	position:relative;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .masonry-category .wpcu-front-box.bottom .category:before {
	content: " ";
	display: block;
	position: relative;
	height: 2px;
	width: 30%;
	margin: 0 auto 6px;
	background:<?php echo $_GET['color']; ?>;
}



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container a,#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container a:hover {
	text-decoration:none !important;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .date:hover {
text-decoration:none !important;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .text {
text-decoration: none !important;
color: #555;
line-height: 1.3;
font-size: 0.9em;
margin: 10px 20px;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .text span {
overflow: initial;
text-overflow: initial;
max-width: 100%;
}



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .read-more {
	border-top:1px solid  <?php echo $_GET['color']; ?>;
	margin:5px;text-decoration: none !important;
	padding:5px;	
	font-size:0.9em;
}


#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .read-more {
	border-top:1px solid  <?php echo $_GET['color']; ?>;
	margin:5px 20px;
	padding:5px;	
	font-weight:bold;
	text-align:left;
	transition:all 0.2s linear;
	font-size:0.9em;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container .read-more:hover {
	color:#000;
}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_container .title .line_limit {
	height:auto !important;
}

<?php 
/*
 * $_GET['nbcol'];
 */ 

 $widthtotal = 90;
 $width1=$widthtotal/$_GET['nbcol'];
 $width2=($_GET['nbcol']==1?$widthtotal:$widthtotal/2);

?>

#wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li {
	margin-bottom: 10px;
	width: <?php echo $width1; ?>%;
	border: 1px solid #cccccc;
	padding:0;
}


@media screen and (max-width: 640px) {
	 #wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li {
		width: <?php echo $width2; ?>% !important;
	}
}


@media screen and (max-width: 400px) {
	 #wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_listposts li {
		width:100% !important;
	}
}




#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container {
	height: auto !important;
	width: auto !important;
}

.wpcufpn_widget_<?php echo $_GET['id']; ?> .wpcufpn_nav {
	display:none !important;
}

/*
#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container ul {
	position:relative;
	overflow:auto;
}
*/

@font-face {
	font-family: 'Pe-icon-7-stroke';
	src:url('fonts/Pe-icon-7-stroke.eot?-2irksn');
	src:url('fonts/Pe-icon-7-stroke.eot?#iefix-2irksn') format('embedded-opentype'),
		url('fonts/Pe-icon-7-stroke.woff?-2irksn') format('woff'),
		url('fonts/Pe-icon-7-stroke.ttf?-2irksn') format('truetype'),
		url('fonts/Pe-icon-7-stroke.svg?-2irksn#Pe-icon-7-stroke') format('svg');
	font-weight: normal;
	font-style: normal;
}

[class^="pe-7s-"], [class*=" pe-7s-"] {
	display: inline-block;
	font-family: 'Pe-icon-7-stroke';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;

	/* Better Font Rendering =========== */
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.pe-7s-cloud-upload:before {
	content: "\e68a";
}
.pe-7s-cash:before {
	content: "\e68c";
}
.pe-7s-close:before {
	content: "\e680";
}
.pe-7s-bluetooth:before {
	content: "\e68d";
}
.pe-7s-cloud-download:before {
	content: "\e68b";
}
.pe-7s-way:before {
	content: "\e68e";
}
.pe-7s-close-circle:before {
	content: "\e681";
}
.pe-7s-id:before {
	content: "\e68f";
}
.pe-7s-angle-up:before {
	content: "\e682";
}
.pe-7s-wristwatch:before {
	content: "\e690";
}
.pe-7s-angle-up-circle:before {
	content: "\e683";
}
.pe-7s-world:before {
	content: "\e691";
}
.pe-7s-angle-right:before {
	content: "\e684";
}
.pe-7s-volume:before {
	content: "\e692";
}
.pe-7s-angle-right-circle:before {
	content: "\e685";
}
.pe-7s-users:before {
	content: "\e693";
}
.pe-7s-angle-left:before {
	content: "\e686";
}
.pe-7s-user-female:before {
	content: "\e694";
}
.pe-7s-angle-left-circle:before {
	content: "\e687";
}
.pe-7s-up-arrow:before {
	content: "\e695";
}
.pe-7s-angle-down:before {
	content: "\e688";
}
.pe-7s-switch:before {
	content: "\e696";
}
.pe-7s-angle-down-circle:before {
	content: "\e689";
}
.pe-7s-scissors:before {
	content: "\e697";
}
.pe-7s-wallet:before {
	content: "\e600";
}
.pe-7s-safe:before {
	content: "\e698";
}
.pe-7s-volume2:before {
	content: "\e601";
}
.pe-7s-volume1:before {
	content: "\e602";
}
.pe-7s-voicemail:before {
	content: "\e603";
}
.pe-7s-video:before {
	content: "\e604";
}
.pe-7s-user:before {
	content: "\e605";
}
.pe-7s-upload:before {
	content: "\e606";
}
.pe-7s-unlock:before {
	content: "\e607";
}
.pe-7s-umbrella:before {
	content: "\e608";
}
.pe-7s-trash:before {
	content: "\e609";
}
.pe-7s-tools:before {
	content: "\e60a";
}
.pe-7s-timer:before {
	content: "\e60b";
}
.pe-7s-ticket:before {
	content: "\e60c";
}
.pe-7s-target:before {
	content: "\e60d";
}
.pe-7s-sun:before {
	content: "\e60e";
}
.pe-7s-study:before {
	content: "\e60f";
}
.pe-7s-stopwatch:before {
	content: "\e610";
}
.pe-7s-star:before {
	content: "\e611";
}
.pe-7s-speaker:before {
	content: "\e612";
}
.pe-7s-signal:before {
	content: "\e613";
}
.pe-7s-shuffle:before {
	content: "\e614";
}
.pe-7s-shopbag:before {
	content: "\e615";
}
.pe-7s-share:before {
	content: "\e616";
}
.pe-7s-server:before {
	content: "\e617";
}
.pe-7s-search:before {
	content: "\e618";
}
.pe-7s-film:before {
	content: "\e6a5";
}
.pe-7s-science:before {
	content: "\e619";
}
.pe-7s-disk:before {
	content: "\e6a6";
}
.pe-7s-ribbon:before {
	content: "\e61a";
}
.pe-7s-repeat:before {
	content: "\e61b";
}
.pe-7s-refresh:before {
	content: "\e61c";
}
.pe-7s-add-user:before {
	content: "\e6a9";
}
.pe-7s-refresh-cloud:before {
	content: "\e61d";
}
.pe-7s-paperclip:before {
	content: "\e69c";
}
.pe-7s-radio:before {
	content: "\e61e";
}
.pe-7s-note2:before {
	content: "\e69d";
}
.pe-7s-print:before {
	content: "\e61f";
}
.pe-7s-network:before {
	content: "\e69e";
}
.pe-7s-prev:before {
	content: "\e620";
}
.pe-7s-mute:before {
	content: "\e69f";
}
.pe-7s-power:before {
	content: "\e621";
}
.pe-7s-medal:before {
	content: "\e6a0";
}
.pe-7s-portfolio:before {
	content: "\e622";
}
.pe-7s-like2:before {
	content: "\e6a1";
}
.pe-7s-plus:before {
	content: "\e623";
}
.pe-7s-left-arrow:before {
	content: "\e6a2";
}
.pe-7s-play:before {
	content: "\e624";
}
.pe-7s-key:before {
	content: "\e6a3";
}
.pe-7s-plane:before {
	content: "\e625";
}
.pe-7s-joy:before {
	content: "\e6a4";
}
.pe-7s-photo-gallery:before {
	content: "\e626";
}
.pe-7s-pin:before {
	content: "\e69b";
}
.pe-7s-phone:before {
	content: "\e627";
}
.pe-7s-plug:before {
	content: "\e69a";
}
.pe-7s-pen:before {
	content: "\e628";
}
.pe-7s-right-arrow:before {
	content: "\e699";
}
.pe-7s-paper-plane:before {
	content: "\e629";
}
.pe-7s-delete-user:before {
	content: "\e6a7";
}
.pe-7s-paint:before {
	content: "\e62a";
}
.pe-7s-bottom-arrow:before {
	content: "\e6a8";
}
.pe-7s-notebook:before {
	content: "\e62b";
}
.pe-7s-note:before {
	content: "\e62c";
}
.pe-7s-next:before {
	content: "\e62d";
}
.pe-7s-news-paper:before {
	content: "\e62e";
}
.pe-7s-musiclist:before {
	content: "\e62f";
}
.pe-7s-music:before {
	content: "\e630";
}
.pe-7s-mouse:before {
	content: "\e631";
}
.pe-7s-more:before {
	content: "\e632";
}
.pe-7s-moon:before {
	content: "\e633";
}
.pe-7s-monitor:before {
	content: "\e634";
}
.pe-7s-micro:before {
	content: "\e635";
}
.pe-7s-menu:before {
	content: "\e636";
}
.pe-7s-map:before {
	content: "\e637";
}
.pe-7s-map-marker:before {
	content: "\e638";
}
.pe-7s-mail:before {
	content: "\e639";
}
.pe-7s-mail-open:before {
	content: "\e63a";
}
.pe-7s-mail-open-file:before {
	content: "\e63b";
}
.pe-7s-magnet:before {
	content: "\e63c";
}
.pe-7s-loop:before {
	content: "\e63d";
}
.pe-7s-look:before {
	content: "\e63e";
}
.pe-7s-lock:before {
	content: "\e63f";
}
.pe-7s-lintern:before {
	content: "\e640";
}
.pe-7s-link:before {
	content: "\e641";
}
.pe-7s-like:before {
	content: "\e642";
}
.pe-7s-light:before {
	content: "\e643";
}
.pe-7s-less:before {
	content: "\e644";
}
.pe-7s-keypad:before {
	content: "\e645";
}
.pe-7s-junk:before {
	content: "\e646";
}
.pe-7s-info:before {
	content: "\e647";
}
.pe-7s-home:before {
	content: "\e648";
}
.pe-7s-help2:before {
	content: "\e649";
}
.pe-7s-help1:before {
	content: "\e64a";
}
.pe-7s-graph3:before {
	content: "\e64b";
}
.pe-7s-graph2:before {
	content: "\e64c";
}
.pe-7s-graph1:before {
	content: "\e64d";
}
.pe-7s-graph:before {
	content: "\e64e";
}
.pe-7s-global:before {
	content: "\e64f";
}
.pe-7s-gleam:before {
	content: "\e650";
}
.pe-7s-glasses:before {
	content: "\e651";
}
.pe-7s-gift:before {
	content: "\e652";
}
.pe-7s-folder:before {
	content: "\e653";
}
.pe-7s-flag:before {
	content: "\e654";
}
.pe-7s-filter:before {
	content: "\e655";
}
.pe-7s-file:before {
	content: "\e656";
}
.pe-7s-expand1:before {
	content: "\e657";
}
.pe-7s-exapnd2:before {
	content: "\e658";
}
.pe-7s-edit:before {
	content: "\e659";
}
.pe-7s-drop:before {
	content: "\e65a";
}
.pe-7s-drawer:before {
	content: "\e65b";
}
.pe-7s-download:before {
	content: "\e65c";
}
.pe-7s-display2:before {
	content: "\e65d";
}
.pe-7s-display1:before {
	content: "\e65e";
}
.pe-7s-diskette:before {
	content: "\e65f";
}
.pe-7s-date:before {
	content: "\e660";
}
.pe-7s-cup:before {
	content: "\e661";
}
.pe-7s-culture:before {
	content: "\e662";
}
.pe-7s-crop:before {
	content: "\e663";
}
.pe-7s-credit:before {
	content: "\e664";
}
.pe-7s-copy-file:before {
	content: "\e665";
}
.pe-7s-config:before {
	content: "\e666";
}
.pe-7s-compass:before {
	content: "\e667";
}
.pe-7s-comment:before {
	content: "\e668";
}
.pe-7s-coffee:before {
	content: "\e669";
}
.pe-7s-cloud:before {
	content: "\e66a";
}
.pe-7s-clock:before {
	content: "\e66b";
}
.pe-7s-check:before {
	content: "\e66c";
}
.pe-7s-chat:before {
	content: "\e66d";
}
.pe-7s-cart:before {
	content: "\e66e";
}
.pe-7s-camera:before {
	content: "\e66f";
}
.pe-7s-call:before {
	content: "\e670";
}
.pe-7s-calculator:before {
	content: "\e671";
}
.pe-7s-browser:before {
	content: "\e672";
}
.pe-7s-box2:before {
	content: "\e673";
}
.pe-7s-box1:before {
	content: "\e674";
}
.pe-7s-bookmarks:before {
	content: "\e675";
}
.pe-7s-bicycle:before {
	content: "\e676";
}
.pe-7s-bell:before {
	content: "\e677";
}
.pe-7s-battery:before {
	content: "\e678";
}
.pe-7s-ball:before {
	content: "\e679";
}
.pe-7s-back:before {
	content: "\e67a";
}
.pe-7s-attention:before {
	content: "\e67b";
}
.pe-7s-anchor:before {
	content: "\e67c";
}
.pe-7s-albums:before {
	content: "\e67d";
}
.pe-7s-alarm:before {
	content: "\e67e";
}
.pe-7s-airplay:before {
	content: "\e67f";
}



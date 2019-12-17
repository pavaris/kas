<?php header("Content-type: text/css"); ?>

/*

Theme Name: Masonry Category theme

*/





#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container {

	text-align: inherit;

	display: block;

	overflow: visible;

	position: relative;

	height: auto;

	background: none;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container ul.flex-direction-nav {

	text-align: inherit;

	display: block;

	overflow: visible;

	position: initial;

	height: auto;

	background: none;

	margin: 0;

	padding: 0;

	list-style: none;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container ul.wpcufpn_listposts {

	width: 1000%;

	-webkit-transition: 0s;

	transition: 0s;

	-webkit-transform: translate3d(0px, 0px, 0px);

	transform: translate3d(0px, 0px, 0px);

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect span{

	color:#ffffff;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container ul.wpcufpn_listposts li {

	margin: initial;

	text-align: inherit;

	padding: 0;

	float: left;

	display: block;

	width: 250px;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect {

	height:400px;

	position:relative;

	background-size: cover; 

	margin-right: 10px !important;

	background-position:center center;

	background-repeat: no-repeat;	

	box-sizing: border-box;

	-moz-box-sizing: border-box;

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .timely {

  color: #fff;

  font-weight: 500;

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom {

	color: #ffffff;

	position: absolute;

	width: 100%;

	height: 60%;

	top: 40%;

	padding-left: 5%;

	padding-right: 5%;

	padding-top: 20px;

	left: 0%;

	background: rgba(0,0,0,0.5);

	right: 0%;

	box-sizing: border-box;

	-moz-box-sizing: border-box;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.top {

	color: #ffffff;

	position: absolute;

	width: 100%;

	height: 40%;

	top: 0%;

	padding-left: 5%;

	padding-right: 5%;

	padding-top: 20px;

	left: 0%;

	box-shadow: inset 0 -140px 70px -70px rgba(0,0,0,0.5);

	right: 0%;

	box-sizing: border-box;

	-moz-box-sizing: border-box;

}







#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom a .title {

	color: #fff;

	display: block;

	width: 100%;

	max-width: 100%;

	padding-top: 10px;

	margin-top: -30px;

	text-decoration: none;

	font-size: 1.35em;

	border-top: 1px solid rgba(255,255,255,0);

	transition:all 0.1s linear;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom a .title  .line_limit {

height:2.3em;

line-height: 1.35 !important;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom a:hover {

	text-decoration:none;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom a .text {

	color: rgba(255,255,255,0.85);

	text-decoration: none;

	font-size: 0.9em;

	font-weight: 100;

	margin-top: 0.5em;

	line-height: 1.4;

	padding-bottom:1em;

	border-bottom:1px solid rgba(255,255,255,0.4);

	transition:all 0.1s linear;

}







#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom a .read-more {

	color: rgba(255,255,255,0.4);

	text-decoration: none;

	font-size: 0.9em;

	font-weight: 100;

	margin-top: 1em;

	line-height: 1.35em;

	padding-bottom:1em;

	transition:all 0.1s linear;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.bottom a .text .line_limit {

	max-height:6.5em;

	height:6.5em !important;

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.top a .category {

	color: #ffffff;

	text-decoration: none;

	position: absolute;

	bottom: 5px;

	opacity:0;

	line-height: 1;

	font-size: 0.8em;

	transition:all 0.15s linear;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> .smooth-effect .wpcu-front-box.top a .date {

	color: #ffffff;

	text-decoration: none;

	position: absolute;

	bottom: 5px;

	right: 5%;

	opacity:0;

	line-height: 1;

	font-size: 0.8em;

	transition:all 0.15s linear;

}





/*

 * hover effect 

 */



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container li.smooth-effect:hover .wpcu-front-box a .title {

	border-top: 1px solid <?php echo $_GET['color']; ?>;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container li.smooth-effect:hover .wpcu-front-box a .text {

	border-bottom: 1px solid <?php echo $_GET['color']; ?>;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> li.smooth-effect:hover .wpcu-front-box a .category {

	bottom: 20px;

	opacity:1;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> li.smooth-effect:hover .wpcu-front-box a .date {

	bottom: 20px;

	opacity:1;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> li.smooth-effect:hover .wpcu-front-box.bottom a .read-more {

	color: rgba(255,255,255,0.9);

}









.wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_outside {

	text-align: inherit;

	overflow: hidden;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container ul.wpcufpn_listposts {

	display: inherit;

	list-style: inherit;

	margin: inherit;

	padding: inherit;

	position: relative;

	overflow: visible;

}



div.wpcufpn_nav {display:none;}



<?php 

/*

 * $_GET['nbcol'];

 */ 



 $widthtotal = 90;

 $width1=$widthtotal/$_GET['nbcol'];

 $width2=($_GET['nbcol']==1?$widthtotal:$widthtotal/2);



?>





/*

 * jQuery FlexSlider v2.2.0

 * http://www.woothemes.com/flexslider/

 *

 * Copyright 2012 WooThemes

 * Free to use under the GPLv2 license.

 * http://www.gnu.org/licenses/gpl-2.0.html

 *

 * Contributing author: Tyler Smith (@mbmufffin)

 */





/* Browser Resets

*********************************/

.flex-container a:active,

.flexslider a:active,

.flex-container a:focus,

.flexslider a:focus  {outline: none;}

.slides,

.flex-control-nav,

.flex-direction-nav {margin: 0; padding: 0; list-style: none;}



/* Icon Fonts

*********************************/

/* Font-face Icons */

@font-face {

	font-family: 'flexslider-icon';

	src:url('fonts/flexslider-icon.eot');

	src:url('fonts/flexslider-icon.eot?#iefix') format('embedded-opentype'),

		url('fonts/flexslider-icon.woff') format('woff'),

		url('fonts/flexslider-icon.ttf') format('truetype'),

		url('fonts/flexslider-icon.svg#flexslider-icon') format('svg');

	font-weight: normal;

	font-style: normal;

}



/* FlexSlider Necessary Styles

*********************************/

.flexslider {margin: 0; padding: 0;}

.flexslider .slides > li {display: none; -webkit-backface-visibility: hidden;} /* Hide the slides before the JS is loaded. Avoids image jumping */

.flexslider .slides img {width: 100%; display: block;}

.flex-pauseplay span {text-transform: capitalize;}



/* Clearfix for the .slides element */

.slides:after {content: "\0020"; display: block; clear: both; visibility: hidden; line-height: 0; height: 0;}

html[xmlns] .slides {display: block;}

* html .slides {height: 1%;}



/* No JavaScript Fallback */

/* If you are not using another script, such as Modernizr, make sure you

 * include js that eliminates this class on page load */

.no-js .slides > li:first-child {display: block;}



/* FlexSlider Default Theme

*********************************/

.flexslider { margin: 0 0 60px; background: #fff; border: 4px solid #fff; position: relative; -webkit-border-radius: 4px; -moz-border-radius: 4px; -o-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: 0 1px 4px rgba(0,0,0,.2); -moz-box-shadow: 0 1px 4px rgba(0,0,0,.2); -o-box-shadow: 0 1px 4px rgba(0,0,0,.2); box-shadow: 0 1px 4px rgba(0,0,0,.2); zoom: 1; }

.flex-viewport { max-height: 2000px; -webkit-transition: all 1s ease; -moz-transition: all 1s ease; -o-transition: all 1s ease; transition: all 1s ease; }

.loading .flex-viewport { max-height: 300px; }

.flexslider .slides { zoom: 1; }

.carousel li { margin-right: 5px; }



.flex-viewport:hover {}



/* Direction Nav */

.flex-direction-nav {*height: 0;}

.flex-direction-nav a  {line-height:1; text-decoration:none; display: block; width: 40px; height: 40px; margin: -20px 0 0; position: absolute; top: 50%; z-index: 10; overflow: hidden; opacity: 0; cursor: pointer; color: rgba(0,0,0,0.8); text-shadow: 1px 1px 0 rgba(255,255,255,0.3); -webkit-transition: all .3s ease; -moz-transition: all .3s ease; transition: all .3s ease; }

.flex-direction-nav .flex-prev { left: -50px; }

.flex-direction-nav .flex-next { right: -50px; text-align: right; }

#wpcufpn_widget_<?php echo $_GET['id']; ?>:hover .flex-prev { opacity: 0.7; left: 10px; }

#wpcufpn_widget_<?php echo $_GET['id']; ?>:hover .flex-next { opacity: 0.7; right: 10px; }

#wpcufpn_widget_<?php echo $_GET['id']; ?>:hover .flex-next:hover, #wpcufpn_widget_<?php echo $_GET['id']; ?>:hover .flex-prev:hover { opacity: 1; color: rgba(255,255,255,1);}

.flex-direction-nav .flex-disabled { opacity: 0!important; filter:alpha(opacity=0); cursor: default; }

.flex-direction-nav a:before  { font-family: "flexslider-icon"; font-size: 40px; display: inline-block; content: '\f001'; }

.flex-direction-nav a.flex-next:before  { content: '\f002'; }



/* Pause/Play */

.flex-pauseplay a { display: block; width: 20px; height: 20px; position: absolute; bottom: 5px; left: 10px; opacity: 0.8; z-index: 10; overflow: hidden; cursor: pointer; color: #000; }

.flex-pauseplay a:before  { font-family: "flexslider-icon"; font-size: 20px; display: inline-block; content: '\f004'; }

.flex-pauseplay a:hover  { opacity: 1; }

.flex-pauseplay a.flex-play:before { content: '\f003'; }



/* Control Nav */

.flex-control-nav {width: 100%; position: absolute; bottom: -35px; text-align: center;}

.flex-control-nav li {margin: 0 6px; display: inline-block; zoom: 1; *display: inline;float: none;}

.flex-control-paging li a {width: 11px; height: 11px; display: block; background: #666; background: rgba(0,0,0,0.5); cursor: pointer; text-indent: -9999px; -webkit-border-radius: 20px; -moz-border-radius: 20px; -o-border-radius: 20px; border-radius: 20px; -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); -moz-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); -o-box-shadow: inset 0 0 3px rgba(0,0,0,0.3); box-shadow: inset 0 0 3px rgba(0,0,0,0.3); }

.flex-control-paging li a:hover { background: #333; background: rgba(0,0,0,0.7); }

.flex-control-paging li a.flex-active { background: #000; background: rgba(0,0,0,0.9); cursor: default; }



.flex-control-thumbs {margin: 5px 0 0; position: static; overflow: hidden;}

.flex-control-thumbs li {width: 25%; float: left; margin: 0;}

.flex-control-thumbs img {width: 100%; display: block; opacity: .7; cursor: pointer;}

.flex-control-thumbs img:hover {opacity: 1;}

.flex-control-thumbs .flex-active {opacity: 1; cursor: default;}



@media screen and (max-width: 860px) {

  .flex-direction-nav .flex-prev { opacity: 1; left: 10px;}

  .flex-direction-nav .flex-next { opacity: 1; right: 10px;}

}


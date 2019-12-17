<?php header("Content-type: text/css"); ?>

/*

Theme Name: Timeline theme

*/



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container {

	text-align: inherit;

	display: block;

	overflow: visible;

	height: auto;

	background: none;

	

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?> {

  position: relative;

  padding: 2em 0;

  margin-top: 2em;

  margin-bottom: 2em;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>::before {

  /* this is the vertical line */

  content: '';

  position: absolute;

  top: 0;

  left: 18px;

  height: 100%;

  width: 4px;

  background: #e3e4e8;

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



#wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_container ul.wpcufpn_listposts li {

	display: inline-block;

	float: inherit;

	margin: initial;

	text-align: inherit;

	padding:0;

}





.timeline .wpcu-front-box.bottom a .title {

	color: #555;

	display: block;

	font-weight: 400;

	margin: 10px 0 0;

	text-align: center;

	width: 100%;

	max-width: 100%;

	text-decoration: none;

	font-size: 1.35em;

	border-top: 1px solid rgba(255,255,255,0);

	transition: all 0.1s linear;

}

.timeline .wpcu-front-box.bottom a .title  .line_limit {

height:auto;

line-height: 1.35 !important;

}

.timeline .wpcu-front-box.bottom a:hover {

	text-decoration:none;

}



.timeline .wpcu-front-box.bottom a .text {

	color: rgba(0,0,0,0.85);

	text-decoration: none;

	font-size: 0.9em;

	font-weight: 100;

	line-height: 1.75em;

	border-bottom:1px solid rgba(255,255,255,0.4);

	transition:all 0.1s linear;

}



.timeline .wpcu-front-box.bottom a .text .line_limit {

	max-height:none;

}



.timeline .wpcu-front-box.bottom a .read-more {

	color: rgba(0,0,0,0.4);

	text-decoration: none;

	font-size: 0.9em;

	font-weight: 100;

	line-height: 1.35em;

	padding-bottom:1em;

	transition:all 0.1s linear;

}





.timeline .wpcu-front-box.bottom a .category { 

	color: #AAAAAA;

	text-transform: uppercase;

	text-decoration: none;

	opacity: 1;

	display: block;

	font-size: 0.8em;

	transition: all 0.15s linear;

	margin: 10px 0 15px;

	padding-bottom: 10px;

	border-bottom: 1px solid #e3e4e8;

}



.timeline .wpcu-front-box.top a .date { 

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









.wpcufpn_widget_<?php echo $_GET['id']; ?>.wpcufpn_outside {

	text-align: inherit;

	overflow: visible;

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



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?> {

  position: relative;

  padding: 2em 0;

  margin-top: 2em;

  margin-bottom: 2em;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>::before {

  /* this is the vertical line */

  content: '';

  position: absolute;

  top: 0;

  left: 18px;

  height: 100%;

  width: 2px;

  background: #e3e4e8;

}

@media only screen and (min-width: 760px) {

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?> {

    margin-top: 3em;

    margin-bottom: 3em;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>::before {

    left: 50%;

    margin-left: -1px;

  }

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline {

  position: relative;

  margin: 2em 0;

  width:100%;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:after {

  content: "";

  display: table;

  clear: both;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:first-child {

  margin-top: 0;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:last-child {

  margin-bottom: 0;

}

@media only screen and (min-width: 760px) {

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline {

    margin: 2em 0;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:first-child {

    margin-top: 0;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:last-child {

    margin-bottom: 0;

  }

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper {

  position: absolute;

	top: 10px;

	left: 0;

	width: 40px;

	height: 40px;

	border-radius: 50%;

	box-shadow: 0 0 0 3px #e3e4e8;

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper img {display:none !important;}



<?php

if ($_GET['colorfull']=="rgba(255,255,255,1)"){

	$innercolor="#000";

}

else {

	$innercolor="#fff";

}

?>



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper:before {

	content: '\f109';

	font: 400 16px/1 dashicons;

	-webkit-transform: scale(1.5);

	-moz-transform: scale(1.5);

	-ms-transform: scale(1.5);

	-o-transform: scale(1.5);

	transform: scale(1.5);

	speak: none;

	-webkit-font-smoothing: antialiased;

	-moz-osx-font-smoothing: grayscale;

	display: block;

	width: 100%;

	color: <?php echo $innercolor; ?>;

	line-height: 40px;

	height: 100%;

	text-align: center;

	position: relative;

	left: 0;

	top: 0;

  background: <?php echo $_GET['colorfull']; ?>;

}





/*

 * Dash Icon

 */

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.aside:before {

	content: '\f123';

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.audio:before {

	content: '\f127';

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.chat:before {

	content: '\f125';

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.gallery:before {

	content: '\f161';

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.image:before {

	content: '\f128';

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.link:before {

	content: '\f103';

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.quote:before {

	content: '\f122';

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.status:before {

	content: '\f130';

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.video:before {

	content: '\f126';

}





  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .img_cropper img {

  	width:100%;

  	height:auto;

  }









@media only screen and (min-width: 760px) {

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper {

   width: 40px;

height: 40px;

left: 50%;

margin-left: -20px;

-webkit-transform: translateZ(0);

-webkit-backface-visibility: hidden;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.is-hidden {

    visibility: hidden;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.top .img_cropper.bounce-in {

    visibility: visible;

    -webkit-animation: cd-bounce-1 0.6s;

    -moz-animation: cd-bounce-1 0.6s;

    animation: cd-bounce-1 0.6s;

  }

}



@-webkit-keyframes cd-bounce-1 {

  0% {

    opacity: 0;

    -webkit-transform: scale(0.5);

  }



  60% {

    opacity: 1;

    -webkit-transform: scale(1.2);

  }



  100% {

    -webkit-transform: scale(1);

  }

}

@-moz-keyframes cd-bounce-1 {

  0% {

    opacity: 0;

    -moz-transform: scale(0.5);

  }



  60% {

    opacity: 1;

    -moz-transform: scale(1.2);

  }



  100% {

    -moz-transform: scale(1);

  }

}

@keyframes cd-bounce-1 {

  0% {

    opacity: 0;

    -webkit-transform: scale(0.5);

    -moz-transform: scale(0.5);

    -ms-transform: scale(0.5);

    -o-transform: scale(0.5);

    transform: scale(0.5);

  }



  60% {

    opacity: 1;

    -webkit-transform: scale(1.2);

    -moz-transform: scale(1.2);

    -ms-transform: scale(1.2);

    -o-transform: scale(1.2);

    transform: scale(1.2);

  }



  100% {

    -webkit-transform: scale(1);

    -moz-transform: scale(1);

    -ms-transform: scale(1);

    -o-transform: scale(1);

    transform: scale(1);

  }

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom {

  position: relative;

  margin-left: 60px;

  background: white;

  border-radius: 0.25em;

  padding: 1em;

  border: 1px solid #d7dce7;

  box-shadow: 0 1px 3px -2px rgba(0,0,0,0.3);

  -webkit-box-shadow: 0 1px 6px -3px rgba(0,0,0,0.3);

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::before,

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::after {

	margin-top: -7px;

	top: 16px;

    right: 100%;

	border: solid transparent;

	content: " ";

	position: absolute;

	pointer-events: none;

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::before {

	border-color: rgba(215, 220, 231, 0);

	border-right-color: #d7dce7;

	border-width: 8px;

	margin-top: 5px;

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::after {

	border-color: rgba(255, 255, 255, 0);

	border-right-color: #FFFFFF;

	border-width: 7px;

	margin-top: 6px;

}



/*

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::before {

  content: '';

  position: absolute;

  top: 16px;

  right: 100%;

  height: 0;

  width: 0;

  border: 7px solid transparent;

  border-right: 7px solid white;

   box-shadow: 0 1px 3px -2px rgba(0,0,0,0.3);

  -webkit-box-shadow: 0 1px 6px -3px rgba(0,0,0,0.3);

}



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom:after {

  content: "";

  display: table;

  clear: both;

}

*/



#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom a:after {

  content: "";

  display: table;

  clear: both;

}











#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom:hover {

box-shadow: 0 1px 6px -2px rgba(141,161,199,0.9);

-webkit-box-shadow: 0 1px 19px -3px rgba(141,161,199,0.9);

}





#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom h2 {

  color: #303e49;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom p, #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .read-more, #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .date {

  font-size: 13px;

  font-size: 0.8125rem;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .read-more, #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .date {

  display: inline-block;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom p {

  margin: 1em 0;

  line-height: 1.6;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .read-more {

  float: right;

  padding: .8em 1em;

  background: #acb7c0;

  color: white;

  border-radius: 0.25em;

}

.no-touch #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .read-more:hover {

  background-color: #bac4cb;

}

#wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .date {

  float: left;

  padding: .8em 0;

  opacity: .7;

}



@media only screen and (min-width: 768px) {

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom h2 {

    font-size: 20px;

    box-sizing: border-box;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom p {

    font-size: 16px !important;

   

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .read-more,

   #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .date {

    font-size: 14px !important;

  

  }

  

  

}

@media only screen and (min-width: 760px) {

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom {

    margin-left: 0;

    padding: 1em;

    width: 45%;

    box-sizing: border-box;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::before {

    right: -16px;

	border-right-color: transparent;

	border-left-color: #d7dce7;

  }

  

   #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom::after {

    right: -14px;

	border-right-color: transparent;

	border-left-color: #ffffff;

  }

  

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .read-more {

    float: right;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom .date {

    position: absolute;

    width: 100%;

    left: 122%;

    top: 6px;

    font-size: 16px;

    font-size: 1em;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:nth-child(even) .wpcu-front-box.bottom {

    float: right;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:nth-child(even)  .wpcu-front-box.bottom::before {

    

    left: auto;

    right: 100%;

    border-color: transparent;

	border-right-color: #d7dce7;

  }

  

   #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:nth-child(even)  .wpcu-front-box.bottom::after {

   

    left: auto;

    right: 100%;  

     border-color: transparent;

	border-right-color: #ffffff;

  }

  

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:nth-child(even)  .wpcu-front-box.bottom .read-more {

    float: right;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:nth-child(even)  .wpcu-front-box.bottom .date {

    left: auto;

    right: 122%;

    text-align: right;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom.is-hidden {

    visibility: hidden;

  }

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  .wpcu-front-box.bottom.bounce-in {

    visibility: visible;

    -webkit-animation: cd-bounce-2 0.6s;

    -moz-animation: cd-bounce-2 0.6s;

    animation: cd-bounce-2 0.6s;

  }

}



@media only screen and (min-width: 760px) {

  /* inverse bounce effect on even content blocks */

  #wpcufpn_widget_<?php echo $_GET['id']; ?> #timeline_<?php echo $_GET['id']; ?>  li.timeline:nth-child(even) .wpcu-front-box.bottom.bounce-in {

    -webkit-animation: cd-bounce-2-inverse 0.6s;

    -moz-animation: cd-bounce-2-inverse 0.6s;

    animation: cd-bounce-2-inverse 0.6s;

  }

}

@-webkit-keyframes cd-bounce-2 {

  0% {

    opacity: 0;

    -webkit-transform: translateX(-100px);

  }



  60% {

    opacity: 1;

    -webkit-transform: translateX(20px);

  }



  100% {

    -webkit-transform: translateX(0);

  }

}

@-moz-keyframes cd-bounce-2 {

  0% {

    opacity: 0;

    -moz-transform: translateX(-100px);

  }



  60% {

    opacity: 1;

    -moz-transform: translateX(20px);

  }



  100% {

    -moz-transform: translateX(0);

  }

}

@keyframes cd-bounce-2 {

  0% {

    opacity: 0;

    -webkit-transform: translateX(-100px);

    -moz-transform: translateX(-100px);

    -ms-transform: translateX(-100px);

    -o-transform: translateX(-100px);

    transform: translateX(-100px);

  }



  60% {

    opacity: 1;

    -webkit-transform: translateX(20px);

    -moz-transform: translateX(20px);

    -ms-transform: translateX(20px);

    -o-transform: translateX(20px);

    transform: translateX(20px);

  }



  100% {

    -webkit-transform: translateX(0);

    -moz-transform: translateX(0);

    -ms-transform: translateX(0);

    -o-transform: translateX(0);

    transform: translateX(0);

  }

}

@-webkit-keyframes cd-bounce-2-inverse {

  0% {

    opacity: 0;

    -webkit-transform: translateX(100px);

  }



  60% {

    opacity: 1;

    -webkit-transform: translateX(-20px);

  }



  100% {

    -webkit-transform: translateX(0);

  }

}

@-moz-keyframes cd-bounce-2-inverse {

  0% {

    opacity: 0;

    -moz-transform: translateX(100px);

  }



  60% {

    opacity: 1;

    -moz-transform: translateX(-20px);

  }



  100% {

    -moz-transform: translateX(0);

  }

}

@keyframes cd-bounce-2-inverse {

  0% {

    opacity: 0;

    -webkit-transform: translateX(100px);

    -moz-transform: translateX(100px);

    -ms-transform: translateX(100px);

    -o-transform: translateX(100px);

    transform: translateX(100px);

  }



  60% {

    opacity: 1;

    -webkit-transform: translateX(-20px);

    -moz-transform: translateX(-20px);

    -ms-transform: translateX(-20px);

    -o-transform: translateX(-20px);

    transform: translateX(-20px);

  }



  100% {

    -webkit-transform: translateX(0);

    -moz-transform: translateX(0);

    -ms-transform: translateX(0);

    -o-transform: translateX(0);

    transform: translateX(0);

  }

}
















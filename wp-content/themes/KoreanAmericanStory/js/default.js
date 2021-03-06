var $j = jQuery.noConflict();

var content_menu_position;

var scroll = 0;

var fontsize;



$j(document).ready(function() {

	"use strict";

	

	dropDownMenu();

	

	setDropDownMenuPosition();



	selectMenu();



	initToCounter();



	initDoughnutChart();



	initDoughnutChart2();



	initRandomCounter();



	initProgressBars();



	initProgressBarWithImage();



	initProgressBarsVertical();



	initProgressBarsVerticalPattern();



	placeholderReplace();



	addPlaceholderSearchWidget();



	createContentMenu();

	

	contentMenuScrollTo();



	initFadeDownEffect();



	prettyPhoto();



	initFlexSlider();



	initAccordion();



	initMessages();

	

	backButtonInterval();

	

	backToTop();

	

	initParallax(parallax_speed);

	

	loadMore();



	initElements();



	initCircleWithImage();

	

	fitVideo();

	

	initFlipElement();



	initFlipImageElement();



	initSectionFullWidth();

	

	createSelectContentMenu();

	

	disableDeadLink();

	

});



$j(window).load(function(){

	"use strict";



	$j('.touch .main_menu li:has(div.second)').doubleTapToGo(); // load script to close menu on touch devices

	logo_height = $j('.logo img').height();

	setLogoHeightOnLoad();

	checkLogOnSmallestSize();

	

	initProjects();

	initPortfolioSingleInfo();

	initTabs();

	

	scroll = $j(window).scrollTop();

	if($j('nav.content_menu').length > 0){

		content_menu_position = $j('nav.content_menu').offset().top;

		contentMenuPosition();

	}

	contentMenuCheckLastSection();

	headerSize(scroll);

});



$j(window).scroll(function() {

	"use strict";



	scroll = $j(window).scrollTop();

	if($j(window).width() > 768 && $j('.no_fixed').length === 0){

		headerSize(scroll);	

	}

	

	if($j('nav.content_menu').length > 0){

		//content_menu_position = $j('nav.content_menu').offset().top;

	}

	if($j(window).width() > 768){

		contentMenuPosition();

	}

	

	contentMenuCheckLastSection();

});



$j(window).resize(function() {

	"use strict";



	setDropDownMenuPosition();

	checkLogOnSmallestSize();

	initSectionFullWidth();

	

});







function dropDownMenu(){

	"use strict";

	

	var menu_items = $j('.no-touch .drop_down > ul > li');

	if(menu_items.length){

		menu_items.each( function(i) {



			if ($j(menu_items[i]).find('.second').length > 0) {

			

				$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');

				$j(menu_items[i]).find('.second').hide();

				

				$j(menu_items[i]).mouseenter(function(){

					$j(menu_items[i]).find('.second').css({'visibility': 'visible','height': '0px', 'opacity': '0', 'display': 'block'});

					$j(menu_items[i]).find('.second').stop().animate({'height': $j(menu_items[i]).data('original_height'),opacity:1}, 200, function() {

						$j(menu_items[i]).find('.second').css('overflow', 'visible');

						

					});



					dropDownMenuThirdLevel();

				}).mouseleave( function(){

					$j(menu_items[i]).find('.second').stop().animate({'height': '0px'},0, function() {

						$j(menu_items[i]).find('.second').css({'overflow': 'hidden', 'visivility': 'hidden', 'display': 'none'});				

					});

				});

			}

		});

	}

}



function dropDownMenuThirdLevel(){

	"use strict";



	var menu_items2 = $j('.no-touch .drop_down ul li > .second > .inner > .inner2 > ul > li');

	if(menu_items2.length){

		menu_items2.each( function(i) {

			if ($j(menu_items2[i]).find('ul').length > 0) {

				var sum=0;

				$j(menu_items2[i]).find('ul li').each( function(){ sum+=$j(this).height();});

				

				$j(menu_items2[i]).data('original_height', sum + 'px');

				

				$j(menu_items2[i]).mouseenter(function(){

					$j(menu_items2[i]).find('ul').css({'visibility': 'visible','height': '0px', 'opacity':'0', 'display': 'block', 'padding': '10px 0'});

					$j(menu_items2[i]).find('ul').stop().animate({'height': $j(menu_items2[i]).data('original_height'),opacity:1}, 200, function() {

						$j(menu_items2[i]).find('ul').css('overflow', 'visible');

					});

				}).mouseleave(function(){

					$j(menu_items2[i]).find('ul').stop().animate({'height': '0px'},0, function() {

						$j(menu_items2[i]).find('ul').css({'overflow': 'hidden', 'padding': '0'});

						$j(menu_items2[i]).find('.second').css('visivility', 'hidden');

					});

				});

			}

		});

	}

}



function selectMenu(){

	"use strict";



	if($j('.main_menu').length){	

		var $menu_select = $j("<div class='select'><ul></ul></div>");

		$menu_select.appendTo(".selectnav");

		

		if($j(".main_menu").hasClass('drop_down')){

			$j(".main_menu ul li a").each(function(){

				var menu_url = $j(this).attr("href");

				var menu_text = $j(this).text();

				if ($j(this).parents("li").length === 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }

				if ($j(this).parents("li").length === 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }

				if ($j(this).parents("li").length > 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }

				

				var li = $j("<li />");

				var link = $j("<a />", {"href": menu_url, "html": menu_text});

				link.appendTo(li);

				li.appendTo($menu_select.find('ul'));

			});

		} 

		

		$j(".selectnav_button span").click(function () {

			if ($j(".select ul").is(":visible")){

				$j(".select ul").slideUp();

			} else {

				$j(".select ul").slideDown();

			}

		});

		

		$j(".selectnav ul li a").click(function () {

			$j(".select ul").slideUp();

		});

	}

}



function setDropDownMenuPosition(){

	"use strict";



	var menu_items = $j('.drop_down > ul > li');

	if(menu_items.length){

		menu_items.each( function(i) {



			var browser_width = $j(window).width();

			var menu_item_position = $j(menu_items[i]).offset().left;

				var sub_menu_width = $j('.drop_down .second .inner2 ul').width();

				var u = browser_width - menu_item_position + 30;

				var m;

				

				if($j(menu_items[i]).find('li.sub').length > 0){

					m = browser_width - menu_item_position - sub_menu_width + 30;

				}



				if(u < sub_menu_width || m < sub_menu_width){

					$j(menu_items[i]).find('.second').addClass('right');

					$j(menu_items[i]).find('.second .inner .inner2 ul').addClass('right');

				}

		});

	}

}



(function($) {

	"use strict";



	$.fn.countTo = function(options) {

		// merge the default plugin settings with the custom options

		options = $.extend({}, $.fn.countTo.defaults, options || {});



		// how many times to update the value, and how much to increment the value on each update

		var loops = Math.ceil(options.speed / options.refreshInterval),

		increment = (options.to - options.from) / loops;



		return $(this).each(function() {

			var _this = this,

			loopCount = 0,

			value = options.from,

			interval = setInterval(updateTimer, options.refreshInterval);



			function updateTimer() {

				value += increment;

				loopCount++;

				$(_this).html(value.toFixed(options.decimals));



				if (typeof(options.onUpdate) === 'function') {

					options.onUpdate.call(_this, value);

				}



				if (loopCount >= loops) {

					clearInterval(interval);

					value = options.to;



					if (typeof(options.onComplete) === 'function') {

						options.onComplete.call(_this, value);

					}

				}

			}

		});

	};



	$.fn.countTo.defaults = {

		from: 0,  // the number the element should start at

		to: 100,  // the number the element should end at

		speed: 1000,  // how long it should take to count between the target numbers

		refreshInterval: 100,  // how often the element should be updated

		decimals: 0,  // the number of decimal places to show

		onUpdate: null,  // callback method for every time the element is updated,

		onComplete: null,  // callback method for when the element finishes updating

	};

})(jQuery);



function initToCounter() {

	"use strict";

	

	if($j('.counter.type1').length){

		$j('.counter.type1').each(function() {



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);



			if($j('.touch .no_delay').length){					

				$this.parent().css('opacity', '1');

				var $max = parseFloat($this.text());

				$this.countTo({

					from: 0,

					to: $max,

					speed: 1500,

					refreshInterval: 50

				});

				resizeFonts();

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.parent().css('opacity', '1');

						var $max = parseFloat($this.text());

						$this.countTo({

							from: 0,

							to: $max,

							speed: 1500,

							refreshInterval: 50

						});

						resizeFonts();

					},time);

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initRandomCounter(){

	"use strict";

	

	if($j('.counter.type2').length){

		$j('.counter.type2').each(function() {



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.parent().css('opacity', '1');

				$this.absoluteCounter({

					speed: 2000,

					fadeInDelay: 1000

				});

				resizeFonts();

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.parent().css('opacity', '1');

						$this.absoluteCounter({

							speed: 2000,

							fadeInDelay: 1000

						});

						resizeFonts();

					},time);	

				},{accX: 0, accY: -200});

			}

			

			

		});

	}

}



function initToCounterProgressBar(){

	"use strict";



	if($j('.tocounter').length){

		$j('.tocounter').each(function() {



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.parent('.percentage').css('opacity', '1');

				var $max = parseFloat($this.text());

				$this.countTo({

					from: 0,

					to: $max,

					speed: 1000,

					refreshInterval: 50

				});

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.parent('.percentage').css('opacity', '1');

						var $max = parseFloat($this.text());

						$this.countTo({

							from: 0,

							to: $max,

							speed: 1000,

							refreshInterval: 50

						});



					},time);

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initDoughnutChart(){

	"use strict";

 

	if($j('.normal .percentage').length){

		$j('.normal .percentage').each(function() {



			var $barColor = '#e91b23';



			if($j(this).data('active') !== ""){

				$barColor = $j(this).data('active');

			}



			var $trackColor = '#e3e3e3';



			if($j(this).data('noactive') !== ""){

				$trackColor = $j(this).data('noactive');

			}

			

			var $size = 171;



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				initToCounterProgressBar();

				

				$this.parent().css('opacity', '1');

				$this.easyPieChart({

					barColor: $barColor,

					trackColor: $trackColor,

					scaleColor: false,

					lineCap: 'butt',

					lineWidth: 31,

					animate: 1500,

					size: $size

				});

				

			}else{

				$this.appear(function() {

					initToCounterProgressBar();

					setTimeout(function(){



						$this.parent().css('opacity', '1');

						$this.easyPieChart({

							barColor: $barColor,

							trackColor: $trackColor,

							scaleColor: false,

							lineCap: 'butt',

							lineWidth: 31,

							animate: 1500,

							size: $size

						});



					},time);

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initDoughnutChart2(){

	"use strict";

 

	if($j('.transparent .percentage').length){

		$j('.transparent .percentage').each(function() {



			var $barColor = '#e3e3e3';



			if($j(this).data('active') !== ""){

				$barColor = $j(this).data('active');

			}



			var $trackColor = 'transparent';

			var $size = 171;



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);



			if($j('.touch .no_delay').length){					

				initToCounterProgressBar();	

				$this.parent().css('opacity', '1');

				

				$this.easyPieChart({

					barColor: $barColor,

					trackColor: $trackColor,

					scaleColor: false,

					lineCap: 'butt',

					lineWidth: 31,

					animate: 1500,

					size: $size

				}); 



			}else{

				$this.appear(function() {

					initToCounterProgressBar();

					setTimeout(function(){

						

						$this.parent().css('opacity', '1');

						

						$this.easyPieChart({

							barColor: $barColor,

							trackColor: $trackColor,

							scaleColor: false,

							lineCap: 'butt',

							lineWidth: 31,

							animate: 1500,

							size: $size

						}); 



					},time);

				},{accX: 0, accY: -200});

			}

		

		});

	}

}



var timeOuts = new Array(); 

function initProgressBarWithImage(){

	"use strict";



	if($j('.progress_bars_with_image_holder').length){

		$j('.progress_bars_with_image_holder').each(function() {

			

			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.find('.progress_bars_with_image').each(function(i) {

					var number = $j(this).find('.progress_bars_with_image_content').data('number');

					

					var bars = $j(this).find('.bar');

				

					bars.each(function(i){

						if(i < number){

							var time = (i + 1)*100;

							timeOuts[i] = setTimeout(function(){

							$j(bars[i]).addClass('active');

							},time);

						}

					});

				});

			}else{

				$this.appear(function() {

					$this.find('.progress_bars_with_image').each(function(i) {

						var number = $j(this).find('.progress_bars_with_image_content').data('number');

						

						var bars = $j(this).find('.bar');

					

						bars.each(function(i){

							if(i < number){

								var time = (i + 1)*100;

								timeOuts[i] = setTimeout(function(){

								$j(bars[i]).addClass('active');

								},time);

							}

						});

					});

				},{accX: 0, accY: -200});

			}

			

			

		});

	}

}



function initProgressBarsVertical(){

	"use strict";



	if($j('.progress_bars_vertical_holder.vertical').length){

		$j('.progress_bars_vertical_holder.vertical').each(function() {



			var progress_bar_number = 0;



			$j(this).find('.progress_bars_vertical.background_color').each(function(){

				progress_bar_number ++; 

			});



			$j(this).find('.progress_bars_vertical.background_color').css('width', 100/progress_bar_number-0.3 + '%');



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				initToCounterVerticalProgressBar();

				$this.find('.progress_bars_vertical.background_color').each(function() {

					var percentage = $j(this).find('.progress_content').data('percentage');

					$j(this).find('.progress_content').css('height', '0%');

					$j(this).find('.progress_content').animate({

						height: percentage+'%'

					}, 2000);

				});

			}else{

				$this.appear(function() {

					initToCounterVerticalProgressBar();

					$this.find('.progress_bars_vertical.background_color').each(function() {

						var percentage = $j(this).find('.progress_content').data('percentage');

						$j(this).find('.progress_content').css('height', '0%');

						$j(this).find('.progress_content').animate({

							height: percentage+'%'

						}, 2000);

					});

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initProgressBarsVerticalPattern(){

	"use strict";



	if($j('.progress_bars_vertical_holder.pattern').length){

		$j('.progress_bars_vertical_holder.pattern').each(function() {



			var progress_bar_number = 0;



			$j(this).find('.progress_bars_vertical.pattern').each(function(){

				progress_bar_number ++; 

			});



			$j(this).find('.progress_bars_vertical.pattern').css('width', 100/progress_bar_number-2 + '%');

			

			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				initToCounterVerticalProgressBarPattern();

				$this.find('.progress_bars_vertical.pattern').each(function() {

					var percentage = $j(this).find('.progress_content').data('percentage');

					$j(this).find('.progress_content').css('height', '0%');

					$j(this).find('.progress_content').animate({

						height: percentage+'%'

					}, 2000);

				});

			}else{

				$this.appear(function() {

					initToCounterVerticalProgressBarPattern();

					$this.find('.progress_bars_vertical.pattern').each(function() {

						var percentage = $j(this).find('.progress_content').data('percentage');

						$j(this).find('.progress_content').css('height', '0%');

						$j(this).find('.progress_content').animate({

							height: percentage+'%'

						}, 2000);

					});

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initToCounterVerticalProgressBar(){

	"use strict";



	if($j('.progress_bars_vertical.background_color .progress_number span').length){

		$j('.progress_bars_vertical.background_color .progress_number span').each(function() {

			var $max = parseFloat($j(this).text());

			$j(this).countTo({

				from: 0,

				to: $max,

				speed: 1500,

				refreshInterval: 50

			});

		});

	}

}



function initToCounterVerticalProgressBarPattern(){

	"use strict";



	if($j('.progress_bars_vertical.pattern .progress_number span').length){

		$j('.progress_bars_vertical.pattern .progress_number span').each(function() {

			var $max = parseFloat($j(this).text());

			$j(this).countTo({

				from: 0,

				to: $max,

				speed: 1500,

				refreshInterval: 50

			});

		});

	}

}



function initProgressBars(){

	"use strict";



	if($j('.progress_bars').length){

		$j('.progress_bars').each(function() {

			

			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				initToCounterHorizontalProgressBar();

				$this.find('.progress_bar').each(function() {

					var percentage = $j(this).find('.progress_content').data('percentage');

					$j(this).find('.progress_content').css('width', '0%');

					$j(this).find('.progress_content').animate({'width': percentage+'%'}, 2000);

					$j(this).find('.progress_number').css('width', '0%');

					$j(this).find('.progress_number').animate({'width': percentage+'%'}, 2000);

				});

			}else{

				$this.appear(function() {

					initToCounterHorizontalProgressBar();

					$this.find('.progress_bar').each(function() {

						var percentage = $j(this).find('.progress_content').data('percentage');

						$j(this).find('.progress_content').css('width', '0%');

						$j(this).find('.progress_content').animate({'width': percentage+'%'}, 2000);

						$j(this).find('.progress_number').css('width', '0%');

						$j(this).find('.progress_number').animate({'width': percentage+'%'}, 2000);

					});

				},{accX: 0, accY: -200});

			}

			

			

		});

	}

}



function initToCounterHorizontalProgressBar(){

	"use strict";



	if($j('.progress_bars .progress_number span').length){

		$j('.progress_bars .progress_number span').each(function() {

			$j(this).parent().css('opacity', '1');

			var $max = parseFloat($j(this).text());

			$j(this).countTo({

				from: 0,

				to: $max,

				speed: 1500,

				refreshInterval: 50

			});

		});

	}

}



function placeholderReplace(){

	"use strict";



	$j('[placeholder]').focus(function() {

		var input = $j(this);

		if (input.val() === input.attr('placeholder')) {

			if (this.originalType) {

				this.type = this.originalType;

				delete this.originalType;

			}

			input.val('');

			input.removeClass('placeholder');

		}

	}).blur(function() {

		var input = $j(this);

		if (input.val() === '') {

			if (this.type === 'password') {

				this.originalType = this.type;

				this.type = 'text';

			}

			input.addClass('placeholder');

			input.val(input.attr('placeholder'));

		}

	}).blur();



	$j('[placeholder]').parents('form').submit(function () {

		$j(this).find('[placeholder]').each(function () {

			var input = $j(this);

			if (input.val() === input.attr('placeholder')) {

				input.val('');

			}

		});

	});

}



function addPlaceholderSearchWidget(){

	"use strict";

	

	if($j('.header_right_widget #searchform input:text').length){

		$j('.header_right_widget #searchform input:text').each(

			function(i,el) {

				if (!el.value || el.value === '') {

					el.placeholder = 'Search';

				}

		});

	}

}



function initFadeDownEffect(){

	"use strict";

	

	if($j('.animate_list').length){

		$j('.animate_list').each(function(){

			

			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.find(".list_item_holder").each(function (l) {

					var k = $j(this);

					setTimeout(function () {

						k.animate({

							opacity: 1,

							top: 0

						}, 1500);

					}, 100*l);

				});

			}else{

				$this.appear(function() {

					$this.find(".list_item_holder").each(function (l) {

						var k = $j(this);

						setTimeout(function () {

							k.animate({

								opacity: 1,

								top: 0

							}, 1500);

						}, 100*l);

					});

				},{accX: 0, accY: -150});

			}

			

		});

	}

}



function initProjects(){

	"use strict";



	if($j('.filter_holder').length){

	

		$j('.filter_holder').each(function(){

			var filter_height = 0;

			$j(this).find('li.filter').each(function(){

				filter_height += $j(this).height();

			});

			

			$j(this).on('click',function(data){

				var $drop = $j(this),

				$bro = $drop.siblings('.hidden');

				

				if(!$drop.hasClass('expanded')){

					$drop.find('ul').css('z-index','10');

					$drop.find('ul').height(filter_height + 40); //40 is height of first default item

					$drop.addClass('expanded');

					var label = $drop.find('.label span');

					label.text(label.attr('data-label'));

				} else {

					$drop.find('ul').height(40);

					$drop.removeClass('expanded');

					

					var $selected = $j(data.target),

					ndx = $selected.index();

					

					if($j(data.target)[0].tagName === 'li'){

						$drop.find('.label span').text($(data.target).text());

					}

					if($bro.length){

						$bro.find('option').removeAttr('selected').eq(ndx).attr('selected','selected').change();

					}

				}

			});

		});

		

		$j('.filter_holder .filter').on('click',function(){

			var $this = $j(this).text();

			var dropLabels = $j('.filter_holder').find('.label span');

			dropLabels.each(function(){

				$j(this).text($this);

			});

		});

	

	}

	

	if($j('.projects_holder').length){

		$j('.projects_holder').mixitup({

			showOnLoad: 'all',

			transitionSpeed: 600,

			minHeight: 150

		});

	}

}



function initParallax(speed){

	"use strict";



	if($j('.parallax section').length){

		

		if($j('html').hasClass('touch')){

			$j('.parallax section').each(function() {

				var $self = $j(this);

				var section_height = $self.data('height');

				$self.height(section_height);

				var rate = 0.5;

				

				var bpos = (- $j(this).offset().top) * rate;

				$self.css({'background-position': 'center ' + bpos  + 'px' });

				

				$j(window).bind('scroll', function() {

					var bpos = (- $self.offset().top + $j(window).scrollTop()) * rate;

					$self.css({'background-position': 'center ' + bpos  + 'px' });

				});

			});

		}else{

			$j('.parallax section').each(function() {

				var $self = $j(this);

				var section_height = $self.data('height');

				$self.height(section_height);

				var rate = (section_height / $j(document).height()) * speed;

				

				var distance = $j.elementoffset($self);

				var bpos = - (distance * rate);

				$self.css({'background-position': 'center ' + bpos  + 'px' });

				

				$j(window).bind('scroll', function() {

					var distance = $j.elementoffset($self);

					var bpos = - (distance * rate);

					$self.css({'background-position': 'center ' + bpos  + 'px' });

				});

			});

		}

		return this;

	}

	

}



$j.elementoffset = function($element) {

	"use strict";

	

	var fold = $j(window).scrollTop();

	return (fold) - $element.offset().top +104;

};





function prettyPhoto(){

	"use strict";

								 

	if($j("a[data-rel]").length){

		$j('a[data-rel]').each(function() {

			$j(this).attr('rel', $j(this).data('rel'));

		});



		$j("a[rel^='prettyPhoto']").prettyPhoto({

			animation_speed: 'fast', /* fast/slow/normal */

			slideshow: false, /* false OR interval time in ms */

			autoplay_slideshow: false, /* true/false */

			opacity: 0.80, /* Value between 0 and 1 */

			show_title: true, /* true/false */

			allow_resize: true, /* Resize the photos bigger than viewport. true/false */

			default_width: 500,

			default_height: 344,

			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */

			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */

			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */

			wmode: 'opaque', /* Set the flash wmode attribute */

			autoplay: false, /* Automatically start videos: True/False */

			modal: false, /* If set to true, only the close button will close the window */

			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */

			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */

			deeplinking: false,

			social_tools: false

		});

	}

}



function createContentMenu(){

	"use strict";



	var content_menu = $j(".content_menu");

	content_menu.each(function(){

		if($j(this).find('ul').length === 0){



			if($j(this).css('background-color') !== ""){

				var background_color = $j(this).css('background-color');

			}



			var content_menu_ul = $j("<ul class='menu'></ul>");

			content_menu_ul.appendTo($j(this));

			

			var sections = $j(this).siblings('section.content_section.in_menu');

			

			if(sections.length){

				sections.each(function(){

					var section_href = $j(this).attr("id");

					

					var section_title = $j(this).data('title');

					

					var li = $j("<li />");

					var link = $j("<a />", {"href": '#'+section_href, "html": section_title});

					if(background_color !== ""){

						var arrow = $j("<div />", {"class": 'arrow', "style": 'border-color: '+background_color+' transparent transparent transparent'});

					} else {

						var arrow = $j("<div />", {"class": 'arrow'});

					}

					link.appendTo(li);

					arrow.appendTo(li);

					li.appendTo(content_menu_ul);

					

				});

			}

		}

	

	});

}



function createSelectContentMenu(){

	"use strict";

	

	var content_menu = $j(".content_menu");

	content_menu.each(function(){	

		

		var $this = $j(this);

		

		var $menu_select = $j("<ul></ul>");

		$menu_select.appendTo($j(this).find('.nav_select_menu'));

		

		

		$j(this).find("ul.menu li a").each(function(){

		

			var menu_url = $j(this).attr("href");

			var menu_text = $j(this).text();

			if ($j(this).parents("li").length === 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }

			if ($j(this).parents("li").length === 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }

			if ($j(this).parents("li").length > 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }

			

			var li = $j("<li />");

			var link = $j("<a />", {"href": menu_url, "html": menu_text});

			link.appendTo(li);

			li.appendTo($menu_select);

		});

		

		

		$this.find(".nav_select_button").on('click', function() {

			if ($this.find('.nav_select_menu ul').is(":visible")){

				$this.find('.nav_select_menu ul').slideUp();

			} else {

				$this.find('.nav_select_menu ul').slideDown();

			}

			return false;

		});

		

		$this.find(".nav_select_menu ul li a").on('click',function () {

			$this.find('.nav_select_menu ul').slideUp();

			var $link = $j(this);

			

			if($j(this).parent().hasClass('active')){

				return false;

			}

			

			var $target = $link.attr("href");

			var targetOffset = $j($target).offset().top;

			console.log(targetOffset);

			$j('html,body').stop().animate({scrollTop: targetOffset }, 400, function(){

				$j('nav.content_menu ul li').removeClass('active');

				$link.parent().addClass('active');

			});



			return false;

			

		});

	

	});

	

}



function contentMenuPosition(){

	"use strict";

	

	if($j('nav.content_menu').length){

	

		// header_height is height of main menu when it is on smallest size

		if(content_menu_position - header_height - scroll <= 0){

			$j('nav.content_menu').css({'position': 'fixed', 'top': header_height}).addClass('fixed');

			$j('.content > .content_inner > .container > .container_inner').css('padding-top',content_line_height);

			$j('nav.content_menu .back').stop().animate({marginTop:'0px'},300);

		} else {

			$j('nav.content_menu').css({'position': 'relative', 'top': '0px'}).removeClass('fixed');

			$j('.content > .content_inner > .container > .container_inner').css('padding-top','0px');

			$j('nav.content_menu .back').stop().animate({marginTop:'-300px'},300);

		}

		

		$j('.content section.content_section').waypoint( function(direction) {

			var $active = $j(this);

			var id = $active.attr("id");

			

			$j("nav.content_menu.fixed li a").each(function(){

				var i = $j(this).attr("href").replace("#",""); 

				if(i === id){

					$j(this).parent().addClass('active');

				}else{

					$j(this).parent().removeClass('active');

				}

			});	

		}, { offset: '150' });

	

	}

	

}



function contentMenuCheckLastSection(){

	"use strict";

	

	if($j('nav.content_menu').length){

	

		if($j('.content section.content_section').length){

			var last_from_top = $j('.content section.content_section:last').offset().top + $j('.content section.content_section:last').height() + 200; // 200 is section padding top and bottom

			var first_from_top = $j('.content section.content_section:first').offset().top - 200;

			if(last_from_top < scroll){

				$j("nav.content_menu.fixed li").removeClass('active');

			}

			if(first_from_top > scroll){

				$j('nav.content_menu li:first').removeClass('active');

			}

		}

	

	}

}



function contentMenuScrollTo(){

	"use strict";



	if($j('nav.content_menu').length){

		

		if($j('header').length){

			var main_menu_line_height = 50;

		}else{

			var main_menu_line_height = 0;

		}

		

		$j("nav.content_menu ul.menu li a").on('click', function(e){

			e.preventDefault();

			var $this = $j(this);

			

			if($j(this).parent().hasClass('active')){

				return false;

			}

			

			var $target = $this.attr("href");

			var targetOffset = $j($target).offset().top - content_line_height - main_menu_line_height;

			

			$j('html,body').stop().animate({scrollTop: targetOffset }, 400, function(){

				$j('nav.content_menu ul li').removeClass('active');

				$this.parent().addClass('active');

			});



			return false;

		});

		

	}

}



function initFlexSlider(){

	"use strict";

	

	if($j('.flexslider').length){

		$j('.flexslider').flexslider({

			animationLoop: true,

			controlNav: false,

			useCSS: false,

			pauseOnAction: true,

			pauseOnHover: true,

			slideshow: true,

			animation: 'slides',

			animationSpeed: 600,

			slideshowSpeed: 8000,

			start: function(){

				setTimeout(function(){$j(".flexslider").fitVids();},100);

			}

		});

		

		$j('.flex-direction-nav a').click(function(e){

			e.preventDefault();

			e.stopImmediatePropagation();

			e.stopPropagation();

		});

	}

}



var $scrollHeight;

function initPortfolioSingleInfo(){

	"use strict";



	var $sidebar   = $j(".portfolio_single_follow");

	if($j(".portfolio_single_follow").length > 0){

	

		var offset = $sidebar.offset();

		$scrollHeight = $j(".portfolio_container").height();

		var $scrollOffset = $j(".portfolio_container").offset();

		var $window = $j(window);

		

		var $menuLineHeight = parseInt($j('.main_menu > ul > li > a').css('line-height'), 10);

		

		$window.scroll(function() {

			if($window.width() > 960){



				if ($window.scrollTop() + $menuLineHeight + 3 > offset.top) {

					if ($window.scrollTop() + $menuLineHeight + $sidebar.height() + 24 < $scrollOffset.top + $scrollHeight) {

						$sidebar.stop().animate({

							marginTop: $window.scrollTop() - offset.top + $menuLineHeight

						});

					} else {

						$sidebar.stop().animate({

							marginTop: $scrollHeight - $sidebar.height() - 24

						});

					}

				} else {

					$sidebar.stop().animate({

						marginTop: 0

					});

				}		

			}else{

				$sidebar.css('margin-top',0);

			}

		});

	}

}



function checkLogOnSmallestSize(){

	"use strict";

	

	if($j(window).width() < 770){

		if(logo_height >= line_height){

			$j('header .logo a').height(line_height-10);

			$j('header .logo').css('padding','5px 0px 5px 0px');

			

		}else{

			var padding = (line_height-logo_height)/2;

			$j('header .logo').css('padding',padding+'px 0px');

		}

		$j('.selectnav_button').css('padding',(line_height-30)/2+'px 0px'); //30 is height of select menu button

	}else{

		$j('header .logo').css('padding','0px');

	}

}



function initAccordion(){

	"use strict";

	

	if($j('.accordion').length){

		$j(".accordion").each(function(){

			var $this = $j(this);

			$this.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")

			.find("h4")

			.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")

			.hover(function() { $j(this).toggleClass("ui-state-hover"); })

			.click(function() {



			$j(this).parent().siblings().find('.accordion_content').slideUp(300).removeClass("ui-accordion-content-active");

			$j(this).parent().siblings().find('h4').removeClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom");

			$j(this)

				.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")

				.next().toggleClass("ui-accordion-content-active").slideToggle(200);

				return false;

			})

			.next()

			.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")

			.hide(); 	

		});

	}

	

	if($j('.toggle').length){

		$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")

		.find("h4")

		.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")

		.hover(function() { $j(this).toggleClass("ui-state-hover"); })

		.click(function() {

		$j(this)

			.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")

			.next().toggleClass("ui-accordion-content-active").slideToggle(200);

			return false;

		})

		.next()

		.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")

		.hide();

	}

}



function initTabs(){

	"use strict";



	var $tabsNav = $j('.tabs-nav');

	if($tabsNav.length){

		var $tabsNavLis = $tabsNav.children('li');

		$tabsNav.each(function() {

			var $this = $j(this);

			$this.next().children('.tab-content').stop(true,true).hide().first().show();

			$this.children('li').first().addClass('active').stop(true,true).show();

		});

		$tabsNavLis.on('click', function(e) {

			var $this = $j(this);

			$this.siblings().removeClass('active').end().addClass('active');

			$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();

			e.preventDefault();

		}); 

	}

}



function initMessages(){

	"use strict";



	if($j('.message_holder').length){

		$j('.message_holder').each(function(){

			$j(this).find('.close').click(function(e){

				e.preventDefault();

				$j(this).parent().fadeOut(500);

				$j(this).parent().parent().find('.message_arrow').fadeOut(500);

			});

		});

	}

}



function totop_button(a) {

	"use strict";



	var b = $j("#back_to_top");

	b.removeClass("off on");

	if (a === "on") { b.addClass("on"); } else { b.addClass("off"); }

}



function backButtonInterval(){

	"use strict";



	if($j("#back_to_top").length){

		window.setInterval(function () {

			var b = $j(this).scrollTop();

			var c = $j(this).height();

			var d;

			if (b > 0) { d = b + c / 2; } else { d = 1; }

			if (d < 1e3) { totop_button("off"); } else { totop_button("on"); }

		}, 300);

	}

}



function backToTop(){

	"use strict";

	

	$j(document).on('click','#back_to_top, .back a',function(e){

		e.preventDefault();

		

		$j('body,html').animate({scrollTop: 0}, $j(window).scrollTop()/3, 'swing');

	});

}



function resetFilter(){

	"use strict";



	if($j(".filter_holder").length){

		var label = $j('.filter_holder').find('.label span');

		label.text(label.attr('data-label'));

		$j('.filter_holder').find('li.filter').removeClass('active');

	}

}



function loadMore(){

	"use strict";

	

	if($j(".load_more a").length){

	

		var i = 1;

		

		$j('.load_more a').on('click', function(e)  {

			e.preventDefault();

			resetFilter();

			

			var link = $j(this).attr('href');

			var $content = '.projects_holder';

			var $nav_wrap = '.portfolio_paging';

			var $anchor = '.portfolio_paging .load_more a';

			var $next_href = $j($anchor).attr('href'); // Get URL for the next set of posts

			var filler_num = $j('.projects_holder .filler').length;

			$j.get(link+'', function(data){

				$j('.projects_holder .filler').slice(-filler_num).remove();

				var $new_content = $j($content, data).wrapInner('').html(); // Grab just the content

				$next_href = $j($anchor, data).attr('href'); // Get the new href

				$j('article.mix:last').after($new_content); // Append the new content

				

				var min_height = $j('article.mix:first').height();

				$j('article.mix').css('min-height',min_height);

				

				$j('.projects_holder').mixitup('remix','all');

				prettyPhoto();

				if($j('.load_more').attr('rel') > i) {

					$j('.load_more a').attr('href', $next_href); // Change the next URL

				} else {

					$j('.load_more').remove(); 

				}

				$j('.projects_holder .portfolio_paging:last').remove(); // Remove the original navigation

				$j('article.mix').css('min-height',0);

			});

			i++;

		});

	

	}

}



function initCircleWithImage(){

	"use strict";

	

	if($j(".fade_in_circle_holder").length){

		$j('.fade_in_circle_holder').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

				

			if($j('.touch .no_delay').length){					

				$this.find('.fade_in_circle').addClass('animate_circle');

				$this.find('.fade_in_content').addClass('animate_content');

			}else{

				$this.appear(function(){

					setTimeout(function(){

						$this.find('.fade_in_circle').addClass('animate_circle');

						$this.find('.fade_in_content').addClass('animate_content');

					},time);	

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initElements(){

	"use strict";



	if($j(".element_from_fade").length){

		$j('.element_from_fade').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

						

			if($j('.touch .no_delay').length){					

				$this.addClass('element_from_fade_on');

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('element_from_fade_on');

					},time);

				},{accX: 0, accY: -200});

			}

			

		});

	}

	

	if($j(".element_from_left").length){

		$j('.element_from_left').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.addClass('element_from_left_on');

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('element_from_left_on');

					},time);	

				},{accX: 0, accY: -200});

			}

						

		});

	}

	

	if($j(".element_from_right").length){

		$j('.element_from_right').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.addClass('element_from_right_on');

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('element_from_right_on');

					},time);	

				},{accX: 0, accY: -200});

			}

			

		});

	}

	

	if($j(".element_from_top").length){

		$j('.element_from_top').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			

			if($j('.touch .no_delay').length){					

				$this.addClass('element_from_top_on');

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('element_from_top_on');

					},time);	

				},{accX: 0, accY: -200});

			}			

			

		});

	}

	

	if($j(".element_from_bottom").length){

		$j('.element_from_bottom').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

						

			if($j('.touch .no_delay').length){					

				$this.addClass('element_from_bottom_on');



			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('element_from_bottom_on');

					},time);	

				},{accX: 0, accY: -200});

			}			

			

		});

	}

	

	if($j(".element_transform").length){

		$j('.element_transform').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

						

			if($j('.touch .no_delay').length){					

				$this.addClass('element_transform_on');



			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('element_transform_on');

					},time);	

				},{accX: 0, accY: -200});

			}			

			

		});

	}

	

}



function fitVideo(){	

	"use strict";

	if($j(".portfolio_images").length){

		$j(".portfolio_images").fitVids();

	}

	

	if($j(".video_holder").length){

		$j(".video_holder").fitVids();

	}

}



function initFlipElement(){

	"use strict";



	if($j(".flip_icon_holder.yes").length){

		$j('.flip_icon_holder.yes').each(function(){

			

			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.addClass('flip_first_time');

			}else{

				$this.appear(function() {

					$this.addClass('flip_first_time');

				},{accX: 0, accY: -150});

			}

			

		});

	}

}



function initFlipImageElement(){

	"use strict";



	if($j(".flip_image_holder.yes").length){

		$j('.flip_image_holder.yes').each(function(){



			var delay = $j(this).data('delay');

			var time = 0;



			if(delay !== "" && delay !== 0){

				time = delay;

			}



			var $this = $j(this);

			

			if($j('.touch .no_delay').length){					

				$this.addClass('flip_first_time');

			}else{

				$this.appear(function() {

					setTimeout(function(){

						$this.addClass('flip_first_time');

					},time);	

				},{accX: 0, accY: -200});

			}

			

		});

	}

}



function initSectionFullWidth(){

	"use strict";

	

	if($j("section.content_section.yes").length){

		if($j('section.content_section.yes')){

			var width = $j(window).width();

			var content_width = $j('.container_inner').width();

			var margin = -(width-content_width)/2;



			if($j('div.full_width').length === 0){

				$j('section.content_section.yes').css({'padding-left': '0px', 'padding-right': '0px', 'margin-left': margin, 'margin-right': margin});

			}

		}

	}

}



function resizeFonts(){

	"use strict";



	if($j(".counter_holder").length){

		$j(".counter_holder").each(function(){

			var $this = $j(this);

			

			var counterFontSize = $j(this).css("font-size");

			var counterDigitsWidth = $this.find('span.counter').width();

			

			var resize = function () {

				if($this.width() <= counterDigitsWidth){

					

					$this.css('font-size', Math.min($this.width() / (0.3*10), parseFloat(counterFontSize)));

					$this.css('line-height', Math.min($this.width() / (0.3*10), parseFloat(counterFontSize))+'px');

					

					$this.find('span.counter').css('line-height', Math.min($this.width() / (0.3*10), parseFloat(counterFontSize))+'px');

					$this.find('span.counter').css('height', Math.min($this.width() / (0.3*10), parseFloat(counterFontSize))+'px');

				}else{

					$this.css('font-size', parseFloat(counterFontSize));

					$this.css('line-height', parseFloat(counterFontSize)+'px');

					

					$this.find('span.counter').css('line-height', parseFloat(counterFontSize)+'px');

					$this.find('span.counter').css('height', parseFloat(counterFontSize)+'px');

				}

      };



      resize();



      $j(window).on('resize orientationchange', resize);

		});

		

	}

}



function disableDeadLink(){

	"use strict";

	

	$j(document).on('click','a',function(e){

		if(($j(this).attr('href') == "http://#") || ($j(this).attr('href') == "#")){			

			return false;

		}

	});

}
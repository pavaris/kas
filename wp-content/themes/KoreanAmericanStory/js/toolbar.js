$j(window).load(function(){

	setTimeout(function(){

		$j("#panel").animate({marginLeft: "0px"});

		$j("a.open").addClass('opened');

		$j("#panel").addClass('opened-panel');

	},1000);

});





$j(document).ready(function() {





	$j("#panel a.open").click(function(e){

		e.preventDefault();

		var margin_left = $j("#panel").css("margin-left");

		if (margin_left == "-228px"){

			$j("#panel").animate({marginLeft: "0px"});

			$j("#panel").addClass('opened-panel');

			$j(this).addClass('opened');

		}

		else{

			$j("#panel").animate({marginLeft: "-228px"});

			$j(this).removeClass('opened');

			$j("#panel").removeClass('opened-panel');

		}

		return false;

	});

	

	$j(".panel-admin-ajax span").click(function(e){

		$j(".panel-admin-ajax span").removeClass('active');

		$j(this).addClass('active');

		$j.post(root+'updatesession.php', {animation : $j(this).attr('data-animation')}, function(data){

					location.reload();

		});

	});

	

	$j(".panel-admin-layout span").click(function(e){

		$j(".panel-admin-layout span").removeClass('active');

		$j(this).addClass('active');

		$j('body').removeClass('boxed');

		$j('body').removeClass('wide');

		$j('body').removeClass('background_boxed');

		$j('body').addClass($j(this).attr('data-layout'));

	});

	$j(".panel-admin-colors span").click(function(e){

		$j(".panel-admin-colors span").removeClass('active-color');

		$j(this).addClass('active-color');

		

			newSkin ="nav.main_menu > ul > li.active > a, \

								nav.main_menu > ul > li.has_sub:hover > a, \

								nav.main_menu > ul > li:hover > a, \

								nav.content_menu, \

								.button, \

								input[type='submit'], \

								.load_more a, \

								.flip_image.back, \

								.flip_icon.back, \

								.highlight, \

								.filter_holder ul, \

								.projects_holder article .hover_inner .hover_inner_link_text_holder, \

								.flex-direction-nav .flex-next:hover, \

								.flex-direction-nav .flex-prev:hover, \

								.two_columns_66_33 .column1 .flex-direction-nav .flex-prev:hover, \

								.two_columns_66_33 .column1 .flex-direction-nav .flex-next:hover, \

								.progress_bars_vertical.background_color .progress_content_outer .progress_content, \

								.portfolio_navigation .portfolio_prev a:hover, \

								.portfolio_navigation .portfolio_next a:hover, \

								.portfolio_navigation .portfolio_button a:hover, \

								.progress_bars.normal .progress_content, \

								.tabs .tabs-nav li.active a, \

								.message, \

								.testimonials_text_holder,  \

								.pie_graf_legend ul li .color_holder,  \

								.line_graf_legend ul li .color_holder,  \

								.price_tables.light .puchase_cell,  \

								.price_table_inner ul li .button,  \

								.active_best_price,  \

								.pagination ul li a:hover,  \

								.pagination ul li.active span,  \

								.back_to_previous:hover,  \

								#back_to_top,  \

								#back_to_top:hover,  \

								.widget.widget_search form input[type='submit'],  \

								.widget .tagcloud a:hover  \

								{ \

									background-color: "+$j(this).attr('data-color')+"; \

								} \

								.portfolio_single_text_holder h4, \

								.post .read_more, \

								.onedigit, \

								.progress_bars_vertical.pattern .progress_number, \

								.counter_holder span.counter, \

								.comment_holder .comment .text .replay:hover, \

								.comment_holder .comment .text .comment-reply-link:hover  { \

									color: "+$j(this).attr('data-color')+"; \

								} \

								.flip_icon.back,\

								.message\

								{ \

									background-color: "+$j(this).attr('data-color')+" !important; \

								} \

								nav.content_menu ul li .arrow, \

								.tabs .tabs-nav li.active .arrow, \

								.message_arrow \

								{ \

									border-color: "+$j(this).attr('data-color')+" transparent transparent transparent !important; \

								} \

								.testimonial_arrow \

								{ \

									border-color: "+$j(this).attr('data-color')+" transparent transparent; \

								} \

								blockquote\

								{ \

									border-color: "+$j(this).attr('data-color')+"; \

								} \

								.progress_bars.gradient .progress_content\

								{ \

									background: linear-gradient(to right, #FFFFFF 9%, "+$j(this).attr('data-color')+" 100%) repeat scroll 0 0 transparent !important; \

								} \

								.progress_bars.normal .progress_content\

								{ \

									background:  none repeat scroll 0 0 " + $j(this).attr('data-color') + "!important; \

								} \

								.progress_bars.gradient .progress_content \

								{ \

									background-color:"+$j(this).attr('data-color')+";\

									background: -moz-linear-gradient(left,  #262626 9%, " +$j(this).attr('data-color')+ "100%); \

									background: -webkit-gradient(linear, left top, right top, color-stop(9%,#262626), color-stop(100%," +$j(this).attr('data-color')+ ")); \

									background: -webkit-linear-gradient(left,  #262626 9%," +$j(this).attr('data-color')+ " 100%); \

									background: -o-linear-gradient(left,  #262626 9%," +$j(this).attr('data-color')+ " 100%); \

									background: -ms-linear-gradient(left,  #262626 9%," +$j(this).attr('data-color')+ " 100%); \

									background: linear-gradient(to right,  #262626 9%," +$j(this).attr('data-color')+ " 100%);\

									filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#262626', endColorstr='" +$j(this).attr('data-color')+ "',GradientType=1 ); \

								} \

							";

			jQuery('body').append('<style id="tootlbar_color" type="text/css">'+newSkin+'</style>'); 

		

	});

	

	$j('#tootlbar_ajax').change(function(){

		if($j(this).val() != ""){

			

			// sessionStorage.setItem("animation", $j(this).val());

    	$j.post(root+'updatesession.php', {animation : $j(this).val()}, function(data){

					location.reload();

			});

			

			

		}

	});





	$j('#tootlbar_menu').change(function(){

		if($j(this).val() != ""){

			$j.post(root+'updatesession.php', {menu : $j(this).val()}, function(data){

					location.reload();

			});

		}

	});





}); 
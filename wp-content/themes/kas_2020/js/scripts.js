var $ = jQuery.noConflict();

$(document).ready(function() {
	console.log("ready? ok!");

	if ($(".header-slide").length > 1) {
		$(".header-slides").slick({
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true
		});
	}

	$("#mobile-ham").click(function() {
		$("#mobile-nav-links").toggleClass("active");
	});
});

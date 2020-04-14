var $ = jQuery.noConflict();

$(document).ready(function() {
	console.log("ready? ok!");

	if ($(".home-latest-videos-feed a").length > 1) {
		console.log("what?");
		$(".home-latest-videos-feed").slick({
			arrows: true,
			slidesToShow: 1,
			slidesToScroll: 1
		});
	}

	$("#mobile-ham").click(function() {
		$("#mobile-nav-links").toggleClass("active");
	});
});

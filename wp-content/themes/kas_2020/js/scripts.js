var $ = jQuery.noConflict();

$(document).ready(function () {
	console.log("ready? ok!");

	$(".home-latest-videos #play-video").on("click", function (ev) {
		$(".home-latest-videos iframe")[0].src += "&autoplay=1";
		$(this).fadeOut();
		ev.preventDefault();
	});

	$("#mobile-ham").click(function () {
		$("#mobile-nav-links").toggleClass("active");
	});
});

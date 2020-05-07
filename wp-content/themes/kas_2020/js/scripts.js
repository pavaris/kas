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

	$(".single-written .posts-feed").slick({
		slidesToShow: 3,
		arrows: false,
		slidesToScroll: 3,
		dots: true,
		responsive: [
			{
				breakpoint: 876,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
				},
			},
			{
				breakpoint: 667,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});

	// GALLERY
	if ($(".wp-block-gallery").length > 0) {
		console.log("gallery");
		$("body").append(
			`<div class="gallery-block-lightbox"><div class="gallery-block-lightbox-inner"></div></div>`
		);
		$(".blocks-gallery-item").click(function () {
			let href = $(this).find("img").attr("src");
			console.log(href);
			$(".gallery-block-lightbox").fadeIn();
			$(".gallery-block-lightbox-inner").html("<img src='" + href + "' />");
		});
		$(".gallery-block-lightbox-inner").click(function () {
			$(".gallery-block-lightbox").fadeOut();
		});
	}
});

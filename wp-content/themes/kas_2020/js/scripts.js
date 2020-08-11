var $ = jQuery.noConflict();
const local = document.location.host.includes("local") ? "/kas_new" : "";
const siteURL = document.location.origin + local;
$(document).ready(function () {
	console.log("ready? ok!");

	$(".video-play-wrapper #play-video").on("click", function (ev) {
		$(".video-play-wrapper iframe")[0].src += "?autoplay=1";
		$(this).fadeOut();
		ev.preventDefault();
	});

	$(".donate-search .search-toggle, .nav-search-close button").click(function (
		e
	) {
		e.preventDefault();
		$(".site-header").toggleClass("show-search");
	});

	$("#mobile-ham").click(function () {
		$("#mobile-nav-links").toggleClass("active");
	});

	$(".header-slides").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		dots: true,
		arrows: false,
	});

	$(".home-legacy-feed-inner").slick({
		slidesToShow: 3,
		slidesToScroll: 3,
		prevArrow: $(".legacy-arrow-left"),
		nextArrow: $(".legacy-arrow-right"),
		infinite: false,
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

	$("#see-more").click(function () {
		const $this = $(this);
		const scrollTop = $(window).scrollTop();
		const offset = parseInt($this.attr("offset"));
		fetch(
			`${siteURL}/wp-json/kas_posts/${$this.attr("type")}/${$this.attr(
				"term"
			)}/${offset}`
		)
			.then((response) => response.json())
			.then((data) => {
				if (data.length) {
					$(".posts-feed").append(data);
					$("html, body").scrollTop(scrollTop);
					$this.attr("offset", offset + 3);
				} else {
					$this.hide();
				}
			});
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

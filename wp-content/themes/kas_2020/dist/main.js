/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/dist/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports) {

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

	$(".roar-single-template .video-playlist a").click(function (e) {
		e.preventDefault();
		const $this = $(this);
		if (!$this.hasClass("active")) {
			$(".roar-single-template .video-playlist a").removeClass("active");
			$this.addClass("active");
			$(".roar-single-template #play-video img").attr("src", $this.attr("poster"));
			setTimeout(function () {
				$(".video-single-embed iframe").attr("src", "https://www.youtube.com/embed/" + $this.attr("vidid"));
			}, 300);
			$("h1").html($this.find("p").html());
		}
	});

	$(".donate-search .search-toggle, .nav-search-close button").click(function (e) {
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
		autoplay: true,
		autoplaySpeed: 4000
	});

	$(".home-legacy-feed-inner").slick({
		slidesToShow: 3,
		slidesToScroll: 3,
		prevArrow: $(".legacy-arrow-left"),
		nextArrow: $(".legacy-arrow-right"),
		infinite: false,
		responsive: [{
			breakpoint: 876,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}, {
			breakpoint: 667,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	});

	$("#see-more").click(function () {
		const $this = $(this);
		const scrollTop = $(window).scrollTop();
		const offset = parseInt($this.attr("offset"));

		fetch(`${siteURL}/wp-json/kas_posts/${$this.attr("type")}/${$this.attr("term")}/${offset}`).then(response => response.json()).then(data => {
			if (data.length) {
				$(".posts-feed").append(data);
				$("html, body").scrollTop(scrollTop);
				$this.attr("offset", offset + 6);
			} else {
				$this.hide();
			}
		});
	});

	// GALLERY
	if ($(".wp-block-gallery").length > 0 || $(".photo-gallery-grid").length > 0) {
		$("body").append(`<div class="gallery-block-lightbox"><div class="gallery-block-lightbox-inner"></div></div>`);
		$(".blocks-gallery-item").click(function (e) {
			e.preventDefault();
			let href = $(this).find("img").attr("src");
			console.log(href);
			$(".gallery-block-lightbox").fadeIn();
			$(".gallery-block-lightbox-inner").html("<img src='" + href + "' />");
		});
		$(".gallery-block-lightbox-inner").click(function () {
			$(".gallery-block-lightbox").fadeOut();
		});
	}

	$(".mobile.filter").click(function () {
		$(".mobile.filter-dropdown").slideToggle();
	});

	var lastScrollTop = $(window).scrollTop();
	$(window).scroll(function () {
		var st = $(this).scrollTop();
		if (st > lastScrollTop && st > 0) {
			$("body").addClass("hide_menu");
		} else {
			$("body").removeClass("hide_menu");
		}
		lastScrollTop = st;
	});

	var lang = [];
	var gen = [];
	var comm = [];

	$(".filtered-post-feed a").each(function (e) {
		if ($(this).attr("language")) {
			lang.push($(this).attr("language"));
		}
		if ($(this).attr("communities")) {
			comm.push($(this).attr("communities"));
		}
		if ($(this).attr("generation")) {
			gen.push($(this).attr("generation"));
		}
	});

	[...new Set(lang)].sort().forEach(function (e) {
		if (e !== "-Select-") {
			$(".filters #language").append(`<option value="${e}">${e}</option>`);
		}
	});
	[...new Set(gen)].sort().forEach(function (e) {
		if (e !== "-Select-") {
			$(".filters #generation").append(`<option value="${e}">${e}</option>`);
		}
	});
	[...new Set(comm)].sort().forEach(function (e) {
		if (e !== "-Select-") {
			$(".filters #communities").append(`<option value="${e}">${e}</option>`);
		}
	});

	$("#communities").change(function () {
		filterChange();
	});
	$("#generation").change(function () {
		filterChange();
	});
	$("#language").change(function () {
		filterChange();
	});

	function filterChange() {
		$(".filtered-feed a").show();
		if ($("#communities").val() !== "") {
			$(`.filtered-feed a:not([communities="${$("#communities").val()}"])`).hide();
		}
		if ($("#language").val() !== "") {
			$(`.filtered-feed a:not([language="${$("#language").val()}"])`).hide();
		}
		if ($("#generation").val() !== "") {
			$(`.filtered-feed a:not([generation="${$("#generation").val()}"])`).hide();
		}
		if ($(`.filtered-feed a[style="display: none;"]`).length === $(".filtered-feed a").length) {
			$(".filtered-feed").addClass("empty");
		} else {
			$(".filtered-feed").removeClass("empty");
		}

		if ($("#language").val() || $("#generation").val() || $("#communities").val()) {
			$(".posts-feed").hide();
			$(".filtered-feed").show();
			$("#see-more-container").hide();
		} else {
			$(".posts-feed").show();
			$(".filtered-feed").hide();
			$("#see-more-container").show();
			$(".filters option").removeAttr("disabled");
		}
	}

	function parseFiltered() {
		// var parsedLang = [];
		// var parsedGen = [];
		// var parsedComm = [];
		// var filteredLang = [];
		// var filteredGen = [];
		// var filteredComm = [];
		// $(`.filtered-feed a:not([style="display: none;"])`).each(function () {
		// 	parsedLang.push($(this).attr("language"));
		// 	parsedComm.push($(this).attr("communities"));
		// 	parsedGen.push($(this).attr("generation"));
		// });
		// filteredLang = [...new Set(parsedLang)];
		// filteredGen = [...new Set(parsedGen)];
		// filteredComm = [...new Set(parsedComm)];
		// console.log(filteredLang, filteredGen, filteredComm);
		// if
		// $(".filters option").removeAttr("disabled");
		// if (filteredComm.length > 1) {
		// 	$("#communities option:not([default])").attr("disabled", "true");
		// 	filteredComm.forEach(function (e) {
		// 		console.log(e);
		// 		$(`#communities option[value="${e}"]`).removeAttr("disabled");
		// 	});
		// }
		// if (filteredLang.length > 1) {
		// 	$(`#language option:not([default])`).attr("disabled", "true");
		// 	filteredLang.forEach(function (e) {
		// 		console.log(e);
		// 		$(`#language option[value="${e}"]`).removeAttr("disabled");
		// 	});
		// }
		// if (filteredGen.length > 1) {
		// 	$(`#generation option:not([default])`).attr("disabled", "true");
		// 	filteredGen.forEach(function (e) {
		// 		console.log(e);
		// 		$(`#generation option[value="${e}"]`).removeAttr("disabled");
		// 	});
		// }
	}

	function toggleFeed() {
		$(".posts-feed").toggle();
		$(".filtered-feed").toggle();
	}

	$(".guest").click(function () {
		let $this = $(this);
		$("#guest-popup .guest-description").html($this.find(".description").html());
		$("#guest-popup .guestpop-name").html($this.find(".guest-name").html());
		$("#guest-popup .guestpop-type").html($this.parent().attr("guestType"));
		$("#guest-popup").fadeIn().css("display", "flex");
	});
	$("#guest-popup .guest-close").click(function () {
		$("#guest-popup").fadeOut();
	});
});

/***/ })
/******/ ]);
//# sourceMappingURL=main.js.map
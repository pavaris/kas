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

throw new Error("Module build failed: ModuleBuildError: Module build failed: \n\tfont-family: $mrsEaves;\n             ^\n      Undefined variable: \"$mrsEaves\".\n      in /Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/sass/global/_archive.scss (line 4, column 15)\n    at /Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/webpack/lib/NormalModule.js:195:19\n    at /Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/loader-runner/lib/LoaderRunner.js:367:11\n    at /Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/loader-runner/lib/LoaderRunner.js:233:18\n    at context.callback (/Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at Object.callback (/Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/sass-loader/lib/loader.js:55:13)\n    at Object.done [as callback] (/Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/neo-async/async.js:8067:18)\n    at options.error (/Users/pavaris/dev/kas_new/wp-content/themes/kas_2020/node_modules/node-sass/lib/index.js:294:32)");

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
});

$(".mobile.filter").click(function () {
	$(".mobile.filter-dropdown").slideToggle();
});

/***/ })
/******/ ]);
//# sourceMappingURL=main.js.map
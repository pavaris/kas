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

	// GALLERY
	if ($(".wp-block-gallery").length > 0) {
		console.log("gallery");
		$("body").append(`<div class="gallery-block-lightbox"><div class="gallery-block-lightbox-inner"></div></div>`);
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

/***/ })
/******/ ]);
//# sourceMappingURL=main.js.map
/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/posts/loadmore-single.js":
/*!*****************************************!*\
  !*** ./src/js/posts/loadmore-single.js ***!
  \*****************************************/
/***/ (function() {

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
(function ($) {
  var LoadMoreSingle = /*#__PURE__*/function () {
    function LoadMoreSingle() {
      var _siteConfig$ajaxUrl, _siteConfig, _siteConfig$ajax_nonc, _siteConfig2;
      _classCallCheck(this, LoadMoreSingle);
      this.ajaxUrl = (_siteConfig$ajaxUrl = (_siteConfig = siteConfig) === null || _siteConfig === void 0 ? void 0 : _siteConfig.ajaxUrl) !== null && _siteConfig$ajaxUrl !== void 0 ? _siteConfig$ajaxUrl : "";
      this.ajaxNonce = (_siteConfig$ajax_nonc = (_siteConfig2 = siteConfig) === null || _siteConfig2 === void 0 ? void 0 : _siteConfig2.ajax_nonce) !== null && _siteConfig$ajax_nonc !== void 0 ? _siteConfig$ajax_nonc : "";
      this.loadMoreBtn = $("#single-post-load-more-btn");
      this.loadingTextEl = $("#single-loading-text");
      this.isRequestProcessing = false;
      this.init();
    }
    _createClass(LoadMoreSingle, [{
      key: "init",
      value: function init() {
        var _this = this;
        if (!this.loadMoreBtn.length) {
          return;
        }
        this.totalPagesCount = this.loadMoreBtn.data("max-pages");
        this.loadMoreBtn.on("click", function () {
          _this.handleLoadMorePosts();
        });
      }

      /**
       * Load more posts.
       *
       * 1.Make an ajax request, by incrementing the page no. by one on each request.
       * 2.Append new/more posts to the existing content.
       * 3.If it's the last page, remove the load-more button from DOM.
       *
       * @return null
       */
    }, {
      key: "handleLoadMorePosts",
      value: function handleLoadMorePosts() {
        var _this2 = this;
        // Get page no from data attribute of load-more button.
        var page = this.loadMoreBtn.data("page");
        var singlePostId = this.loadMoreBtn.data("single-post-id");
        if (undefined === page || this.isRequestProcessing) {
          return null;
        }
        var nextPage = parseInt(page) + 1; // Increment page count by one.

        this.toggleLoading(true);
        $.ajax({
          url: this.ajaxUrl,
          type: "post",
          data: {
            page: page,
            single_post_id: singlePostId,
            action: "single_load_more",
            ajax_nonce: this.ajaxNonce
          },
          success: function success(response) {
            _this2.loadMoreBtn.data("page", nextPage);
            $("#single-post-load-more-content").append(response);
            _this2.removeLoadMoreIfOnLastPage(nextPage);
            _this2.toggleLoading(false);
          },
          error: function error(response) {
            console.log(response);
            _this2.toggleLoading(false);
          }
        });
      }

      /**
       * Remove Load more Button If on last page.
       *
       * @param {int} nextPage New Page.
       */
    }, {
      key: "removeLoadMoreIfOnLastPage",
      value: function removeLoadMoreIfOnLastPage(nextPage) {
        if (nextPage + 1 > this.totalPagesCount) {
          this.loadMoreBtn.remove();
        }
      }

      /**
       * Toggle Loading
       *
       * Show or hide the loading text.
       *
       * @param isLoading
       */
    }, {
      key: "toggleLoading",
      value: function toggleLoading(isLoading) {
        this.isRequestProcessing = isLoading;
        if (isLoading) {
          this.loadingTextEl.addClass("block");
          this.loadingTextEl.removeClass("hidden");
        } else {
          this.loadingTextEl.addClass("hidden");
          this.loadingTextEl.removeClass("block");
        }
      }
    }]);
    return LoadMoreSingle;
  }();
  new LoadMoreSingle();
})(jQuery);

/***/ }),

/***/ "./src/sass/single.scss":
/*!******************************!*\
  !*** ./src/sass/single.scss ***!
  \******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!**************************!*\
  !*** ./src/js/single.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_single_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sass/single.scss */ "./src/sass/single.scss");
/* harmony import */ var _js_posts_loadmore_single__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../js/posts/loadmore-single */ "./src/js/posts/loadmore-single.js");
/* harmony import */ var _js_posts_loadmore_single__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_posts_loadmore_single__WEBPACK_IMPORTED_MODULE_1__);
//Styles

//Scripts

}();
/******/ })()
;
//# sourceMappingURL=single.js.map
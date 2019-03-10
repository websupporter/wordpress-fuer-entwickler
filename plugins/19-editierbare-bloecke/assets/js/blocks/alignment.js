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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ 3:
/***/ (function(module, exports) {

const registerBlockType = wp.blocks.registerBlockType;
const RichText = wp.editor.RichText;
const BlockControls = wp.editor.BlockControls;
const AlignmentToolbar = wp.editor.AlignmentToolbar;

registerBlockType('plugin/alignment', {
    title: 'Richtext with Alignment',
    icon: 'universal-access-alt',
    category: 'common',

    attributes: {
        text: {
            selector: '.text',
            source: 'html'
        },
        alignment: {
            type: 'string'
        }
    },

    edit: function (props) {

        const onChangeContent = content => {
            props.setAttributes({
                text: content
            });
        };

        const onChangeAlignment = alignment => {
            props.setAttributes({
                alignment: alignment
            });
        };

        return wp.element.createElement(
            'div',
            null,
            wp.element.createElement(
                BlockControls,
                null,
                wp.element.createElement(AlignmentToolbar, {
                    value: props.attributes.alignment,
                    onChange: onChangeAlignment
                })
            ),
            wp.element.createElement(RichText, {
                tagName: 'div',
                className: props.className,
                onChange: onChangeContent,
                style: { textAlign: props.attributes.alignment },
                value: props.attributes.text
            })
        );
    },

    save: function (props) {
        return wp.element.createElement(
            'div',
            { className: props.className },
            wp.element.createElement(RichText.Content, {
                tagName: 'div',
                className: 'text',
                style: { textAlign: props.attributes.alignment },
                value: props.attributes.text
            })
        );
    }
});

/***/ })

/******/ });
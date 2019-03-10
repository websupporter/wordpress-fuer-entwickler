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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

const registerBlockType = wp.blocks.registerBlockType;

registerBlockType('rezepte/zeiten', {
    title: 'Rezeptzeiten',
    icon: 'universal-access-alt',
    category: 'common',

    attributes: {
        kochzeit: {
            source: 'text',
            selector: '.kochzeit-value',
            type: 'string'
        },
        arbeitszeit: {
            source: 'text',
            selector: '.arbeitszeit-value',
            type: 'string'
        }
    },

    edit: function (props) {

        const ChangeKochzeit = event => {
            props.setAttributes({
                kochzeit: event.target.value
            });
        };
        const ChangeArbeitszeit = event => {
            props.setAttributes({
                arbeitszeit: event.target.value
            });
        };
        return wp.element.createElement(
            'p',
            { className: props.className },
            wp.element.createElement(
                'label',
                { className: 'kochzeit' },
                wp.element.createElement(
                    'span',
                    null,
                    'Kochzeit:'
                ),
                wp.element.createElement('input', {
                    type: 'number',
                    onChange: ChangeKochzeit,
                    value: props.attributes.kochzeit
                }),
                wp.element.createElement(
                    'span',
                    null,
                    'Min'
                )
            ),
            wp.element.createElement(
                'label',
                { className: 'arbeitszeit' },
                wp.element.createElement(
                    'span',
                    null,
                    'Arbeitszeit:'
                ),
                wp.element.createElement('input', {
                    type: 'number',
                    onChange: ChangeArbeitszeit,
                    value: props.attributes.arbeitszeit
                }),
                wp.element.createElement(
                    'span',
                    null,
                    'Min'
                )
            )
        );
    },

    save: function (props) {
        return wp.element.createElement(
            'p',
            { className: props.className },
            wp.element.createElement(
                'span',
                { className: 'kochzeit' },
                'Kochzeit: ',
                wp.element.createElement(
                    'span',
                    { className: 'kochzeit-value' },
                    props.attributes.kochzeit
                ),
                ' Min.'
            ),
            ' ',
            wp.element.createElement(
                'span',
                { className: 'arbeitszeit' },
                'Arbeitszeit: ',
                wp.element.createElement(
                    'span',
                    { className: 'arbeitszeit-value' },
                    props.attributes.arbeitszeit
                ),
                ' Min.'
            )
        );
    }
});

/***/ })
/******/ ]);
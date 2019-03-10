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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ 5:
/***/ (function(module, exports) {

const registerBlockType = wp.blocks.registerBlockType;
const Panel = wp.components.Panel;
const PanelRow = wp.components.PanelRow;
const PanelBody = wp.components.PanelBody;
const InspectorControls = wp.editor.InspectorControls;
const RichText = wp.editor.RichText;

registerBlockType('plugin/blockwithinspector', {
    title: 'Block mit Inspektor',
    icon: 'universal-access-alt',
    category: 'common',
    attributes: {
        text: {
            selector: 'p',
            source: 'html'
        },
        lineHeight: {
            type: 'string',
            source: 'attribute',
            selector: '.text',
            attribute: 'data-lineHeight',
            default: '1'
        }
    },
    edit: function (props) {

        const onChangeLineHeight = event => {
            props.setAttributes({
                lineHeight: event.target.value
            });
        };

        const onChangeContent = content => {
            props.setAttributes({
                text: content
            });
        };

        const style = {
            lineHeight: props.attributes.lineHeight
        };
        return wp.element.createElement(
            'div',
            null,
            wp.element.createElement(
                InspectorControls,
                null,
                wp.element.createElement(
                    PanelBody,
                    { title: 'Line Height' },
                    wp.element.createElement(
                        PanelRow,
                        null,
                        wp.element.createElement('input', {
                            type: 'number',
                            onChange: onChangeLineHeight,
                            value: props.attributes.lineHeight,
                            step: '0.01',
                            min: '0.01'
                        })
                    )
                )
            ),
            wp.element.createElement(RichText, {
                style: style,
                value: props.attributes.text,
                onChange: onChangeContent
            })
        );
    },

    save: function (props) {

        const style = {
            lineHeight: props.attributes.lineHeight
        };
        return wp.element.createElement(
            'div',
            { className: props.className },
            wp.element.createElement(RichText.Content, {
                style: style,
                tagName: 'p',
                className: 'text',
                'data-lineHeight': props.attributes.lineHeight,
                value: props.attributes.text
            })
        );
    }
});

/***/ })

/******/ });
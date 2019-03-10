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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ 2:
/***/ (function(module, exports) {

const registerBlockType = wp.blocks.registerBlockType;
const MediaUpload = wp.editor.MediaUpload;
registerBlockType('plugin/mediapuload', {
    title: 'Mediaupload Beispiel',
    icon: 'universal-access-alt',
    category: 'common',
    attributes: {
        url: {
            selector: 'img',
            source: 'attribute',
            attribute: 'src'
        },
        id: {
            selector: 'img',
            source: 'attribute',
            attribute: 'id'
        },
        alt: {
            selector: 'img',
            source: 'attribute',
            attribute: 'alt'
        }
    },
    edit: function (props) {
        const hasImage = () => {
            const remove = () => {

                props.setAttributes({
                    id: null,
                    url: null,
                    alt: null
                });
            };
            return wp.element.createElement(
                'div',
                { className: props.className },
                wp.element.createElement('img', {
                    src: props.attributes.url,
                    alt: props.attributes.alt,
                    id: props.attributes.id
                }),
                wp.element.createElement(
                    'button',
                    { onClick: remove },
                    'Remove'
                )
            );
        };
        const hasNoImage = () => {

            const onSelectImage = img => {
                props.setAttributes({
                    id: img.id,
                    url: img.url,
                    alt: img.alt
                });
            };

            return wp.element.createElement(
                'div',
                { className: props.className },
                wp.element.createElement(MediaUpload, {
                    onSelect: onSelectImage,
                    allowedTypes: ['image'],
                    multiple: false,
                    value: props.attributes.id,
                    render: ({ open }) => wp.element.createElement(
                        'button',
                        { onClick: open },
                        'Open Media Library'
                    )
                })
            );
        };

        return props.attributes.id ? hasImage() : hasNoImage();
    },

    save: function (props) {
        return wp.element.createElement(
            'div',
            { className: props.className },
            wp.element.createElement('img', {
                src: props.attributes.url,
                alt: props.attributes.alt,
                id: props.attributes.id
            })
        );
    }
});

/***/ })

/******/ });
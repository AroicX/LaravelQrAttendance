(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./resources/js/Pages/Auth/Login.js":
/*!******************************************!*\
  !*** ./resources/js/Pages/Auth/Login.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }



var Login =
/*#__PURE__*/
function (_Component) {
  _inherits(Login, _Component);

  function Login() {
    _classCallCheck(this, Login);

    return _possibleConstructorReturn(this, _getPrototypeOf(Login).apply(this, arguments));
  }

  _createClass(Login, [{
    key: "render",
    value: function render() {
      return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "Login"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "main-content"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "container mt--8 pb-5 push-down"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "row justify-content-center"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "col-lg-5 col-md-7"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "card bg-secondary shadow border-0"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "card-header bg-transparent pb-5"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "text-muted text-center mt-2 mb-3"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", null, "Sign in with")), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "btn-wrapper text-center"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("a", {
        href: "#",
        className: "btn btn-neutral btn-icon"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "btn-inner--icon"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("img", {
        src: "../assets/img/icons/common/github.svg"
      })), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "btn-inner--text"
      }, "Github")), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("a", {
        href: "#",
        className: "btn btn-neutral btn-icon"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "btn-inner--icon"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("img", {
        src: "../assets/img/icons/common/google.svg"
      })), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "btn-inner--text"
      }, "Google")))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "card-body px-lg-5 py-lg-5"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "text-center text-muted mb-4"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", null, "Or sign in with credentials")), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("form", {
        role: "form"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "form-group mb-3"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "input-group input-group-alternative"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "input-group-prepend"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "input-group-text"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("i", {
        className: "ni ni-email-83"
      }))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("input", {
        className: "form-control",
        placeholder: "Email",
        type: "email"
      }))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "form-group"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "input-group input-group-alternative"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "input-group-prepend"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "input-group-text"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("i", {
        className: "ni ni-lock-circle-open"
      }))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("input", {
        className: "form-control",
        placeholder: "Password",
        type: "password"
      }))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "custom-control custom-control-alternative custom-checkbox"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("input", {
        className: "custom-control-input",
        id: " customCheckLogin",
        type: "checkbox"
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("label", {
        className: "custom-control-label",
        htmlFor: " customCheckLogin"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "text-muted"
      }, "Remember me"))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "text-center"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("button", {
        type: "button",
        className: "btn btn-primary my-4"
      }, "Sign in"))))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "row mt-3"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "col-6"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("a", {
        href: "#",
        className: "text-light"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", null, "Forgot password?"))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "col-6 text-right"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("a", {
        href: "#",
        className: "text-light"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", null, "Create new account")))))))));
    }
  }]);

  return Login;
}(react__WEBPACK_IMPORTED_MODULE_0__["Component"]);

/* harmony default export */ __webpack_exports__["default"] = (Login);

/***/ })

}]);
// WordPress loads jQuery before the theme script; hand that copy to the
// modules that import 'jquery' (Bootstrap, lightGallery).
//
// This is a CommonJS module on purpose: lightGallery calls require('jquery')
// and needs jQuery itself back, not an ES module namespace.
module.exports = window.jQuery;

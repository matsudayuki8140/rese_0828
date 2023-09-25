/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/menu.js ***!
  \******************************/
var Menu = document.querySelector('.menu');
var MenuOpen = document.querySelector('.menu_button');
var MenuClose = document.querySelector('.menu_close');
var SPMenu = document.querySelector('.sample_menu');
Menu.addEventListener('click', function () {
  MenuOpen.classList.toggle('active');
  MenuClose.classList.toggle('active');
  SPMenu.classList.toggle('active');
});
/******/ })()
;
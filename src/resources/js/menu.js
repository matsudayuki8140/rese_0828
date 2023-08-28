const Menu = document.querySelector('.menu');
const MenuOpen = document.querySelector('.menu_button');
const MenuClose = document.querySelector('.menu_close');

const SPMenu = document.querySelector('.sample_menu');
Menu.addEventListener('click', () => {
    MenuOpen.classList.toggle('active');
    MenuClose.classList.toggle('active');
    SPMenu.classList.toggle('active');
});
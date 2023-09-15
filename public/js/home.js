import {loginRegisterForm, handleMenu} from "./function/function";

const btnLogin = document.querySelector('#login_register_header_btn');
const btnConnected = document.querySelector('#btnActionUser');

if (btnLogin) {
    loginRegisterForm(btnLogin);
}
if (btnConnected) {
    handleMenu();
}

function mobileMenu() {
    const btnMenu = document.querySelector('#btnMenuMobile');
    btnMenu.addEventListener('click', () => {
        const menu = document.querySelector('#menuDisplay');
        menu.classList.toggle('hidden');
    });
    const btnCloseMenu = document.querySelector('#closeMenuMobile');
    btnCloseMenu.addEventListener('click', () => {
        const menu = document.querySelector('#menuDisplay');
        menu.classList.toggle('hidden');
    });
}
mobileMenu();
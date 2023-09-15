import {loginRegisterForm, handleMenu, mobileMenu, horloge} from "./function/function.js";

const btnLogin = document.querySelector('#login_register_header_btn');
const btnloginMobile = document.querySelector('#login_register_header_btn_menuMobile');
const containerMobileHeader = document.querySelector('#containerMobileHeader');
const btnConnected = document.querySelector('#btnActionUser');

if (btnLogin) {
    loginRegisterForm(btnLogin);
}
if (btnConnected) {
    handleMenu();
}
mobileMenu();

if (document.querySelector('#clock')) {
    horloge();
}

